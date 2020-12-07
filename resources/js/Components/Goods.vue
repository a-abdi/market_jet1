<template>
        <div class="p-4 mx-2 grid grid grid-1">

            <div @click="go_to_good_info()" class="col-span-1 mb-4 flex items-center  place-content-center">
                <div class=" w-40 h-40 cursor-pointer">
                    <slot name="image"></slot>
                </div>
            </div>
            
            <div @click="go_to_good_info" class="col-span-1 my-1.5 text-sm text-gray-600 text-center cursor-pointer">
                <slot name="name"></slot>
            </div>

            <div class="col-span-1 my-1.5 text-gray-700 text-center">
                <slot name="discount"></slot>
            </div>

            <div class="col-span-1 my-1.5 text-gray-700 text-center">
                <slot name="price"></slot>
            </div>
            
        </div>
</template> 

<script>

    export default {
        
        components: {

        },
        
        methods: {
            go_to_good_info() {
                // alert('dd')
                this.$emit('go_to_good_info', 1)
            }
        }

    }
</script>
