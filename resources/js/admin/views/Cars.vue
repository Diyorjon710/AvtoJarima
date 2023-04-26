<template>
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Barcha mashinalar</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
            </div>
            <div class="card-body">
                <div class="table-responsive o-hidden">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12 col-md-6 mt-2">
                                <form @submit.prevent="searchCar" id="dataTable_length" class="dataTables_length">
                                    <label>
                                        <input
                                            type="search"
                                            class="form-control form-control-sm"
                                            placeholder="Qidiring"
                                            aria-controls="dataTable"
                                            v-model="searchValue"
                                            @input="searchCar"/>
                                    </label>
                                    <button type="submit" class="btn btn-primary btn-sm ml-2">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>

                                    <button @click.stop.prevent="getAllCars" class="btn btn-success btn-sm ml-2">
                                        <i class="fas fa fa-history fa-sm"></i>
                                    </button>
                                </form>
                            </div>
                            <div class="col-sm-12 col-md-6 mt-2">
                                <div id="dataTable_filter" class="dataTables_filter" style="text-align: right;">
                                    <label>
                                        <a href="http://admin.localhost:8000/api/users-export" class="btn btn-success btn-sm mr-3">
                                            Yuklab olish
                                        </a>
                                        <button data-toggle="modal" data-target="#addUserModal" class="btn btn-primary btn-sm">
                                            <i class="fas fa-plus fa-sm"></i>
                                            Yangi mashina qo'shish
                                        </button>
                                    </label>
                                </div>
                            </div>
                        </div>

