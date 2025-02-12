/* eslint-disable max-lines-per-function */
import { Types } from 'mongoose';

import app from '../../app';
import * as utils from '../utils';
import * as helpers from '../helpers';
import * as err from '../../middlewares/errorHandling/errors';
import { Role } from '../../enums';
import * as gqlFieldsQuery from '../gqlFieldsQuery';
import * as checkObjects from '../checkObjects';
import { AdminDocument, AdminInterface } from '../../interfaces';

const resolver = 'readAdmin';

const fakeId = Types.ObjectId().toHexString();

let setupData: helpers.SetupTaskResult;

const createQuery = ({ id }: { id: string }): string => `
query {
  ${resolver}(id: "${id}") {
    admin ${gqlFieldsQuery.adminFieldsQuery}
    error ${gqlFieldsQuery.errorFieldsQuery}
  }
}
`;

type Ents = { objects: AdminDocument[] };
const createEnts = async (): Promise<Ents> => {
  const u1 = await helpers.createUser({
    body: {
      roles: [Role.Admin],
      name: 'Joaquim Xavier',
      email: 'joaquim@gmail.com',
    },
  });
  const e1 = await helpers.createEmployee({});
  const o1 = await helpers.createAdmin({
    body: { user: u1._id, employee: e1._id },
  });

  const u2 = await helpers.createUser({
    body: {
      roles: [Role.Admin],
      name: 'Maria Clara',
      email: 'maria@hotmail.com',
    },
  });
  const o2 = await helpers.createAdmin({ body: { user: u2._id } });

  const u3 = await helpers.createUser({
    body: {
      roles: [Role.Admin],
      name: 'Francisco Gomes',
      email: 'gomes@yahoo.com',
    },
  });
  const o3 = await helpers.createAdmin({ body: { user: u3._id } });

  o1.user = u1;
  o1.employee = e1;
  o2.user = u2;
  o3.user = u3;

  const objects = [o1, o2, o3];

  return { objects };
};

const baseRequest = utils.baseGqlRequest(app, createQuery);

const checkResponse = (
  expected: AdminDocument,
  received: AdminDocument,
): void => {
  checkObjects.checkAdmin(expected as Required<AdminInterface>, received);
  expect(received).toMatchObject({
    _id: expected._id.toString(),
    createdAt: expected.createdAt.toISOString(),
    updatedAt: expected.updatedAt.toISOString(),
  });
};

// eslint-disable-next-line max-lines-per-function
export default (): void => {
  beforeAll(async () => {
    setupData = await helpers.setupTask();
  });

  utils.testIsGqlAuthenticated(app, resolver, createQuery({ id: fakeId }));

  const { rolesAllowed, rolesNotAllowed } = helpers.splitRolesByPermission([
    Role.Dev,
    Role.Admin,
  ]);

  rolesNotAllowed.forEach(role => {
    test(`403 ${role} not allowed`, () => {
      return baseRequest({ id: fakeId }, setupData[role].token).then(
        utils.expectGqlError(err.USER_NOT_ALLOWED, resolver),
      );
    });
  });

  rolesAllowed.forEach(role => {
    test(`Not 403 - ${role} allowed`, () => {
      return baseRequest({ id: fakeId }, setupData[role].token).then(
        response => {
          expect(response.status).not.toBe(403);
        },
      );
    });
  });

  test('404 Admin not found - no admin', () => {
    return baseRequest({ id: fakeId }, setupData.dev.token).then(
      utils.expectGqlError(err.ADMIN_NOT_FOUND, resolver),
    );
  });

  let ents: Ents;
  test('404 Admin not found - wrong id', async () => {
    ents = await createEnts();

    return baseRequest({ id: fakeId }, setupData.dev.token).then(
      utils.expectGqlError(err.ADMIN_NOT_FOUND, resolver),
    );
  });

  Array.from({ length: 3 }, (v, k) => k).forEach(i => {
    test(`200 Admin found - admin #${i + 1}`, () => {
      const expected = ents.objects[i];
      return baseRequest(
        { id: expected._id.toString() },
        setupData.dev.token,
      ).then(response => {
        const { admin, error } = response.body.data[resolver];
        expect(error).toBeNull();
        checkResponse(expected, admin);
      });
    });
  });

  afterAll(async () => {
    await helpers.dropCollections(['Admin', 'User']);
  });
};
