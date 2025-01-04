<script setup>
import {ref} from "vue";
import UsersList from "./UsersList.vue";

const title = ref("CRM Helpdesc");
const users = ref([
    {
        name: 'Iztok',
        lastName: 'Stopar',
        role: "admin"
    },
    {
        name: 'Alex',
        lastName: 'Panker',
        role: "manager"
    },
    {
        name: 'Piltou',
        lastName: 'Carney',
        role: "client"
    },
    {
        name: 'Corney',
        lastName: 'Buncher',
        role: "manager"
    },
]);

const name = ref('');

const addUser = () => {
    users.value.push(name.value)
    name.value = ''
}

</script>

<template>
    <div id="parent">
        <h1>{{ title }}</h1>
        <users-list v-for="(user, index) in users" :user="user" :key="index"/>
        <input type="text" v-model="name"><button @click="addUser" type="button">Add</button>
    </div>
</template>

<style scoped>
    #parent {
        padding: 10px;
    }
</style>
