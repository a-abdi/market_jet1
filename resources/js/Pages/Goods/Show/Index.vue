<template>
    <app-layout>
        <div class="container mx-auto">
        <div class="grid grid-cols-12 auto-cols-auto bg-white border border-gray-200 mt-4 ">
            <div class="col-span-4 border-r-2 border-gray-100 my-12">
                <div class="grid grid-cols-8">
                    <div class="col-span-1">

                    </div>

                    <div class="col-span-7 ">
                        <div class="m-auto flex item-center place-content-center">
                            <img class="w-auto h-auto" :src="good.image_src" alt="">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-span-5 px-4 md:text-base text-sm">
                <div class="grid grid-cols-10">
                    <div class="col-span-full m-4 pb-4 border-b border-gray-200">
                        {{ good.name }}
                    </div>
                </div>
            </div>

            <div class="col-span-3 mt-10 md:text-sm text-xs">
                <div class="grid grid-cols-8 border m-4 rounded-lg">
                    <div class="col-span-full p-2 mx-2 border-b border-gray-200">
                       <span class="text-gray-600">Price:</span>  <span class="text-gray-600">{{ good.price }}</span>
                    </div>

                     <div class="col-span-full p-2 mx-2 border-b border-gray-200">
                        <span class="text-gray-600">Discount:</span>  <span class="text-gray-600">{{ good.discount }}</span>
                    </div>

                    <div class="col-span-full p-2 mx-2 border-b border-gray-200" v-if="good.discount != 0">
                        <span class="text-gray-600">Total Price:</span>  
                        <span class="text-gray-400 line-through">{{ good.price }}</span>
                        <span class="float-right inline-flex text-sm md:text-base">{{ percentage }}</span>
                        <span class="py-2 clear-right flex flex-row text-sm md:text-base text-gray-700">{{ totalPrice }}</span>
                    </div>

                    <div class="col-span-8 flex justify-center my-4">
                        <button class="py-2 bg-gray-100 border rounded-md text-center w-11/12 hover:bg-gray-200 active:bg-gray-300 focus:outline-none focus:border-gray-300 transition ease-in-out duration-150">Add to List</button>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </app-layout>
</template>

<script>

import AppLayout from '@/Layouts/AppLayout'

export default {

    props: {
        good: Object
    },

    components: {

        AppLayout
    
    },

    data () {
        return {

            totalPrice: null,
            percentage: null,

        }
    },
    methods: {
        pv(){

            this.totalPrice = this.good.price
        }
    }, 

    created() {

            var price = parseInt(this.good.price)
            var discount = parseInt(this.good.discount)
            this.totalPrice = price - discount
            this.percentage = (Math.round((discount / price) * 1000) / 10) + "%"
    },
}
</script>