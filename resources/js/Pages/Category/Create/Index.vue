<template>
    <app-layout>
        <div class="flex justify-center">
        <form @submit.prevent="submit" class="mt-12 w-4/5 bg-white border-gray-500 shadow rounded-md flex justify-center">
            <div class="grid grid-cols-9 gap-0 sm:gap-3">
                <div class="mt-2 mx-1 sm:my-4 col-start-1 col-span-9 sm:col-start-2 sm:col-span-1 flex items-center">
                    <label for="category" class="text-sm text-gray-600">Category</label>
                </div>

                <div class="m-1 sm:my-4 col-start-1 col-span-9 sm:col-start-3 sm:col-span-4 flex items-center">
                    <input type="text" name="name" id="name" v-model="form.name" class="w-full form-input rounded-md shadow-sm">
                </div>


                <div class="my-4 mx-1 sm:my-4 col-start-1 col-span-9 sm:col-start-7 sm:col-span-2 justify-center">
                    <button type="submit" class="w-full shadow p-2 bg-blue-400 border border-gray-200 rounded-md font-semibold text-xs text-gray-800 uppercase tracking-widest hover:bg-blue-500 active:bg-blue-400 focus:outline-none focus:border-blue-600 focus:shadow-outline-gray transition ease-in-out duration-250">Add</button>
                </div>
            </div>
        </form>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'

    export default {
       components: {

            AppLayout,

        },

        data() {
            return {
                form: {
                    name: null
                }
            }
        },

        methods: {

            submit() {
                var data = new FormData()
                
                data.append('name', this.form.name)

                this.$inertia.post('/category', data)
            }
        }
    }
</script>