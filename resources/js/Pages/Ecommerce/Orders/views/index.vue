<template>
    <SummaryReport/>
    <Header @filter="index" :filters="filters" @show-filters="toggle_filters" @refresh="index" />
    <Filters :show="show" :data="data" :filters="filters" @filter="index" @reset="reset" />
    <TableView class="mt-5" :meta="result.meta" :results="result.data" />
    <Pagination v-if="result.meta && result.meta.links" :meta="result" @pagechange="index" />
</template>
<script>
import Pagination from "@/Components/Pagination.vue";
import TableView from "./table.vue";
import Header from "./header.vue";
import Filters from "../filters/filters.vue";
import SummaryReport from './summary-report.vue';
export default {
    components: {
        Header,
        Pagination,
        TableView,
        Filters,
        SummaryReport,
    },
    props: {
        data: {
            type: Object,
            required: true,
        },
    },

    data() {
        return {
            filters: this.initialize(),
            show: false,
            result: {
                data: [],
                links: [],
                meta: [],
            },
        };
    },
    methods: {
        toggle_filters() {
            this.show = !this.show;
        },
        initialize() {
            return {
                search: "",
                perpage: 10,
                package: "",
                date: {
                    start: '',
                    end: ''
                },
                status: "",
                agent: 0,
            };
        },
        index(page = 1) {
            let vm = this;
            axios
                .post(route("ecommerce.orders.results", { page: page }), vm.filters)
                .then((response) => {
                    vm.result = response.data;
                })
                .catch((error) => { });
        },
        reset() {
            this.filters = this.initialize();
            this.index();
        },
    },
    mounted() {
        this.index();
    },
};
</script>
