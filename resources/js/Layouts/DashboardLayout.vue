<template>
  <div>
    <Sidebar />
  
    <div class="bg-default p-4 sm:ml-52 xl:ml-64 mt-14">
      <div v-if="flashSuccess">
        <FlashAlert :message="flashSuccess" />
      </div>
      <slot />
      <Footer />
    </div>
  </div>
</template>

<script setup>
import Sidebar from '@/Components/Sidebar.vue'
import Footer from '@/Components/Footer.vue'

import { usePage } from '@inertiajs/vue3'
import { computed } from 'vue'
import FlashAlert from '@/Components/flashAlert.vue'

const page = usePage()
const flashSuccess = computed(
  () => page.props.flash.success,
)
</script>