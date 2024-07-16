<template>
  <AuthentificationLayout>
    <div class="w-full p-6 bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md dark:bg-gray-800 dark:border-gray-700 sm:p-8">
      <h1 class="mb-1 text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
        Forgot your password?
      </h1>
      <p class="font-light text-gray-500 dark:text-gray-400">Don't fret! Just type in your email and we will send you a code to reset your password!</p>
      <form class="mt-4 space-y-4 lg:mt-5 md:space-y-5" action="#">
        <div>
          <label for="email" class="label">Your email</label>
          <input id="email" type="email" name="email" class="input" placeholder="name@company.com" required />
        </div>
        <button
          type="submit" class="btn-default"
        >
          Reset password
        </button>
        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
          Already have an account? <a href="/login" class="font-medium text-blue-600 hover:underline dark:text-blue-500">Login here</a>
        </p>
      </form>
    </div>
  </AuthentificationLayout>
</template>

<script setup>
import AuthentificationLayout from '@/Layouts/AuthentificationLayout.vue'
</script>
