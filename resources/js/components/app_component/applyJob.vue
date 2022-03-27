<template>
  <div>
    <v-container>
      <v-row class="dashboard-container">
        <v-col cols="12" sm="12">
          <v-sheet rounded="lg" min-height="300">
            <v-sheet elevation="6" class="p-1 m-4">
              <div class="job-title m-4 centre">
                <h3>{{a_job_detail.title}}</h3>
                <b-card-sub-title>User looking for employee</b-card-sub-title>
                <v-divider></v-divider>
              </div>

              <div class="job-description m-4">
                <div class="d-flex flex-row align-items-center">
                  <h5 class="text-center my-0 p-3">Description</h5>
                  <v-chip class="ma-2" color="blue" text-color="white">
                    category: {{ a_job_detail.job_category_id }}
                    <v-icon right> mdi-star </v-icon>
                  </v-chip>
                </div>
                <div
                  class="
                    description-attributes
                    d-flex
                    flex-row
                    align-items-center
                  "
                >
                  <p class="description p-2">
                    {{ a_job_detail.description }}
                  </p>
                </div>
                <div class="attributes">
                  <v-chip outlined color="green" class="m-1">
                    <v-icon class="p-1">mdi-cash</v-icon>
                    ${{ a_job_detail.salary_offered }}</v-chip
                  >
                  <v-chip outlined class="m-1">
                    <v-icon class="p-1">mdi-brain</v-icon>
                    {{ a_job_detail.experience }}
                  </v-chip>
                  <v-chip outlined class="m-1">
                    <v-icon class="p-1">mdi-clock-time-four-outline</v-icon>
                    Est. Time</v-chip
                  >
                </div>
                <v-divider></v-divider>
              </div>
              <div class="status m-4">
                <div class="status-detail d-flex flex-row align-items-center">
                  <h5 class="text-center my-0 p-3">Status:</h5>
                  <v-chip color="green"> Active </v-chip>
                  <!-- <v-chip color="red">
                    Not Taking Work
                  </v-chip> -->
                </div>
                <div class="m-3">
                  <b-card-sub-title>Proposals: 2</b-card-sub-title>
                </div>

                <v-divider></v-divider>
              </div>
              <div class="status m-4">
                <div class="status-detail">
                  <h5 class="my-0 p-3">Skills Required</h5>
                  <div class="attributes">
                    <v-chip class="m-1"> Skill</v-chip>
                    <v-chip class="m-1"> Skill </v-chip>
                    <v-chip class="m-1"> Skill</v-chip>
                    <v-chip class="m-1"> Skill</v-chip>
                    <v-chip class="m-1"> Skill </v-chip>
                    <v-chip class="m-1"> Skill</v-chip>
                  </div>
                </div>
              </div>
            </v-sheet>
          </v-sheet>
        </v-col>
        <v-col cols="12" sm="12" xs="12" md="6">
          <v-sheet rounded="lg" min-height="268">
            <v-sheet elevation="6" class="p-1 m-4" min-height="400">
              <div class="job-title m-4 centre">
                <h3>Client's Details</h3>
                <b-card-sub-title>{{ a_job_detail.user.first_name }} {{a_job_detail.last_name}}</b-card-sub-title>
                <v-divider></v-divider>
              </div>

              <div class="m-4">
                <div class="additional-user-detail">
                  <h5 class="my-0 p-3">Additional Details</h5>
                  <div class="attributes">
                    <v-list-item two-line>
                      <v-list-item-content>
                        <v-list-item-title>Phone No</v-list-item-title>
                        <v-list-item-subtitle>{{ a_job_detail.user.phone_no }}</v-list-item-subtitle>

                        <v-list-item-title>Address</v-list-item-title>
                        <v-list-item-subtitle>{{ a_job_detail.user.address }}</v-list-item-subtitle>

                        <v-list-item-title>Gender</v-list-item-title>
                        <v-list-item-subtitle>{{ a_job_detail.user.gender }}</v-list-item-subtitle>

                        <v-list-item-title>Email</v-list-item-title>
                        <v-list-item-subtitle
                          >{{ a_job_detail.user.email }}</v-list-item-subtitle
                        >
                      </v-list-item-content>
                    </v-list-item>
                  </div>
                </div>
              </div>
            </v-sheet>
          </v-sheet>
        </v-col>
        <v-col cols="12" sm="12" xs="12" md="6">
          <v-sheet rounded="lg" min-height="268">
            <v-sheet elevation="6" class="p-1 m-4" min-height="400">
              <div class="job-title m-4 centre">
                <h3>Think you have what it takes?</h3>
                <b-card-sub-title
                  >Apply or talk to the client!</b-card-sub-title
                >
                <v-divider></v-divider>
              </div>

              <div class="m-4">
                <div class="apply">
                  <h5 class="my-0">Send an application!</h5>
                  <b-card-sub-title>Send your application!</b-card-sub-title>
                </div>
                <v-btn class="m-2 mt-4" rounded color="primary" dark>Send application!</v-btn>
              </div>
              <div class="m-4">
                <div class="message">
                  <h5 class="my-0">Talk to the client!</h5>
                  <b-card-sub-title
                    >Send a message to client and discuss about the
                    job!</b-card-sub-title
                  >
                  <v-btn class="m-2 mt-4" rounded color="primary" dark>Send a message!</v-btn>
                </div>
              </div>
            </v-sheet>
          </v-sheet>
        </v-col>
      </v-row>
    </v-container>
  </div>
</template>

<script>
export default {
  name: "ApplyJob",
  props: {
    a_job_detail: Object,
  }
};
</script>

<style>
</style>