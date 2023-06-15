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
                            <div class="col-12">
                                <div class="card">
                                    <form action="/users/cadastro" method="post" enctype="multipart/form-data">
                                        <div class="card-header">
                                            <div class="d-flex justify-content-between">
                                                <h4>Produtos</h4>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="name">Nome</label>
                                                            <input type="text" class="form-control" id="name" name="name"
                                                                required />
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="modelo">Email</label>
                                                            <input type="text" class="form-control" id="email"
                                                                name="email" required />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="nome">Senha</label>
                                                            <input type="password" class="form-control" id="password" name="password"
                                                                required />
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="nome">Tag</label>
                                                            <input type="text" class="form-control" id="tag" name="tag"
                                                                required />
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
           <Footer />
        </div>
    </div>
</template>
<script>
import Sidebar from "@/Components/Sidebar.vue";
import Footer from '@/Components/Footer.vue'
import moment from "moment";
import axios from 'axios'
export default {
    name: "CadastroUsers",
    components: {
        Sidebar,
        Footer
    },
    props: {
        user: {
            type: Object,
            required: true
        },
        users: {
            type: Array,
        },
    },
    data() {
        return {
            image: null,
            valor: null,
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
        formatCurrency(value) {
            const parts = value.split(".");
            parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            return parts.join(",");
        }
    },
    watch: {
        valor(newValue, oldValue) {
            // Remove all non-numeric characters
            let numericValue = newValue.replace(/[^\d]/g, '');

            // Check if the value has not changed or if it's not a number
            if (numericValue === oldValue || isNaN(numericValue)) {
                return;
            }

            // Convert the numeric value to a number
            let number = parseFloat(numericValue);

            // Format the number as currency
            this.valor = new Intl.NumberFormat('pt-BR', { style: 'currency', currency: 'BRL' }).format(number / 100);
            
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
</style>