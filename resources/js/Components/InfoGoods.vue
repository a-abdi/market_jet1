<template>
    <form @submit.prevent="submit">
        <div class="bg-white shadow rounded-md grid grid-cols-9">
            <div class="col-span-4 flex items-center place-content-center">
                <span v-show="photoPreview" class="block  w-80 h-80 rounded-md"
                    :style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'">
                </span>
            </div>
            <div class="col-span-3">
                <div class="flex mt-4 grid grid-cols-8 justify-center gap-1">
                    <div class="col-start-1 col-span-6 mt-4 mx-2 sm:mx-0 text-gray-700">
                        <label class="text-sm text-gray-600" for="name">Name</label>
                    </div>

                    <div class="col-start-1 mb-4 mx-2 col-span-6 sm:mx-0">
                        <input type="text" name="name" id="name" v-model="form.name" class="w-full form-input rounded-md shadow-sm">
                    </div>

                    <div class="col-start-1 col-span-6 mt-4 mx-2 sm:mx-0 text-gray-700">
                        <label class="text-sm text-gray-600" for="category">Category</label>
                    </div>

                    <div class="col-start-1 col-span-6 mb-4 mx-2 sm:mx-0">
                        <select name="category" id="category" v-model="form.category" class="w-full form-select roumded-md shadow-sm">
                            <option class="text-sm text-gray-600" v-for="(category) in categories" :key="category.name"  :value="category.name"> {{ category.name }} </option>
                        </select>
                    </div>

                    <div class="col-start-1 col-span-6 mb-4 mx-2 hidden">
                        <input name="photo" id="photo" type="file" ref="photo" @change="updatePhotoPreview">
                    </div>

                    <div class="col-start-1 col-span-2 mt-4 rounded-md flex-1 mb-4">
                        <button type="button"  @click.prevent="selectNewPhoto" class="inline-flex items-center p-0.5 h-28 w-28 bg-white-100 border border-gray-200 rounded-md font-semibold text-xs text-gray-800 uppercase tracking-widest hover:bg-gray-200 active:bg-gray-300 focus:outline-none focus:border-gray-400 focus:shadow-outline-gray transition ease-in-out duration-150">
                            <span v-show="! photoPreview" class="px-2">select image</span>
                            <span v-show="photoPreview" class="block  w-28 h-28 rounded-md"
                                :style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'">
                            </span>
                        </button>
                    </div>

                    <div v-if="this.$page.errors" :class="{'hidden': formSuccess, 'bg-red-200': error}" class="col-start-1 col-span-6 mb-8 rounded-md">
                        <p class="text-gray-500 p-1 text-sm text-center">
                            {{ error }}
                        </p>
                    </div>
                    
                    <div :class="{'hidden': !formSuccess}" class="col-start-1 col-span-6 p-1 mb-8 rounded-md bg-green-200">
                        <p class="text-gray-500 text-sm text-center">
                            The product was successfully registered
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-span-2">
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
                        <input type="number" v-model="form.discount" min="0" step="any" name="discount" id="discount" class="w-full form-input rounded-md shadow-sm">
                    </div>
                    
                    <div class="col-start-2 col-span-6 mx-2 sm:mx-0 my-4">
                        <label class="text-xs text-gray-600">Total Price: </label>
                        <span class="text-md text-gray-900"> {{ form.totalPrice }}</span>
                        
                    </div>
                    
                    <div class="col-start-2 col-span-6 mx-2 sm:mx-0 my-4">
                        <label class="text-xs text-gray-600">Percentage Discount:</label>
                        <span class="text-md text-gray-900">{{ form.percentageDiscount }}</span>
                    </div>

                    <div class="col-start-2 col-span-6 mx-2 sm:mx-0 text-gray-700 mt-4 mb-8">
                        <button type="submit"  class="inline-flex  items-center place-content-center p-0.5 h-10 w-full bg-blue-500 border border-gray-200 rounded-md font-semibold text-xs text-gray-900 uppercase tracking-widest hover:bg-blue-700 active:bg-blue-600 focus:outline-none focus:border-blue-800 focus:shadow-outline-gray transition ease-in-out duration-150">
                            Save
                        </button>  
                    </div>
                </div>
            </div>
        </div>
    </form> 
</template>

<script>
    import JetInputError from '@/Jetstream/InputError'
    import Border from '@/Components/Border'

    export default {
        props: {
            // errors: Array,
            categories: Array,
        },

        components: {

            JetInputError,
            Border

        },

        data() { 
            return {
                photoPreview: null,
                formSuccess: false,
                form: this.$inertia.form({
                   name: null,
                   category: '',
                   photo: null,
                   price: 1,
                   discount: 0,
                   totalPrice: null,
                   percentageDiscount: null
                }),
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
                this.formSuccess= false;
                var data = new FormData();
                data.append('name', this.form.name         || '');
                data.append('category', this.form.category || '');
                data.append('price', this.form.price       || '');
                data.append('discount', this.form.discount || '');
                data.append('image', this.form.photo            || '');
                
                this.$inertia.post('/admin/goods', data).then(response  => {
                    if (! this.error) {
                        this.formSuccess = true;
                        this.formReset();
                    }
                });
            },

            formReset() {
                    this.form.name = null;
                    this.form.category = '';
                    this.form.photo = null;
                    this.form.price = 1;
                    this.form.discount = 0;
                    this.photoPreview = null;

            },
        },

        watch: {
            'form.discount'(val) {
                var discount = parseInt(val);
                var price = parseInt(this.form.price);
                if(price < discount) {
                    this.form.discount = this.form.price;
                }
                this.form.totalPrice =  this.form.price - val;
                this.form.percentageDiscount = (Math.round((val / this.form.price) * 1000) / 10) + "%"  
            },

            'form.price'(val) {
                var price = parseInt(val);
                
                var discount = parseInt(this.form.discount);
                if(discount > price) {
                    this.form.discount = this.form.price;
                }
                this.form.totalPrice =  val - this.form.discount;
                this.form.percentageDiscount = (Math.round((this.form.discount / val) * 1000) / 10) + "%"   
           },
        },

        computed: {
            error() {
                if(Object.entries(this.$page.errors).length) {
                    for (const key in this.$page.errors) {
                        return this.$page.errors[key];
                    }
                }
            }
        },

        created() {
            
        },
    }
</script>

