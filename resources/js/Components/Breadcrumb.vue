<template>
  <!-- breadcrumb -->
  <div class="text-sm capitalize subtitle mb-4 md:mb-4 mt-4 md:mt-10 px-7 py-5 sm:py-5 bg-secondary rounded-full" aria-label="Breadcrumb">
    <ol class="list-none p-0 inline-flex">
      <li class="flex items-center">
        <Link href="#">{{ link1 }}</Link>
        <svg class="w-5 h-5 mx-3" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
          <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
        </svg>
      </li>
      <li class="flex items-center">
        <a href="#" class="text-accentuate hover:text-secondary">{{ link2 }}</a>
      </li>
    </ol>
  </div>
  <!-- breadcrumb end -->
</template>

<script setup>
import { Link } from '@inertiajs/vue3'

defineProps({
  link1: {
    type: String,
    default: 'accueil',
  },
  link2: String,
})
</script>