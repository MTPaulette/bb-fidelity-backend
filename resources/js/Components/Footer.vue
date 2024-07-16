<template>
  <div class="w-full border-t-2 px-8 pt-6 pb-3 lg:flex justify-between items-center text-sm text-gray-600 sm:text-center dark:text-gray-400">
    <p>
      © {{ new Date().getFullYear() }} <span class="pointer-events-none">Test-Brain-booster™</span>. Tous droits reserves.
    </p>
    <!-- <p class="mb-2 lg:mb-0">© Copyright 2020</p> -->

    <div class="flex">
      <a href="/terms" class="mr-6 hover:text-black">Terms of Service</a>
      <a href="/privacy" class="mr-6 hover:text-black">Privacy Policy</a>
      <a href="/about" class="hover:text-black">A Propos</a>
    </div>
  </div>
</template>
