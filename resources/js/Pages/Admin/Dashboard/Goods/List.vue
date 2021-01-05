<template>
    <index>
        <div class="mr-2">
            <form @submit.prevent="submit">
                <table class="table-fixed w-full border-collapse border border-gray-400">
                    <thead>
                        <tr class="bg-gray-400">
                            <th class="w-1/12 text-sm">Id</th>
                            <th class="w-2/12 text-sm">Name</th>
                            <th class="w-1/12 text-sm">Goods Code</th>
                            <th class="w-2/12 text-sm">Category</th>
                            <th class="w-1/12 text-sm">Price</th>
                            <th class="w-1/12 text-sm">Discount</th>
                            <th class="w-2/12 text-sm">Image</th>
                            <th class="w-1/12 text-sm"></th>
                            <th class="w-1/12 text-sm"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class=" border border-gray-400" v-for="(good, i) in goods" :key="good.id" :class=" bg_color + ( parseInt(i % 2 + 1)) * 100">
                            <td class="text-center text-xs text-gray-600">
                                {{ good.id }}
                            </td>

                            <td class="text-center text-xs text-gray-600 cursor-pointer">
                                <inertia-link :href="'/admin/goods/' + good.id" :class="{'hidden': updateGood.row[i]}"> 
                                    {{ good.name }} 
                                </inertia-link>
                                <input type="text" :class="{ 'hidden': !updateGood.row[i] }" v-model="form.name" @change="updateEdit('name', form.name, good.id)" class="w-full mx-1 px-2 py-0.5 focus:outline-none focus:ring border focus:border-blue-300 rounded">
                            </td>

                            <td class="text-center text-xs text-gray-600">
                                {{ good.goods_code }}
                            </td>

                            <td class="text-center text-xs text-gray-600">
                                <span :class="{'hidden': updateGood.row[i]}"> {{ good.category.name }} </span>
                                <select :class="{'hidden': !updateGood.row[i]}" name="category" id="category" v-model="form.category" @change="updateEdit('category', form.category, good.id)" class="w-full mx-1 px-2 py-0.5 focus:outline-none focus:ring border focus:border-blue-300 rounded bg-white shadow-sm" required>
                                    <option class="text-sm text-gray-600 roumded-md" v-for="(category) in categories" :key="category.name"  :value="category.name"> {{ category.name }} </option>
                                </select>
                            </td>

                            <td class="text-center text-xs text-gray-600">
                                <span :class="{'hidden': updateGood.row[i]}">{{ good.price }}</span>
                                <input :class="{ 'hidden': !updateGood.row[i] }" type="number" step="any" min="1" v-model="form.price" @change="updateEdit('price', form.price, good.id)" class="w-full mx-1 px-2 py-0.5 focus:outline-none focus:ring border focus:border-blue-300 rounded text-center">
                            </td>

                            <td class="text-center text-xs text-gray-600">
                                <span :class="{'hidden': updateGood.row[i]}">{{ good.discount }}</span>
                                <input :class="{ 'hidden': !updateGood.row[i] }" type="number" step="any" min="0" v-model="form.discount" @change="updateEdit('discount', form.discount, good.id)" class="w-full mx-1 px-2 py-0.5 focus:outline-none focus:ring border focus:border-blue-300 rounded text-center ml-2">
                            </td>

                            <td class="flex items-center place-content-center py-1">
                                <inertia-link :href="'/admin/goods/' + good.id" :class="{'hidden': updateGood.row[i]}">
                                    <img :src="good.image_src" :alt=" good.name" class="w-10 h-10 cursor-pointer">
                                </inertia-link>
                                    
                                <input :name="'photo'+ good.id" :id="'photo'+ good.id" type="file" :ref="'photo'+ good.id" @change="updatePhotoPreview('photo'+ good.id, good.id)" class="hidden">

                                <button :class="{'hidden': !updateGood.row[i]}" type="button"  @click.prevent="selectNewPhoto('photo'+ good.id)" class="inline-flex items-center h-10 w-10 bg-white-100 border border-gray-200 rounded-md font-semibold text-xs text-gray-800 tracking-widest hover:bg-gray-200 active:bg-gray-300 focus:outline-none focus:border-gray-400 focus:shadow-outline-gray transition ease-in-out duration-150">
                                    <span class="block  w-10 h-10"
                                        :style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'">
                                    </span>
                                </button>
                            </td>

                            <td class="">
                                <div :class="{'hidden': updateGood.row[i]}">
                                    <img @click=" updateGood.row[i] = update(good)" src="/img/edit.png" alt=" Edit good" class="w-6 h-6 cursor-pointer">
                                </div>

                                <button @click=" updateGood.row[i] = false" :class="{'hidden': !updateGood.row[i]}" type="submit"  class="flex  items-center place-content-center">
                                    <img  src="/img/Update.png" alt=" Update good" class="w-6 h-6 cursor-pointer">
                                </button>  
                            </td>

                            <td class="">
                                <inertia-link :href="'/admin/goods/' + good.id " method="delete">
                                    <img src="/img/remove.png" alt=" Delete good" class="w-6 h-6 cursor-pointer">
                                </inertia-link>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
        <div class="grid grid-cols-9 py-3">
            <div @click="previous_page()" class="col-span-4 flex justify-end mx-1 cursor-pointer">
                <img class="w-5 h-5" src="/img/previous.png" alt="">
            </div>
            <div @click="next_page()" class="sol-span-5 mx-1">
                <img class="w-5 h-5 cursor-pointer" src="/img/next.png" alt="">
            </div>
        </div>
    </index>
