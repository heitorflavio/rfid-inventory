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
                        <div v-if="mensagem" class="alert alert-success">
                          <div class="d-flex justify-content-center">
                            {{ mensagem }}
                          </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <form action="/produtos/cadastro" method="post" enctype="multipart/form-data">
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
                                                            <label for="nome">Nome</label>
                                                            <input type="text" class="form-control" id="nome" name="nome"
                                                                required />
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="modelo">Modelo</label>
                                                            <input type="text" class="form-control" id="modelo"
                                                                name="modelo" required />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <!-- <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="time">Tempo de Proficiência</label>
                                                            <input type="text" class="form-control" id="time" name="time"
                                                                required />
                                                        </div>
                                                    </div> -->
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <label for="categoria">Categoria</label>
                                                            <!-- <select class="form-control" id="categoria" name="categoria"
                                                                required>
                                                                <option value="1">Categoria 1</option>
                                                                <option value="2">Categoria 2</option>
                                                                <option value="3">Categoria 3</option>
                                                                <option value="4">Categoria 4</option>
                                                                <option value="5">Categoria 5</option>
                                                            </select> -->
                                                            <input type="text" class="form-control" id="categoria"
                                                                name="categoria">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <label for="subcategoria">Subcategoria</label>
                                                            <!-- <select class="form-control" id="subcategoria"
                                                                name="subcategoria" required>
                                                                <option value="1">Subcategoria 1</option>
                                                                <option value="2">Subcategoria 2</option>
                                                                <option value="3">Subcategoria 3</option>
                                                                <option value="4">Subcategoria 4</option>
                                                                <option value="5">Subcategoria 5</option>
                                                            </select> -->
                                                            <input type="text" class="form-control" id="subcategoria"
                                                                name="subcategoria">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="custom-file">Foto</label>
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="customFile"
                                                                    name="image" @change="onFileChange" />
                                                                <label class="custom-file-label" for="customFile">Choose
                                                                    file</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">


                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <label for="marca">Marca</label>
                                                            <!-- <select class="form-control" id="marca" name="marca" required>
                                                                <option value="1">Marca 1</option>
                                                                <option value="2">Marca 2</option>
                                                                <option value="3">Marca 3</option>
                                                                <option value="4">Marca 4</option>
                                                                <option value="5">Marca 5</option>
                                                            </select> -->
                                                            <input type="text" class="form-control" id="marca" name="marca">
                                                        </div>



                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <label for="valor">Valor</label>
                                                            <input type="text" class="form-control" id="valor" name="valor"
                                                                v-model="valor" required />
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <label for="sku">sku</label>
                                                            <input type="text" class="form-control" id="estoque" name="sku"
                                                                required />
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <label for="tipo">Unidade de Medida</label>
                                                            <select class="form-control" id="tipo" name="unidade" required>
                                                                <option value="NENHUM">SELECIONAR</option>
                                                                <option value="METRO">METRO</option>
                                                                <option value="UNIDADE">UNIDADE</option>
                                                                <option value="KG">KG</option>
                                                                <option value="LITRO">LITRO</option>
                                                                <option value="CAIXA">CAIXA</option>
                                                                <option value="PACOTE">PACOTE</option>
                                                                <option value="ROLO">ROLO</option>
                                                                <option value="KIT">KIT</option>
                                                                <option value="CONJUNTO">CONJUNTO</option>
                                                                <option value="JOGO">JOGO</option>
                                                                <option value="PAR">PAR</option>
                                                                <option value="BARRA">BARRA</option>
                                                                <option value="LATA">LATA</option>
                                                                <option value="BLOCO">BLOCO</option>
                                                                <option value="FARDO">FARDO</option>
                                                                <option value="SACO">SACO</option>
                                                                <option value="GALAO">GALÃO</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <textarea name="descricao" id="description" cols="30" rows="4"
                                                            class="form-control" placeholder="Descrição" required></textarea>
                                                    </div>
                                                </div>
                                                <div class="row mt-2">
                                                    <div class="col-sm-12">
                                                        <img :src="image" alt="image" class="img-thumbnail"
                                                            style="width: 100px" v-if="image" />
                                                        <img src="img/default-img.png" alt="image" class="img-thumbnail"
                                                            style="width: 100px" v-else />
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
           <Footer />
        </div>
        <!-- ./wrapper -->

        <!-- REQUIRED SCRIPTS -->
    </div>
</template>

<!-- <script setup>
 import { vMaska } from "maska";
</script> -->

<script>
import Sidebar from "@/Components/Sidebar.vue";
import Footer from '@/Components/Footer.vue'
import moment from "moment";
import axios from 'axios'
export default {
    name: "CadastroProdutos",
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
        msg: {
            type: String,
        }
    },
    data() {
        return {
            image: null,
            valor: null,
            mensagem: ""
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
    mounted() {
        this.mensagem = this.msg
        setTimeout(() => {
         this.mensagem = ""   
        },5000)
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