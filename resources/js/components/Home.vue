<script setup>
import IncrementCounter from "./IncrementCounter.vue";
import {ref} from "vue";

const title = ref("CRM Helpdesc");
const users = ref(['Iztok', 'Alex', 'Anatoliy']);
const name = ref('');

const addUser = () => {
    users.value.push(name.value)
    name.value = ''
}

</script>

<template>
    <div id="parent">
        <h1>{{ title }}</h1>
        <input type="text" v-model="title">
        <br>
        <ul>
            <li v-for="user in users">{{ user }}</li>
        </ul>
        <input type="text" v-model="name"><button @click="addUser" type="button">Add</button>
<!--        <increment-counter/>-->
    </div>
</template>

<style scoped>

#parent {
    padding: 10px;
}

</style>
