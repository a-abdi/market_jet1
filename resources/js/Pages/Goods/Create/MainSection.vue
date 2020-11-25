
<template>
    <div>
        <div class="flex mt-4 grid grid-cols-8 justify-center gap-1">
            <div class="col-start-1 col-span-6 mt-4 mx-2 sm:mx-0 text-gray-700">
                <label class="text-sm text-gray-600" for="goods_name">Name</label>
            </div>

            <div class="col-start-1 col-span-6 mb-4 mx-2 sm:mx-0">
                <input type="text" name="goods_name" class="w-full form-input rounded-md shadow-sm">
            </div>

            <div class="col-start-1 col-span-6 mt-4 mx-2 sm:mx-0 text-gray-700">
                <label class="text-sm text-gray-600" for="category">Category</label>
            </div>

            <div class="col-start-1 col-span-6 mb-4 mx-2 sm:mx-0">
                <select name="category" id="category" class="w-full form-select roumded-md shadow-sm" required>
                    <option class="text-sm text-gray-600" value="food">food</option>
                    <option class="text-sm text-gray-600" value="home">home</option>
                    <option class="text-sm text-gray-600" value="book">book</option>
                </select>
            </div>

            <div class="col-start-1 col-span-6 mb-4 mx-2 hidden">
                <input type="file" ref="photo" @change="updatePhotoPreview">
            </div>

            <div class="col-start-1 col-span-2 mt-4 rounded-md flex-1">
                <button type="button"  @click.prevent="selectNewPhoto" class="inline-flex items-center p-0.5 h-28 w-28 bg-white-100 border border-gray-200 rounded-md font-semibold text-xs text-gray-800 uppercase tracking-widest hover:bg-gray-200 active:bg-gray-300 focus:outline-none focus:border-gray-400 focus:shadow-outline-gray transition ease-in-out duration-150">
                    <span v-show="! photoPreview" class="px-2">select image</span>
                    <span v-show="photoPreview" class="block  w-28 h-28 rounded-md"
                        :style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </button>
            </div>
        </div> 
    


    <!-- <form @submit.prevent="submit">
        <label for="first_name">First name:</label>
        <input id="first_name" v-model="form.first_name" />
        <div v-if="errors.first_name">{{ errors.first_name[0] }}</div>
        <label for="last_name">Last name:</label>
        <input id="last_name" v-model="form.last_name" />
        <div v-if="errors.last_name">{{ errors.last_name[0] }}</div>
        <label for="email">Email:</label>
        <input id="email" v-model="form.email" />
        <div v-if="errors.email">{{ errors.email[0] }}</div>
        <button type="submit">Submit</button>
  </form> -->

    </div>
</template>



<script>

    export default {
        
        components: {

        },

        data() { 
            return {
                images: [],
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

                  reader.readAsDataURL(this.$refs.photo.files[0]);

            },

        }
        
    }
</script>