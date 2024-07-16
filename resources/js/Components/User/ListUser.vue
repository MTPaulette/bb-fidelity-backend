<template>
  <div class="relative overflow-x-auto">
    <div class="block sm:flex sm:justify-between sm:items-center py-3">
      <div class="flex items-center">
        <div class="relative">
          <SearchBar placeholder="Search for users" />
        </div>
        <div>
          <button id="dropdownActionButton" data-dropdown-toggle="dropdownDotsHorizontal" class="inline-flex mt-2 ml-2 text-sm font-medium text-center text-gray-900 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600" type="button"> 
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
            </svg>
          </button>
        
          <!-- Dropdown menu -->
          <div id="dropdownDotsHorizontal" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownActionButton">
              <li>
                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Reward</a>
              </li>
              <li>
                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Promote</a>
              </li>
              <li>
                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Activate account</a>
              </li>
            </ul>
            <div class="py-1">
              <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete User</a>
            </div>
          </div>
        </div>
      </div>
      <div class="flex mt-5 sm:mt-0">
        <div>
          <Button label="add user" hasicon rounded btn small>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="currentColor" viewBox="0 0 16 16">
              <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
            </svg>
          </Button>
        </div>

        <a href="/export/users" class="ml-2">
          <Button label="export" hasicon rounded light small>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="currentColor" viewBox="0 0 16 16">
              <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
              <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
            </svg>
          </Button>
        </a>
      </div>
    </div>


    <table class="w-full text-sm text-left my-5">
      <thead class="text-xs uppercase bg-secondary ">
        <!-- <thead class="text-xs text-gray-500 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"> -->
        <tr>
          <th scope="col" class="p-4">
            <div class="flex items-center">
              <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" />
              <label for="checkbox-all-search" class="sr-only">checkbox</label>
            </div>
          </th>
          <th scope="col" class="px-6 py-2.5">
            Name
          </th>
          <!-- <th scope="col" class="px-6 py-2.5">
            email
          </th> -->
          <th scope="col" class="px-6 py-2.5">
            point
          </th>
          <th scope="col" class="px-6 py-2.5">
            role
          </th>
          <th scope="col" class="px-6 py-2.5">
            Action
          </th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="user in users.data" :key="user.id" class="border-b border-gray-100 hover:bg-highlight">
          <td class="w-4 p-4">
            <div class="flex items-center">
              <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" />
              <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
            </div>
          </td>
          <th scope="row" class="flex items-center px-6 py-2.5 whitespace-nowrap">
            <!-- <img class="w-10 h-10 rounded-full" src="./../../../images/img.PNG" alt="Jese image" /> -->
            <div class="pl-3">
              <Link :href="`user/${user.id}`" class="font-light">{{ user.name }}</Link>
              <div class="font-light font-[roboto] text-black-white">{{ user.email }}</div>
            </div>  
          </th>
          <!-- <td class="px-6 py-2.5 capitalize">
            yaounde, cameroon
          </td> -->
          <td class="px-6 py-2.5">
            <div v-if="user.point>0">
              <div class="btn-success p-2">{{ user.point }} Point</div>
            </div>
            <div v-else>
              <div class="btn-danger p-2">{{ user.point }} Point</div>
              <!-- <div class="h-2.5 w-2.5 rounded-full bg-red-500 mr-2" /> no -->
            </div>
          </td>
          <td class="px-6 py-2.5">
            <div v-if="user.role_id==1">
              Admin (Entreprise)
            </div>
            <div v-else>
              client
              <!-- <div class="h-2.5 w-2.5 rounded-full bg-red-500 mr-2" /> no -->
            </div>
          </td>
          <td>
          <div class="px-6 py-2.5 flex justify-between w-full ">
            <div @click="editForm(user)">
              <!-- <div data-modal-target="editUserModal" data-modal-show="editUserModal"> -->
              <!-- Modal toggle -->
              <Button label="crediter" hasicon rounded btn extrasmall>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" fill="currentColor" viewBox="0 0 16 16">
                  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                </svg>
              </Button>
            </div>

            <div class="mx-1" @click="editFormMalus(user)">
              <Button label="decrediter" hasicon rounded warning extrasmall>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" fill="currentColor" viewBox="0 0 16 16">
                  <path d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7.028 7.028 0 0 0-2.79.588l.77.771A5.944 5.944 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.134 13.134 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755-.165.165-.337.328-.517.486l.708.709z" />
                  <path d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829l.822.822zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829z" />
                  <path d="M3.35 5.47c-.18.16-.353.322-.518.487A13.134 13.134 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7.029 7.029 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12-.708.708z" />
                </svg>
              </Button>
            </div>
          </div>
          <div v-if="edit == user.id">
            <form class="relative w-full" @submit.prevent="update(user)">
            <div class="">
              <label for="delta" class="label">bonus</label>
              <input id="delta" type="number" name="delta" v-model="form.point" class="input"  />
            </div>
        <!-- Modal footer -->
        <div class="flex items-center p-6 space-x-2 border-t border-color rounded-b dark:border-gray-600">
          <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save all</button>
        </div>
      </form>
    </div>

          </td>
        </tr>
      </tbody>
    </table>

    <!-- Edit user modal -->
    <!-- <EditUserModal :user="user"/> -->
  </div>

  <div v-if="users.data.length" class="w-full flex mt-8 mb-12">
    <pagination :links="users.links" />
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
import { useForm } from '@inertiajs/vue3'
import { ref } from 'vue'
import pagination from '@/Components/paginationTable.vue'
import Button from '@/Components/button.vue'
// import EditUserModal from '@/Components/User/EditUser.vue'
import SearchBar from '@/Components/searchBar.vue'

defineProps({
  users: Object,
})

const edit = ref(null)
const malus = ref(false)
const form = useForm({
  point: 0,
  malus: false
})

const editForm = (user) => {
  edit.value = user.id
}

const editFormMalus = (user) => {
  edit.value = user.id
  malus.value = true
}

const update = (user) => {
  form.malus = malus.value
  form.put(
    route('user.update', {user: user}),
  )
  malus.value = false
  edit.value = null
}


</script>