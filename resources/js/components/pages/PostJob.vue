<template>
  <!-- <div style="margin-top: 100px">
      
    <v-card class="mt-5">
        <div class="title p-3">
          <h2>Post Job</h2>
      </div>
        <v-stepper v-model="e1">
    <v-stepper-header>
      <v-stepper-step
        :complete="e1 > 1"
        editable
        step="1"
      >
        Name of step 1
      </v-stepper-step>

      <v-divider></v-divider>

      <v-stepper-step
        :complete="e1 > 2"
        editable
        step="2"
      >
        Name of step 2
      </v-stepper-step>

      <v-divider></v-divider>

      <v-stepper-step editable step="3">
        Name of step 3
      </v-stepper-step>
    </v-stepper-header>

    <v-stepper-items>
      <v-stepper-content step="1">
        <v-card
          class="mb-12"
          color="grey lighten-1"
          height="200px"
        ></v-card>

        <v-btn
          color="primary"
          @click="e1 = 2"
        >
          Continue
        </v-btn>

      </v-stepper-content>

      <v-stepper-content step="2">
        <v-card
          class="mb-12"
          color="grey lighten-1"
          height="200px"
        ></v-card>

        <v-btn
          color="primary"
          @click="e1 = 3"
        >
          Continue
        </v-btn>

        <v-btn text @click="e1 = 1">
          Back
        </v-btn>
      </v-stepper-content>

      <v-stepper-content step="3">
        <v-card
          class="mb-12"
          color="grey lighten-1"
          height="200px"
        ></v-card>

        <v-btn
          color="primary"
          @click="e1 = 1"
        >
          Continue
        </v-btn>

        <v-btn text @click="e1 = 2">
          Cancel
        </v-btn>
      </v-stepper-content>
    </v-stepper-items>
  </v-stepper>
    </v-card>
  </div> -->

  <div style="margin-top: 100px">
    <div id="app">
      <v-app>
        <v-main>
          <v-container>
            <v-stepper v-model="step">
              <v-stepper-header>
                <v-stepper-step step="1" :complete="step > 1"
                  >Job Info</v-stepper-step
                >

                <v-stepper-step step="2" :complete="step > 2"
                  >Skill</v-stepper-step
                >

                <v-stepper-step step="3" :complete="step > 3"
                  >Scope of Work</v-stepper-step
                >

                <v-stepper-step step="4" :complete="step > 4"
                  >Budget</v-stepper-step
                >
                <v-stepper-step step="5">Final</v-stepper-step>
              </v-stepper-header>
              <v-stepper-items>
                <v-stepper-content step="1">
                  <v-row>
                    <v-col cols="12" md="6">
                      <Images />
                    </v-col>
                    <v-col cols="12" md="6">
                      <div class="job-info">
                        <h3>Give Some Info to your Project</h3>
                        <v-form ref="form1" v-model="valid" lazy-validation>
                          <v-text-field
                            v-model="title"
                            :counter="10"
                            :rules="titleRules"
                            label="Name"
                            required
                          ></v-text-field>

                          <!-- <v-text-field
                        v-model="registration.email"
                        :rules="emailRules"
                        label="E-mail"
                        required
                      ></v-text-field> -->
                          <v-textarea
                            name="description"
                            filled
                            label="Description"
                            :rules="descriptionRule"
                            :counter="200"
                            auto-grow
                            v-model="description"
                            required
                            value="The Woodman set to work at once, and so sharp was his axe that the tree was soon chopped nearly through."
                          ></v-textarea>
                          <v-autocomplete
                            v-model="category"
                            :items="categories"
                            clearable
                            hide-selected
                            persistent-hint
                            label="Job Category"
                            :rules="categoryRule"
                            dense
                          ></v-autocomplete>
                          <v-btn
                            :disabled="!valid"
                            color="success"
                            class="mr-4"
                            @click="validate('info')"
                            @click.native="steps(step)"
                          >
                            Choose Skill
                          </v-btn>
                        </v-form>
                      </div>
                    </v-col>
                  </v-row>
                </v-stepper-content>
                <v-stepper-content step="2">
                  <!-- <v-form ref="form" v-model="valid" lazy-validation>
                      <h3>Scope of Work</h3>
                  <v-radio-group v-model="scope" row required :rules="scopeRule">
                    <v-radio label="Large" value="0"></v-radio>
                    <v-radio label="Medium" value="1"></v-radio>
                    <v-radio label="Small" value="2"></v-radio>
                  </v-radio-group>
                  <v-btn flat @click.native="step -= 1">Previous</v-btn>
                  <v-btn
                    :disabled="!valid"
                    color="success"
                    class="mr-4"
                    @click="validate"
                    @click.native="steps(step)"
                  >
                    Scoop of Work
                  </v-btn>
                  </v-form> -->
                  <!--                   
                  <v-row>
                    <v-col cols="12" md="6">
                      pic
                    </v-col>
                    <v-col cols="12" md="6">
                      
                    </v-col>
                  </v-row>

                   -->
                  <v-row>
                    <v-col cols="12" md="6"> <Images /> </v-col>
                    <v-col cols="12" md="6">
                      <v-form v-model="valid" ref="form2" lazy-validation>
                        <div class="scope m-4">
                          <h3>Scope of Work</h3>
                          <v-radio-group
                            v-model="scope"
                            :rules="[(v) => !!v || 'Item is required']"
                            row
                            required
                          >
                            <v-radio label="Large" value="0"></v-radio>
                            <v-radio label="Medium" value="1"></v-radio>
                            <v-radio label="Small" value="2"></v-radio>
                          </v-radio-group>
                        </div>
                        <div class="time m-4">
                          <h3>Time Estimation</h3>
                          <v-menu
                            ref="menu1"
                            v-model="menu1"
                            :close-on-content-click="false"
                            transition="scale-transition"
                            offset-y
                            max-width="290px"
                            min-width="auto"
                          >
                            <template v-slot:activator="{ on, attrs }">
                              <v-text-field
                                v-model="dateFormatted"
                                label="Date"
                                hint="MM/DD/YYYY format"
                                persistent-hint
                                prepend-icon="mdi-calendar"
                                :rules="[(v) => !!v || 'Date is required']"
                                v-bind="attrs"
                                @blur="date = parseDate(dateFormatted)"
                                v-on="on"
                              ></v-text-field>
                            </template>
                            <v-date-picker
                              v-model="date"
                              no-title
                              @input="menu1 = false"
                            ></v-date-picker>
                          </v-menu>
                        </div>
                        <div class="experience m-4">
                          <h3>Experience</h3>
                          <v-radio-group
                            v-model="experience"
                            :rules="[(v) => !!v || 'Please select experience']"
                            row
                            required
                          >
                            <v-radio label="Entry" value="0"></v-radio>
                            <v-radio label="Intermediate" value="1"></v-radio>
                            <v-radio label="Expert" value="2"></v-radio>
                          </v-radio-group>
                        </div>
                        <v-btn
                          :disabled="!valid"
                          color="success"
                          class="mr-4"
                          @click="validate('scopes')"
                          @click.native="steps(step)"
                        >
                          Choose Skill
                        </v-btn>
                        <v-btn text @click.native="stepBack(step)"
                          >Previous</v-btn
                        >
                      </v-form>
                    </v-col>
                  </v-row>
                </v-stepper-content>
                <v-stepper-content step="3">
                  <v-row>
                    <v-col cols="12" md="6"> <Images /> </v-col>
                    <v-col cols="12" md="6">
                      <v-form
                        v-model="valid"
                        ref="form3"
                        lazy-validation
                        @submit.prevent=""
                      >
                        <!-- <v-autocomplete
                      v-model="skill"
                      :items="items"
                      clearable
                      hide-selected
                      persistent-hint
                      label="Add Skills"
                      :rules="categoryRule"
                      dense
                      hint="Maximum of 5 tags"
                      multiple
                      small-chips
                    >
                    </v-autocomplete> -->
                        <div class="skills">
                          <v-autocomplete
                            v-model="skill"
                            :items="items"
                            clearable
                            hide-selected
                            persistent-hint
                            label="Skills"
                            :rules="[required]"
                            dense
                            multiple
                            required
                            small-chips
                          ></v-autocomplete>
                        </div>
                        <v-btn
                          :disabled="!valid"
                          color="success"
                          class="mr-4"
                          @click="validate('skills')"
                          @click.native="steps(step)"
                        >
                          Choose Budget
                        </v-btn>
                        <v-btn text @click.native="stepBack(step)"
                          >Previous</v-btn
                        >
                      </v-form>
                    </v-col>
                  </v-row> </v-stepper-content
                ><v-stepper-content step="4">
                  <v-row>
                    <v-col cols="12" md="6"> <Images /> </v-col>
                    <v-col cols="12" md="6">
                      <v-form v-model="valid" ref="form4" lazy-validation>
                        <div class="rates">
                          <div class="buttons my-auto p-3">
                            <v-btn class="mr-2" @click="types('hourly')"
                              >Hourly Rate</v-btn
                            >
                            <v-btn class="ml-2" @click="types('project')"
                              >Project Rate</v-btn
                            >
                          </div>

                          <div class="payment-inputs m-2">
                            <v-text-field
                              v-if="payment"
                              v-model="hourlyRate"
                              label="Hourly Rate"
                              placeholder="Enter Your Rate here"
                              outlined
                              clearable
                              type="number"
                              :rules="[(v) => !!v || 'Please Enter a price']"
                            ></v-text-field>
                            <v-text-field
                              v-if="!payment"
                              v-model="projectRate"
                              clearable
                              label="Project Rate"
                              placeholder="Enter Your Rate here"
                              outlined
                              type="number"
                              :rules="[(v) => !!v || 'Please Enter a price']"
                            ></v-text-field>
                          </div>
                        </div>
                        <v-btn text @click.native="stepBack(step)"
                          >Previous</v-btn
                        >
                        <!-- <v-btn color="primary" @click.prevent="submit">Save</v-btn> -->
                        <v-btn
                          :disabled="!valid"
                          color="success"
                          class="mr-4"
                          @click="validate('budget')"
                          @click.native="steps(step)"
                        >
                          Verify
                        </v-btn>
                      </v-form>
                    </v-col>
                  </v-row> </v-stepper-content
                ><v-stepper-content step="5">
                  <v-form v-model="valid" ref="form5" lazy-validation>
                    <div class="job-info">
                      <h3>Give Some Info to your Project</h3>
                      <v-text-field
                        v-model="title"
                        :counter="10"
                        :rules="titleRules"
                        label="Name"
                        required
                      ></v-text-field>

                      <!-- <v-text-field
                        v-model="registration.email"
                        :rules="emailRules"
                        label="E-mail"
                        required
                      ></v-text-field> -->
                      <v-textarea
                        name="description"
                        filled
                        label="Description"
                        :rules="descriptionRule"
                        :counter="200"
                        auto-grow
                        v-model="description"
                        required
                        value="The Woodman set to work at once, and so sharp was his axe that the tree was soon chopped nearly through."
                      ></v-textarea>
                      <v-autocomplete
                        v-model="category"
                        :items="categories"
                        clearable
                        hide-selected
                        persistent-hint
                        label="Job Category"
                        :rules="categoryRule"
                        dense
                      ></v-autocomplete>
                      <v-btn
                        :disabled="!valid"
                        color="success"
                        class="mr-4"
                        @click="validate('info')"
                        @click.native="steps(step)"
                      >
                        Choose Skill
                      </v-btn>
                    </div>
                    <div class="scope m-4">
                      <h3>Scope of Work</h3>
                      <v-radio-group
                        v-model="scope"
                        :rules="[(v) => !!v || 'Item is required']"
                        row
                        required
                      >
                        <v-radio label="Large" value="0"></v-radio>
                        <v-radio label="Medium" value="1"></v-radio>
                        <v-radio label="Small" value="2"></v-radio>
                      </v-radio-group>
                    </div>
                    <div class="time m-4">
                      <h3>Time Estimation</h3>
                      <v-menu
                        ref="menu1"
                        v-model="menu2"
                        :close-on-content-click="false"
                        transition="scale-transition"
                        offset-y
                        max-width="290px"
                        min-width="auto"
                      >
                        <template v-slot:activator="{ on, attrs }">
                          <v-text-field
                            v-model="dateFormatted"
                            label="Date"
                            hint="MM/DD/YYYY format"
                            persistent-hint
                            prepend-icon="mdi-calendar"
                            :rules="[(v) => !!v || 'Date is required']"
                            v-bind="attrs"
                            @blur="date = parseDate(dateFormatted)"
                            v-on="on"
                          ></v-text-field>
                        </template>
                        <v-date-picker
                          v-model="date"
                          no-title
                          @input="menu2 = false"
                        ></v-date-picker>
                      </v-menu>
                    </div>
                    <div class="experience m-4">
                      <h3>Experience</h3>
                      <v-radio-group
                        v-model="experience"
                        :rules="[(v) => !!v || 'Please select experience']"
                        row
                        required
                      >
                        <v-radio label="Entry" value="0"></v-radio>
                        <v-radio label="Intermediate" value="1"></v-radio>
                        <v-radio label="Expert" value="2"></v-radio>
                      </v-radio-group>
                    </div>
                    <div class="skills">
                      <v-autocomplete
                        v-model="skill"
                        :items="items"
                        clearable
                        hide-selected
                        persistent-hint
                        label="Skills"
                        :rules="[required]"
                        dense
                        multiple
                        required
                        small-chips
                      ></v-autocomplete>
                    </div>
                    <div class="rates">
                      <div class="buttons my-auto p-3">
                        <v-btn class="mr-2" @click="types('hourly')"
                          >Hourly Rate</v-btn
                        >
                        <v-btn class="ml-2" @click="types('project')"
                          >Project Rate</v-btn
                        >
                      </div>

                      <div class="payment-inputs m-2">
                        <v-text-field
                          v-if="payment"
                          v-model="hourlyRate"
                          label="Hourly Rate"
                          placeholder="Enter Your Rate here"
                          outlined
                          clearable
                          type="number"
                          :rules="[(v) => !!v || 'Please Enter a price']"
                        ></v-text-field>
                        <v-text-field
                          v-if="!payment"
                          v-model="projectRate"
                          clearable
                          label="Project Rate"
                          placeholder="Enter Your Rate here"
                          outlined
                          type="number"
                          :rules="[(v) => !!v || 'Please Enter a price']"
                        ></v-text-field>
                      </div>
                    </div>
                    <v-btn color="primary" @click.prevent="submit">Save</v-btn>
                  </v-form>
                </v-stepper-content>
              </v-stepper-items>
            </v-stepper>
          </v-container>
        </v-main>
      </v-app>

      <!-- <br /><br />Debug: {{ registration }} -->
    </div>
  </div>
