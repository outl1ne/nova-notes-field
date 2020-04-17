<template>
  <modal @modal-close="handleClose">
    <form @submit.prevent="handleConfirm" class="bg-white rounded-lg shadow-lg overflow-hidden" style="width: 460px;">
      <div class="p-8">
        <heading :level="2" class="mb-6">{{ __('novaNotesField.deleteNoteTitle') }}</heading>
        <p class="text-80 leading-normal">
          {{ __('novaNotesField.deleteConfirmation') }}
        </p>
      </div>

      <div class="bg-30 px-6 py-3 flex">
        <div class="ml-auto">
          <button type="button" @click.prevent="handleClose" class="btn text-80 font-normal h-9 px-3 mr-3 btn-link">
            {{ __('novaNotesField.cancel') }}
          </button>

          <button id="confirm-delete-button" ref="confirmButton" type="submit" class="btn btn-default btn-danger">
            {{ __('novaNotesField.delete') }}
          </button>
        </div>
      </div>
    </form>
  </modal>
</template>

<script>
export default {
  methods: {
    handleClose() {
      this.$emit('close');
    },
    handleConfirm() {
      this.$emit('confirm');
    },
  },
  mounted() {
    this.$refs.confirmButton.focus();
  },
};
</script>
