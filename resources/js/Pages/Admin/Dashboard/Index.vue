<template>
    <admin-layout>
        <div class="w-screen h-screan overflow-auto">
            <div class="sm:w-full w-640 my-4 px-2">
                <div class="float-left w-1/6">
                    <admin-dashboard-sidebar class="mr-2 border border-gray-200 rounded-md">
                        
                    </admin-dashboard-sidebar>
                </div>
                <div class="float-right w-5/6 border border-gray-400 rounded-md">
                    <div class="w-full">heffffllo</div>
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
