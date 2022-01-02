<template>
    <div class="todolistContainer">
        <h1>Attendance App</h1>
            <add-item-form v-on:reloadlist="getList()" />
           <list-view :items="items" v-on:reloadlist="getList()" />
           
           <!-- <h5>ListView in app</h5>
            <div v-for="(item, index) in items" :key="index">
                <p>{{ item.name }}</p>
            </div> -->
    </div>
    
</template>

<script>
import AddItemForm from './addItemForm.vue';
import ListView from './listView.vue';

export default {
    components: {
        AddItemForm,
        ListView
    },
    data: function(){
        return {
            items: []
        }
    },

    methods: {
        getList(){
            axios.get('api/items')
            .then(response=>{
                this.items = response.data
            })
            .catch(error => {
                console.log(error);
            })
        }
    },
    
    created(){
        this.getList();
    }
}
</script>