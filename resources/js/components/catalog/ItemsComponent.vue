<template lang="">
    <div class='col-md-9'>
        <div class="row"> 
           
          
            <modal-reserve ref="ModalReserve"></modal-reserve>        
               
            
        
            <div v-for="item in items" class="col-sm-4">
             

                <div class="card mt-4" style="width: 18rem;">
                <img src="images/main.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ item.name }}</h5>
                    <p class="card-text">

                        АВТОР:    {{ item.author_name }} <br>

                        ЖАНРЫ: 
                        <div v-for="genre in item.genres">
                            {{ genre }},
                        </div>  
                    </p>

                    <button  v-on:click="getModalReserve(item)" type="button" class="btn btn-primary item"   v-bind:data-id="item.id" >
                        Забронировать
                    </button>
                </div>
                </div>
            </div>
    
        </div>
    </div>
</template>
<script>
import ModalReserve from '../modals/ModalReserve.vue'

export default {
    name: 'ItemComponent',
    components: {
        ModalReserve,
    },
    data() {
        return {    
            items: [],
            is_refresh: false
        }
    },
    mounted(){

        axios.get('/api/indexJson').then((response) => {
            console.log(response.data)
            this.items = response.data.items;
        })
        // this.update();

    },
    methods: {
        update: function(){
            console.log(items)
        },
        getModalReserve: function(item){
            this.$refs.ModalReserve.showModal(item);
            // console.log(this.items) 
            // console.log(  this.$refs.ModalReserve)
            // console.log('вызов метода из ITEMS ')
        }
    }
}

</script>
<style lang="">
    
</style>