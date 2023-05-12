<template>
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Barcha jarima maydonlari</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
            </div>
            <div class="card-body">
                <div class="table-responsive o-hidden">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12 col-md-6 mt-2">
                                <form @submit.prevent="searchArea" id="dataTable_length" class="dataTables_length">
                                    <label>
                                        <input
                                            type="search"
                                            class="form-control form-control-sm"
                                            placeholder="Qidiring"
                                            aria-controls="dataTable"
                                            v-model="searchValue"
                                            @input="searchArea"/>
                                    </label>
                                    <button type="submit" class="btn btn-primary btn-sm ml-2">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>

                                    <button @click.stop.prevent="getAllAreas" class="btn btn-success btn-sm ml-2">
                                        <i class="fas fa fa-history fa-sm"></i>
                                    </button>
                                </form>
                            </div>
                            <div class="col-sm-12 col-md-6 mt-2">
                                <div id="dataTable_filter" class="dataTables_filter" style="text-align: right;">
                                    <label>
                                        <a href="http://avtojarima.loc/api/areas-export" class="btn btn-success btn-sm mr-3">
                                            Yuklab olish
                                        </a>
                                        <button data-toggle="modal" data-target="#addUserModal" class="btn btn-primary btn-sm">
                                            <i class="fas fa-plus fa-sm"></i>
                                            Yangi maydon qo'shish
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
                                        <h4 class="modal-title">Yangi maydon qo'shish</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        Maydon nomi
                                        <input type="text" autocomplete="off" required class="form-control mb-3" v-model="newAreaInfo[0].maydon_nomi">
                                        Lokatsiyasi
                                        <input type="email" autocomplete="off" required class="form-control mb-3" v-model="newAreaInfo[0].maydon_lokatsiyasi">
                                        Tuman
                                        <select name="" id="" v-model="newAreaInfo[0].tuman_id">
                                            <option value="1">Chilonzor</option>
                                            <option value="1">Sergeli</option>
                                            <option value="1">Bodomzor</option>
                                        </select> <br> <br>
                                    </div>
                                    <div class="modal-footer">
                                        <button @click="addNewArea" type="button" class="btn btn-primary" data-dismiss="modal">Saqlash</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="updateUserModal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Maydonni yangilash</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        Maydon nomi
                                        <input type="text" autocomplete="off" required class="form-control mb-3" v-model="updateAreaInfo[0].maydon_nomi">
                                        Lokatsiyasi
                                        <input type="email" autocomplete="off" required class="form-control mb-3" v-model="updateAreaInfo[0].maydon_lokatsiyasi">
                                        Tuman
                                        <select name="" id="" v-model="updateAreaInfo[0].tuman_id">
                                            <option value="1">Chilonzor</option>
                                            <option value="1">Sergeli</option>
                                            <option value="1">Bodomzor</option>
                                        </select> <br> <br>
                                    </div>
                                    <div class="modal-footer">
                                        <button @click="updateArea" type="button" class="btn btn-primary" data-dismiss="modal">Saqlash</button>
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
                                            Maydon lokatsiyasi
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
                                            Tahrirlash
                                        </th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th rowspan="1" colspan="1">Id</th>
                                        <th rowspan="1" colspan="1">Maydon nomi</th>
                                        <th rowspan="1" colspan="1">Maydon lokatsiyasi</th>
                                        <th rowspan="1" colspan="1">Tuman</th>
                                        <th rowspan="1" colspan="1">Viloyat</th>
                                        <th rowspan="1" colspan="1">Tahrirlash</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    <tr class="odd" v-for="area in allAreas" :key="area.id">
                                        <td class="sorting_1">{{ area.id }}</td>
                                        <td>{{ area.maydon_nomi }}</td>
                                        <td>{{ area.maydon_lokatsiyasi }}</td>
                                        <td>{{ area.tuman_name }}</td>
                                        <td>{{ area.viloyat_name }}</td>
                                        <td>
                                            <button
                                                @click="updateAreaInfo[0].id = area.id"
                                                data-toggle="modal" data-target="#updateUserModal"
                                                class="btn btn-circle btn-sm btn-primary mr-2"
                                            >
                                                <i class="fas fa-light fa-pen"></i>
                                            </button>

                                            <button
                                                @click="deleteArea(area.id)"
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
    name: "Areas",

    data() {
        return {
            searchValue: '',
            allAreas: [],
            links: [],
            newAreaInfo: [{
                maydon_nomi: '',
                maydon_lokatsiyasi: '',
                tuman_id: null,
            }],
            updateAreaInfo: [
                {
                    id: null,
                    maydon_nomi: '',
                    maydon_lokatsiyasi: '',
                    tuman_id: '',
                }
            ],
        }
    },

    created() {
        this.getAllAreas();
    },

    methods: {
        getAllAreas() {
            axios
                .get('/api/all-areas').then(res => {
                    this.allAreas = res.data.data;
                })
                .catch(err => {
                    console.log(err);
                })
        },

        searchArea() {
            axios
                .post('/api/search-area', {
                    query: this.searchValue
                })
                .then(res => {
                    this.allAreas = res.data.data;
                    console.log(this.allAreas)
                })
                .catch(err => {
                    console.log(err);
                    this.allAreas = [];
                })
        },

        addNewArea() {
            axios
                .post('/api/create-area', {
                    maydon_nomi: this.newAreaInfo[0].maydon_nomi,
                    maydon_lokatsiyasi: this.newAreaInfo[0].maydon_lokatsiyasi,
                    tuman_id: this.newAreaInfo[0].tuman_id,
                })
                .then(res => {
                    this.getAllAreas();
                })
                .catch(err => {
                    console.log(err);
                })
        },

        updateArea() {
            axios
                .put('/api/update-area/' + this.updateAreaInfo[0].id, {
                    maydon_nomi: this.updateAreaInfo[0].maydon_nomi,
                    maydon_lokatsiyasi: this.updateAreaInfo[0].maydon_lokatsiyasi,
                    tuman_id: this.updateAreaInfo[0].tuman_id,
                })
                .then(res => {
                    console.log(res.data)
                    this.getAllAreas();
                })
                .catch(err => {
                    console.log(err);
                })
        },

        deleteArea(id) {
            if(!confirm('Are you sure?')) return false;

            axios
                .delete('/api/delete-area/' + id)
                .then(res => {
                    this.getAllAreas();
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
