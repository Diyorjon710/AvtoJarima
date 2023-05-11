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
                                        <a href="http://avtojarima.loc/api/cars-export" class="btn btn-success btn-sm mr-3">
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

                        <p style="color: red;" v-if="error">OOPS, something went wrong</p>

                        <div class="modal fade" id="addUserModal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Yangi mashina qo'shish</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        Mashina nomi
                                        <input type="text" autocomplete="off" required class="form-control mb-3" v-model="newCarInfo[0].car_name">
                                        Raqami
                                        <input type="text" autocomplete="off" required class="form-control mb-3" v-model="newCarInfo[0].car_number">
                                        Ma'muriy javobgarlik
                                        <input type="text" autocomplete="off" required class="form-control mb-3" v-model="newCarInfo[0].car_jarimasi">
                                        Jarima narxi
                                        <input type="number" autocomplete="off" required class="form-control mb-3" v-model="newCarInfo[0].car_jarima_narxi">
                                        Viloyat
                                        <select name="" id="" v-model="newCarInfo[0].viloyat_id">
                                            <option v-for="country in countryCodes" :key="country.id" :value="country.id">{{ country.name }}</option>
                                        </select> <br> <br>
                                        Tuman
                                        <select name="" id="" v-model="newCarInfo[0].tuman_id">
                                            <option value="1">Chilonzor</option>
                                            <option value="1">Sergeli</option>
                                            <option value="1">Bodomzor</option>
                                        </select> <br> <br>
                                        Maydon
                                        <select name="" id="" v-model="newCarInfo[0].maydon_id">
                                            <option value="1">Qumariq 12/1</option>
                                            <option value="1">Toshariq 1/12</option>
                                        </select> <br> <br>
                                        Rasm
                                        <input type="file" autocomplete="off" required class="form-control-file mb-3" @change="previewFile">
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
                                        Mashina nomi
                                        <input type="text" autocomplete="off" required class="form-control mb-3" v-model="updateCarInfo[0].car_name">
                                        Raqami
                                        <input type="text" autocomplete="off" required class="form-control mb-3" v-model="updateCarInfo[0].car_number">
                                        Ma'muriy javobgarlik
                                        <input type="text" autocomplete="off" required class="form-control mb-3" v-model="updateCarInfo[0].car_jarimasi">
                                        Jarima narxi
                                        <input type="number" autocomplete="off" required class="form-control mb-3" v-model="updateCarInfo[0].car_jarima_narxi">
                                        Viloyat
                                        <select name="" id="" v-model="updateCarInfo[0].viloyat_id">
                                            <option v-for="country in countryCodes" :key="country.id" :value="country.id">{{ country.name }}</option>
                                        </select> <br> <br>
                                        Tuman
                                        <select name="" id="" v-model="updateCarInfo[0].tuman_id">
                                            <option value="1">Chilonzor</option>
                                            <option value="1">Sergeli</option>
                                            <option value="1">Bodomzor</option>
                                        </select> <br> <br>
                                        Maydon
                                        <select name="" id="" v-model="updateCarInfo[0].maydon_id">
                                            <option value="1">Qumariq 12/1</option>
                                            <option value="1">Toshariq 1/12</option>
                                        </select> <br> <br>
                                        Rasm
                                        <input type="file" autocomplete="off" required class="form-control-file mb-3" @change="updateImage">
                                    </div>
                                    <div class="modal-footer">
                                        <button @click="updateCar" type="button" class="btn btn-primary" data-dismiss="modal">Saqlash</button>
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
                                    <tr class="odd" v-for="car in allCars" :key="car.id">
                                        <td class="sorting_1">{{ car.id }}</td>
                                        <td>
                                            <span>
                                                <img :src="'/assets/car-info-page/'+car.car_image" alt="image" style="width: 100px;">
                                            </span>
                                        </td>
                                        <td>{{ car.car_name }}</td>
                                        <td>{{ car.car_number }}</td>
                                        <td>{{ car.car_jarimasi }}</td>
                                        <td>{{ car.car_jarima_narxi }}</td>
                                        <td>{{ car.maydon_name }}</td>
                                        <td>{{ car.tuman_name }}</td>
                                        <td>{{ car.viloyat_name }}</td>
                                        <td>{{ car.created_at }}</td>
                                        <td>
                                            <button
                                                @click="updateCarInfo[0].id = car.id"
                                                data-toggle="modal" data-target="#updateUserModal"
                                                class="btn btn-circle btn-sm btn-primary mr-2"
                                            >
                                                <i class="fas fa-light fa-pen"></i>
                                            </button>

                                            <button
                                                @click="deleteCar(car.id)"
                                                class="btn btn-circle btn-sm btn-danger">
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
            error: false,
            searchValue: '',
            allCars: [],
            links: [],
            newCarInfo: [
                {
                    car_name: '',
                    car_number: '',
                    car_jarimasi: '',
                    car_jarima_narxi: 0,
                    car_image: [],
                    maydon_id: null,
                    tuman_id: null,
                    viloyat_id: null,
                }
            ],
            updateCarInfo: [
                {
                    id: null,
                    car_name: '',
                    car_number: '',
                    car_jarimasi: '',
                    car_jarima_narxi: 0,
                    car_image: [],
                    maydon_id: null,
                    tuman_id: null,
                    viloyat_id: null,
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

    created() {
        this.getAllCars();
    },

    methods: {
        updateImage(event) {
            this.updateCarInfo[0].car_image = event.target.files[0];
            console.log(this.updateCarInfo[0].car_image);
        },

        previewFile(event) {
            this.newCarInfo[0].car_image = event.target.files[0];
            console.log(this.newCarInfo[0].car_image);
        },

        deleteCar(id) {
            if(confirm('Chindan ham o\'chirmoqchimisiz ?')) {
                axios.delete(`/api/delete-car/${id}`)
                    .then(res => {
                        this.getAllCars();
                    })
                    .catch(err => {
                        console.log(err)
                    })
            }
        },

        addNewCar() {
            const config = {
                headers: {
                    'content-type': 'multipart/form-data'
                }
            };

            let formData = new FormData();
            formData.append('car_name', this.newCarInfo[0].car_name);
            formData.append('car_number', this.newCarInfo[0].car_number);
            formData.append('car_jarimasi', this.newCarInfo[0].car_jarimasi);
            formData.append('car_jarima_narxi', this.newCarInfo[0].car_jarima_narxi);
            formData.append('car_image', this.newCarInfo[0].car_image);
            formData.append('maydon_id', this.newCarInfo[0].maydon_id);
            formData.append('tuman_id', this.newCarInfo[0].tuman_id);
            formData.append('viloyat_id', this.newCarInfo[0].viloyat_id);
            console.log(formData);

            axios.post('/api/create-car', formData, config)
                .then(res => {
                    console.log(res);
                    this.getAllCars();
                })
                .catch(err => {
                    console.log(err);
                })
        },

        updateCar() {
            const config = {
                headers: {
                    'content-type': 'multipart/form-data'
                }
            };

            let formData2 = new FormData();
            formData2.append('id', this.updateCarInfo[0].id);
            formData2.append('car_name', this.updateCarInfo[0].car_name);
            formData2.append('car_number', this.updateCarInfo[0].car_number);
            formData2.append('car_jarimasi', this.updateCarInfo[0].car_jarimasi);
            formData2.append('car_jarima_narxi', this.updateCarInfo[0].car_jarima_narxi);
            formData2.append('car_image', this.updateCarInfo[0].car_image);
            formData2.append('maydon_id', this.updateCarInfo[0].maydon_id);
            formData2.append('tuman_id', this.updateCarInfo[0].tuman_id);
            formData2.append('viloyat_id', this.updateCarInfo[0].viloyat_id);

            axios.post('/api/update-car/' + this.updateCarInfo[0].id, formData2, config)
                .then(res => {
                    console.log(res);
                    this.getAllCars();
                })
                .catch(err => {
                    // console.log(err);
                    console.log(formData2)
                })
        },

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
