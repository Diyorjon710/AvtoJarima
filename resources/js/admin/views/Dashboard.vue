<template>
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <!--            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i-->
            <!--                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
        </div>

        <!-- Content Row -->
        <div class="row" style="justify-content: start">

            <!-- All products Card Example -->
            <router-link to="/users" class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Foydalanuvchilar
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ users.length }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </router-link>

            <!-- Users Card Example -->
            <router-link to="/cars" class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Mashinalar
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ cars.length }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </router-link>

            <!-- Orders Card Example -->
            <router-link to="/areas" class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Jarima maydonlari
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ this.areas.length }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </router-link>
        </div>

    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "Dashboard",

    data() {
        return {
            cars: [],
            users: [],
            areas: [],
        }
    },

    created() {
        this.getAllCars();
        this.getAllUsers();
        this.getAllAreas();
    },

    methods: {
        getAllCars() {
            axios
                .get('/api/all-cars')
                .then(response => {
                    this.cars = response.data.data;
                })
                .catch(error => {
                    console.log(error);
                })
        },

        getAllUsers() {
            axios
                .get('/api/all-users')
                .then(response => {
                    this.users = response.data.data;
                })
                .catch(error => {
                    console.log(error);
                })
        },

        getAllAreas() {
            axios
                .get('/api/all-areas')
                .then(response => {
                    this.areas = response.data.data;
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
