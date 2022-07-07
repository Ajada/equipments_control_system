<template>
  <div class="container-sm">
    <div class="p-2 d-flex justify-content-center mb-3">
      <div class="">
        <h3 class="font-weight-light">Meus Equipamentos</h3>
      </div>
      <div class="ms-5">
        <button class="btn btn-outline-primary">
          Adicionar
        </button>
      </div>
    </div>
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">Proprietário</th>
          <th scope="col">Nome</th>
          <th class="col" scope="col">TAG</th>
          <th scope="col">Status</th>
          <th scope="col">Registro</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>X Solution</td>
          <td>Multi Gás</td>
          <th scope="row">KA401-659487</th>
          <td class="success">não locado</td>
          <td>12/07/2021</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>



<style scoped lang="scss">
.success{
  background-color: lightgreen;
}

.warning{
  background-color: rgb(255, 255, 148);
}

.danger{
  background-color: lightcoral;
}
</style>
