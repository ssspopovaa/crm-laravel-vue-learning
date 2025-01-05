<script setup>
import {ref, onMounted} from "vue";
import UsersList from "./UsersList.vue";

const title = ref("CRM Helpdesc");
const users = ref([]);
const name = ref('');

onMounted(() => {
    axios.get('/users').then(result => {
        users.value = result.data
    })
})

</script>

<template>
    <div id="parent">
        <h1>{{ title }}</h1>
        <users-list v-for="(user, index) in users" :user="user" :key="index"/>
    </div>
</template>

<style scoped>
    #parent {
        padding: 10px;
    }
</style>
