<template>
  <DashboardLayout>
    <Breadcrumb link1="dashboard" link2="new service" />
    <div class="ml-3">
      <h1 class="my-6 sm:my-8 title"> Add service </h1>
    </div>

    <div class="w-full px-4 py-5 h-auto border my-border-gray rounded-lg shadow">
      <div class="grid grid-cols-1 md:grid-cols-5 md:gap-7 md:pl-7 md:pt-4 md:pb-8">
        <div class="col-span-2 flex flex-col items-center justify-center">
          <div class="p-3 mb-4 rounded-lg bg-gray-50 dark:bg-gray-700">
            <p class="text-sm text-gray-500 dark:text-gray-400">
              Check to the right. If the service that you find not exist, you can use the left textarea to
              <span class="font-medium text-gray-800 dark:text-white">add new service</span>.
              You can also use the trash icon to delete some service.
            </p>
          </div>

          <!-- dark:bg-gray-700  -->
          <form class="relative w-full" @submit.prevent="addNew">
            <div>
              <label for="name" class="label">Name</label>
              <input id="name" v-model="form.name" type="text" class="input" />
            </div>
          <div>
            <label for="price" class="label">Price</label>
            <input id="price" v-model="form.price" type="price" class="input" />
          </div>
          <div>
            <label for="service" class="block text-base font-medium text-gray-900 dark:text-white">service</label>
            <textarea v-model="form.description" rows="4" class="text-area mb-4" placeholder="new service..." />
            <button type="submit" class="btn-base btn-success rounded-lg">Add</button>
          </div>
          </form>
        </div>
        <div class="col-span-3 my-20 md:my-0 border-none md:border-l-2 md:my-border-gray md:pl-7">
          {{ service }}
          <updateService :services="services" @delete="deleteItem" />
        </div>
      </div>
    </div>
  </DashboardLayout>
</template>

<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue'
import Breadcrumb from '@/Components/Breadcrumb.vue'
import updateService from '@/Components/List/updateService.vue'
import Button from '@/Components/button.vue'
import { useForm, router } from '@inertiajs/vue3'


defineProps({
  services: Object,
})

const form = useForm({
  name: '',
  price: 0,
  description: '',
})

const addNew = () => {
  form.post('/service')
  form.reset('service')
}

const deleteItem = (i) => {
  router.delete(`/service/${i}`)
}
</script>
