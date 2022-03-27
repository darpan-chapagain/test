<template>
  <div>
    <v-divider />
    <div class="jobs p-5">
      <h5>{{a_job.title}}</h5>
      <div class="attributes">
        <v-chip outlined color="green" class="m-1">
          <v-icon class="p-1">mdi-cash</v-icon>
          ${{ a_job.salary_offered }}</v-chip
        >
        <v-chip outlined class="m-1">
          <v-icon class="p-1">mdi-brain</v-icon>
          {{ a_job.experience }}
        </v-chip>
        <v-chip outlined class="m-1">
          <v-icon class="p-1">mdi-clock-time-four-outline</v-icon>
          Est. Time</v-chip
        >
      </div>
      <v-divider></v-divider>
      <div class="description">
        {{ a_job.description }}
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
            <ApplyJob 
              :a_job_detail="a_job"
            />
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
  props: {
    a_job: Object,
  },
  data() {
    return {
      dialog: false,
      notifications: false,
      sound: true,
      widgets: false,
      value: null,
    };
  },
};
</script>

<style>
</style>