</template>

<script>
    import Index from '../Index'

    export default {
        props: {
            goods: Array,
            categories: Array,
        },

        components: {

            Index,

        },

        data() { 
            return {
                
                updateGood: {
                    row: {
                        0: false,
                        1: false,
                        2: false,
                        3: false,
                        4: false,
                        5: false,
                        6: false,
                        7: false,
                        8: false,
                        9: false,
                    },
                },
                updating: false,
                offset: Number,
                photoPreview: null,
                data: new FormData(),
                goodID: null,
                form: {
                   name: null,
                   category: '',
                   photo: null,
                   price: null,
                   discount: null,
                   totalPrice: null,
                   percentageDiscount: null
                }

            }
        },

        methods: {

            selectNewPhoto(photo) {

                this.$refs[photo][0].click();

            },

            updatePhotoPreview(image, goodID) {
                const reader = new FileReader();
                    
                reader.onload = (e) => {
                    this.photoPreview = e.target.result;
                };
                this.form.photo = this.$refs[image][0].files[0];
                this.updateEdit('image', this.form.photo, goodID)
                reader.readAsDataURL(this.$refs[image][0].files[0]);
            },

            get_offset() {

                var url_string = window.location.href;
                var url = new URL(url_string);
                return  url.searchParams.get("offset");

            },

            next_page() {
                this.offset = parseInt( this.get_offset() ) + 10
                this.$inertia.get('/admin/goods', 
                    { offset: this.offset, limit: 10 }, 
                    // { preserveState: true }, 
                    { preserveScroll: true }
                ) 
            },

            previous_page() {
                if(parseInt( this.get_offset()) > 0) {
                    this.offset = parseInt( this.get_offset() ) - 10
                    this.$inertia.get('/admin/goods', 
                        { offset: this.offset, limit: 10 }, 
                        // { preserveState: true }, 
                        { preserveScroll: true }
                    ) 
                }
            },


            submit() {

                this.updating = false;
                this.updateEdit('limit', 10, this.goodID);
                this.updateEdit('offset', this.get_offset(), this.goodID);
                this.$inertia.post('/admin/goods/'+ this.goodID, this.data);

            },

            update(good) {
                
                if(this.updating) {
                    return false
                }

                this.form.name = good.name;
                this.form.price = good.price;
                this.form.discount = good.discount;
                this.form.category = good.category.name;
                this.photoPreview = good.image_src;

                this.updating = true;
                return true;
            },

            updateEdit(nameValueChange, value, goodID) {

                this.data.append(nameValueChange, value);
                this.goodID = goodID;
            }

        },

        computed: {
            bg_color() {
                switch ( parseInt( this.get_offset()) % 7 )  {
                    case 0:
                        return "bg-blue-";
                    case 1:
                        return "bg-red-";
                    case 2:
                       return "bg-indigo-";
                    case 3:
                        return "bg-green-";
                    case 4:
                       return "bg-pink-";
                    case 5:
                       return "bg-gray-";
                    case 6:
                        return "bg-purple-";
                }
                return "bg-red-"
            }
    },

        watch: {

        },
    }
</script>