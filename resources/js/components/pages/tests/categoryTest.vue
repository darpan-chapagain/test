<template>
  <div style="margin:500px">
    <v-autocomplete
      v-model="category"
      :items="categories"
      clearable
      hide-selected
      persistent-hint
      label="Job Category"
      dense
    ></v-autocomplete>
  </div>
</template>

<script>
export default {
  data() {
    return {
      categories: [],
      category: [],
    };
  },
  methods: {
    async getCategories() {
       const res = await axios.get("jobs/category");
      let skill_data = [];
      for (let i = 0; i < res.data.length; i++) {
        // console.log(res.data[i].skill);
        this.categories.push(res.data[i].category_name);
      }
    },
  },
  created () {
      this.getCategories();
  }
};
</script>

<style>
</style>