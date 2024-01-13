<template>
    <div class="fields">
        <div class="name">
            <input v-model="name" placeholder="Name">
        </div>
        <div class="email">
            <input v-model="email" placeholder="Email">
        </div>
        <div class="password">
            <input v-model="password" placeholder="Password">
        </div>
        <div class="confirmation_password">
            <input v-model="password_confirmation" placeholder="Confirmation_password">
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
            name: '',
            email: '',
            password: '',
            password_confirmation: ''
        }
    },
    methods: {
        registration() {
            axios.post('/api/register', {name: this.name, email: this.email, password: this.password, password_confirmation: this.password_confirmation})
                .then(data => {
                    console.log(data)
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
