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
            name: '',
            email: '',
            password: '',
            confirmation_password: ''
        }
    },
    methods: {
        login() {
            axios.get('/sanctum/csrf-cookie')
                .then(data => {
                    console.log(data)
                    axios.post('/api/login', {email: this.email, password: this.password, confirmation_password: this.confirmation_password})
                        .then(data => {
                            console.log(data)
                        })
                        .catch(error => {
                            console.log(error);
                        })
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
