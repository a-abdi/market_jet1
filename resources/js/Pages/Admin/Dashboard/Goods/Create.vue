<template>
    <index>
       <info-goods :categories="categories" :error="error">
       
       </info-goods>
    </index>   
</template>

<script>
    import Index from '../Index'
    import InfoGoods from '@/Components/InfoGoods'

    export default {
        props: {
            error: Object,
            categories: Array,
        },

        components: {

            Index,
            InfoGoods,

        },

        
    }
</script>

