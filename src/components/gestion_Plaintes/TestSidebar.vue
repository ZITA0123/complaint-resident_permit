<template>
   
<div class="tout container">
    <div class="row">
          <div class="col-md-6">
            <b-icon icon="list-ul" v-b-toggle.sidebar-1>Toggle Sidebar</b-icon>
            <b-sidebar id="sidebar-1" 
             visible="true" 
             no-close-on-esc
              title="Sidebar" shadow>
              <div class="px-3 py-2">
                <p>
                  Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis
                  in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.
                </p>
                <b-img src="https://picsum.photos/500/500/?image=54" fluid thumbnail></b-img>
              </div>
            </b-sidebar>
          </div>
          <div class="hea col-md-6">
              <appHeader class="siz"></appHeader>
          </div>
    </div>
</div>

</template>
<script>
import appHeader from '../dashboard/pages/ProfileHeader'
export default {
    components:{
        appHeader
    }
    
}
</script>
<style scoped>
.tout{
    display: flex;
    flex-direction: column;
}
.siz{
    width: 100%;
}
</style>