<template>
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link d-flex justify-content-center">
      <!-- <img src="" alt="AdminLTE Logo" class=" " style="opacity: .8"> -->
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex justify-content-center align-content-center">
        <div class="image">
          <!-- <img src="" alt="User Image"> -->
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
              <i class="nav-icon fas fa-users"></i>
              <p class="text">Produtos</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/tags" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p class="text">Tags</p>
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
  }
};
</script>
  
<style scoped>
#name-user {
  text-decoration: none;
}
</style>