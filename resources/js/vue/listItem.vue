<template>
    <div class="item">
        <input type="checkbox" @change="updateCheck()" v-model="item.completed"/>
        <span :class="[item.completed ? 'completed' : '', 'itemText']">{{ item.name }}</span>
        <button class="btn btn-primary" @click="deleteTodo()">Delete</button>
    </div>
</template>

<script>
export default {
    props: ['item'],
    methods: {
        updateCheck(){
            window.axios.put('api/item/' + this.item.id, {
                item: this.item
            })
            .then( response => {
                if(response.status == 200){
                    //this.$emit('itemchanged');
                }
            })
            .catch( error => {
                console.log(error);
            })
        },

        deleteTodo() {
            window.axios.delete('api/item/' + this.item.id)
            .then( response => {
                if(response.status == 200){
                    this.$emit('reloadlist');
                }
            })
            .catch( error => {
                console.log( error );
            })
        }
    }
}
</script>

<style scoped>
.completed {
    text-decoration: line-through;
}
</style>