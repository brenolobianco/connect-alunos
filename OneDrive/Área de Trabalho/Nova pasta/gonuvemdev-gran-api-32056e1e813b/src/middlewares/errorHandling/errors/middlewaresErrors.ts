import { Boom } from '@hapi/boom';

import { createError } from './utils';

/** Middlewares 610 - 699 */

/* Middleware de autenticação 610 - 619 */
export const INVALID_TOKEN = createError({
  message: 'Token inválido',
  statusCode: 403,
  internalCode: 610,
});

export const INVALID_AUTH_HEADER = createError({
  message: 'Cabeçalho de autorização inválido',
  statusCode: 401,
  internalCode: 611,
});

/** Middleware de autorização 620 - 629 */
export const USER_NOT_ALLOWED = createError({
  message: 'Este usuário não possui permissão para esta ação',
  statusCode: 403,
  internalCode: 620,
});

/** Middleware de validação 630 - 639 */
export const VALIDATION_ERROR = (message: string): Boom =>
  createError({
    message,
    statusCode: 400,
    internalCode: 630,
  });
