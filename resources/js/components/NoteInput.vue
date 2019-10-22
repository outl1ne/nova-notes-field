<template>
  <div class="w-3/5 mb-4 flex">
    <textarea
      rows="3"
      placeholder="Order note"
      class="w-full form-control form-input form-input-bordered py-3 h-auto"
      v-model="note"
    />

    <div class="whitespace-no-wrap ml-2">
      <button
        class="btn btn-default btn-primary inline-flex items-center relative ml-auto"
        @click="$emit('onSubmit', note)"
        :disabled="loading"
      >
        Add note
      </button>
    </div>
  </div>
</template>

<script>
export default {
  data: () => ({
    note: '',
  }),
};
</script>
