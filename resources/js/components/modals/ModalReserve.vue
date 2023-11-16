<template lang="">
    
<div class="modal-mask"  v-if="showModalMain" >
    <div class="modal-wrapper">
    <div class="modal-container">

        <input id="item_id" v-bind:value="item.id" type="hidden" name='item_id'>

        <div class="modal-header h2">
            {{ modal_name }}
        </div>

        <div class="modal-body">
            <div class='modal-content'>
                <div class="flex">Наименование книги: <div class="name">{{ item.name }}</div></div>
                <div class="mt-2">
                    <label for="time_to_bron">Дата бронирования:</label>
                    <input type="date" id="time_to_bron"  v-model="reserve_day" name="reserve_day"  v-bind:min="today_date" max="" />
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

<div class="modal-mask modal-message"  v-if="showModalMessage" >
    <div class="modal-wrapper">
    <div class="modal-container">

        <div class="modal-header h2">
            Уведомление
        </div>

        <div class="modal-body">
            <div class='modal-content'>
                {{ ModalMessageText }}
            </div>
        </div>

        <div class="modal-footer d-flex justify-content-between">
            <button class="modal-default-button btn btn-success" @click="closeModal">
                Закрыть
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
            showModalMessage: false,
            ModalMessageText: null,
            today_date: null,
            reserve_day: null,
        }
    },
    mounted() {
        this.today_date = this.dates()
        this.reserve_day = this.dates()
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
            this.showModalMessage = false;
        },
        Reserve: function() {
            console.log('resereve')
            axios.post('/catalog/create', {
                'X-CSRF-TOKEN': myToken.csrfToken,
                item_id: this.item.id,
                reserve_day: this.reserve_day
            }).then((response) => {

                if(response.data.error){
                    this.modalMessage(response.data.error)
                }else{
                    this.modalMessage(response.data.success)
                }



                // console.log(response.data)
                // this.items = response.data.items;
            })
        },
        modalMessage: function(error){
            this.ModalMessageText = error
            this.showModalMain = false
            this.showModalMessage = true
        },
    }
}
</script>

<style lang="">

</style>