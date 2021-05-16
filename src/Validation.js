import { extend } from 'vee-validate';

extend('odd', {
  validate: value => {
    return value % 2 !== 0;
  }
});