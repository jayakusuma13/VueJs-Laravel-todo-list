<template>
    <div>
        <h5>ListView</h5>
        <div v-for="(item, index) in items" :key="index">
            <list-item :item="item" class="item" v-on:itemchanged="$emit('reloadlist')"/>
        </div>
    </div>
</template>

<script>
import ListItem from './listItem.vue';

export default {
    props: ['items'],
    components: {
        ListItem
    }
}
</script>