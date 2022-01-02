<template>
    <div class="addItem">
         <input type="text" placeholder="what needs to be done?" v-model="item.name">
            <button class="btn btn-primary" @click="addTodo()">Add todo</button>
            <!--
            <ul v-for="todo in todos" :key="index">
                <li>@{{ todo.id }} @{{ todo.todo }}<button class="btn btn-primary" @click="deleteTodo(index)">Delete</button></li>
            </ul>
            -->
    </div>
</template>

<script>
    export default {
        data: function(){
            return {
                item:{
                    name: ""
                }
            }
        },
    
    methods: {
        addTodo(){
            if(this.item.name == ''){
                return;
            }
            
            window.axios.post('api/item/store', {
                item: this.item
            })
            .then(response=>{
                if(response.status == 201){
                    this.item.name = "";
                    this.$emit('reloadlist');
                }
            }).catch(error=>{
                console.log(error);
            })
        }
        
        }
    }
</script>