<template>
        <div class="bg-gray-100 h-screen flex items-center justify-center">
            <form @submit.prevent="form.post('/admin/login')" class="bg-white p-8 shadow rounded-lg max-w-md">
                <label for="email" class="text-sm text-gray-500">Email</label>
                <input name="email" id="email" type="text" v-model="form.email" class="w-full form-input rounded-md shadow-sm mb-4 mt-1">
                
                <label for="password" class="text-sm text-gray-500">Password</label>
                <input name="password" id="password" type="password" v-model="form.password" class="w-full form-input rounded-md shadow-sm my-1">

                <input name="remember" id="remember" type="checkbox" v-model="form.remember" class="rounded-md shadow-sm mt-4 mb-1">
                <label for="remember " class="text-sm text-gray-600">Remember me</label>

                <button type="submit" :disabled="form.processing" class="inline-flex items-center place-content-center my-1 p-2 w-full bg-blue-500 border border-gray-200 rounded-md font-semibold text-xs text-gray-900 uppercase tracking-widest hover:bg-blue-700 active:bg-blue-600 focus:outline-none focus:border-blue-800 focus:shadow-outline-gray transition ease-in-out duration-150">
                    Login
                </button>  
            </form>
        </div>
</template>

<script>
    export default {
        data() {
            return {

                form: this.$inertia.form({
                    email: null,
                    password: null,
                    remember: false,
                }),

            }
        },
    }
</script>