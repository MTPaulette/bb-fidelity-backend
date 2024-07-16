<template>
  <div class="flex gap-1 items-center">
    <span class="text-sm text-gray-700 dark:text-gray-400">
      Showing 

      <Link 
        v-for="(link, i) in links"
        :key="i" class="font-semibold dark:text-white px-1.5 py-0.5"
        :href="link.url? link.url: '#'"
        :class="{'bg-sheet-200 text-gray-50 rounded-md': link.active }"
        v-html="link.label"
      />
      of &nbsp;<span class="font-semibold text-black-white"> {{ links.length-2 }}</span>
    </span>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'

defineProps({
  links: Array,
})

</script>