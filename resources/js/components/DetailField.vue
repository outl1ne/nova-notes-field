<template>
  <div class="bg-20 border-b border-t border-40 -mx-6 -my-px py-4 px-4 pb-2">
    <h3 class="text-90 mb-4">Order notes</h3>

    <note-entry-field :resourceId="resourceId" @noteAdded="fetchActivityItems" />

    <activity-item v-for="item in activityItems" :item="item" :key="item.id" />
  </div>
</template>

<script>
import ActivityItem from './ActivityItem';
import NoteEntryField from './NoteEntryField';

export default {
  components: { ActivityItem, NoteEntryField },
  props: ['resource', 'resourceName', 'resourceId', 'field'],
  data: () => ({
    loading: true,
    activityItems: [],
  }),
  mounted() {
    this.fetchActivityItems();

    console.info(this.resourceName, this.resourceId);
  },
  methods: {
    async fetchActivityItems() {
      this.loading = true;

      const { data: activityItems } = await Nova.request().get(`/zave/ecommerce/orders/${this.resourceId}/activity`, {
        params: {
          resourceId: this.resourceId,
          resourceName: this.resourceName,
        },
      });
      if (Array.isArray(activityItems)) this.activityItems = activityItems;

      this.loading = false;
    },
  },
};
</script>
