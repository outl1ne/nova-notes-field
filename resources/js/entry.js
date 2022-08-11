import IndexField from './notes-field/IndexField';
import DetailField from './notes-field/DetailField';
import FormField from './notes-field/FormField';

Nova.booting((Vue, router, store) => {
  new MutationObserver(() => {
    const cls = document.documentElement.classList;
    const isDarkMode = cls.contains('dark');

    if (isDarkMode && !cls.contains('o1-dark')) {
      cls.add('o1-dark');
    } else if (!isDarkMode && cls.contains('o1-dark')) {
      cls.remove('o1-dark');
    }
  }).observe(document.documentElement, {
    attributes: true,
    attributeOldValue: true,
    attributeFilter: ['class'],
  });

  Vue.component('index-nova-notes-field', IndexField);
  Vue.component('detail-nova-notes-field', DetailField);
  Vue.component('form-nova-notes-field', FormField);
});
