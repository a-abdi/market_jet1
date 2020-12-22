<template>
    <app-layout>
        <div class="container mx-auto">
            <carts-link :countNext ="nextCart.length"/>
            <div class="grid grid-cols-4 mb-16">
                <div class="col-span-3 bg-white border border-gray-200 rounded-lg">
                    <cart-goods-info v-for="good in nextCart" :key="good.goods_code">
                        <template #image>
                            <inertia-link :href="'/goods/' +good.id" method="get">
                                <img :src="good.image_src" :alt="good.name">
                            </inertia-link>
                        </template>
                        
                        <template #name>
                            <inertia-link :href="'/goods/' +good.id" method="get">
                                {{ good.name }}
                            </inertia-link>
                        </template> 

                        <template #discount>
                             {{ good.discount }}
                        </template>

                        <inertia-link href="/cart/change" method="patch" :data="{ good_id:good.id, current_status: 'next_cart', next_status: 'cart'}" class="mx-2 px-2 py-1 inline-flex text-red-600 text-sm border border-gray-200 rounded-md cursor-pointer">
                            <img src="/img/1.png" alt="" class="w-5 h-5 mr-2"> Add To Cart
                        </inertia-link>

                        <div class="mx-2 px-2 py-1 inline-flex text-gray-600 text-sm cursor-pointer">
                            <img src="/img/remove.png" alt="" class="w-5 h-5 mr-2"> Remove The Goods
                        </div>
                        
                        <template #price>
                            <span class="text-gray-400 line-through pr-2">  {{ good.price}} </span>
                            {{ good.price - good.discount}}
                        </template>
                    </cart-goods-info>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>

    import AppLayout from '@/Layouts/AppLayout'
    import CartGoodsInfo from '@/Components/CartGoodsInfo'
    import CartsLink from '@/Components/CartsLink'

    export default {

        props: {

            nextCart: Array,

        },

        components: {

            AppLayout,
            CartGoodsInfo,
            CartsLink,

        },

        computed: {
            
        },

        methods: {
            
        },  
    }
</script>