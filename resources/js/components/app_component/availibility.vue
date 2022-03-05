<template>
  <div>
    <h6 class="text-center">Availability</h6>
    <div
      class="
        manage-time
        d-flex
        flex-row
        align-items-center
        justify-content-around
        mx-5
      "
    >
      <v-switch v-model="available" inset></v-switch>
      <div class="time-chip">
        <v-chip v-if="available" color="green"> Available For Work </v-chip>
        <v-chip v-if="!available" color="red"> Not Taking Work </v-chip>
      </div>
    </div>

    <div
      class="
        manage-job
        d-flex
        flex-row
        align-items-center
        justify-content-around
      "
    >
      <h6 class="text-center my-0">Edot number of jobs at same time</h6>
      <v-dialog v-model="dialog" width="1000">
        <template v-slot:activator="{ on, attrs }">
          <v-btn v-bind="attrs" v-on="on" outlined color="indigo" small icon>
            <v-chip> 2 </v-chip>
          </v-btn>
        </template>

        <v-card>
          <v-card-title class="text-h5 grey lighten-2">
            No of jobs at the same time
          </v-card-title>

          <AvailabilityForm />

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
  </div>
</template>

<script>
import AvailabilityForm from '../app_component/availibilityForm.vue'

export default {
  
  name: "Availability",
  props: {},
  components: {
    AvailabilityForm,
  },
  data() {
    return {
      user: this.$store.state.auth.user,
      available: false,
      dialog: false,
    };
  },
};
</script>

<style>
</style>