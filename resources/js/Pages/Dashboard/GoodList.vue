<template>
    <app-layout>
       <div class="grid grid-cols-7">
           <div class="col-span-1">
               <dashboard-sidebar>
                   
               </dashboard-sidebar>
           </div>
       </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import DashboardSidebar from '@/Components/DashboardSidebar'

    export default {
        components: {

            AppLayout,
            DashboardSidebar,

        },
    }
</script>
