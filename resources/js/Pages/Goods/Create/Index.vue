<template>
    <app-layout>
        <form @submit.prevent="submit">
            <div class="bg-white shadow m-4 rounded-md grid grid-cols-9">
                <div class="sm:col-span-4 col-span-9 flex items-center place-content-center">
                    <span v-show="photoPreview" class="block  w-80 h-80 rounded-md"
                        :style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>
                <div class="sm:col-span-3 col-span-9">
                    <div class="flex mt-4 grid grid-cols-8 justify-center gap-1">
                        <div class="col-start-1 col-span-6 mt-4 mx-2 sm:mx-0 text-gray-700">
                            <label class="text-sm text-gray-600" for="name">Name</label>
                        </div>

                        <div class="col-start-1 col-span-6 mb-4 mx-2 sm:mx-0">
                            <input type="text" name="name" id="name" v-model="form.name" class="w-full form-input rounded-md shadow-sm">
                        </div>

                        <div class="col-start-1 col-span-6 mt-4 mx-2 sm:mx-0 text-gray-700">
                            <label class="text-sm text-gray-600" for="category">Category</label>
                        </div>

                        <div class="col-start-1 col-span-6 mb-4 mx-2 sm:mx-0">
                            <select name="category" id="category" v-model="form.category" class="w-full form-select roumded-md shadow-sm" required>
                                <option class="text-sm text-gray-600" value="food">food</option>
                                <option class="text-sm text-gray-600" value="home">home</option>
                                <option class="text-sm text-gray-600" value="book">book</option>
                            </select>
                        </div>

                        <div class="col-start-1 col-span-6 mb-4 mx-2 hidden">
                            <input name="photo" id="photo" type="file" ref="photo" @change="updatePhotoPreview">
                        </div>

                        <div class="col-start-1 col-span-2 mt-4 rounded-md flex-1 mb-16">
                            <button type="button"  @click.prevent="selectNewPhoto" class="inline-flex items-center p-0.5 h-28 w-28 bg-white-100 border border-gray-200 rounded-md font-semibold text-xs text-gray-800 uppercase tracking-widest hover:bg-gray-200 active:bg-gray-300 focus:outline-none focus:border-gray-400 focus:shadow-outline-gray transition ease-in-out duration-150">
                                <span v-show="! photoPreview" class="px-2">select image</span>
                                <span v-show="photoPreview" class="block  w-28 h-28 rounded-md"
                                    :style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'">
                                </span>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="sm:col-span-2 col-span-9">
                    <div class="grid grid-cols-8 justify-center mt-4 gap-1">
                        <div class="col-start-2 col-span-6 mx-2 sm:mx-0 text-gray-700 mt-4">
                            <label class="text-sm text-gray-600" for="price">Price</label>
                        </div>

                        <div class="col-start-2 col-span-6 mx-2 sm:mx-0 text-gray-700 mb-4">
                            <input type="number" v-model="form.price" min="1" step="any" name="price" id="price" class="w-full form-input rounded-md shadow-sm">
                        </div> 

                        <div class="col-start-2 col-span-6 mx-2 sm:mx-0 text-gray-700 mt-4">
                            <label class="text-sm text-gray-600" for="discount">Discount</label>
                        </div>
                        
                        <div class="col-start-2 col-span-6 mx-2 sm:mx-0 text-gray-700 mb-4">
                            <input type="number" v-model="form.discount" min="1" step="any" name="discount" id="discount" class="w-full form-input rounded-md shadow-sm">
                        </div>
                        
                        <div class="col-start-2 col-span-6 mx-2 sm:mx-0 text-gray-700 mt-4">
                            <label class="text-sm text-gray-600" for="total">Total Price</label>
                        </div>
                        
                        <div class="col-start-2 col-span-6 mx-2 sm:mx-0 text-gray-700 mb-4">
                            <input type="number" min="1" step="any" name="total" id="total" class="w-full form-input rounded-md shadow-sm" disabled>
                        </div>  


                        <div class="col-start-2 col-span-6 mx-2 sm:mx-0 text-gray-700 my-4">
                            <button type="submit"  class="inline-flex  items-center place-content-center p-0.5 h-10 w-full bg-blue-500 border border-gray-200 rounded-md font-semibold text-xs text-gray-900 uppercase tracking-widest hover:bg-blue-700 active:bg-blue-600 focus:outline-none focus:border-blue-800 focus:shadow-outline-gray transition ease-in-out duration-150">
                                Submit
                            </button>  
                        </div> 
                    </div>
                </div>
            </div>
        </form>    
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'

    export default {
        props: {
            error: Object,
        },

        components: {

            AppLayout,

        },

        data() { 
            return {
               photoPreview: null,
               
               form: {
                   name: null,
                   category: 'home',
                   photo: null,
                   price: null,
                   discount: null,
               }
            }
        },

        methods: {

            selectNewPhoto() {
                this.$refs.photo.click();
            },

            updatePhotoPreview() {
                const reader = new FileReader();
                 
                reader.onload = (e) => {
                    this.photoPreview = e.target.result;
                };

                this.form.photo = this.$refs.photo.files[0];
                reader.readAsDataURL(this.$refs.photo.files[0]);
            },

            submit() {
                var data = new FormData();
                data.append('name', this.form.name         || '');
                data.append('category', this.form.category || '');
                data.append('price', this.form.price       || '');
                data.append('discount', this.form.discount || '');
                data.append('image', this.photoPreview     || '');
        
                this.$inertia.post('/goods', data);
            },
        }
    }
</script>

