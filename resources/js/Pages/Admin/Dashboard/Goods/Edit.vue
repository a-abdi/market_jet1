<template>
    <index>
       <info-goods :categories="categories" :good="good" :error="error">
       
       </info-goods>
    </index>   
</template>


<script>
    import Index from '../Index'
    import InfoGoods from '@/Components/InfoGoods'

    export default {
        props: {
            good: Array,
            error: Object,
            categories: Array

        },

        components: {

            Index,
            InfoGoods,

        },

        data() { 
            return {
              
            }
        },

        methods: {

        },

        watch: {

        },
    }
</script>