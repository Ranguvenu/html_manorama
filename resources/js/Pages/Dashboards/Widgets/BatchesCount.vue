<template lang="">
    <div class="p-4 bg-secondary/[0.17] rounded-md flex shadow-md m-2">
        <div class="flex items-center justify-between flex-grow-1 w-full">
            <div class="">
                <div class="font-bold text-md">Batches</div>
                <div class="mt-5 flex justify-between">
                    <div class="pe-3 me-3">
                        <h4 class="text-secondary mb-px font-semibold text-lg">{{ data.total }}</h4>
                        <span class="text-xs">Total</span>
                    </div>
                    <div class="border-e border-secondary/[0.3] me-4"></div>
                    <div class="pe-4 ms-3">
                        <h4 class="text-secondary mb-px font-semibold text-lg">{{ data.active }}</h4>
                        <span class="text-xs">Active</span>
                    </div>

                </div>
            </div>
            <div class="icon p-3 flex-shrink-0 rounded-full flex items-center justify-center w-14 h-14 bg-secondary">
                <img src="/images/ds_widget_icons/Batches.svg" alt="">
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data(){
        return {
            data: {
                active: '',
                total: ''
            }
        }
    },
    methods:{
        index(){
            let vm = this;
            axios.get(route('reports.batches')).then( (response) => {
                vm.data = response.data;
            }).catch(error => {

            });
        }
    },
    mounted(){
        this.index();
    }
}
</script>
