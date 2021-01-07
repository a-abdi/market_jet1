<template>
    <index>
       <div class="flex justify-center">
            <form @submit.prevent="form.post('/admin/categories/')" class="w-full bg-white border-gray-500 shadow rounded-md flex justify-center">
                <div class="grid grid-cols-9">
                    <div class="mt-2 mx-1 sm:mt-4 sm:mb-2 col-start-1 col-span-9 sm:col-start-2 sm:col-span-1 flex items-center">
                        <label for="category" class="text-sm text-gray-600">Category</label>
                    </div>

                    <div class="m-1 sm:mt-4 sm:mb-2 col-start-1 col-span-9 sm:col-start-3 sm:col-span-4 flex items-center">
                        <input type="text" name="name" id="name" v-model="form.name" class="w-full form-input rounded-md shadow-sm">
                    </div>

                    <div class="mt-4 mb-2 mx-1 sm:mt-4 sm:mb-2 col-start-1 col-span-9 sm:col-start-7 sm:col-span-2 justify-center">
                        <button type="submit" class="w-full shadow p-2 bg-blue-400 border border-gray-200 rounded-md font-semibold text-xs text-gray-800 uppercase tracking-widest hover:bg-blue-500 active:bg-blue-400 focus:outline-none focus:border-blue-600 focus:shadow-outline-gray transition ease-in-out duration-250">Add</button>
                    </div>

                    <div v-if="errors" class="mx-1 mb-2 col-span-9 sm:col-span-8 text-center text-red-500 text-sm" :class="{'hidden': form.successful}">
                        {{errors.name}}
                    </div>

                    <div v-if="form.successful" class="mx-1 mb-2 col-span-9 sm:col-span-8 text-center text-green-500 text-sm" >
                        The category was successfully registered
                    </div>
                </div>
            </form>
        </div>
    </index>
</template>

<script>
    import Index from '../Index'

    export default {
        props: {

        },

        components: {

            Index,

        },

        data() { 
            return {
                form: this.$inertia.form({
                    name: null
                }),
            }
        },

        methods: {
            
        },

        watch: {

        },

        computed: {
            errors() {
                return this.form.__inertia.page.props.errors
            },
        },
    }
</script>