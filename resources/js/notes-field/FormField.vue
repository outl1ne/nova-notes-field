<template>
  <NotesField :field="field" :resourceName="resourceName" :resourceId="resourceId" />
</template>

<script>
import { FormField, HandlesValidationErrors } from 'laravel-nova';
import NotesField from '../components/NotesField';

export default {
  props: ['field', 'resourceId', 'resourceName'],
  components: { NotesField },
  mixins: [HandlesValidationErrors, FormField],
  methods: {
    fill(formData) {
      // Do nothing, as this is an invisible field
    },
  },
};
</script>
