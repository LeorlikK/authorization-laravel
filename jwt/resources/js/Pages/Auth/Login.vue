<template>
    <div class="fields">
        <div class="email">
            <input v-model="email" placeholder="Email">
        </div>
        <div class="password">
            <input v-model="password" placeholder="Password">
        </div>
        <div class="button">
            <a @click.prevent="login" class="btn">Login</a>
        </div>
    </div>
</template>

<script>
export default {
    name: "Login",
    data() {
        return {
            email: '',
            password: ''
        }
    },
    methods: {
        login() {
            axios.post('/api/auth/login', {email: this.email, password: this.password})
                .then(data => {
                    console.log(data)
                    if (data.data.access_token) {
                        localStorage.setItem('access_token', data.data.access_token)
                    }
                })
                .catch(error => {
                    console.log(error);
                })
        }
    }
}
</script>

<style scoped>

</style>
