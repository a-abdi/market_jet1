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
            <div class="col-span-1 mb-4 hover:shadow" v-for="(good) in goods.slice(0, 4)" :key="good.id">
                <goods @go_to_good_info="go_to_good_info(good.id)">
                    <template  #image> <img  :src="good.image_src" :alt="good.name"> </template>
                    <template  #name> {{good.name}} </template>
                    <template  #discount> {{good.discount}} </template>
                    <template  #price> {{good.price}} </template>
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
            goods: Array
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
            go_to_good_info(good_id) {

                this.$emit('go_to_good_info', good_id)

            }
        }
    }
</script>

