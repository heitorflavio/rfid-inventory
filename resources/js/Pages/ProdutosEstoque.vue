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
                                    <form>
                                        <div class="card-header">
                                            <div class="d-flex justify-content-between">
                                                <h4>Adicionar Produtos</h4>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="col-sm-12">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="nome">Nome</label>
                                                            <input type="text" class="form-control" id="nome" name="nome"
                                                                disabled v-model="produto.nome" required />
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-group">
                                                            <label for="modelo">Modelo</label>
                                                            <input type="text" class="form-control" id="modelo" disabled
                                                                v-model="produto.descricao" name="modelo" required />
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-group">
                                                            <label for="sku">sku</label>
                                                            <input type="text" class="form-control" id="estoque" name="sku"
                                                                disabled v-model="produto.sku" required />
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-group">
                                                            <label for="marca">Marca</label>
                                                            <!-- <select class="form-control" id="marca" name="marca" required>
                                                                <option value="1">Marca 1</option>
                                                                <option value="2">Marca 2</option>
                                                                <option value="3">Marca 3</option>
                                                                <option value="4">Marca 4</option>
                                                                <option value="5">Marca 5</option>
                                                            </select> -->
                                                            <input type="text" class="form-control" id="marca" name="marca"
                                                                disabled v-model="produto.marca">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6"></div>
                                                    <div class="col-sm-6">
                                                        <div class="table-responsive">
                                                            <table class="table table-hover ">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col">#</th>
                                                                        <th scope="col">ADICIONAR</th>
                                                                        <th scope="col">HASH</th>
                                                                        <th scope="col">ADICIONADO POR</th>
                                                                        <th scope="col">ADICIONADO EM</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr v-for="tag in tags" :key="tag.id">
                                                                        <th scope="row">{{ tag.id }}</th>
                                                                        <th>
                                                                            <input type="checkbox" @click="add(tag.hash)">
                                                                        </th>
                                                                        <td>{{ tag.hash }}</td>
                                                                        <td>{{ tag.name }}</td>
                                                                        <td>{{ mask(tag.created_at) }}</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row mt-2">
                                                    <div class="col-sm-12">
                                                        <img :src='image' alt="logo" class="img-thumbnail"
                                                            style="width: 100px" />

                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="card-footer">
                                            <div class="d-flex justify-content-end">
                                                <button type="button" @click="produtoPost()"
                                                    class="btn btn-primary">Cadastrar</button>
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
           
<script>
import Sidebar from "@/Components/Sidebar.vue";
import Footer from '@/Components/Footer.vue'
import moment from "moment";
import axios from 'axios'
export default {
    name: "ProdutosEstoque",
    components: {
        Sidebar,
        Footer
    },
    props: {
        user: {
            type: Object,
            required: true
        },
        produto: {
            type: Object,
        },
        tags: {
            type: Array,
        }
    },
    data() {
        return {
            image: null,
            hashs: [],
            url: window.location.origin + "/"
        };
    },
    methods: {
        mask: function (data) {
            return moment(data).format("DD/MM/YYYY HH:mm:ss");
        },
        add: function (val) {

            this.hashs.push(val)
            console.log(this.hashs)
        },
        produtoPost: function () {
            axios.post('/produtos/estoque/' + this.produto.id, {
                tags: this.hashs,
                produto_id: this.produto.id,

            }).then(response => {
                console.log(response)
                window.location.reload();

            })
        }
        // add(val) {
        //     this.hashs[val] = val
        //     console.log(this.hashs)
        // }
    },
    created() {

    },
    mounted() {
        if (this.produto.imagem) {
            this.image = this.url + this.produto.imagem
        } else {
            this.image = this.url + 'img/produtos/default.png'
        }
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