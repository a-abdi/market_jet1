<template>
    <app-layout>
        <div class="container mx-auto">
            <div class="grid grid-cols-4 my-16 ">
                <div class="col-span-3 bg-white border border-gray-200 rounded-lg">
                    <cart-goods-info v-for="(good, i) in $page.data.cart" :key="$page.data.cart[i].goods_code">
                        <template #image>
                            <inertia-link :href="'/goods/' +$page.data.cart[i].id" method="get">
                                <img :src="$page.data.cart[i].image_src" :alt="$page.data.cart[i].name">
                            </inertia-link>
                        </template>
                        
                        <template #name>
                            <inertia-link :href="'/goods/' +$page.data.cart[i].id" method="get">
                                {{ $page.data.cart[i].name }}
                            </inertia-link>
                        </template> 

                        <template #discount>
                             {{ $page.data.cart[i].discount }}
                        </template> 

                        <template #price>
                            <span class="text-gray-400 line-through pr-2">  {{ $page.data.cart[i].price}} </span>
                            {{ $page.data.cart[i].price - $page.data.cart[i].discount}}
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
                            <span class="text-red-600 text-sm">{{ totalDiscount }} </span> <span class="text-xs text-red-600">({{ totalPercentage }})</span>
                        </div>

                        <div class="col-span-8 m-2 pb-2">
                            <span class="p-2 text-sm text-gray-500">Total Price:</span>
                            <span class="">{{ totalPrice - totalDiscount }} </span>
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

    export default {

        components: {

            AppLayout,
            CartGoodsInfo,
            Border,

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