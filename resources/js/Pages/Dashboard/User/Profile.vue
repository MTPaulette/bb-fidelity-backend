<template>
  <DashboardLayout>
    <Breadcrumb link1="dashboard" link2="profile" />
    <div class="ml-3">
      <h1 class="my-6 sm:my-8 title"> Profile </h1>
    </div>


    <div class="w-full h-auto">
      <div class="grid grid-cols-1 md:grid-cols-5 lg:grid-cols-3 sm:gap-7 md:gap-5 lg:gap-14">

        <!-- general informations -->
        <div class="mt-4 md:mt-0 md:col-span-3 lg:col-span-2 w-full px-5 py-5 h-auto rounded-lg shadow-dropdown-light dark:shadow-dropdown-dark">
          <div class="mb-4">
            <h2 class="title"> General Information </h2>
          </div>
          <div class="p-4 mb-8 bg-secondary rounded-lg">vous avez: <span class="text-accentuate">{{ user.point }} point(s)</span></div>
          <form method="PUT" class="flex flex-col justify-between w-full h-auto" @submit.prevent="updateUserInformation">
            <div class="grid gap-2 sm:gap-6 grid-cols-2">
              <div>
                <label for="first_name" class="label">Full name</label>
                <input id="first_name" v-model="formUser.name" type="text" class="input" :placeholder="user.name" />
                <p class="input-error">{{ formUser.errors.name }}</p>
              </div>
              <div>
                <label for="email" class="label">Email address</label>
                <input id="email" disabled aria-label="disabled" type="email" class="input cursor-not-allowed disabled:bg-highlight dark:disabled:opacity-50 disabled:text-white" :placeholder="user.email" />
                <p class="input-error">{{ formUser.errors.email }}</p>
              </div>
            </div>
            
            <div class="mt-3">
              <button type="submit" class="btn-default">Save</button>
            </div>
          </form>
        </div>
      </div>

      <!-- password information -->
      <div class="my-4 md:my-5 lg:my-12 md:col-span-2 w-full px-5 py-5 h-auto rounded-lg shadow-dropdown-light dark:shadow-dropdown-dark">
        <!-- change profile pic -->
        <div class="mb-4">
          <h2 class="title"> Password Information </h2>
        </div>
        <form method="PUT" class="flex flex-col justify-between w-full h-auto" @submit.prevent="updatePassword">
          <div class="grid gap-2 sm:gap-6 grid-cols-2">
            <div class="col-span-2">
              <label for="current_password" class="label">Current Password</label>
              <input id="current_password" v-model="formPassword.current_password" type="password" class="input" placeholder="********" required />
              <p class="input-error">{{ formPassword.errors.current_password }}</p>
            </div> 
            <div>
              <label for="new_password" class="label">New Password</label>
              <input id="new_password" v-model="formPassword.password" type="password" class="input" placeholder="" required />
            </div> 
            <div>
              <label for="confirm_password" class="label">Confirm password</label>
              <input id="confirm_password" v-model="formPassword.password_confirmation" type="password" class="input" placeholder="" required />
              <p class="input-error">{{ formPassword.errors.password }}</p>
              <!-- <p class="input-error">{{ formPassword.errors.password_confirmation }}</p> -->
            </div>
          </div>

          <!-- <div class="flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert"> -->
          <div class="my-6 text-base" role="alert">
            <span class="font-medium">Ensure that these requirements are met:</span>
            <ul class="mt-1.5 ml-4 list-disc list-inside text-gray-500 dark:text-gray-400">
              <li>At least 10 characters (and up to 100 characters)</li>
              <li>At least one lowercase character</li>
              <li>Inclusion of at least one special character, e.g., ! @ # ?</li>
            </ul>
          </div>
            
          <div>
            <button type="submit" class="btn-default">Save</button>
          </div>
          <!-- <button type="submit" class="mt-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-mango font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-mango dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button> -->
        </form>
      </div>
    </div>
  </DashboardLayout>
</template>

<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue'
import Breadcrumb from '@/Components/Breadcrumb.vue'
import { useForm, usePage } from '@inertiajs/vue3'
import { computed } from 'vue'


defineProps({
  // user: Object,
  countries: Object,
  cities: Object,
})

const page = usePage()
const user = computed(
  () => page.props.user,
)

const formUser = useForm({
  name: null,
  telephone: null,
  email: null,
})

const formPassword = useForm({
  current_password: null,
  password: null,
  password_confirmation: null,
})

const updateUserInformation = () => formUser.put('/profile')
const updatePassword = () => formPassword.put('/password')

</script>



