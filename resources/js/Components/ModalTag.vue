<template>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form :action="'/deletar/tag/' + id" method="post">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Motivo ? #{{ id }}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">

          <textarea name="motivo" id="" cols="30" rows="6" required></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-danger">Deletar</button>
      </div>
    </form>
    </div>
  </div>
</div>
</template>

<script>
export default {
  name: "ModalTag",
  props: {
    id: {
      type: Number,
      required: true
    }
}
}
</script>

<style>

</style>