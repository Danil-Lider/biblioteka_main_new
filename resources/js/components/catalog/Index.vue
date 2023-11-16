<template lang="">
    <div>
        <FiltersComponent/>
        <ItemsComponent/>
        CATALOG PAGE
    </div>
</template>
<script >
import FiltersComponent from './FiltersComponent.vue';
import ItemsComponent from './ItemsComponent.vue';



export default {
    name: 'Index',
    components: {
        FiltersComponent, ItemsComponent
    },
}
</script>
<style lang="">
    
</style>