<template>
    <div class="grid grid-cols-10 m-4 bg-white rounded-md">
        <inertia-link href="" method="get">

            <div class="col-span-2 my-2 flex item-center cursor-pointer">
                <img src="/img/goods.png" alt="" class="w-7 h-7">
            </div>
            <div class="col-span-8 my-2 cursor-pointer flex item-center">
                <span class="p-2 text-gray-500 text-sm">Goods</span>
            </div>
        </inertia-link>
        <div class="col-span-2 my-2 flex item-center cursor-pointer">
            <img src="/img/category.png" alt="" class="w-7 h-7">
        </div>
        <div class="col-span-8 my-2 flex item-center cursor-pointer">
            <span class="p-2 text-gray-500 text-sm">Categories</span>
        </div>

        <div class="col-span-2 my-2 flex item-center cursor-pointer">
            <img src="/img/cart.png" alt="" class="w-7 h-7">
        </div>
        <div class="col-span-8 my-2 flex item-center cursor-pointer">
            <span class="p-2 text-gray-500 text-sm">Carts</span>
        </div>
    </div>
</template>

