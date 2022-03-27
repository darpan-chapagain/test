<template>
  <div class="pt-5 m-6 main-container">
    <div class="p-5" style="display:flex; justify-content: center">
      <v-text-field
        label="Search"
        hide-details
        prepend-icon="mdi-magnify"
        single-line
        style="max-width: 600px;"
      ></v-text-field>
    </div>
    <v-row class="dashboard-container">
      <v-col cols="12" sm="5" md="6" lg="3" order-md="1" order-sm="1" order-lg="1">
        <v-sheet rounded="lg" min-height="268">
          <!--  -->
          <v-card elevation="6" class="p-3">
            <User
              name="This is a good pic"
              image="https://cdn.vuetifyjs.com/images/john.jpg"
            />
            <v-divider></v-divider>
            <Availability class="test" />
            <v-divider></v-divider>
            <MyServices />
            
          </v-card>
        </v-sheet>
      </v-col>

      <v-col cols="12" sm="12" md="12" lg="7" class="right-contents" order-md="3" order-sm="3" order-lg="2">
        <v-sheet min-height="70vh" rounded="lg">
          <!--  -->
          <v-card elevation="6">
            <div class="title px-4 pt-5">
              <h1>Find Work</h1>
            </div>
            <v-divider />
            <div class="px-3 pt-4">
              Lorem ipsum dolor, sit amet consectetur adipisicing elit.
              Deserunt, rerum.
            </div>
            <Jobs
              :allJobs="allJobs"
             />
          </v-card>
        </v-sheet>
      </v-col>

      <v-col cols="12" sm="7" md="6" lg="2" class="right-contents" order-md="2" order-sm="2" order-lg="3">
        <v-sheet rounded="lg" min-height="268">
          <!--  -->
          <v-card elevation="6" class="p-3">
            <h3>Filter</h3>
            <v-divider></v-divider>
            <!-- <div class="filter">
                        <v-container fluid>
                            <p>{{ radios || 'Filter By' }}</p>
                            <v-radio-group
                            v-model="radios"
                            mandatory
                            >
                            <v-radio
                                label="Radio 1"
                                value="radio-1"
                            ></v-radio>
                            <v-radio
                                label="Radio 2"
                                value="radio-2"
                            ></v-radio>
                            </v-radio-group>
                        </v-container>
                    </div> -->
            <FilterBy class="filter"/>
          </v-card>
        </v-sheet>
        <v-sheet rounded="lg" min-height="268">
          <!--  -->
          <v-card elevation="6" class="p-3 mt-5">
            <div class="proposal-title">
              <h3 class="text-center">Proposals</h3>
            </div>
            <v-divider></v-divider>
            <Proposals />
          </v-card>
        </v-sheet>
      </v-col>
    </v-row>
  </div>
</template>

<script>
import FilterBy from "../app_component/filter.vue";
import Jobs from "../app_component/dashboardJob.vue";
import User from "../app_component/user.vue";
import Availability from "../app_component/availibility.vue";
import MyServices from "../app_component/myservices.vue";
import Proposals from "../app_component/proposals.vue";
import axios from 'axios';

export default {
  components: {
    FilterBy,
    Jobs,
    User,
    Availability,
    MyServices,
    Proposals,
  },
  name: "dashboard",
  data() {
    return {
      allJobs: []
    };
  },
  methods: {
    async fetchJobs(){
      const res = await axios.get('/jobs/all');
  
      const data = await res.data;

      return data;
    }
  }, 
  async created(){
    this.allJobs = await this.fetchJobs()
  }
};
</script>

<style scoped>

</style>
