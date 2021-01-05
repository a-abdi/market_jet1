<template>
    <!-- <inertia-link href="" method="get" class=" "> -->
        <div>
            <div @click="dropGoods = dropDown(dropGoods)" class="w-full flex items-center py-1 pl-4">
                <div class="inline-flex cursor-pointer">
                    <img src="/img/goods.png" alt="" class="w-5 h-5">
                </div>

                <div class="inline-flex cursor-pointer">
                    <span class="text-gray-500 md:text-sm text-xs pl-2">Goods</span>
                </div>
            </div>
            <div v-show="dropGoods" class="pl-8 text-xs text-blue-400">
                <div class="w-full my-2 cursor-pointer hover:text-red-400">
                   <inertia-link href="/admin/goods/create" method="get" class=" ">
                        Create Goods
                    </inertia-link> 
                </div>
                <div class="w-full my-2 cursor-pointer hover:text-red-400">
                    <inertia-link href="/admin/goods" :data="{ offset: 0, limit: 10 }"  class=" ">
                        List Goods
                    </inertia-link> 
                </div>
            </div>

            <div @click="dropCategory = dropDown(dropCategory)" class="w-full flex items-center py-1 pl-4">
                <div class="inline-flex cursor-pointer">
                    <img src="/img/category.png" alt="" class="w-5 h-5">
                </div>

                <div class="inline-flex cursor-pointer">
                    <span class="text-gray-500 md:text-sm text-xs pl-2">Categories</span>
                </div>
            </div>
            <div v-show="dropCategory" class="pl-8 text-xs text-blue-400">
               <div class="w-full my-2 cursor-pointer hover:text-red-400">
                   <inertia-link href="/admin/categories/create" method="get" class=" ">
                        Create Category
                    </inertia-link> 
                </div>
            </div>

            <div @click="dropUser = dropDown(dropUser)" class="w-full flex items-center py-1 pl-4">
                <div class="inline-flex cursor-pointer">
                    <img src="/img/user.png" alt="" class="w-5 h-5">
                </div>

                <div class="inline-flex cursor-pointer">
                    <span class="text-gray-500 md:text-sm text-xs pl-2">Users</span>
                </div>
            </div>
            <div v-show="dropUser" class="pl-8 text-xs text-blue-400">
               <div class="w-full my-2 cursor-pointer hover:text-red-400">
                   <inertia-link href="/admin/categories/create"  class=" ">
                        Create User
                    </inertia-link> 
                </div>

                <div class="w-full my-2 cursor-pointer hover:text-red-400">
                    <inertia-link href="/admin/users" :data="{ offset: 0, limit: 6 }"  class=" ">
                        List User
                    </inertia-link> 
                </div>
            </div>
        </div>
        
    <!-- </inertia-link> -->
        <!-- <div class="col-span-2 my-2 flex item-center cursor-pointer">
            <img src="/img/category.png" alt="" class="w-5 h-5">
        </div>
        <div class="col-span-8 my-2 flex item-center cursor-pointer">
            <span class="p-2 text-gray-500 text-sm">Categories</span>
        </div>

        <div class="col-span-2 my-2 flex item-center cursor-pointer">
            <img src="/img/cart.png" alt="" class="w-5 h-5">
        </div>
        <div class="col-span-8 my-2 flex item-center cursor-pointer">
            <span class="p-2 text-gray-500 text-sm">Carts</span>
        </div> -->
</template>

<script>
    export default {

       data () { 
           return {

               dropGoods: false,
               dropCategory: false,
               dropUser: false,

           }
       },

       methods : {

           dropDown(status) {
               if(status) {

                   return false

               } else {

                   return true

               }
           },

       } 
    }
</script>
