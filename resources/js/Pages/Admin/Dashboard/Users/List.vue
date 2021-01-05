<template>
    <index>
       <div class="w-full text-center bg-white flex justify-center">
            <form @submit.prevent="submit">
                <table class="table-fixed w-full border-collapse border border-green-800">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="w-1/12 border border-green-600">Id</th>
                            <th class="w-2/12 border border-green-600">Name</th>
                            <th class="w-4/12 border border-green-600">Email</th>
                            <th class="w-2/12 border border-green-600">Edit</th>
                            <th class="w-2/12 border border-green-600">Delete</th>
                            <th class="w-1/12 border border-green-600">Photo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-green-200 border border-green-800" v-for="(user, i) in users" :key="user.id">
                            <td class="">{{ user.id }}</td>
                            <td class="">
                                <span :class="{'hidden': editUser.row[i]}">{{ user.name }}</span>
                                <input type="text" :class="{ 'hidden': !editUser.row[i] }" v-model="form.name" @change="form.id = user.id" class="w-full text-sm text-gray-600 mx-1 px-2 py-0.5 focus:outline-none focus:ring border focus:border-blue-300 rounded">
                            </td>

                            <td class="">
                                <span :class="{'hidden': editUser.row[i]}">{{ user.email }}</span>
                                <input type="email" :class="{ 'hidden': !editUser.row[i] }" v-model="form.email" @change="form.id = user.id" class="w-full text-sm text-gray-600 mx-1 px-2 py-0.5 focus:outline-none focus:ring border focus:border-blue-300 rounded">
                            </td>

                            <td class="">
                                <button type="button" :class="{'hidden': editUser.row[i]}" @click="editUser.row[i] = update(user)" class="px-2 py-1 rounded-md bg-blue-500 hover:bg-blue-700 focus:outline-none text-sm tracking-widest"> 
                                    Edit 
                                </button>
                                <button @click="editUser.row[i] = false" type="submit" :class="{'hidden': !editUser.row[i]}" class="px-2 py-1 rounded-md bg-blue-500 hover:bg-blue-700 focus:outline-none text-sm tracking-widest"> 
                                    Update 
                                </button>
                                <button @click="editUser.row[i] = updateCancel()" type="button" :class="{'hidden': !editUser.row[i]}" class="px-2 py-1 rounded-md bg-blue-500 hover:bg-blue-700 focus:outline-none text-sm tracking-widest"> 
                                    Cancel 
                                </button>
                            </td>

                            <td class="">
                                <inertia-link :href="'/admin/users/'+ user.id" method="delete">
                                    <button class="px-2 py-1 rounded-md bg-red-500 hover:bg-red-700 focus:bg-red-900 focus:outline-none text-sm tracking-widest">
                                        Delete 
                                    </button>
                                </inertia-link >
                            </td>

                            <td class="flex items-center justify-center py-2">
                                <img v-if="user.profile_photo_path" :src="'/storage/'+ user.profile_photo_path" :alt="user.name" class="w-16 h-16 rounded-full">
                                <img v-else :src="user.profile_photo_url" :alt="user.name" class="rounded-full">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
        <pagination :url="'/admin/users'" :offset="getOffset()" :limit="6"/>
    </index>
</template>

<script>
    import Index from '../Index'
    import Pagination from '@/Components/Pagination'

    export default {
        props: {
            users: Array,
        },

        components: {

            Index,
            Pagination,

        },

        data() { 
            return {
                updating: false,
                form: {
                    id: null,
                    name: null,
                    email: null,
                },
                editUser: {
                    row: {
                        0: false,
                        1: false,
                        2: false,
                        3: false,
                        4: false,
                        5: false,
                    }
                }
            }
        },

        methods: {
            getOffset() {

                var url_string = window.location.href;
                var url = new URL(url_string);
                return parseInt(url.searchParams.get("offset")) ;

            },

            update(user) {
                if(this.updating) {
                    return false
                }

                this.form.name = user.name
                this.form.email = user.email

                this.updating = true;
                return true
            },

            submit() {
                if(this.form.id) {
                    this.updating = false
                    this.$inertia.patch('/admin/users/'+ this.form.id,
                        { 
                            name: this.form.name, 
                            email: this.form.email,
                            offset: this.getOffset(),
                            limit: 6,
                        }
                    )
                }
            },

            updateCancel() {
                this.updating = false
                return false
            }
        },

        watch: {

        },
    }
</script>