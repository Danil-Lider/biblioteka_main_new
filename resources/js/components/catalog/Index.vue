<template lang="">
    
    <div class="container">
        <div class='row'>
            <div class="col-md-3 mt-4">
                <filters-component @filter='onFilter'  v-bind:filter_array='filter_array'></filters-component>
            </div>
            
            <items-component v-bind:items='items'></items-component>
        </div>
    </div>

</template>
<script >
import FiltersComponent from './FiltersComponent.vue';
import ItemsComponent from './ItemsComponent.vue';



export default {
    data(){
        return {
            items: [],
            filter_array:[],
        }
    },
    mounted(){
        axios.get('/api/indexJson').then((response) => {
            this.items = response.data.items;
            this.filter_array = response.data.filter_array
        })
    },
    methods: {
        onFilter (response) {

            this.items = response.data.items;
            this.filter_array = response.data.filter_array

            // console.log('child component said login', data)
        }
    },
    name: 'Index',
    components: {
        FiltersComponent, ItemsComponent
    },
}
</script>
<style lang="">
    
</style>