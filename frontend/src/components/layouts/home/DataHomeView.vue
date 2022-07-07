<template>
  <div class="ro g-0 d-flex mobile-container">
    <div class="col-md-4 img-container">
      <img
        src="../../../assets/mg.jpeg"
        class="img-fluid rounded-circle"
        alt="..."
      />
    </div>
    <div class="col-md-6 content-container bg-light">
      <div class="card-body">
        <h5 class="card-title p-1 border-bottom border-dark success-title">
          KA4{{ item.id }}-659487
        </h5>
        <p class="card-title">
          Proprietario:<strong>{{ item.owner + item.id }}</strong>
        </p>
        <p class="card-title">
          Locado Para: <strong>Engeman - {{ item.id }}</strong> <br/>
          <span class="card-title">Entregue: Dia/Mes/Ano <br/> Dias: 25</span>
        </p>
        <p class="card-text">
          <small class="text-muted"> Registrado: Dia/Mes/Ano </small>
        </p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "DataHomeView",
  props: {
    item: {
      type: Object,
    },
  },
};
</script>

<style scoped lang="scss">
.success-title {
  color: rgb(32, 218, 32);
  text-shadow: 5px 5px 15px rgba(32, 218, 32, 0.721);
}
.warning-title {
  color: rgb(218, 193, 32);
  text-shadow: 5px 5px 15px rgba(215, 218, 32, 0.721);
}
.danger-title {
  color: rgb(218, 32, 32);
  text-shadow: 5px 5px 15px rgba(218, 32, 32, 0.721);
}

.mobile-container {
  display: flex;
  flex-wrap: wrap;
  padding: 10px;

  .img-container {
    padding: 4px;
    width: 40%;

    img {
      margin-top: 50px;
      margin-bottom: 50px;
      width: 200px;
      height: 150px;
    }
  }
}

.content-container {
  width: 60%;
}

@media screen and(max-width: 1000px) {
  .mobile-container {
    display: flex;
    flex-wrap: wrap;
    width: 100%;
    padding: 5px;
  }
}

@media screen and(max-width: 800px) {
  .mobile-container {
    display: block;
    flex-wrap: nowrap;
    width: 100%;
    padding: 5px;

    .img-container {
      img {
        padding: 5px;
        height: 130px;
      }
    }
  }
}
</style>
