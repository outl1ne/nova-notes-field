import IndexField from './notes-field/IndexField';
import DetailField from './notes-field/DetailField';
import FormField from './notes-field/FormField';

Nova.booting((Vue, router, store) => {
  Vue.component('index-nova-notes-field', IndexField);
  Vue.component('detail-nova-notes-field', DetailField);
  Vue.component('form-nova-notes-field', FormField);
});
