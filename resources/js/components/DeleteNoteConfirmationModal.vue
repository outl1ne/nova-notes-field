<template>
  <Modal :show="show" @modal-close="handleClose" @close-via-escape="$emit('close')">
    <form @submit.prevent="handleConfirm" class="bg-white rounded-lg shadow-lg overflow-hidden" style="width: 460px">
      <div class="p-8">
        <heading :level="2" class="mb-6">{{ __('novaNotesField.deleteNoteTitle') }}</heading>
        <p class="text-80 leading-normal">
          {{ __('novaNotesField.deleteConfirmation') }}
        </p>
      </div>

      <div class="bg-30 px-6 py-3 flex">
        <div class="ml-auto">
          <LinkButton type="button" @click.prevent="handleClose" class="o1-font-normal o1-h-9 o1-px-3 o1-mr-3">
            {{ __('novaNotesField.cancel') }}
          </LinkButton>

          <DangerButton id="confirm-delete-button" ref="confirmButton" type="submit">
            {{ __('novaNotesField.delete') }}
          </DangerButton>
        </div>
      </div>
    </form>
  </Modal>
</template>

<script>
export default {
  props: ['show'],

  methods: {
    handleClose() {
      this.$emit('close');
    },
    handleConfirm() {
      this.$emit('confirm');
    },
  },
};
</script>
