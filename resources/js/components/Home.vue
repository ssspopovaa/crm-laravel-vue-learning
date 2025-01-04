<script setup>

</script>

<template>
    <div>
        Home Page <br>
        <router-link style="padding-right: 10px" to="/users">Users</router-link>
        <router-link to="/admin">Admin</router-link>
        <router-view/>
    </div>
</template>

<style scoped>

</style>
