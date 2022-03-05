<template>
  <div class="user-details d-flex flex-column align-items-center">
    <v-avatar>
      <img :src="image" />
    </v-avatar>
    <div class="user-name m-2">
      <h5>{{ name }}</h5>
    </div>
  </div>
  <!-- https://cdn.vuetifyjs.com/images/john.jpg" alt="John -->
</template>

<script>
export default {
    name: "User",
    props:{
        name: String, 
        image: String,
    }
};
</script>

<style></style>
