const mix = require('laravel-mix');
let path = require('path');

require('./mix');

mix
  .setPublicPath('dist')
  .js('resources/js/field.js', 'js')
  .vue({ version: 3 })
  .nova('optimistdigital/nova-notes-field');

mix.alias({
  'laravel-nova': path.join(__dirname, 'vendor/laravel/nova/resources/js/mixins/packages.js'),
});
