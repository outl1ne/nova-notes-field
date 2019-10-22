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
        @click="createNote"
        :disabled="loading"
      >
        Add note
      </button>
    </div>
  </div>
</template>

<script>
export default {
  props: ['resourceId'],
  data: () => ({
    loading: false,
    note: '',
  }),
  methods: {
    async createNote() {
      if (!this.note) return;

      this.loading = true;
      await Nova.request().post(`/zave/ecommerce/orders/${this.resourceId}/activity`, { note: this.note });
      this.$emit('noteAdded');
      this.note = '';
      this.loading = false;
    },
  },
};
</script>
