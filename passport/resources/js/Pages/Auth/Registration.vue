<template>
    <div class="fields">
        <div class="email">
            <input v-model="email" placeholder="Email">
        </div>
        <div class="password">
            <input v-model="password" placeholder="Password">
        </div>
        <div class="button">
            <a class="btn">Registration</a>
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
            axios.post('/')
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
