<template>
  <div>
    <v-divider />
    <div class="jobs p-5">
      <h5>Job Title: Lorem ipsum dolor sit amet update.</h5>
      <div class="attributes">
        <v-chip outlined color="green" class="m-1">
          <v-icon class="p-1">mdi-cash</v-icon>
          Hourly/Price: $###</v-chip
        >
        <v-chip outlined class="m-1">
          <v-icon class="p-1">mdi-brain</v-icon>
          Skill Level
        </v-chip>
        <v-chip outlined class="m-1">
          <v-icon class="p-1">mdi-clock-time-four-outline</v-icon>
          Est. Time</v-chip
        >
      </div>
      <v-divider></v-divider>
      <div class="description">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Non, magni et
        ducimus cum eligendi similique corrupti porro quos nemo, veritatis atque
        quae facere totam odio harum hic excepturi quasi quam deleniti nostrum
        in voluptas, obcaecati delectus repellendus! Dolore fugiat architecto
        facere! Odit ...
      </div>

      <div class="dialog">
        <v-dialog
          v-model="dialog"
          fullscreen
          hide-overlay
          transition="dialog-bottom-transition"
        >
          <template v-slot:activator="{ on, attrs }">
            <v-card-actions>
              <v-spacer></v-spacer>
              <v-btn color="primary" dark v-bind="attrs" v-on="on">
                See Details
              </v-btn>
            </v-card-actions>
          </template>
          <v-card>
            <v-toolbar dark color="primary">
              <v-toolbar-title>Job Detail</v-toolbar-title>
              <v-spacer></v-spacer>
              <v-toolbar-items>
                <v-btn icon dark @click="dialog = false">
                  <v-icon>mdi-close</v-icon>
                </v-btn>
              </v-toolbar-items>
            </v-toolbar>
            <ApplyJob />
            <v-bottom-navigation :value="value" background-color="blue" grow>
              <v-btn icon @click="dialog = false">
                  <v-icon color="white">mdi-close</v-icon>
                </v-btn>
            </v-bottom-navigation>
          </v-card>
        </v-dialog>
      </div>
    </div>
  </div>
</template>

<script>
import ApplyJob from "./applyJob.vue";
export default {
  name: "AJob",
  components: {
    ApplyJob,
  },
  props: {},
  data() {
    return {
      dialog: false,
      notifications: false,
      sound: true,
      widgets: false,
    };
  },
};
</script>

<style>
</style>