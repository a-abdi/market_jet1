<template>
    <app-layout>
        <div class="py-12">
            <div class="mx-4 sm:px-0 lg:px-0">
               <Showcase>
                   <template #title> Derss </template>
               </Showcase>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import Showcase from '@/Components/Showcase'

    export default {
        components: {
            AppLayout,
            Showcase,
        },
    }
</script>
