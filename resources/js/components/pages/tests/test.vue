<template>
  <v-container fluid m-5>
    <form>
      <v-combobox
        v-model="model"
        :items="items"
        :search-input.sync="search"
        hide-selected
        hint="Maximum of 5 tags"
        label="Add some tags"
        multiple
        persistent-hint
        small-chips
      >
        <template v-slot:no-data>
          <v-list-item>
            <v-list-item-content>
              <v-list-item-title>
                No results matching "<strong>{{ search }}</strong
                >". Press <kbd>enter</kbd> to create a new one
              </v-list-item-title>
            </v-list-item-content>
          </v-list-item>
        </template>
      </v-combobox>
      <v-btn class="mr-4" @click="submit"> submit </v-btn>
    </form>
  </v-container>
</template>


<script>
export default {
  data: () => ({
    items: ['test', 'test2', '3', '4', '5', '6'],
    skill: [],
    search: null,
  }),

  watch: {
    model (val) {
      if (val.length > 5) {
        this.$nextTick(() => this.model.pop())
      }
    },
  },
  methods: {
    async getSkill() {
      // this.$axios.get(`/api/job`)
      // const skill_data = []
      // for(var i in res){
      //     skill_data.push([i, res[i]])
      //     console.log(res[i])

      // }
      const res = await axios.get("api/skill");
      let skill_data = [];
      for (let i = 0; i < res.data.length; i++) {
        // console.log(res.data[i].skill);
        this.items.push(res.data[i].skill);
      }
    },
    async postSkill(val) {
      await axios.post(`api/jobs_skill`, {
        skill: val,
      });
    },
    submit() {
      console.log(this.skill);
      Object.entries(this.skill).forEach(([key, value]) => {
        console.log(key, value);
        this.postSkill(String(value));
      });
    },
  },
  created() {
    // const res = await axios.get('api/skill')
    //     let skill_data = []
    //     for(let i = 0; i<res.data.length; i++){
    //         // console.log(res.data[i].skill);
    //         this.items.push(res.data[i].skill)
    //     }
    // this.getSkill();
  },
};
</script>

<style>
</style>
