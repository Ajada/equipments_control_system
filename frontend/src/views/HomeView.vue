<template>
  <div class="home">
    <div class="mobile-container">
      <div v-for="item in count" :key="item.id" class="container-for">
        <div :id="item.id" class="card card-container">
          <div class="card-header bg-white">
            <ul class="nav nav-tabs card-header-tabs">
              <li class="nav-item">
                <router-link
                  @click.native="componentId = 'DataHome'"
                  class="nav-link"
                  :to="'/' + item.id + '/data'"
                >
                  Dados
                </router-link>
              </li>
              <li class="nav-item">
                <router-link
                  @click.native="componentId = 'HistoricHome'"
                  class="nav-link"
                  :to="'/' + item.id + '/historic'"
                >
                  Histórico
                </router-link>
              </li>
              <li class="nav-item">
                <router-link
                  @click.native="componentId = 'ActionHome'"
                  class="nav-link"
                  :to="'/' + item.id + '/action'"
                >
                  Locar
                </router-link>
              </li>
            </ul>
          </div>
        </div>
        <div class="content">
          <transition name="slide" mode="out-in">
            <keep-alive>
              <component :is="componentId" v-bind="props(item)"> </component>
            </keep-alive>
          </transition>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
// import CardHeader from "@/components/_partials/CardHeaderHome.vue";
import DataHome from "@/components/layouts/home/DataHomeView.vue";
import HistoricHome from "@/components/layouts/home/HistoricHomeView.vue";
import ActionHome from "@/components/layouts/home/ActionHomeView.vue";
import events from "@/event-bus";

export default {
  components: {
    DataHome,
    HistoricHome,
    ActionHome,
  },
  name: "HomeView",
  data() {
    return {
      count: events.obj,
      componentId: "DataHome",
    };
  },
  methods: {
    props(obj) {
      return { item: obj };
    },
  },
};
</script>

<style scoped lang="scss">
a {
  font-weight: bold;
  color: #2c3e50;

  &.router-link-exact-active {
    color: #4442b9;
    // background-color: rgba(241, 252, 255, 0.673);
    text-shadow: 4px 0px 15px #4442b9;
  }
}

.slide-enter,
.slide-leave-to {
  transform: translate(-50px);
  opacity: 0;
}

.slide-enter-active,
.slide-leave-active {
  transition: all 0.3s;
}

.mobile-container {
  display: flex;
  flex-wrap: wrap;
  padding: 0px;
  margin-bottom: 5px;

  .container-for {
    width: 33%;
    max-height: 330px;
    padding: 5px;
    margin: 1px;

    .content{
      overflow-y: auto;
      max-height: 265px;
    }
  }
}

@media screen and(max-width: 1000px) {
  .mobile-container {
    display: flex;
    flex-wrap: wrap;
    width: 100%;
    padding: 5px;

    .container-for {
      width: 49%;
    }
  }
}

@media screen and(max-width: 800px) {
  .mobile-container {
    display: block;
    flex-wrap: nowrap;
    width: 100%;
    padding: 5px;

    .container-for {
      width: 100%;
    }

    .card-container {
      width: 100%;
      margin: 0;
    }
  }
}
</style>
