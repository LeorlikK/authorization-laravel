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
            axios.post('/api/login', {email: this.email, password: this.password, confirmation_password: this.confirmation_password})
                .then(data => {
                    console.log(data)
                    localStorage.setItem('myToken', data.data.token)
                    // axios.post(`/api/tokens/create/${data.data.user.id}`, {token_name: 'myToken'})
                    //     .then(data => {
                    //         console.log(data)
                    //         localStorage.setItem('myToken', data.data.token)
                    //     })
                    //     .catch(error => {
                    //         console.log(data)
                    //     })
                })
                .catch(error => {
                    console.log(error);
                })
        }
    }
}
</script>

<style scoped>
/*leorlik_1@ya.ru*/
/*"2|AgJpifmM1SPF5ujpkZYcQ1F40Msj3ip5SImrY8ah48aa9791"*/
/*data.data.user*/
</style>
