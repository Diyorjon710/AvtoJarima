<template>
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Barcha foydalanuvchilar</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
            </div>
            <div class="card-body">
                <div class="table-responsive o-hidden">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12 col-md-6 mt-2">
                                <form @submit.prevent="searchUser" id="dataTable_length" class="dataTables_length">
                                    <label>
                                        <input
                                            type="search"
                                            class="form-control form-control-sm"
                                            placeholder="Qidiring"
                                            aria-controls="dataTable"
                                            v-model="searchValue"
                                            @input="searchUser"/>
                                    </label>
                                    <button type="submit" class="btn btn-primary btn-sm ml-2">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>

                                    <button @click.stop.prevent="getAllUsers" class="btn btn-success btn-sm ml-2">
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
                                            Yangi foydalanuvchi qo'shish
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
                                        <h4 class="modal-title">Yangi foydalanuvchi qo'shish</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        Ismi
                                        <input type="text" autocomplete="off" required class="form-control mb-3" v-model="newUserInfo[0].name">
                                        Familiyasi
                                        <input type="text" autocomplete="off" required class="form-control mb-3" v-model="newUserInfo[0].surname">
                                        Telefon
                                        <input type="tel" autocomplete="off" required class="form-control mb-3" v-model="newUserInfo[0].phone_number">
                                        Username
                                        <input type="text" autocomplete="off" required class="form-control mb-3" v-model="newUserInfo[0].username">
                                        Parol
                                        <input type="text" autocomplete="off" required class="form-control mb-3" v-model="newUserInfo[0].password">
                                        Role
                                        <select name="" id="" v-model="newUserInfo[0].role">
                                            <option value="Admin">Admin</option>
                                            <option value="Foydalanuvchi">Foydalanuvchi</option>
                                            <option value="Operator">Operator</option>
                                        </select> <br> <br>
                                        Ruhsatlar
                                        <form>
                                            <input type="checkbox" name="group" id="create" value="create" v-model="newUserInfo[0].permissions">
                                            <label for="create" > Create </label> <br>

                                            <input type="checkbox" name="group" id="read" value="read" v-model="newUserInfo[0].permissions">
                                            <label for="read" > Read </label> <br>

                                            <input type="checkbox" name="group" id="update" value="update" v-model="newUserInfo[0].permissions">
                                            <label for="update" > Upadte </label> <br>

                                            <input type="checkbox" name="group" id="delete" value="delete" v-model="newUserInfo[0].permissions">
                                            <label for="delete" > Delete</label>
                                        </form>

                                        Viloyat
                                        <select name="" id="" v-model="newUserInfo[0].viloyat_nomi">
                                            <option v-for="country in countryCodes" :key="country.id" :value="country.id">{{ country.name }}</option>
                                        </select> <br> <br>
                                        Tuman
                                        <select name="" id="" v-model="newUserInfo[0].tuman_nomi">
                                            <option value="1">Chilonzor</option>
                                            <option value="1">Sergeli</option>
                                            <option value="1">Bodomzor</option>
                                        </select> <br> <br>
                                        Maydon
                                        <select name="" id="" v-model="newUserInfo[0].maydon_nomi">
                                            <option value="1">Qumariq 12/1</option>
                                            <option value="1">Toshariq 1/12</option>
                                        </select>
                                    </div>
                                    <div class="modal-footer">
                                        <button @click="addNewUser" type="button" class="btn btn-primary" data-dismiss="modal">Saqlash</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="updateUserModal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Foydalanuvchini yangilash</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        Ismi
                                        <input type="text" autocomplete="off" required class="form-control mb-3" v-model="updateUserInfo[0].name">
                                        Familiyasi
                                        <input type="text" autocomplete="off" required class="form-control mb-3" v-model="updateUserInfo[0].surname">
                                        Telefon
                                        <input type="tel" autocomplete="off" required class="form-control mb-3" v-model="updateUserInfo[0].phone_number">
                                        Username
                                        <input type="text" autocomplete="off" required class="form-control mb-3" v-model="updateUserInfo[0].username">
                                        Parol
                                        <input type="text" autocomplete="off" required class="form-control mb-3" v-model="updateUserInfo[0].password">
                                        Role
                                        <select name="" id="" v-model="updateUserInfo[0].role">
                                            <option value="Admin">Admin</option>
                                            <option value="Foydalanuvchi">Foydalanuvchi</option>
                                            <option value="Operator">Operator</option>
                                        </select> <br> <br>
                                        Ruhsatlar
                                        <form>
                                            <input type="checkbox" name="group1" id="create1" value="create" v-model="updateUserInfo[0].permissions">
                                            <label for="create1" > Create </label> <br>

                                            <input type="checkbox" name="group1" id="read1" value="read" v-model="updateUserInfo[0].permissions">
                                            <label for="read1" > Read </label> <br>

                                            <input type="checkbox" name="group1" id="update1" value="update" v-model="updateUserInfo[0].permissions">
                                            <label for="update1" > Upadte </label> <br>

                                            <input type="checkbox" name="group1" id="delete1" value="delete" v-model="updateUserInfo[0].permissions">
                                            <label for="delete1" > Delete</label>
                                        </form>

                                        Viloyat
                                        <select name="" id="" v-model="updateUserInfo[0].viloyat_nomi">
                                            <option v-for="country in countryCodes" :key="country.id" :value="country.id">{{ country.name }}</option>
                                        </select> <br> <br>
                                        Tuman
                                        <select name="" id="" v-model="updateUserInfo[0].tuman_nomi">
                                            <option value="1">Chilonzor</option>
                                            <option value="1">Sergeli</option>
                                            <option value="1">Bodomzor</option>
                                        </select> <br> <br>
                                        Maydon
                                        <select name="" id="" v-model="updateUserInfo[0].maydon_nomi">
                                            <option value="1">Qumariq 12/1</option>
                                            <option value="1">Toshariq 1/12</option>
                                        </select>
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
                                            FIO
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
                                            Telefon
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
                                            Username
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
                                            Parol
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
                                            Role
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
                                            Ruhsatlar
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
                                            Viloyat
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
                                            Tuman
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
                                            Maydon
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
                                        <th rowspan="1" colspan="1">FIO</th>
                                        <th rowspan="1" colspan="1">Telefon</th>
                                        <th rowspan="1" colspan="1">Username</th>
                                        <th rowspan="1" colspan="1">Parol</th>
                                        <th rowspan="1" colspan="1">Role</th>
                                        <th rowspan="1" colspan="1">Ruhsatlar</th>
                                        <th rowspan="1" colspan="1">Viloyat</th>
                                        <th rowspan="1" colspan="1">Tuman</th>
                                        <th rowspan="1" colspan="1">Maydon</th>
                                        <th rowspan="1" colspan="1">Tahrirlash</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    <tr class="odd" v-for="user in allUsers" :key="user.id">
                                        <td>{{ user.id }}</td>
                                        <td>{{ user.name + ' ' + user.surname }}</td>
                                        <td>{{ user.phone_number }}</td>
                                        <td>{{ user.username }}</td>
                                        <td>{{ user.password }}</td>
                                        <td>{{ user.role }}</td>
                                        <td>{{ user.permissions }}</td>
                                        <td>{{ user.viloyat_nomi }}</td>
                                        <td>{{ user.tuman_nomi }}</td>
                                        <td>{{ user.maydon_nomi }}</td>
                                        <td>
                                            <button
                                                @click="updateUserInfo[0].id = user.id"
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
    name: "Users",

    created() {
        this.getAllUsers();
    },

    data() {
        return {
            error: false,
            searchValue: '',
            links: [],
            allUsers: [],
            newUserInfo: [{
                name: '',
                surname: '',
                phone_number: null,
                username: '',
                password: '',
                role: '',
                permissions: [],
                viloyat_nomi: '',
                tuman_nomi: '',
                maydon_nomi: '',
            }],

            updateUserInfo: [
                {
                    id: null,
                    name: '',
                    surname: '',
                    phone_number: null,
                    username: '',
                    password: '',
                    role: '',
                    permissions: [],
                    viloyat_nomi: '',
                    tuman_nomi: '',
                    maydon_nomi: '',
                }
            ],

            countryCodes: [
                {id: 1, code: '01', name: 'Toshkent shahar', selected: true},
                {id: 2, code: '10', name: 'Toshkent viloyati'},
                {id: 3, code: '20', name: 'Sirdaryo viloyati'},
                {id: 4, code: '25', name: 'Jizzax viloyati'},
                {id: 5, code: '30', name: 'Samarqand viloyati'},
                {id: 6, code: '40', name: 'Farg\'ona viloyati'},
                {id: 7, code: '50', name: 'Namangan viloyati'},
                {id: 8, code: '60', name: 'Andijon viloyati'},
                {id: 9, code: '70', name: 'Qashqadaryo viloyati'},
                {id: 10, code: '75', name: 'Surxondaryo viloyati'},
                {id: 11, code: '80', name: 'Buxoro viloyati'},
                {id: 12, code: '85', name: 'Navoiy viloyati'},
                {id: 13, code: '90', name: 'Xorazm viloyati'},
                {id: 14, code: '95', name: 'Qoraqalpog\'iston Respublikasi'},
            ]
        }
    },

    methods: {
        deleteUser(id) {
            axios
                .delete('/api/delete-user/' + id)
                .then(res => {
                    console.log(res);
                })
                .catch(err => {
                    console.log(err);
                    // this.error = true;
                })
        },

        addNewUser() {
            axios
                .post('/api/create-user', {
                    user: this.newUserInfo[0]
                })
                .then(res => {
                    console.log(res);
                })
                .catch(err => {
                    console.log(err);
                    this.error = true;
                })
        },

        updateUser() {
            axios
                .put('/api/update-user/' + this.updateUserInfo[0].id, {
                    user: this.updateUserInfo[0]
                })
                .then(res => {
                    console.log(res);
                })
                .catch(err => {
                    console.log(err);
                    this.error = true;
                })
        },

        searchUser() {
            axios
                .post('/api/search-user', {
                    query: this.searchValue
                })
                .then(res => {
                    this.allUsers = res.data.data;
                })
                .catch(err => {
                    console.log(err);
                })
        },

        getAllUsers() {
            axios.get('/api/all-users')
                .then(res => {
                    this.allUsers = res.data.data;
                    console.log(this.allUsers);
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
