Nova.booting((Vue, router, store) => {
  Vue.component('index-nova-notes-field', require('./notes-field/IndexField').default);
  Vue.component('detail-nova-notes-field', require('./notes-field/DetailField').default);
  Vue.component('form-nova-notes-field', require('./notes-field/FormField').default);
});
