<template lang="">
    
    <div class="container">
        <div class='row'>
            <div class="col-md-3 mt-4">
                <filters-component @filter='onFilter'  v-bind:filter_array='filter_array'></filters-component>
            </div>
            
            <items-component v-bind:items='items'></items-component>

        

            <pagination-component @filter='onFilter' v-bind:pagination='pagination'></pagination-component>

        </div>
    </div>

</template>
<script >
import FiltersComponent from './FiltersComponent.vue';
import ItemsComponent from './ItemsComponent.vue';
import PaginationComponent from './PaginationComponent.vue';




export default {
    data(){
        return {
            items: [],
            filter_array:[],
            pagination: [],
        }
    },
    mounted(){
        axios.get('/api/indexJson').then((response) => {
            this.pagination = response.data.items;
            this.items = response.data.items.data;
            this.filter_array = response.data.filter_array
            console.log(response)
        })
    },
    methods: {
        onFilter (response) {

            console.log(response)
            this.pagination = response.data.items;
            this.items = response.data.items.data;
            this.filter_array = response.data.filter_array

            // console.log('child component said login', data)
        }
    },
    name: 'Index',
    components: {
        FiltersComponent, ItemsComponent, PaginationComponent,
    },
}
</script>
<style lang="">
    
</style>