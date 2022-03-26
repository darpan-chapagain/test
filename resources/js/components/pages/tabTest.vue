<template>
  <div id="app m-5">
    <v-form v-model="valid" ref="form3" lazy-validation @submit.prevent="">
      <h3>Publish your Profile</h3>
      <div class="image d-flex flex-column">
        <div class="avatar mx-auto">
          <v-avatar color="orange" size="80">
            <v-img v-if="image" :src="url"></v-img>
            <span v-else class="white--text text-h3">U</span>
          </v-avatar>
        </div>
        <div>
          <v-file-input
            cols="8"
            :rules="rules"
            accept="image/png, image/jpeg, image/bmp"
            placeholder="Pick an avatar"
            prepend-icon="mdi-camera"
            label="Avatar"
            v-model="image"
          ></v-file-input>
        </div>
      </div>
      <v-text-field
        v-model="title"
        :counter="10"
        :rules="titleRules"
        label="Address"
        required
      ></v-text-field>
      <v-text-field
        v-model="title"
        :counter="10"
        :rules="titleRules"
        label="City"
        required
      ></v-text-field>
      <v-text-field
        v-model="title"
        :counter="10"
        :rules="titleRules"
        label="Province"
        required
      ></v-text-field>
      <v-text-field
        v-model="title"
        :counter="10"
        :rules="titleRules"
        label="Phone Number"
        required
      ></v-text-field>

      <v-btn
        :disabled="!valid"
        color="success"
        class="mr-4"
        @click="validate('skills')"
        @click.native="steps(step)"
      >
        Choose Budget
      </v-btn>
      <v-btn text @click.native="stepBack(step)">Previous</v-btn>
    </v-form>
  </div>
</template>

<script>
export default {
  methods: {
    changeTab() {
      this.tab = "tab-2";
    },
    changeTab2() {
      this.tab = "tab-1";
    },
  },
  data() {
    return {
      tab: "tab-1",
    };
  },
};
</script>

<style>
</style>