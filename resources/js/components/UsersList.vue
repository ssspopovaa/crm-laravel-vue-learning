<script setup>
    defineProps(['user'])
    const getClass = (role) => {
        return 'top-' + role
    }
    const buildUserUrl = (id) => {
        return `/users/${id}`;
    }
</script>

<template>
    <div>
        <h2 :class="getClass(user.role)"><router-link :to="buildUserUrl(user.id)">{{ user.name }}</router-link></h2>
        <small>{{ user.role }}</small>
    </div>
</template>

<style scoped>
    .top-admin {
        color: green;
    }
    .top-manager {
        color: blue;
    }
    .top-client {
        color: red;
    }
</style>
