import IndexField from './notes-field/IndexField';
import DetailField from './notes-field/DetailField';
import FormField from './notes-field/FormField';

const handleDarkMode = () => {
  const cls = document.documentElement.classList;
  const isDarkMode = cls.contains('dark');

  if (isDarkMode && !cls.contains('o1-dark')) {
    cls.add('o1-dark');
  } else if (!isDarkMode && cls.contains('o1-dark')) {
    cls.remove('o1-dark');
  }
};

Nova.booting((Vue, router, store) => {
  handleDarkMode();
  new MutationObserver(handleDarkMode).observe(document.documentElement, {
    attributes: true,
    attributeOldValue: true,
    attributeFilter: ['class'],
  });

  Vue.component('index-nova-notes-field', IndexField);
  Vue.component('detail-nova-notes-field', DetailField);
  Vue.component('form-nova-notes-field', FormField);
});
