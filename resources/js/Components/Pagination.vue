<template>
     <div class="grid grid-cols-9 py-3">
            <div @click="previous_page()" class="col-span-4 flex justify-end mx-1 cursor-pointer">
                <img class="w-8 h-8" src="/img/previous.png" alt="">
            </div>
            <div @click="next_page()" class="sol-span-5 mx-1">
                <img class="w-8 h-8 cursor-pointer" src="/img/next.png" alt="">
            </div>
        </div>
</template>


<script>
    export default {
        
        props: {

            url: String,
            offset: Number,
            limit: Number,
            
        },

        methods: {

            next_page() {
                this.$inertia.get( this.url, 
                    { offset: this.offset + this.limit, limit: this.limit }, 
                    // { preserveState: true }, 
                    { preserveScroll: true }
                ) 
            },

            previous_page() {
                if( this.offset > 0) {
                    this.$inertia.get( this.url, 
                        { offset: this.offset - this.limit, limit: this.limit },  
                        // { preserveState: true }, 
                        { preserveScroll: true }
                    ) 
                }
            },
        },

    }
</script>