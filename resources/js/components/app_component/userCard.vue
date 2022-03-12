<template>
  <v-card :loading="loading" class="mx-auto my-12" max-width="374">
    <template slot="progress">
      <v-progress-linear
        color="deep-purple"
        height="10"
        indeterminate
      ></v-progress-linear>
    </template>

    <v-img
      height="250"
      src="https://cdn.vuetifyjs.com/images/cards/cooking.png"
    ></v-img>

    <v-card-title>Employee Name</v-card-title>

    <v-card-text>
      <v-row align="center" class="">
        <v-col cols="4">
          <v-rating
            :value="4.5"
            color="amber"
            dense
            readonly
            size="14"
          ></v-rating>
          4 (1111)
        </v-col>
        <!-- <v-col cols="4">
          <div class="grey--text ms-4">4</div>
        </v-col> -->

        <v-col cols="8">
          <div class="grey--text ms-4">
            <v-chip outlined color="green" class="m-1">
              <v-icon class="p-1">mdi-cash</v-icon>
              $20</v-chip
            >
          </div>
        </v-col>
      </v-row>

      <div class="my-4 text-subtitle-1">Job Category</div>

      <div>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam,
        minima!.
      </div>
    </v-card-text>

    <v-divider class="mx-4"></v-divider>

    <v-card-title>Skills</v-card-title>

    <v-card-text>
      <v-chip-group v-model="selection" column>
        <v-chip>Skill 1</v-chip>

        <v-chip>Skill 2</v-chip>

        <v-chip>Skill 3</v-chip>
      </v-chip-group>
    </v-card-text>
    <v-card-actions>
      <v-btn color="deep-purple lighten-2" text @click="reserve">
        Visit Profile
      </v-btn>
    </v-card-actions>
  </v-card>
</template>

<script>
export default {
  name: "UserCard",
  data: () => ({
    loading: false,
  }),

  methods: {
    reserve() {
      this.loading = true;

      setTimeout(() => (this.loading = false), 2000);
    },
  },
};
</script>

<style>
</style>