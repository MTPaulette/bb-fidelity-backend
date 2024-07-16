<template>
  <button id="user-menu-button" type="button" :class="isDark?'bg-gray-500':''" class="flex p-1.5 mt-2.5 text-sm hover:text-accentuate hover:bg-transparent rounded-full md:mr-0" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 16 16">
      <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
    </svg>
  </button>
  <div id="user-dropdown" class="z-20 hidden my-4 overflow-x-hidden max-w-xs px-4 py-3 divide-y divide-[#dadce0] dropdown text-sm">
    <div v-if="user" class="px-4 py-3">
      <span class="block text-accentuate">role {{ user.role_id }}</span>
      <span class="block text-accentuate">point: {{ user.point }}</span>
      <span class="block text-accentuate">{{ user.name }}</span>
      <span class="block font-medium truncate">{{ user.email }}</span>
    </div>
    <ul class="py-2" aria-labelledby="user-menu-button">
      <li v-if="user">
        <Link href="/dashboard" class="block px-4 py-2 hover:text-accentuate hover:bg-highlight">Dashboard</Link>
      </li>
      <li v-else>
        <Link href="/login" class="block px-4 py-2 hover:text-accentuate hover:bg-highlight">Login</Link>
      </li>
      <li>
        <Link href="#" class="block px-4 py-2 hover:text-accentuate hover:bg-highlight">Reglages</Link>
      </li>
      <li v-if="user">
        <Link href="/logout" method="DELETE" as="btn" class="block px-4 py-2 hover:text-accentuate hover:bg-highlight">Deconnexion</Link>
      </li>
    </ul>
  </div>
</template>

<script setup>
import { usePage, Link } from '@inertiajs/vue3'
import { computed } from 'vue'

const page = usePage()
const user = computed(
  () => page.props.user,
)

</script>