</template>

<script>
import Images from "../app_component/bannerImage.vue";
export default {
  components: {
    Images,
  },
  data(vm) {
    return {
      valid: true,
      e1: 1,
      step: 1,
      sex: null,
      skill: null,
      categories: ["Programming", "Design", "Vue", "Vuetify"],
      scope: null,
      experience: null,
      payment: true,
      items: [],
      skill: [],
      category: [],
      description: null,
      title: null,
      search: null,
      hourlyRate: null,
      projectRate: null,
      titleRules: [
        (v) => !!v || "Job Title is required",
        (v) => (v && v.length <= 20) || "Name must be less than 20 characters",
      ],
      descriptionRule: [
        (v) => !!v || "Description required",
        (v) =>
          (v && v.length <= 20) ||
          "Description must be less than 200 characters",

        // (v) => /.+@.+\..+/.test(v) || "E-mail must be valid",
      ],
      categoryRule: [(v) => !!v || "Please select category"],
      scopeRule: [[(v) => !!v || "Scope is required"]],

      //for date
      date: new Date(Date.now() - new Date().getTimezoneOffset() * 60000)
        .toISOString()
        .substr(0, 10),
      //   dateFormatted: vm.formatDate(
      //     new Date(Date.now() - new Date().getTimezoneOffset() * 60000)
      //       .toISOString()
      //       .substr(0, 10)
      //   ),
      dateFormatted: null,
      menu1: false,
      menu2: false,
    };
    //end for date
  },

  //for date
  computed: {
    computedDateFormatted() {
      return this.formatDate(this.date);
    },
  },

  watch: {
    date(val) {
      this.dateFormatted = this.formatDate(this.date);
    },
    skill(val) {
      if (val.length > 5) {
        this.$nextTick(() => this.skill.pop());
      }
    },
  },
  //end for date
  methods: {
    types(pay) {
      if (pay == "hourly") {
        this.payment = true;
      }
      if (pay == "project") {
        this.payment = false;
      }
    },
    required(value) {
      if (value instanceof Array && value.length == 0) {
        return "Required.";
      }
      return !!value || "Required.";
    },
    submit() {
      alert(this.title);
    },
    validate(type) {
      if (type == "info") {
        this.$refs.form1.validate();
      }
      if (type == "scopes") {
        this.$refs.form2.validate();
      }
      if (type == "skills") {
        this.$refs.form3.validate();
      }
      if (type == "budget") {
        this.$refs.form4.validate();
      }
    },
    steps(step) {
      if (this.valid) {
        this.step += 1;
        this.valid = false;
      }
    },
    stepBack(step) {
      this.valid = true;
      if (this.valid) {
        this.step -= 1;
      }
      // this.valid = !this.valid
    },
    //for date
    formatDate(date) {
      if (!date) return null;

      const [year, month, day] = date.split("-");
      return `${month}/${day}/${year}`;
    },
    parseDate(date) {
      if (!date) return null;

      const [month, day, year] = date.split("/");
      return `${year}-${month.padStart(2, "0")}-${day.padStart(2, "0")}`;
    },
    async sendDate(value) {
      await axios.post(`api/job`, {
        time: value,
      });
    },
    created() {
      console.log(moment(this.date).format("YYYY-MM-DDThh:mm"));
    },
    //for skills
    async getSkill() {
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
  },
  created() {
    this.getSkill();
  },
  //for budget
};
</script>

<style>
</style>