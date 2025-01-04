<script setup>
import { ref, onMounted } from 'vue';
import {useRoute} from "vue-router";

const name = ref('');
const route = useRoute();

onMounted(() => {
    name.value = route.params.name;
})

</script>

<template>
    <div>
        User name: {{ name }}
    </div>
</template>

<style scoped>

</style>
