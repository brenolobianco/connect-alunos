// eslint-disable-next-line import/no-extraneous-dependencies
import Faker from 'faker/locale/pt_BR';
import { Types } from 'mongoose';
import { Role } from '../enums';
import { Address } from '../interfaces';

export function fakeRandomArrayElement<T>(array: Array<T>) {
  return (): T => {
    return Faker.random.arrayElement(array);
  };
}

export const fakeImage = (): string => Faker.image.imageUrl();

export const fakeHexColor = (): string => Faker.internet.color();

export const fakeText = (): string => Faker.lorem.paragraph();

export const fakePhoto = (): string => Faker.internet.avatar();

export const fakeFullName = (): string => Faker.name.findName();

export const fakeWord = (): string => Faker.lorem.word();

export const fakeRandomInt = (options?: {
  min?: number;
  max?: number;
  precision?: number;
}) => (): number => {
  return Faker.random.number(options);
};

export const fakeDayOfWeek = fakeRandomInt({ min: 0, max: 6 });

export const fakeRole = fakeRandomArrayElement(Object.values<Role>(Role));

export const fakeId = (): Types.ObjectId => Types.ObjectId();

export const fakeBoolean = (): boolean => Faker.random.boolean();

export const fakeUsername = (): string =>
  Faker.random.alphaNumeric(Faker.random.number({ min: 4, max: 16 }));

export const fakeDigitsString = (len: number) => (): string => {
  return Faker.address.zipCode('#'.repeat(len));
};

export const fakeRecentDate = (): Date => Faker.date.recent();

export const fakePastDate = (): Date => Faker.date.past();

export const fakeFutureDate = (): Date => Faker.date.future();

export const fakeEmail = (): string => Faker.internet.email();

export const fakePassword = (): string => Faker.internet.password(6);

export const fakeCpf = fakeDigitsString(11);

export const fakePhone = fakeDigitsString(11);

export const fakeCardHolderName = (): string => Faker.name.findName();

export const fakeCardNumber = fakeDigitsString(16);

export const fakeExpirationMonth = (): number => {
  return Faker.random.number({ min: 1, max: 12 });
};

export const fakeExpirationYear = (): number => {
  return Faker.random.number({ min: 2019, max: 2022 });
};

export const fakeSecurityCode = fakeDigitsString(3);

export const fakeSentence = (): string => Faker.lorem.sentence();

export const fakeLogo = (): string => Faker.image.business();

export const fakeUrl = (): string => Faker.internet.url();

export function fakeArray<T>(func: () => T, len = 1): T[] {
  return Array(len).fill(func());
}

export const fakeJobTitle = (): string => Faker.name.jobTitle();

export const fakeAddress = (): Address => ({
  street: Faker.address.streetName(),
  number: fakeDigitsString(4)(),
  district: Faker.address.streetPrefix(),
  city: Faker.address.city(),
  state: 'PR',
  postalCode: fakeDigitsString(8)(),
  complement: Faker.lorem.words(2),
});
