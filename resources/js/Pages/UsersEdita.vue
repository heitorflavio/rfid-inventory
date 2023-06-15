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
                                    <li class="breadcrumb-item active">User</li>
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
                        <div v-if="mensagem" class="alert alert-success">
                            <div class="d-flex justify-content-center">
                                {{ mensagem }}
                            </div>
                        </div>
                        <div v-if="erro" class="alert alert-danger">
                            <div class="d-flex justify-content-center">
                                {{ erro}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <form :action="'/users/edita/'+users.id" method="post" enctype="multipart/form-data">
                                        <div class="card-header">
                                            <div class="d-flex justify-content-between">
                                                <h4>Produto</h4>
                                                <div class="card-tools">
                                            </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="nome">Nome</label>
                                                            <input type="text" class="form-control" id="name" name="name" v-model="users.name"
                                                                required />
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="modelo">Email</label>
                                                            <input type="text" class="form-control" id="email" v-model="users.email"
                                                                name="modelo" disabled />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="nome">Senha</label>
                                                            <input type="password" class="form-control" id="password" name="password" v-model="users.password"
                                                                required />
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="modelo">Tag</label>
                                                            <input type="text" class="form-control" id="tag" v-model="users.tag"
                                                                name="tag" required />
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary">Cadastrar</button>
                                            </div>
                                        </div>
                                    </form>
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
            <footer class="main-footer">
                <strong>Copyright &copy; 2014-2021
                    <a href="https://adminlte.io">FARE</a>.</strong>
                All rights reserved.
                <div class="float-right d-none d-sm-inline-block"></div>
            </footer>
        </div>
        <!-- ./wrapper -->

        <!-- REQUIRED SCRIPTS -->
    </div>
   
    

</template>
         
<script setup>
 import { vMaska } from "maska";
</script>

<script>
import Sidebar from "@/Components/Sidebar.vue";
import moment from "moment";
import axios from 'axios'
export default {
    name: "EditaUsers",
    components: {
        Sidebar,
    },
    props: {
        user: {
            type: Object,
            required: true
        },
        users: {
            type: Object,
        },
        msg: {
            type: String,
        },
        error: {
            type: String,
        }
    },
    data() {
        return {
            image: null,
            url: window.location.origin + "/",
            mensagem: "",
            erro: "",
        };
    },
    methods: {
        onFileChange(e) {
            const file = e.target.files[0];
            this.image = URL.createObjectURL(file);
           
        },
        mask: function (data) {
            return moment(data).format("DD/MM/YYYY HH:mm:ss");
        },
        ValorMask: function () {
          
                // Remove all non-numeric characters
                let numericValue = this.produto.preco.replace(/[^\d]/g, '');

                // Check if the value has not changed or if it's not a number
                if (numericValue === oldValue || isNaN(numericValue)) {
                    return;
                }

                // Convert the numeric value to a number
                let number = parseFloat(numericValue);

                // Format the number as currency
                this.valor = new Intl.NumberFormat('pt-BR', { style: 'currency', currency: 'BRL' }).format(number/ 100);


        }
        
    },
    created() {

        console.log(this.users)
        // if (produto.image) {
        //     this.image = produto.image
        // }
       
    },
    mounted() {
        this.mensagem = this.msg
        setTimeout(() => {
            this.mensagem = ""
        }, 5000)

        this.erro = this.error
        setTimeout(() => {
            this.erro = ""
        }, 10000)
    }

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