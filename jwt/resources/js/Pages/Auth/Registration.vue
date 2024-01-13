<template>
    <div class="fields">
        <div class="email">
            <input v-model="email" placeholder="Email">
        </div>
        <div class="password">
            <input v-model="password" placeholder="Password">
        </div>
        <div class="button">
            <a @click.prevent="registration" class="btn">Registration</a>
        </div>
    </div>
</template>

<script>
export default {
    name: "Registration",
    data() {
        return {
            email: '',
            password: ''
        }
    },
    methods: {
        registration() {
            axios.post('/api/auth/registration', {email: this.email, password: this.password})
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
