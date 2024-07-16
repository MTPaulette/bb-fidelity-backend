<template>
  <DashboardLayout>
    <Breadcrumb link1="dashboard" link2="services" />
    <div class="ml-3">
      <h1 class="my-6 sm:my-8 title"> All services </h1>
    </div>


    <div class="w-full px-3 py-5 h-auto my-border-gray rounded-lg shadow">
      <div class="">
        <ListService :services="services" />
      </div>
    </div>
  </DashboardLayout>
</template>

<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue'
import Breadcrumb from '@/Components/Breadcrumb.vue'
import ListService from '@/Components/Service/ListService.vue'

defineProps({
  services: Object,
})
</script>

