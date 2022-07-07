<template>
  <div class="border rounded">
    <table class="table table-striped">
      <thead>
        <tr>
          <th class="col-1" scope="col">TAG</th>
          <th scope="col">Empresa</th>
          <th scope="col">Inicio</th>
          <th scope="col">Devolução</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">KA4{{ item.id }}-659487</th>
          <td>{{ item.client }}</td>
          <td>12/06/2021</td>
          <td>12/07/2021</td>
        </tr>
        <tr>
          <th scope="row">KA4{{ item.id }}-659487</th>
          <td>{{ item.client }}</td>
          <td>12/06/2021</td>
          <td>12/07/2021</td>
        </tr>
        <tr>
          <th scope="row">KA4{{ item.id }}-659487</th>
          <td>{{ item.client }}</td>
          <td>12/06/2021</td>
          <td>12/07/2021</td>
        </tr>
        <tr>
          <th scope="row">KA4{{ item.id }}-659487</th>
          <td>{{ item.client }}</td>
          <td>12/06/2021</td>
          <td>12/07/2021</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  name: "HistoricHome",
  props: {
    item: Object
  }
}
</script>
