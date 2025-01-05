<script setup>
import { ref, onMounted } from 'vue';
import {useRoute} from "vue-router";

const userId = ref('');
const user = ref({});
const route = useRoute();

onMounted(async () => {
    userId.value = route.params.id;
    await axios.get(`/users/${userId.value}`).then(function(response) {
        user.value = response.data
    })
})

</script>

<template>
    <div>
        <b>User id:</b> {{ user.name }} <br>
        <b>User email:</b> {{ user.email }}
    </div>
</template>

<style scoped>

</style>
