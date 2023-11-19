<template lang="">
    <div class='container'>
        <div v-html=data></div>
    </div>
</template>
<script>
export default {
    data(){
        return {
            data: null
        }
    },
    mounted(){
        axios.get('/login').then((response) => {
            
            this.data = response.data
            console.log(response)
        })
    },
}
</script>
<style lang="">
    
</style>