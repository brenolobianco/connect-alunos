process.env.NODE_ENV = 'test';
process.env.PORT = '0';
process.env.MONGODB_URI = 'mongodb://localhost:27017/baghome_mongo_test';
process.env.APP_ENV = 'test';
process.env.JWT_SECRET = 'segredo';
process.env.CONTACT_EMAIL = '';
process.env.SG_API_KEY = 'SG.';

module.exports = {
  globals: {
    'ts-jest': {
      tsconfig: '<rootDir>/../../tsconfig.json',
      // diagnostics: {
      //   warnOnly: true
      // }
      diagnostics: false,
    },
  },
  moduleFileExtensions: ['ts', 'js', 'json'],
  transform: {
    '^.+\\.(ts|tsx)$': 'ts-jest',
  },
  testMatch: ['**/*.test.(ts|js)'],
  testEnvironment: 'node',
  setupFilesAfterEnv: ['./jest.setup.ts'],
};
