<template>
    <admin-layout>
        <div class="w-screen h-screan overflow-auto">
            <div class="lg:w-full w-1024 my-4 px-2">
                <div class="float-left lg:w-2/12 w-3/12">
                    <admin-dashboard-sidebar class="mr-2 border border-gray-200 rounded-md">
                        
                    </admin-dashboard-sidebar>
                </div>
                <div class="float-right lg:w-10/12 w-9/12">
                    <slot> </slot>
                </div>
            </div>
        </div>
    </admin-layout>
</template>

<script>
    import AdminLayout from '@/Layouts/AdminLayout'
    import AdminDashboardSidebar from '@/Components/AdminDashboardSidebar'

    export default {
        components: {

            AdminLayout,
            AdminDashboardSidebar,

        },
    }
</script>
