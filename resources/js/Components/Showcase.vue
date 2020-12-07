<template>
    <div class="bg-white my-4 sm:rounded-lg shadow gap-0">
        <div class="grid grid-cols-4">
            <div class="col-span-4">
                <div class="px-4 pt-4 sm:px-2">
                    <h3 class="text-lg font-medium text-gray-900">
                        <slot name="title"></slot>
                    </h3>
                </div>
            </div> 
            <div class="col-span-4">
                <border/>
            </div>
            <div class="col-span-1 mb-4 hover:shadow" v-for="(goods, i) in category.slice(0, 4)" :key="category[i].id">
                <goods @go_to_good_info="go_to_good_info(category[i].id)">
                    <template  #image> <img  :src="category[i].image_src" :alt="category[i].name"> </template>
                    <template  #name> {{category[i].name}} </template>
                    <template  #discount> {{category[i].discount}} </template>
                    <template  #price> {{category[i].price}} </template>
                </goods>
            </div>
        </div>
    </div>

</template> 

<script>

    import Border from '@/Components/Border'
    import Goods from '@/Components/Goods'

    export default { 
        props: {
            category: Array
        },

        components: {

            Border,
            Goods,

        },

        data () {
            return {
               
            }
        },

        methods: {
            go_to_good_info(good_id){
                // alert(good_id);
                this.$emit('go_to_good_info', good_id)
            }
        }
    }
</script>

