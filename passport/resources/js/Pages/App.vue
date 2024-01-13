<template>
    <h1>Hello App</h1>
    <div class="container">
        <router-link :to="{name: 'home'}">Home</router-link>
        <router-link :to="{name: 'registration'}">Registration</router-link>
        <router-link :to="{name: 'login'}">Login</router-link>
        <a class="link" @click.prevent="logout">logout</a>
        <a class="link" @click.prevent="me">me</a>
        <a class="link" @click.prevent="protected">protected</a>
    </div>
    <router-view></router-view>
</template>

<script>
export default {
    name: "App",
    data() {
        return {
        }
    },
    methods: {
        logout() {
            axios.post('/')
                .then(data => {
                    console.log(data)
                })
                .catch(error => {
                    console.log(error);
                })
        },
        me() {
            axios.post('/')
                .then(data => {
                    console.log(data)
                })
                .catch(error => {
                    console.log(error);
                })
        },
        protected() {
            axios.post('/')
                .then(data => {
                    console.log(data)
                })
                .catch(error => {
                    console.log(error);
                })
        },
    }
}
</script>

<style scoped>
.container {
    width: 100%;
    display: flex;
    background-color: lightcoral;
}
.container a {
    margin: 10px 20px
}
</style>
