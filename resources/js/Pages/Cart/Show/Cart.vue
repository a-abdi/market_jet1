<template>
    <app-layout>
        <div class="container mx-auto">
            <carts-link  :count ="$page.data.cart.length"/>
            <div class="grid grid-cols-4 mb-16">
                <div class="col-span-3 bg-white border border-gray-200 rounded-lg">
                    <cart-goods-info v-for="good in $page.data.cart" :key="good.goods_code">
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
                        
                        <div class="mx-2 px-2 py-1 inline-flex text-blue-600 text-sm border border-gray-200 rounded-md ">
                            <img src="/img/negative.png" alt="" class="w-5 h-5 mr-2 cursor-pointer">
                            1
                            <img src="/img/pluses.png" alt="" class="w-5 h-5 ml-2 cursor-pointer">
                        </div>

                        <inertia-link :href="'/cart/' + good.id " method="delete" class="mx-2 px-2 py-1 inline-flex text-gray-600 text-sm cursor-pointer">
                            <img src="/img/remove.png" alt="" class="w-5 h-5 mr-2"> Remove
                        </inertia-link>

                        <inertia-link href="/cart/change" method="patch" :data="{ good_id:good.id, current_status: 'cart', next_status: 'next_cart'}" class="mx-2 px-2 py-1 inline-flex text-gray-600 text-sm cursor-pointer">
                            <img src="/img/addList.png" alt="" class="w-5 h-5 mr-2"> Add To Next Cart
                        </inertia-link>
                        
                        <template #price>
                            <span class="text-gray-400 line-through pr-2">  {{ good.price}} </span>
                            {{ good.price - good.discount}}
                        </template>
                    </cart-goods-info>
                </div>
                <div class="col-span-1 ml-4">
                    <div class="grid grid-8 bg-white border rounded-md">
                        <div class="col-span-8 m-2 border-b pb-2">
                            <span class="p-2 text-sm text-gray-500">All Goods Price ({{ $page.data.cart.length }}):</span>
                            <span class="text-gray-600 text-sm">{{ totalPrice }} </span>
                        </div>

                        <div class="col-span-8 m-2 border-b pb-2">
                            <span class="p-2 text-sm text-gray-500">All Goods Discount:</span>
                            <span class="text-red-600 text-sm">{{ totalDiscount }} </span> <span v-if="totalPrice" class="text-xs text-red-600">({{ totalPercentage }})</span>
                        </div>

                        <div class="col-span-8 m-2 pb-2">
                            <span class="p-2 text-sm text-gray-500">Total Price:</span>
                            <span class="">{{ totalPrice - totalDiscount }} </span>
                        </div>

                         <div class="col-span-8 m-2 pb-2">
                            <inertia-link href="/cart/order" method="patch" :data="{ current_status: 'cart', next_status: 'previous_cart'}">
                                <button class="w-full rounded-lg bg-blue-400 p-2 border border-gray-200 font-semibold text-gray-900 tracking-widest hover:bg-blue-500 active:bg-blue-600 focus:outline-none focus:border-blue-800 focus:shadow-outline-gray transition ease-in-out duration-150">Purchase Cart</button>
                            </inertia-link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>

    import AppLayout from '@/Layouts/AppLayout'
    import CartGoodsInfo from '@/Components/CartGoodsInfo'
    import Border from '@/Components/Border'
    import CartsLink from '@/Components/CartsLink'

    export default {

        components: {

            AppLayout,
            CartGoodsInfo,
            Border,
            CartsLink,

        },

        computed: {
            totalPrice() {

                var totalPrice = 0;

                for (let index = 0; index < this.$page.data.cart.length; index++) {
                    totalPrice += parseInt(this.$page.data.cart[index].price);  
                }
                return totalPrice;
            },

            totalDiscount() {

                var totalDiscount = 0;

                for (let index = 0; index < this.$page.data.cart.length; index++) {
                    totalDiscount += parseInt(this.$page.data.cart[index].discount);  
                }
                return totalDiscount;
            },

            totalPercentage() {
                
                    return (Math.round((this.totalDiscount / this.totalPrice) * 1000) / 10) + "%";
            
            },
        },

        methods: {
            
        },  
    }
</script>