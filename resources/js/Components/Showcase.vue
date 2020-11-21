<template>
    <div class="bg-white  sm:rounded-lg border-2 border-gray-100 shadow border-opacity-50">
        <!-- showcase title -->
        <div class="md:grid md:grid-cols-4 md:gap-x-0 md-gap-y-1.5 pb-4">
            <div class="md:col-span-7">
                <div class="px-4 pt-4 sm:px-2">
                    <h3 class="text-lg font-medium text-gray-900">
                        <slot name="title"></slot>
                    </h3>
                </div>
            </div> 
            <div class="col-span-7">
                <border/>
            </div>

            <goods>
                <template #image> <img src="/img/10.jpg" alt="alt"> </template>
                <template #description> color red very good made in  iran </template>
                <template #discount> 0 </template>
                <template #price> 100$ </template>
            </goods>

            <goods>
                <template #image> <img src="/img/10.jpg" alt="alt"> </template>
                <template #description> color red very good made in  iran </template>
                <template #discount> 0 </template>
                <template #price> 100$ </template>
            </goods>

            <goods>
                <template #image> <img src="/img/10.jpg" alt="alt"> </template>
                <template #description> color red very good made in  iran </template>
                <template #discount> 0 </template>
                <template #price> 100$ </template>
            </goods>

            <goods>
                <template #image> <img src="/img/10.jpg" alt="alt"> </template>
                <template #description> color red very good made in  iran </template>
                <template #discount> 0 </template>
                <template #price> 100$ </template>
            </goods>
            
        </div>
    </div>

</template> 

<script>

    import Border from '@/Components/Border'
    import Goods from '@/Components/Goods'

    export default {
        components: {
            Border,
            Goods,
        }
    }
</script>

