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

        <div class="col-start-9 col-span-2 py-2 text-red-500">
            <slot name="discount"> </slot>
        </div>

        <div class="col-start-9 col-span-2 py-2">
            <slot name="price"> </slot>
        </div>
    </div>
</template>

<script>
export default {
    
    methods: {  

    }

}
</script>