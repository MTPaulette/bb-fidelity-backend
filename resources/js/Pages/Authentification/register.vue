<template>
  <AuthentificationLayout>
    <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
      <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
        <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
          Create an account
        </h1>
        <form class="space-y-4 md:space-y-6" action="#" @submit.prevent="create">
            <div>
              <label for="name" class="label">Full name</label>
              <input id="name" v-model="form.name" type="text" class="input" />
              <p class="input-error">{{ form.errors.name }}</p>
            </div>
          <div>
            <label for="email" class="label">Your email</label>
            <input id="email" v-model="form.email" type="email" class="input" />
            <p class="input-error">{{ form.errors.email }}</p>
          </div>
          <div>
            <label for="password" class="label">Password</label>
            <input id="password" v-model="form.password" type="password" class="input" />
            <p class="input-error">{{ form.errors.password }}</p>
          </div> 
          <div>
            <label for="confirm_password" class="label">Confirm password</label>
            <input id="confirm_password" v-model="form.password_confirmation" type="password" class="input" />
            <p class="input-error">{{ form.errors.password_confirmation }}</p>
          </div>
          <div class="flex items-start">
            <div class="flex items-center h-5">
              <input
                id="terms" aria-describedby="terms" type="checkbox"
                class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300
              dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800"
              />
            </div>
            <div class="ml-3 text-sm">
              <label for="terms" class="font-light text-gray-500 dark:text-gray-300">I accept the <a class="font-medium text-blue-600 hover:underline dark:text-blue-500" href="#">Terms and Conditions</a></label>
            </div>
          </div>
          <button type="submit" class="btn-default">Create an account</button>
          <p class="text-sm font-light text-gray-500 dark:text-gray-400">
            Already have an account? <a href="/login" class="font-medium text-blue-600 hover:underline dark:text-blue-500">Login here</a>
          </p>
        </form>
      </div>
    </div>
  </AuthentificationLayout>
</template>


<script setup>
import AuthentificationLayout from '@/Layouts/AuthentificationLayout.vue'
import { useForm } from '@inertiajs/vue3'

const form = useForm({
  name: null,
  email: null,
  password: null,
  password_confirmation: null,
})

const create = () => form.post('/register')
</script>

<!-- <script>
import BaseLayout from '@/Layouts/BaseLayout.vue'

export default {
  layout: BaseLayout,
}
</script> -->