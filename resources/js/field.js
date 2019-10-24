Nova.booting((Vue, router, store) => {
  Vue.component('index-nova-notes-field', require('./notes-field/IndexField'));
  Vue.component('detail-nova-notes-field', require('./notes-field/DetailField'));
  Vue.component('form-nova-notes-field', require('./notes-field/FormField'));
});
