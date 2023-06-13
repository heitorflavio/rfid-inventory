<template>
    <div class="hold-transition sidebar-mini">
        <div class="wrapper">
            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="index3.html" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <!-- <a href="#" class="nav-link">Contact</a> -->
                    </li>
                </ul>
            </nav>
            <!-- /.navbar -->

            <Sidebar :user="user" />
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6"></div>
                            <!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">Tags</li>
                                </ol>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->

                <!-- Main content -->
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="d-flex justify-content-between">
                                            <h4>Tags</h4>

                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover ">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">HASH</th>
                                                        <th scope="col">CADASTRADO POR</th>
                                                        <th scope="col">CADASTRADO EM</th>
                                                        <th scope="col">REMOVER</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr v-for="tag in tags" :key="tag.id">
                                                        <th scope="row">{{ tag.id }}</th>
                                                        <td>{{ tag.hash }}</td>
                                                        <td>{{ tag.name }}</td>
                                                        <td>{{ mask(tag.created_at) }}</td>
                                                        <td>
                                                            <!-- Button trigger modal -->
                                                            <div class="d-flex ml-4">
                                                                <button type="button" class="btn btn-sm" v-if="user.role == 1"
                                                                    @click="add(tag.id)"
                                                                    data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                                    <span class="icon">X</span>
                                                                </button>
                                                                <button type="button" class="btn btn-sm btn-link" v-else>
                                                                    <span class="icon2">X</span>
                                                                </button>
                                                            </div>

                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.container-fluid -->
                </div>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

            <!-- Control Sidebar -->

            <!-- /.control-sidebar -->

            <!-- Main Footer -->
            <Footer />
        </div>
        <!-- ./wrapper -->
        <Modal :id="id"/>
        <!-- REQUIRED SCRIPTS -->
    </div>
</template>
           
<script>
import Sidebar from "@/Components/Sidebar.vue";
import Footer from '@/Components/Footer.vue'
import Modal from '@/Components/ModalTag.vue'
import moment from "moment";
import axios from 'axios'
export default {
    name: "Tags",
    components: {
        Sidebar,
        Footer,
        Modal
    },
    props: {
        user: {
            type: Object,
            required: true
        },
        tags: {
            type: Array,
        },
    },
    data() {
        return {
            id: null,
        };
    },
    methods: {
        mask: function (data) {
            return moment(data).format("DD/MM/YYYY HH:mm:ss");
        },
        add: function (id) {
            this.id = id
        },
    },
    created() {

    },

};
</script>
           
<style scoped>
/* .btn-link {
    color: #007bff;
    text-decoration: none;
    background-color: transparent;
    border: none;
} */

.icon {
    color: red;
    text-decoration: solid;
    font-size: 20px;
    font-weight: 800;
}
.icon2 {
    color: black;
    text-decoration: solid;
    font-size: 20px;
    font-weight: 800;
}
</style>