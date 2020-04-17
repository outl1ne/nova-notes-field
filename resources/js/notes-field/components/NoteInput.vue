<template>
  <div class="w-3/5 mb-4 flex">
    <div v-if="trixEnabled">
      <trix-editor
        ref="trixEditor"
        @keydown.stop
        @trix-change="$emit('input', $refs.trixEditor.value)"
        @trix-initialize="initialize"
        :value="value"
        :placeholder="placeholder"
        class="trix-content w-full form-control form-input form-input-bordered py-3 h-auto"
      />
    </div>

    <textarea
      v-else
      rows="3"
      :placeholder="placeholder"
      class="w-full form-control form-input form-input-bordered py-3 h-auto"
      v-bind:value="value"
      v-on:input="$emit('input', $event.target.value)"
    />

    <div class="whitespace-no-wrap ml-2">
      <button
        class="btn btn-default btn-primary inline-flex items-center relative ml-auto"
        @click="$emit('onSubmit')"
        :disabled="loading"
      >
        {{ __('novaNotesField.addNote') }}
      </button>
    </div>
  </div>
</template>

<script>
export default {
  props: ['placeholder', 'value', 'loading', 'trixEnabled'],

  methods: {
    initialize() {
      this.$refs.trixEditor.editor.loadHTML(this.value);
    },
  },

  watch: {
    value(newValue, oldValue) {
      if (this.trixEnabled && this.$refs.trixEditor) {
        if (!newValue && !!oldValue) this.$refs.trixEditor.editor.loadHTML('');
      }
    },
  },
};
</script>
