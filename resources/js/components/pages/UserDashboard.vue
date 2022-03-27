<template>
  <div class="pt-5 m-6 main-container">
    <div class="p-5" style="display: flex; justify-content: center">
      <v-text-field
        label="Search"
        hide-details
        prepend-icon="mdi-magnify"
        single-line
        style="max-width: 600px"
      ></v-text-field>
    </div>
    <v-row class="dashboard-container">
      <v-col
        cols="12"
        sm="5"
        md="6"
        lg="2"
        order-md="1"
        order-sm="1"
        order-lg="1"
        order-xs="2"
      >
        <v-sheet rounded="lg" min-height="268">
          <!--  -->

          <v-card elevation="6" class="p-3">
            <h3>Filter</h3>
            <v-divider></v-divider>
            <FilterBy class="filter" />
          </v-card>
        </v-sheet>
      </v-col>

      <v-col
        cols="12"
        sm="12"
        md="12"
        lg="7"
        class="right-contents"
        order-md="3"
        order-sm="3"
        order-lg="2"
        order-xs="3"
      >
        <v-main>
          <v-container>
            <v-row>
              <h2 style="text-align: center">Find Employees!</h2>
              <v-col v-for="a_user in allUsers" :key="a_user.employee_id" cols="12" md="6" lg="4">
                <Users 
                  :a_user="a_user"
                />
              </v-col>
            </v-row>
          </v-container>
        </v-main>
      </v-col>

      <v-col
        cols="12"
        sm="7"
        md="6"
        lg="3"
        class="right-contents"
        order-md="2"
        order-sm="2"
        order-lg="3"
        order-xs="1"
      >
        <v-sheet rounded="lg" min-height="268">
          <!--  -->
          <v-card elevation="6" class="p-3">
            <div class="proposal-title">
              <h3 class="text-center">Job Requests</h3>
            </div>
            <v-divider></v-divider>
            <Requests />
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
import Requests from "../app_component/requests.vue";
import Users from "../app_component/userCard.vue";

export default {
  components: {
    FilterBy,
    Jobs,
    User,
    Requests,
    Users,
  },
  name: "dashboard",
  data() {
    return {
      allUsers: [],
    };
  },
  methods: {
    async fetchUsers() {
      const res = await axios.get("employee/all");

      const data = await res.data;

      return data;
    },
  },
  async created() {
    this.allUsers = await this.fetchUsers();
  },
};
</script>

<style scoped>
</style>
