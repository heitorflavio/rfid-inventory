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
                                    <li class="breadcrumb-item active">Produtos</li>
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
                            <div class="col-sm-12 col-xl-12 col-md-12 col-xs-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="d-flex justify-content-between">
                                            <h4>Produtos</h4>
                                            <div class="card-tools">
                                                <a href="/produtos/cadastro" class="btn btn-link" >
                                                    CADASTRAR
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover ">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">LOGO</th>
                                                        <th scope="col">NOME</th>
                                                        <th scope="col">MARCA</th>
                                                        <th scope="col">PREÇO</th>
                                                        <th scope="col">ESTOQUE</th>
                                                        <th scope="col">VER</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr v-for="produto in produtos" :key="produto.id">
                                                        <th scope="row">{{ produto.id }}</th>
                                                        <td>
                                                            <img :src="produto.imagem" alt="logo" class="img-thumbnail" v-if="produto.imagem"
                                                                style="width: 50px" />
                                                                <img :src=" url + 'img/produtos/default.png' " alt="logo" class="img-thumbnail" v-else
                                                                style="width: 50px" />
                                                        </td>
                                                        <td>{{ produto.nome }}</td>
                                                        <td>{{ produto.marca }}</td>
                                                        <td>{{ ValorMask(produto.preco) }}</td>
                                                        <td>{{ produto.estoque }}</td>

                                                        <!-- <td>{{ mask(produto.updated_at) }}</td> -->
                                                        <td>
                                                            <a class="btn btn-link" :href="'/produtos/edita/'+ produto.id">
                                                                ver
                                                            </a>
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

        <!-- REQUIRED SCRIPTS -->
    </div>
</template>
           
<script>
import Sidebar from "@/Components/Sidebar.vue";
import Footer from '@/Components/Footer.vue'
import moment from "moment";
import axios from 'axios'
export default {
    name: "Produtos",
    components: {
        Sidebar,
        Footer
    },
    props: {
        user: {
            type: Object,
            required: true
        },
        produtos: {
            type: Array,
        },
    },
    data() {
        return {
           url: window.location.origin + "/"
        };
    },
    methods: {
        mask: function (data) {
            return moment(data).format("DD/MM/YYYY HH:mm:ss");
        },
        ValorMask: function (val) {
            return val.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
        }
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
</style>