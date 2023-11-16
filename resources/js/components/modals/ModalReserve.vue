<template lang="">
    
<div class="modal-mask"  v-if="showModalMain" >
    <div class="modal-wrapper">
    <div class="modal-container">

        <div class="modal-header h2">
            {{ modal_name }}
        </div>

        <div class="modal-body">
            <div class='modal-content'>
                <div class="flex">Наименование книги: <div class="name">{{ item.name }}</div></div>
                <div class="mt-2">
                    <label for="time_to_bron">Дата бронирования:</label>
                    <input type="date" id="time_to_bron" name="reserve_day" value="" v-bind:min="today_date" max="" />
                    <p>Бронирование на 1 день</p>
                </div>
            </div>
        </div>

        <div class="modal-footer d-flex justify-content-between">
            <button class="modal-default-button btn btn-success" @click="closeModal">
                Закрыть
            </button>
            <button class="modal-default-button btn btn-success" @click="Reserve">
                Забронировать
            </button>
        </div>
    </div>
    </div>
</div>


</template>



<script>

export default {
    name: 'ModalReserve',
    data() {
        return {    
            modal_name: 'Бронирование',
            item: {},  
            showModalMain: false,
            today_date: null,
        }
    },
    mounted() {
        this.today_date = this.dates()
    },
    methods: {
        dates: function(){
            let Data = new Date();
            let Year = Data.getFullYear();
            let Month = Data.getMonth();
            let Day = Data.getDate();
            let today_date =  Year + '-'+ 11 + '-'+ Day;
            return today_date;
        },
        showModal: function(item){  
            this.item = item;
            this.showModalMain = true;
            console.log(this.item)
        },
        closeModal: function(){
            this.showModalMain = false;
        },
        Reserve: function() {
            console.log('resereve')
        }
    }
}
</script>

<style lang="">

</style>