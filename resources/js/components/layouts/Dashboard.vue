<template>
    <div class="mt-15">
        <router-view></router-view>
    </div>
</template>

<script>

import {mapGetters} from 'vuex'
export default {
    name:"dashboard-layout",
    data(){
        // return {
        //     user:this.$store.state.auth.user,
        // }
        return{
            // authenticated: null,
            // user: null,
        }
    },
    computed: {
      ...mapGetters({
        authenticated: "auth/authenticated",
        user: "auth/user",
        role: "auth/getRole"
      }),
    },
    mounted () {
    if (this.role == 1) {
      this.$router.push({name:'dashboard.admin'}).catch(()=>{})
    } else if (this.role == 2){
      this.$router.push({name:'dashboard.user'}).catch(()=>{})
    }
    else if (this.role == 3){
      this.$router.push({name:'dashboard.employee'}).catch(()=>{})
    }
  }
    
}
</script>
