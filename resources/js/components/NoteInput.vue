<template>
  <div class="mb-4 flex" :class="fullWidth ? 'w-full' : 'w-3/5'">
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
      class="form-control w-full form-input form-input-bordered py-3 h-auto"
      v-bind:value="value"
      v-on:input="$emit('input', $event.target.value)"
      v-on:keydown.enter="onEnter"
    />

    <div class="whitespace-no-wrap ml-2">
      <button
        class="btn btn-default btn-primary inline-flex items-center relative ml-auto"
        @click="$emit('onSubmit')"
        type="button"
        :disabled="loading || !value"
      >
        {{ __('novaNotesField.addNote') }}
      </button>
    </div>
  </div>
</template>

<script>
export default {
  props: ['placeholder', 'value', 'loading', 'trixEnabled', 'fullWidth'],
  methods: {
    initialize() {
      this.$refs.trixEditor.editor.loadHTML(this.value);
    },

    onEnter(e) {
      if (e.shiftKey) return true;

      e.preventDefault();
      e.stopPropagation();
      this.$emit('onSubmit');
      return true;
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
