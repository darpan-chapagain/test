<template>
  <div class="my-services">
    <div
      class="
        title-btn
        manage-job
        d-flex
        flex-row
        align-items-center
        justify-content-around
      "
    >
      <h6>My Job Categories</h6>
      <v-dialog v-model="dialog" width="1000">
        <template v-slot:activator="{ on, attrs }">
          <v-btn v-bind="attrs" v-on="on" outlined color="indigo" small fab>
            <v-icon>mdi-pencil</v-icon>
          </v-btn>
        </template>

        <v-card>
          <v-card-title class="text-h5 grey lighten-2">
            My Job Categories
          </v-card-title>

          <MyJobCategory />

          <v-divider></v-divider>

          <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn color="primary" text @click="dialog = false">
              Close
            </v-btn>
          </v-card-actions>
        </v-card>
      </v-dialog>
    </div>
    <div class="services mt-5 ml-5">
      <div class="skills" style="margin:0 5%;">
        <v-chip class="m-1"> cat-title </v-chip>
        <v-chip class="m-1"> cat-title </v-chip>
        <v-chip class="m-1"> cat-title </v-chip>
        <v-chip class="m-1"> cat-title </v-chip>
      </div>
    </div>
  </div>
</template>

<script>
 import MyJobCategory from '../app_component/jobCategoryForm.vue'

export default { 
  name: "MyServices",
  components:{
    MyJobCategory,
  },
  data() {
    return {
      dialog: false,
    };
  },
};
</script>

<style>
</style>