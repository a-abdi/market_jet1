<template>
    <div class="grid grid-cols-10 mt-8 border-b mx-2">
        <div class="col-span-2 cursor-pointer">
            <slot name="image"> </slot>
        </div>

        <div class="col-span-8 py-2 text-sm text-gray-600">
            <div class="inline-flex cursor-pointer">
                <slot name="name"> </slot>
            </div>
        </div>

        <div class="col-start-9 col-span-2 py-2">
           <span class="text-gray-600 text-sm">Discount: </span> <span class="text-red-500"> <slot name="discount"> </slot></span>
        </div>

        <div class="col-start-3 col-span-6 py-2 flex item-center">
            <slot> </slot>
        </div>
        
        <div class="col-start-9 col-span-2 py-2">
           <span class="text-gray-600 text-sm">Price: </span> <span class="text-gray-600"> <slot name="price"> </slot></span>
        </div>
    </div>
</template>

<script>
export default {
    
    methods: {  

    }

}
</script>