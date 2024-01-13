<template>
    <h1>Hello App</h1>
    <div class="container">
        <router-link :to="{name: 'home'}">Home</router-link>
        <router-link :to="{name: 'registration'}">Registration</router-link>
        <router-link :to="{name: 'login'}">Login</router-link>
        <a class="link" @click.prevent="refresh">refresh</a>
        <a class="link" @click.prevent="logout">logout</a>
        <a class="link" @click.prevent="me">me</a>
        <a class="link" @click.prevent="refresh">refresh</a>

        <a class="link" @click.prevent="protected('one')">protected_one</a>
        <a class="link" @click.prevent="protected('two')">protected_two</a>
        <a class="link" @click.prevent="protected('three')">protected_three</a>
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
        refresh() {
            axios.post('/api/refresh', {}, {
                headers: {
                    authorization: 'Bearer ' + localStorage.getItem('myToken')
                }
            })
                .then(data => {
                    console.log(data)
                    localStorage.setItem('myToken', data.data.refreshToken)
                })
                .catch(error => {
                    console.log(error);
                })
        },
        logout() {
            axios.post('/api/logout', {}, {
                headers: {
                    authorization: 'Bearer ' + localStorage.getItem('myToken')
                }
            })
                .then(data => {
                    console.log(data)
                })
                .catch(error => {
                    console.log(error);
                })
        },
        me() {
            axios.post('/api/me', {}, {
                headers: {
                    authorization: 'Bearer ' + localStorage.getItem('myToken')
                }
            })
                .then(data => {
                    console.log(data)
                })
                .catch(error => {
                    console.log(error);
                })
        },
        protected(level) {
            axios.get('/api/protected-' + level, {
                headers: {
                    authorization: 'Bearer ' + localStorage.getItem('myToken')
                }
            })
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
