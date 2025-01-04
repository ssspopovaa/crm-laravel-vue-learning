<script setup>
    defineProps(['user'])
    const getClass = (role) => {
        return 'top-' + role
    }

    const buildUserUrl = (name) => {
        return `/users/${name}`;
    }
</script>

<template>
    <div>
        <h2 :class="getClass(user.role)"><router-link :to="buildUserUrl(user.name)">{{ user.name }} {{ user.lastName }}</router-link></h2>
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
