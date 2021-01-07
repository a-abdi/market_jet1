<template>
        <div class="bg-gray-100 h-screen flex items-center justify-center">
            <div class="w-full sm:max-w-md">
                <form @submit.prevent="form.post('/admin/login')" class="bg-white p-8 shadow rounded-lg w-full">
                    <div class="w-full">
                        <label for="email" class="text-sm text-gray-500">Email</label>
                    </div>

                    <div class="w-full">
                        <input name="email" id="email" type="text" v-model="form.email" class="w-full form-input rounded-md shadow-sm">
                    </div>
                    
                    <div v-if="errors.email" class="w-full text-sm text-red-500 my-1 tracking-wider">
                        {{ errors.email }}
                    </div>

                    <div class="w-full mt-4">
                        <label for="password" class="text-sm text-gray-500">Password</label>
                    </div>
                    
                    <div class="w-full">
                        <input name="password" id="password" type="password" v-model="form.password" class="w-full form-input rounded-md shadow-sm">
                    </div>

                    <div v-if="errors.password" class=" w-full text-sm text-red-500 tracking-wider">
                        {{ errors.password }}
                    </div>

                    <div class="w-full flex items-center mt-4">
                        <input name="remember" id="remember" type="checkbox" v-model="form.remember" class="rounded-md shadow-sm mr-2">
                        <label for="remember " class="text-sm text-gray-600">Remember me</label>
                    </div>

                    <div class="flex items-center mt-4 justify-end">
                        <button type="submit" :disabled="form.processing" class="inline-flex items-center place-content-center p-2 w-24 bg-blue-500 border border-gray-200 rounded-md font-semibold text-xs text-gray-900 uppercase tracking-widest hover:bg-blue-700 active:bg-blue-600 focus:outline-none focus:border-blue-800 focus:shadow-outline-gray transition ease-in-out duration-150">
                            Login
                        </button> 
                    </div>
                </form>
            </div>
        </div>
</template>

<script>
    export default {
        props: {

        },

        data() {
            return {

                form: this.$inertia.form({
                    email: null,
                    password: null,
                    remember: false,
                }),

            }
        },

        computed: {
            errors() {
                return this.form.__inertia.page.props.errors
            },
        },

    }
</script>