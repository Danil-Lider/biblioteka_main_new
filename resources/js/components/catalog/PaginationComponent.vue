
<template>
    <div class="row mt-5">

        <ul class="pagination">
            <li class="page-item"  v-for="(link, index) in pagination.links" :key="link.label">
                
                <template v-if="activeIndex === index">
                    <a
                    class="page-link active" @click.prevent="getItems(link.label, index)"
                    v-html="link.label"
                    href=""></a>

                </template>

                <template v-else="">
                    <a
                    class="page-link" @click.prevent="getItems(link.label, index)"
                    v-html="link.label"
                    href=""></a>
                    
                </template>
               
            </li>
        </ul>
        
    </div>
</template>




<script>
import { convertToBlock } from '@vue/compiler-core'



export default {
    props: {
        pagination:{
            type: Object,
            default: function(){
                return []
            }
        }
    },
    data(){
        return {
            activeIndex: -1,
        }
    },
    methods: {
        AddClass(event){

            // event.preventDefault();
            // document.querySelectorAll('page-link').classList.remove('active')
            // event.target.classList.add('active')

            // return false
        },
        getItems(page = 1, index){

            if (this.activeIndex === index) {
                this.activeIndex = -1;
            } else {
                this.activeIndex = index;
            }

            // console.log(page.target)

            // page.target.classList.add('active')

            // console.log(page)

            let data = {
                params: {
                    page: page,
                }
            }

         
            axios.get('/api/indexJson', data).then((response) => {
                console.log(response)

                this.$emit('filter', response)

            })

            // return false

            // axios.get('/api/indexJson', data).then((response) => {
            //     this.pagination = response.data.items;
            //     this.items = response.data.items.data;
            //     this.filter_array = response.data.filter_array
            //     console.log(response)
            // })
        }
    }
}
</script>
<style lang="">
    
</style>