<template>
  <div class="bg-20 border-b border-t border-40 -mx-6 -my-px py-4 px-4 pb-2">
    <h3 class="text-90 mb-4">{{ field.name }}</h3>

    <note-input @onSubmit="createNote" />

    <note v-for="note in notes" :note="note" :key="note.id" />
  </div>
</template>

<script>
import Note from './Note';
import NoteInput from './NoteInput';

export default {
  components: { Note, NoteInput },
  props: ['resource', 'resourceName', 'resourceId', 'field'],
  data: () => ({
    loading: true,
    notes: [],
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
    async createNote(note) {
      this.loading = true;

      await Nova.request().post(`/nova-vendor/nova-notes/notes`, { note }, { params: this.params });
      await this.fetchNotes();

      this.loading = false;
    },
  },
};
</script>
