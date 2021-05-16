<template>

  <div class="tout ">
    <div class="row">
      <div class="col-md-5">
        <b-icon icon="list-ul" font-scale="2" class="icon" v-b-toggle.sidebar-1>Toggle Sidebar</b-icon>
        <b-sidebar id="sidebar-1" visible="true" no-close-on-esc title="" shadow>

          <div>
            <b-nav vertical >
              <b-nav-item   @click="componentType='profile'" active>Manage users( liste users avec actions)</b-nav-item>
              <b-nav-item  @click="componentType='profile'">Manage RDVs(liste rdvs avec actions)</b-nav-item>
              <b-nav-item  @click="componentType='profile'">Manage Agents(liste agents)</b-nav-item>
              <b-nav-item disabled>Disabled</b-nav-item>
              
            </b-nav>
          </div>

        </b-sidebar>
      </div>
      <div>
        <h1>Admin dashboard</h1>
          <div v-if="componentType"  >
                    <keep-alive>
                        <component :is="componentType"></component>
                    </keep-alive>
                </div>
      </div>

    </div>
  </div>

</template>
<script>
  export default {
  data () {
    return {
       componentType: ""
    }
  },
    components: {

    }

  }
</script>
<style scoped>
  .tout {
    display: flex;
    flex-direction: column;
  }

  .siz {
    width: 100%;
  }
  .icon{
    float: left;
  }
</style>