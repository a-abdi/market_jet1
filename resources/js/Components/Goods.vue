<template>
        <div class="px-4 py-5 sm:p-6 bg-white">

            <div class="">
                <slot name="image"></slot>
            </div>
            
            <div class="">
                <slot name="description"></slot>
            </div>

            <div class="">
                <slot name="discount"></slot>
            </div>

            <div class="">
                <slot name="price"></slot>
            </div>
            
        </div>
</template> 

<script>

    export default {
        
        components: {
        }
    }
</script>
