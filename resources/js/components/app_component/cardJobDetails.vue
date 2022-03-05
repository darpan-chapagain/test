<template>
  <v-sheet elevation="6" class="p-1 m-4">
    <div class="job-title m-4 centre">
      <h3>Title</h3>
      <b-card-sub-title>User looking for employee</b-card-sub-title>
      <v-divider></v-divider>
    </div>

    <div class="job-description m-4">
      <div class="d-flex flex-row align-items-center">
        <h5 class="text-center my-0 p-3">Description</h5>
        <v-chip class="ma-2" color="blue" text-color="white">
          category
          <v-icon right> mdi-star </v-icon>
        </v-chip>
      </div>
      <div class="description-attributes d-flex flex-row align-items-center">
        <p class="description p-2">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa odio,
          aspernatur aperiam harum tempore numquam sint voluptas, ullam
          distinctio incidunt iusto officiis ducimus impedit beatae dolorum
          dolorem commodi in atque similique consectetur eius. Quia doloremque
          in officia, reprehenderit placeat ducimus aliquid modi labore
          molestiae, alias laborum suscipit eos, cupiditate at!
        </p>
      </div>
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
</template>

<script>
export default {
    name: 'JobCard',
};
</script>

<style>
</style>