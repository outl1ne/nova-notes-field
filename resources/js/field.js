Nova.booting((Vue, router, store) => {
  Vue.component('index-nova-notes-field', require('./components/IndexField'));
  Vue.component('detail-nova-notes-field', require('./components/DetailField'));
  Vue.component('form-nova-notes-field', require('./components/FormField'));
});
