<template lang="">
    <div>
    

<form>
    <div class='block card p-3 mb-2'>
        <div class='h2'>Поиск:</div>
        <div class="input-group">
        <div class="form-outline">
            <input v-model="searchText" name='search' type="search" id="form1" class="form-control" />
            <label class="form-label" for="form1"></label>
        </div>
        <button  v-on:click="filter" type="" class="btn btn-primary">
            <i class="fas fa-search"></i> Поиск
        </button>
        </div>
    </div>

    <div class='block card p-3 mb-2'>
        <div class='h2'>Жанр:</div>
    
            <div  v-for="(item, index)  in filter_array.genres" class="col-sm-4">
                <div class="form-check form-switch">
                    <input  v-model="genres"  :key="index" :value="item.id"  class="form-check-input" type="checkbox" id="">
                    <label class="form-check-label" for=""> {{ item.name }} </label>
                </div>  
            </div>
    
    </div>

    <div class='block card p-3 mb-2'>
        <div class='h2'>Авторы:</div>
    
            <div  v-for="(item, index) in filter_array.authors"  class="col-sm-4">
                <div class="form-check form-switch">
                    <input  v-model="authors"  :key="index" :value="item.id"  class="form-check-input" type="checkbox" id="">
                    <label class="form-check-label" for=""> {{ item.name }} </label>
                </div>  
            </div>

    </div>

    <button  v-on:click="filter" class='btn btn-primary'>Фильтрация</button>
</form>


    </div>
</template>
<script>
export default {
    name: 'FiltersComponent',
    props: {
        filter_array:{
            type: Object,
            default: function(){
                return []
            }
        }
    },
    data() {
        return {
            searchText: null,
            genres: [],
            authors: [],    
        }
    },
    methods: {
        filter: function(e){

            e.preventDefault()

            let data = {
                params: {
                    search: this.searchText,
                    "author_ids" : this.authors,
                    "genre_ids" : this.genres,
                }
            }

            axios.get('/api/indexJson', data).then((response) => {
                console.log(response)

                this.$emit('filter', response)

            })

            // this.genres.push({ value: '' });
            // console.log(this.genres)
            e.preventDefault()
        }
    }
}

</script>
<style lang="">
    
</style>