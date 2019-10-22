<template>
  <div class="w-full bg-white rounded border border-40 px-2 py-2 flex mb-2 mt-2">
    <div class="rounded-full w-12 h-12 mr-3 overflow-hidden text-center">
      <!-- Image -->
      <img class="w-12 h-12" v-if="item.created_by_avatar_url" :src="item.created_by_avatar_url" alt="">
      <div v-else class="w-12 h-12 text-sm font-bold bg-60 text-40" style="line-height: 3rem;">SYS</div>
    </div>

    <div>
      <!-- Title area -->
      <div class="mb-2">
        <span class="font-bold text-lg text-90">{{ item.created_by ? item.created_by.name : 'System' }}</span>
        <span class="text-xs text-80">{{ formattedCreatedAtDate }}{{ item.system ? ' [System]' : '' }}</span>
      </div>

      <!-- Content -->
      <p v-html="item.text"></p>
    </div>
  </div>
</template>

<script>
export default {
  props: ['item'],
  computed: {
    formattedCreatedAtDate() {
      return moment(this.item.created_at).format('DD MMM YYYY HH:mm');
    },
  },
};
</script>
