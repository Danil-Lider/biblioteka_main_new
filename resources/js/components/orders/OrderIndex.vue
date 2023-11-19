<template lang="">
    <div>


        <div class="container mt-4  ">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Наименование книги</th>
                    <th scope="col">Забронированный день</th>
                    <th scope="col">Книга выдана</th>
                    <th scope="col">Дата бронирования</th>
                </tr>
                </thead>
                <tbody>
                    
                    

                    <tr v-for="(order, key) in orders">
                        <th scope="row">{{ key }}</th>
                        <td>{{ order.name }}</td>
                        <td>{{ order.reserve_day }}</td>
                        <td>{{ order.book_is_given}}</td>
                        <td>{{ order.created_at}}</td>
                    </tr>

                 
                
                </tbody>
            </table>
        </div>


    </div>
</template>
<script>
export default {
    data(){
        return {
            orders: []
        }
    },
    mounted(){
        axios.get('/api/OrdersJson').then((response) => {
          
            this.orders = response.data

        })
    },
}
</script>
<style lang="">
    
</style>