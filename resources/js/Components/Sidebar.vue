<template>
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link d-flex justify-content-center">
      <!-- <img src="" alt="AdminLTE Logo" class=" " style="opacity: .8"> -->
      <h3>🆂🆃🆁🅵</h3>
    </a>

    <!-- Sidebar -->
    <div class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-transition os-host-scrollbar-horizontal-hidden">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 ">
        <div class="image">
          <img :src="url + 'img/avatar/avatar2.jpeg'" alt="User Image" class="img-circle elevation-2">
        </div>
        <div class="info">
          <div class="">
            <a href="#" class="d-block" id="name-user">{{ user.name }}</a>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->

          <li class="nav-item">
            <a href="/" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p class="text">Dashboard</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/produtos" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p class="text">Produtos</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/tags" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p class="text">Tags</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/relatorio" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p class="text">Relatório</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/users" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p class="text">Usuários</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/logout" class="nav-link">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p class="text">Sair</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
</template>
  
<script>
export default {
  name: "Sidebar",
  props: {
    user: Object,
  },
  data() {
    return {
      url: window.location.origin + "/"
    }
  },
  methods: {
    name: function () {
      return this.user.name.charAt(0);
    }
  }
};
</script>
  
<style scoped>
#name-user {
  text-decoration: none;
}

.sidebar {

  overflow-y: auto !important;
  margin-right: 0;
  -webkit-transition: all 0.3s !important;
  -moz-transition: all 0.3s !important;
  -ms-transition: all 0.3s !important;
  -o-transition: all 0.3s !important;
}
</style>