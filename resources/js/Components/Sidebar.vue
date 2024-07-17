<template>
  <NavbarDashboard />
  <aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 sm:w-52 xl:w-64 h-screen pt-16 transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
    <!-- <div id="main-sidebar" class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-black"> -->
    <div id="main-sidebar" class="h-full px-3 pb-4 overflow-y-auto bg-secondary">
      <ul class="space-y-2 font-medium h-min-3/4 min-h-[60%] pt-6">
        <li>
          <Link
            href="/dashboard" class="flex items-center w-full p-2 hover:text-accentuate"
            :class="{'text-accentuate bg-highlight rounded-lg': $page.url.startsWith('/dashboard')}"
          >
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z" /><path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z" />
            </svg>
            <span class="ml-3">Dashboard</span>
          </Link>
        </li>
        <li v-if="user.role_id === 1">
          <button type="button" class="flex items-center w-full p-2 hover:text-accentuate" aria-controls="dropdown-add" data-collapse-toggle="dropdown-add">
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M5 4a3 3 0 00-3 3v6a3 3 0 003 3h10a3 3 0 003-3V7a3 3 0 00-3-3H5zm-1 9v-1h5v2H5a1 1 0 01-1-1zm7 1h4a1 1 0 001-1v-1h-5v2zm0-4h5V8h-5v2zM9 8H4v2h5V8z" clip-rule="evenodd" />
            </svg>
            <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>Add</span>
            <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
          </button>
          <ul id="dropdown-add" class="hidden py-2 space-y-2">
            <li v-for="(addItem, i) in addItems" :key="i">
              <Link
                :href="addItem[0]"
                :class="{'text-accentuate bg-highlight rounded-lg': $page.url.startsWith(addItem[0])}"
                class="sidebar-item-dropdown"
              >
                {{ addItem[1] }}
              </Link>
            </li>
          </ul>
        </li>

        <!-- profile -->
        <li v-if="user.role_id === 1">
          <button type="button" class="flex items-center w-full p-2 hover:text-accentuate" aria-controls="dropdown-user" data-collapse-toggle="dropdown-user">
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
            </svg>
            <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>Users</span>
            <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
          </button>
          <ul id="dropdown-user" class="hidden py-2 space-y-2">
            <li v-for="(userItem, i) in userItems" :key="i">
              <Link
                :href="userItem[0]"
                :class="{'text-accentuate bg-highlight rounded-lg': $page.url.startsWith(userItem[0])}"
                class="sidebar-item-dropdown"
              >
                {{ userItem[1] }}
              </Link>
            </li>
          </ul>
        </li>
        
        <li v-else>
          <Link
            href="/profile" class="flex items-center w-full p-2 hover:text-accentuate"
            :class="{'text-accentuate bg-highlight rounded-lg': $page.url.startsWith('/profile')}"
          >
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" /></svg>
            <span class="ml-3">Profile</span>
          </Link>
        </li>
      
        
        <!-- service -->
        <li v-if="user.role_id === 1">
          <button
            type="button" class="flex items-center w-full p-2 hover:text-accentuate"
            :class="{'text-accentuate bg-highlight rounded-lg': $page.url.startsWith('/service')}" aria-controls="dropdown-service" data-collapse-toggle="dropdown-service"
          >
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z" /></svg>
            <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>Services</span>
            <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
          </button>
          <ul id="dropdown-service" class="hidden py-2 space-y-2">
            <li>
              <Link
                :href="route('service.index')"
                class="sidebar-item-dropdown"
              >
                Services List
              </Link>
            </li>
            <li>
              <Link :href="route('service.create')" class="sidebar-item-dropdown">New Service</Link>
            </li>
          </ul>
        </li>
        
        
        <li v-else>
          <Link
            :href="route('service.index')"
            class="flex items-center w-full p-2 hover:text-accentuate"
            :class="{'text-accentuate bg-highlight rounded-lg': $page.url.startsWith('/service')}"
          >
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z" /><path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z" />
            </svg>
            <span class="ml-3">Services</span>
          </Link>
        </li>
      </ul>
    </div>
  </aside>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
import { onMounted } from 'vue'
import { initFlowbite } from 'flowbite'
import NavbarDashboard from '@/Components/NavBar.vue'
import { usePage } from '@inertiajs/vue3'
import { computed } from 'vue'

const page = usePage()
const user = computed(
  () => page.props.user,
)

const addItems = [['/room','Room'],['/category','Category']]
const userItems = [['/user','Users List'], ['/profile','Profile']] //, ['/user/create','New User']

// initialize components based on data attribute selectors
onMounted(() => {
  initFlowbite()
})
</script>



<style scoped>
#main-sidebar::-webkit-scrollbar{
  width: 5px;
}

#main-sidebar::-webkit-scrollbar-track{
  box-shadow: inset 0 0 6px #FFF;
}

#main-sidebar::-webkit-scrollbar-thumb{
  outline: 1px solid #C4C4C4;
  background: #C4C4C4;
  border-radius: 8px;
}
</style>