<template>
    <app-layout>
        <div class="py-12 mx-4">
            <div v-for="(category, i) in categories" :key="category.goods[i].goods_code">
                <Showcase @go_to_good_info="go_to_good_info($event)" v-if="category.goods[0]" :goods = category.goods>
                    <template  #title> {{category.name}} </template>
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
            categories: Array
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