<!--                        <p style="color: red;">error text here</p>-->

                        <div class="modal fade" id="addUserModal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Yangi mashina qo'shish</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        Ismi
                                        <input type="text" autocomplete="off" required class="form-control mb-3">
                                        Email
                                        <input type="email" autocomplete="off" required class="form-control mb-3">
                                        Parol
                                        <input type="password" autocomplete="off" required class="form-control mb-3">
                                    </div>
                                    <div class="modal-footer">
                                        <button @click="addNewCar" type="button" class="btn btn-primary" data-dismiss="modal">Saqlash</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="updateUserModal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Mashinani yangilash</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        Ismi
                                        <input autocomplete="off" required type="text" class="form-control mb-3">
                                        Email
                                        <input autocomplete="off" required type="email" class="form-control mb-3">
                                        Parol
                                        <input autocomplete="off" required type="password" class="form-control mb-3">
                                    </div>
                                    <div class="modal-footer">
                                        <button @click="updateUser" type="button" class="btn btn-primary" data-dismiss="modal">Saqlash</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <table
                                    class="table table-bordered dataTable"
                                    id="dataTable"
                                    width="100%"
                                    cellspacing="0"
                                    role="grid"
                                    aria-describedby="dataTable_info"
                                    style="width: 100%"
                                >
                                    <thead>
                                    <tr role="row">
                                        <th
                                            class="sorting sorting_asc"
                                            tabindex="0"
                                            aria-controls="dataTable"
                                            rowspan="1"
                                            colspan="1"
                                            aria-sort="ascending"
                                            aria-label="Name: activate to sort column descending"
                                            style="width: 20px"
                                        >
                                            Id
                                        </th>
                                        <th
                                            class="sorting"
                                            tabindex="0"
                                            aria-controls="dataTable"
                                            rowspan="1"
                                            colspan="1"
                                            aria-label="Position: activate to sort column ascending"
                                            style="width: 96px"
                                        >
                                            Rasm
                                        </th>
                                        <th
                                            class="sorting"
                                            tabindex="0"
                                            aria-controls="dataTable"
                                            rowspan="1"
                                            colspan="1"
                                            aria-label="Position: activate to sort column ascending"
                                            style="width: 96px"
                                        >
                                            Nomi
                                        </th>
                                        <th
                                            class="sorting"
                                            tabindex="0"
                                            aria-controls="dataTable"
                                            rowspan="1"
                                            colspan="1"
                                            aria-label="Position: activate to sort column ascending"
                                            style="width: 96px"
                                        >
                                            Raqami
                                        </th>
                                        <th
                                            class="sorting"
                                            tabindex="0"
                                            aria-controls="dataTable"
                                            rowspan="1"
                                            colspan="1"
                                            aria-label="Position: activate to sort column ascending"
                                            style="width: 96px"
                                        >
                                            Ma'muriy javobgarlik
                                        </th>
                                        <th
                                            class="sorting"
                                            tabindex="0"
                                            aria-controls="dataTable"
                                            rowspan="1"
                                            colspan="1"
                                            aria-label="Position: activate to sort column ascending"
                                            style="width: 96px"
                                        >
                                            Jarima narxi
                                        </th>
                                        <th
                                            class="sorting"
                                            tabindex="0"
                                            aria-controls="dataTable"
                                            rowspan="1"
                                            colspan="1"
                                            aria-label="Position: activate to sort column ascending"
                                            style="width: 96px"
                                        >
                                            Maydon nomi
                                        </th>
                                        <th
                                            class="sorting"
                                            tabindex="0"
                                            aria-controls="dataTable"
                                            rowspan="1"
                                            colspan="1"
                                            aria-label="Position: activate to sort column ascending"
                                            style="width: 96px"
                                        >
                                            Tuman nomi
                                        </th>
                                        <th
                                            class="sorting"
                                            tabindex="0"
                                            aria-controls="dataTable"
                                            rowspan="1"
                                            colspan="1"
                                            aria-label="Position: activate to sort column ascending"
                                            style="width: 96px"
                                        >
                                            Viloyat nomi
                                        </th>
                                        <th
                                            class="sorting"
                                            tabindex="0"
                                            aria-controls="dataTable"
                                            rowspan="1"
                                            colspan="1"
                                            aria-label="Position: activate to sort column ascending"
                                            style="width: 96px"
                                        >
                                            Sana
                                        </th>
                                        <th
                                            class="sorting"
                                            tabindex="0"
                                            aria-controls="dataTable"
                                            rowspan="1"
                                            colspan="1"
                                            aria-label="Position: activate to sort column ascending"
                                            style="width: 96px"
                                        >
                                            Tahrirlash
                                        </th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th rowspan="1" colspan="1">Id</th>
                                        <th rowspan="1" colspan="1">Rasm</th>
                                        <th rowspan="1" colspan="1">Nomi</th>
                                        <th rowspan="1" colspan="1">Raqami</th>
                                        <th rowspan="1" colspan="1">Ma'muriy javobgarlik</th>
                                        <th rowspan="1" colspan="1">Jarima narxi</th>
                                        <th rowspan="1" colspan="1">Maydon nomi</th>
                                        <th rowspan="1" colspan="1">Tuman nomi</th>
                                        <th rowspan="1" colspan="1">Viloyat nomi</th>
                                        <th rowspan="1" colspan="1">Sana</th>
                                        <th rowspan="1" colspan="1">Tahrirlash</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    <tr class="odd" v-for="(car, idx) in allCars">
                                        <td class="sorting_1">{{ car.id }}</td>
                                        <td>{{ car.car_image }}</td>
                                        <td>{{ car.car_name }}</td>
                                        <td>{{ car.car_number }}</td>
                                        <td>{{ car.car_jarimasi }}</td>
                                        <td>{{ car.car_jarima_narxi }}</td>
                                        <td>{{ car.maydon_nomi }}</td>
                                        <td>{{ car.tuman_nomi }}</td>
                                        <td>{{ car.viloyat_nomi }}</td>
                                        <td>{{ car.created_at }}</td>
                                        <td>
                                            <button
                                                data-toggle="modal" data-target="#updateUserModal"
                                                class="btn btn-circle btn-sm btn-primary mr-2"
                                            >
                                                <i class="fas fa-light fa-pen"></i>
                                            </button>

                                            <button class="btn btn-circle btn-sm btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>

                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="row" id="pagination_bootstrap" v-if="links.length > 3">
                            <div class="col-sm-12 col-md-3">
                                <div
                                    class="dataTables_paginate paging_simple_numbers"
                                    id="dataTable_paginate"
                                >
                                    <ul class="pagination">
                                        <li
                                            class="page-item" :class="link.active ? 'active' : ''"
                                            v-for="(link, idx) in links"
                                            @click="paginate(idx)"
                                        >
                                            <span
                                                style="cursor: pointer;"
                                                class="page-link"
                                                v-html="link.label"></span>
                                        </li>
                                    </ul>
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
    name: "Cars",

    data() {
        return {
            searchValue: '',
            allCars: [],
            links: [],
            newUserInfo: {
                name: '',
                email: '',
                password: '',
            },
            updateUserInfo: [
                {
                    user_id: '',
                    name: '',
                    email: '',
                    password: '',
                }
            ],
        }
    },

    created() {
        this.getAllCars();
    },

    methods: {
        searchCar() {
            axios.post('/api/search-car', {
                query: this.searchValue
            })
            .then(res => {
                this.allCars = res.data.data;
            })
            .catch(err => {
                console.log(err);
                this.allCars = [];
            })
        },

        getAllCars() {
            axios.get('/api/all-cars')
                .then(res => {
                    this.allCars = res.data.data;
                })
                .catch(err => {
                    console.log(err);
                })
        },
    }
}
</script>

<style scoped>

</style>
