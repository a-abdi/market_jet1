<template>
    <app-layout>
        <div class="py-12 mx-4">
            <div v-for="goods in all_goods" :key="goods.category_name">
                <Showcase @go_to_good_info="go_to_good_info($event)" v-if="goods.category[0]" :category = goods.category>
                    <template  #title> {{goods.category_name}} </template>
                </Showcase>
            </div>
        </div>
    </app-layout>
</template>

<script>

    import AppLayout from '@/Layouts/AppLayout'
    import Showcase from '@/Components/Showcase'

    export default {

        props: {
            all_goods: Array
        },

        components: {

            AppLayout,
            Showcase,

        },

        data() {
            return {
                
            }
        },

        methods: {
            
            go_to_good_info(good_id) {
                this.$inertia.get('/goods/'+ good_id )
            }
        }
    }
</script>
