<template>
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Hush kelibsiz!</h1>
                                    </div>
                                    <p class="text-center text-danger">{{ this.error }}</p>
                                    <form class="user" @submit.prevent="login">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                   id="exampleInputEmail" aria-describedby="emailHelp"
                                                   placeholder="Emailni kiriting..." name="email" v-model="email">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                   id="exampleInputPassword" placeholder="Parolni kiriting..." name="password" v-model="password">
                                        </div>
                                        <input class="btn btn-primary btn-user btn-block" type="submit" value="Login"/>
                                    </form>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "Login",
    emits: ['admin-logged'],

    data() {
        return {
            error: '',
            email: '',
            password: '',
        }
    },

    methods: {
        login() {
            axios.post('/api/login', {
                email: this.email,
                password: this.password
            }).then(response => {
                localStorage.setItem('user', JSON.stringify(response.data.user));
                this.$emit('admin-logged');
            }).catch(error => {
                this.error = error.response.data.message;
                console.log(error)
            });
        }
    }
}
</script>

<style scoped>

</style>
