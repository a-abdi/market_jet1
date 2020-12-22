
<template>
    <div class="grid grid-cols-9 gap-2 mt-16 text-center pb-2">
        <div class="col-span-1 ">
            <cart-link :href="'/cart'" method="get" :active="route().current('cart.index')">
                Cart<span v-if="count">({{ count }})</span> 
            </cart-link>
        </div>
            <div class="col-span-1">
            <cart-link :href="'/cart/next'" method="get" :active="route().current('cart.next')">
                Next Carts<span v-if="countNext">({{ countNext }})</span>
            </cart-link>
        </div>
        <div class="col-span-1">
            <cart-link :href="'/cart/previous'" method="get" :active="route().current('cart.previous')">
                History<span v-if="countPrevious">({{ countPrevious }})</span>
            </cart-link>
        </div>
    </div>
</template>

<script>

    import CartLink from '@/Components/CartLink'
    
    export default {
        props: {

            count: Number,
            countNext: Number,
            countPrevious: Number,

        },

        components: {

            CartLink,
            
        }
    }
</script>
