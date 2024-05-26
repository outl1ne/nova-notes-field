<template>
  <Modal role="alertdialog" size="sm" :show="show" @modal-close="handleClose" @close-via-escape="$emit('close')">
    <form @submit.prevent="handleConfirm" class="bg-white rounded-lg shadow-lg overflow-hidden" style="width: 460px">
      <slot>
        <ModalHeader v-text="__(`${__('novaNotesField.deleteNoteTitle')} Resource`)" />
        <ModalContent>
          <p class="leading-normal">
            {{ __('novaNotesField.deleteConfirmation') }}
          </p>
        </ModalContent>
      </slot>
      <ModalFooter>
        <div class="ml-auto">
          <LinkButton
            type="button"
            dusk="cancel-delete-button"
            @click.prevent="handleClose"
            class="mr-3"
          >
            {{ __('Cancel') }}
          </LinkButton>

          <Button
            type="submit"
            ref="confirmButton"
            dusk="confirm-delete-button"
            :loading="working"
            state="danger"
            class="border text-left appearance-none cursor-pointer rounded text-sm font-bold focus:outline-none focus:ring ring-primary-200 dark:ring-gray-600 disabled:cursor-not-allowed inline-flex items-center justify-center shadow h-9 px-3 bg-red-500 border-red-500 hover:[&:not(:disabled)]:bg-red-400 hover:[&:not(:disabled)]:border-red-400 text-white dark:text-red-950"
          >
            {{ __('novaNotesField.delete') }}
          </Button>
        </div>
      </ModalFooter>
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
