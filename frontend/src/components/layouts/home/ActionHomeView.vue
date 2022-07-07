<template>
  <div>
    <form class="p-2">
      <div class="form-row">
        <div class="w-100 d-flex justify-content-center">
          <div class="m-1 col-7">
            <input type="text" class="form-control" placeholder="Empresa">
          </div>
          <div class="m-1 col">
            <input type="text" class="form-control" placeholder="Unidade">
          </div>
        </div>
        <div class="d-flex justify-content-center">
          <div class="m-1 col col-4">
            <input type="date" class="form-control">
          </div>
          <p class="p-1 m-2">até</p>
          <div class="m-1 col col-4">
            <input type="date" class="form-control">
          </div>
        </div>
      </div>
      <button 
        class="btn btn-outline-primary m-3">
          Alugar
      </button>
    </form>
  </div>
</template>

<script>
export default {
  name: "ActionHomeView",
};
</script>

<style></style>
