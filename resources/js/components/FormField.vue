<template>
  <default-field :field="field">
    Form Field
  </default-field>
</template>

<script>
import { Errors, FormField, HandlesValidationErrors, InteractsWithDates } from 'laravel-nova';

export default {
  props: ['resourceId'],
  mixins: [HandlesValidationErrors, FormField, InteractsWithDates],
};
</script>
