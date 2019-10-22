<template>
  <div class="bg-20 border-b border-t border-40 -mx-6 -my-px py-4 px-4 pb-2">
    <h3 class="text-90 mb-4">{{ field.name }}</h3>
    <note-input
      v-model.trim="note"
      @onSubmit="createNote"
      :loading="loading"
      :placeholder="field.placeholder || field.name"
    />

    <note
      v-for="note in notes"
      :note="note"
      :key="note.id"
      @onDeleteRequested="onNoteDeleteRequested"
    />

    <delete-note-confirmation-modal
      v-if="showDeleteConfirmation"
      @close="showDeleteConfirmation = false"
      @confirm="deleteNote(noteToDelete)"
    />
  </div>
</template>

<script>
import Note from './Note';
import NoteInput from './NoteInput';
import DeleteNoteConfirmationModal from './DeleteNoteConfirmationModal';

export default {
  components: { Note, NoteInput, DeleteNoteConfirmationModal },
  props: ['resource', 'resourceName', 'resourceId', 'field'],
  data: () => ({
    note: '',
    loading: true,
    notes: [],
    showDeleteConfirmation: false,
    noteToDelete: void 0,
  }),
  mounted() {
    this.fetchNotes();
  },
  computed: {
    params() {
      return {
        resourceId: this.resourceId,
        resourceName: this.resourceName,
      };
    },
  },
  methods: {
    async fetchNotes() {
      this.loading = true;

      const { data: notes } = await Nova.request().get(`/nova-vendor/nova-notes/notes`, {
        params: this.params,
      });
      if (Array.isArray(notes)) this.notes = notes;

      this.loading = false;
    },
    async createNote() {
      this.loading = true;

      await Nova.request().post(`/nova-vendor/nova-notes/notes`, { note: this.note }, { params: this.params });
      await this.fetchNotes();

      this.note = '';

      this.loading = false;
    },
    async deleteNote(note) {
      this.loading = true;

      await Nova.request().delete(`/nova-vendor/nova-notes/notes`, { params: this.params, data: { noteId: note.id } });
      await this.fetchNotes();

      this.showDeleteConfirmation = false;
      this.loading = false;
    },
    onNoteDeleteRequested(note) {
      this.showDeleteConfirmation = true;
      this.noteToDelete = note;
    },
  },
};
</script>
