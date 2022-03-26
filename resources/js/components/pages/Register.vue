<template>
  <div class="main-div">
    <div class="login-card">
      <div class="image-holder">
        <img src="images/signin.png" alt="image" class="img-fluid" />
      </div>
      <div class="form-holder">
        <div>
          <h2>Sign In</h2>
        </div>

        <v-tabs v-model="tab">
          <v-tab-item value="tab-1">
            <v-form
              class="form-container"
              ref="form1"
              v-model="valid"
              lazy-validation
            >
              <div class="form-group name-group">
                <div class="first-name-container">
                  <v-text-field
                    v-model="user.first_name"
                    :rules="[(v) => !!v || 'Please enter your First Name']"
                    class="form-input name-in"
                    label="First  Name"
                    required
                  ></v-text-field>
                </div>
                <div class="last-name-container">
                  <v-text-field
                    v-model="user.last_name"
                    :rules="[(v) => !!v || 'Please enter your Last Name']"
                    class="form-input name-in"
                    label="Last Name"
                    required
                  ></v-text-field>
                </div>
              </div>
              <div class="form-group">
                <v-text-field
                  v-model="user.email"
                  class="form-input-2 mb-2"
                  :rules="emailRules"
                  label="Email"
                  required
                  autocomplete="current-password"
                ></v-text-field>
              </div>
              <div class="form-group">
                <v-radio-group
                  v-model="user.gender"
                  :rules="[(v) => !!v || 'Please select gender']"
                  row
                  required
                >
                  <v-radio label="Entry" value="0"></v-radio>
                  <v-radio label="Intermediate" value="1"></v-radio>
                  <v-radio label="Expert" value="2"></v-radio>
                </v-radio-group>
              </div>
              <div class="form-group">
                <v-text-field
                  v-model="user.password"
                  class="form-input-2 mb-2"
                  :append-icon="show3 ? 'mdi-eye' : 'mdi-eye-off'"
                  :rules="[pass_rule.required]"
                  :type="show3 ? 'text' : 'password'"
                  name="input-10-2"
                  label="Password"
                  value=""
                  @click:append="show3 = !show3"
                ></v-text-field>
              </div>
              <div class="form-group">
                <v-text-field
                  v-model="user.password_confirmation"
                  class="form-input-2 mb-2"
                  :append-icon="show3 ? 'mdi-eye' : 'mdi-eye-off'"
                  :rules="confirm_pass"
                  :type="show3 ? 'text' : 'password'"
                  name="input-10-2"
                  label="Confirm Password"
                  value=""
                  autocomplete="current-password"
                  @click:append="show3 = !show3"
                ></v-text-field>
              </div>
              <div class="form-group work_type">
                <p class="freelance">Register as a Free Lancer?</p>
                <div class="switch">
                  <v-switch v-model="switch2" inset></v-switch>
                </div>
              </div>
              <div class="form-group">
                <v-btn
                  v-if="!this.switch2"
                  class="btn btn-lg btn-block sign-in-btn mb-2"
                  @click="action('register_user')"
                >
                  Register as Employer
                </v-btn>
                <v-btn
                  v-if="this.switch2"
                  class="btn btn-lg btn-block sign-in-btn mb-2"
                  @click="action('change_tab')"
                >
                  Continue to Register
                </v-btn>
              </div>
            </v-form>
          </v-tab-item>
          <v-tab-item value="tab-2">
            <v-main>
              <v-container>
                <v-stepper v-model="step">
                  <v-stepper-header>
                    <v-stepper-step
                      step="1"
                      :complete="step > 1"
                    ></v-stepper-step>

                    <v-stepper-step
                      step="2"
                      :complete="step > 2"
                    ></v-stepper-step>

                    <v-stepper-step
                      step="3"
                      :complete="step > 3"
                    ></v-stepper-step>

                    <v-stepper-step
                      step="4"
                      :complete="step > 4"
                    ></v-stepper-step>
                  </v-stepper-header>
                  <v-stepper-items>
                    <v-stepper-content step="1">
                      <v-row>
                        <v-col cols="12" md="12">
                          <div class="job-info">
                            <h3>What services do you offer?</h3>
                            <v-form ref="form2" v-model="valid" lazy-validation>
                              <v-text-field
                                v-model="user.title"
                                :counter="10"
                                :rules="titleRules"
                                label="Title of your Work"
                                required
                              ></v-text-field>
                              <v-autocomplete
                                v-model="user.category"
                                :items="categories"
                                clearable
                                hide-selected
                                persistent-hint
                                label="Job Category"
                                :rules="categoryRule"
                                dense
                              ></v-autocomplete>
                              <h4>Experience Level</h4>
                              <v-radio-group
                                v-model="user.experience"
                                :rules="[
                                  (v) => !!v || 'Please select experience',
                                ]"
                                row
                                required
                              >
                                <v-radio label="Entry" value="0"></v-radio>
                                <v-radio
                                  label="Intermediate"
                                  value="1"
                                ></v-radio>
                                <v-radio label="Expert" value="2"></v-radio>
                              </v-radio-group>
                              <h4>Qualifications</h4>
                              <v-radio-group v-model="user.employee_type" row>
                                <v-radio label="Individual" value="0"></v-radio>
                                <v-radio label="Team" value="1"></v-radio>
                              </v-radio-group>
                              <v-textarea
                                name="Qualification"
                                filled
                                label="Qualification"
                                :counter="200"
                                auto-grow
                                v-model="user.qualification"
                                value="List down your education level."
                              ></v-textarea>
                              <v-textarea
                                name="Education"
                                filled
                                label="Education"
                                auto-grow
                                v-model="user.education"
                                value="List down your education level."
                              ></v-textarea>

                              <div
                                class="buttons d-flex justify-content-between"
                              >
                                <v-btn color="error" @click="changeTab2()"
                                  >Cancel</v-btn
                                >
                                <v-btn
                                  :disabled="!valid"
                                  color="success"
                                  @click="validate('qualification')"
                                  @click.native="steps(step)"
                                >
                                  Next
                                </v-btn>
                              </div>
                            </v-form>
                          </div>
                        </v-col>
                      </v-row>
                    </v-stepper-content>
                    <v-stepper-content step="2">
                      <v-row>
                        <v-col cols="12" md="12">
                          <v-form v-model="valid" ref="form3" lazy-validation>
                            <div class="scope m-4">
                              <h3>Tell us your skill and worth!</h3>
                            </div>

                            <div class="skills">
                              <v-autocomplete
                                v-model="user.skill"
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
                                  v-model="user.hourly_rate"
                                  label="Hourly Rate"
                                  placeholder="Enter Your Rate here"
                                  outlined
                                  clearable
                                  type="number"
                                  :rules="[
                                    (v) => !!v || 'Please Enter a price',
                                  ]"
                                ></v-text-field>
                                <v-text-field
                                  v-if="!payment"
                                  v-model="user.project_rate"
                                  clearable
                                  label="Project Rate"
                                  placeholder="Enter Your Rate here"
                                  outlined
                                  type="number"
                                  :rules="[
                                    (v) => !!v || 'Please Enter a price',
                                  ]"
                                ></v-text-field>
                                <v-textarea
                                  name="About"
                                  filled
                                  label="About"
                                  :rules="about"
                                  :counter="500"
                                  auto-grow
                                  v-model="user.about"
                                  value="Let others know about yourself."
                                ></v-textarea>
                              </div>
                            </div>
                            <div class="buttons d-flex justify-content-between">
                              <v-btn color="error" @click="changeTab2()"
                                >Cancel</v-btn
                              >
                              <v-btn
                                :disabled="!valid"
                                color="success"
                                @click="validate('skill')"
                                @click.native="steps(step)"
                              >
                                Next
                              </v-btn>
                            </div>
                          </v-form>
                        </v-col>
                      </v-row>
                    </v-stepper-content>
                    <v-stepper-content step="3">
                      <v-row>
                        <v-col cols="12" md="12">
                          <v-form
                            v-model="valid"
                            ref="form4"
                            lazy-validation
                            @submit.prevent=""
                          >
                            <h3>Publish your Profile</h3>
                            <div class="image d-flex flex-column">
                              <div class="avatar mx-auto">
                                <v-avatar color="orange" size="80">
                                  <v-img v-if="user.profile" :src="url"></v-img>
                                  <span v-else class="white--text text-h3"
                                    >U</span
                                  >
                                </v-avatar>
                              </div>
                              <div class="img-input">
                                <v-file-input
                                  cols="8"
                                  :rules="[
                                    (v) => !!v || 'Please select experience',
                                  ]"
                                  accept="image/png, image/jpeg, image/bmp"
                                  placeholder="Pick an avatar"
                                  prepend-icon="mdi-camera"
                                  label="Avatar"
                                  v-model="user.profile"
                                ></v-file-input>
                              </div>
                            </div>
                            <v-text-field
                              v-model="user.address"
                              :counter="10"
                              :rules="[(v) => !!v || 'Please Enter a Address']"
                              label="Address"
                              required
                            ></v-text-field>
                            <v-text-field
                              v-model="user.city"
                              :counter="10"
                              :rules="[(v) => !!v || 'Please Enter a city']"
                              label="City"
                              required
                            ></v-text-field>
                            <v-text-field
                              v-model="user.province"
                              :counter="10"
                              :rules="[(v) => !!v || 'Please Enter a province']"
                              label="Province"
                              required
                            ></v-text-field>
                            <v-text-field
                              v-model="user.phone_number"
                              :counter="14"
                              :rules="[
                                (v) => !!v || 'Please Enter a phone number',
                              ]"
                              label="Phone Number"
                              required
                            ></v-text-field>
                            <div class="buttons d-flex justify-content-between">
                              <v-btn color="error" @click="changeTab2()"
                                >Cancel</v-btn
                              >
                              <v-btn
                                :disabled="!valid"
                                color="success"
                                @click="validate('profile')"
                                @click.native="steps(step)"
                              >
                                Finalize
                              </v-btn>
                            </div>
                          </v-form>
                        </v-col>
                      </v-row>
                    </v-stepper-content>
                    <v-stepper-content step="4">
                      <v-form v-model="valid" ref="form5" lazy-validation>
                        <div class="services">
                          <h3>What services do you offer?</h3>
                          <div>
                            <v-text-field
                              v-model="user.title"
                              :counter="10"
                              :rules="titleRules"
                              label="Title of your Work"
                              required
                            ></v-text-field>
                            <v-autocomplete
                              v-model="user.category"
                              :items="categories"
                              clearable
                              hide-selected
                              persistent-hint
                              label="Job Category"
                              :rules="categoryRule"
                              dense
                            ></v-autocomplete>
                            <h4>Experience Level</h4>
                            <v-radio-group
                              v-model="user.experience"
                              :rules="[
                                (v) => !!v || 'Please select experience',
                              ]"
                              row
                              required
                            >
                              <v-radio label="Entry" value="0"></v-radio>
                              <v-radio label="Intermediate" value="1"></v-radio>
                              <v-radio label="Expert" value="2"></v-radio>
                            </v-radio-group>
                            <h4>Qualifications</h4>
                            <v-radio-group v-model="user.employee_type" row>
                              <v-radio label="Individual" value="0"></v-radio>
                              <v-radio label="Team" value="1"></v-radio>
                            </v-radio-group>
                            <v-textarea
                              name="Qualification"
                              filled
                              label="Qualification"
                              auto-grow
                              v-model="user.qualification"
                              value="List down your education level."
                            ></v-textarea>
                            <v-textarea
                              name="Education"
                              filled
                              label="Education"
                              auto-grow
                              v-model="user.education"
                              value="List down your education level."
                            ></v-textarea>
                          </div>
                        </div>
                        <div class="skill-and-worth">
                          <div class="scope m-4">
                            <h3>Tell us your skill and worth!</h3>
                          </div>

                          <div class="skills">
                            <v-autocomplete
                              v-model="user.skill"
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
                                v-model="user.hourly_rate"
                                label="Hourly Rate"
                                placeholder="Enter Your Rate here"
                                outlined
                                clearable
                                type="number"
                                :rules="[(v) => !!v || 'Please Enter a price']"
                              ></v-text-field>
                              <v-text-field
                                v-if="!payment"
                                v-model="user.project_rate"
                                clearable
                                label="Project Rate"
                                placeholder="Enter Your Rate here"
                                outlined
                                type="number"
                                :rules="[(v) => !!v || 'Please Enter a price']"
                              ></v-text-field>
                              <v-textarea
                                name="About"
                                filled
                                label="About"
                                :rules="about"
                                :counter="500"
                                auto-grow
                                v-model="user.about"
                                value="Let others know about yourself."
                              ></v-textarea>
                            </div>
                          </div>
                        </div>
                        <div class="profile-info">
                          <h3>Publish your Profile</h3>
                          <div class="image d-flex flex-column">
                            <div class="avatar mx-auto">
                              <v-avatar color="orange" size="80">
                                <v-img v-if="user.profile" :src="url"></v-img>
                                <span v-else class="white--text text-h3"
                                  >U</span
                                >
                              </v-avatar>
                            </div>
                            <div class="img-input">
                              <v-file-input
                                cols="8"
                                :rules="[
                                  (v) => !!v || 'Please input a profile pic',
                                ]"
                                accept="image/png, image/jpeg, image/bmp"
                                placeholder="Pick an avatar"
                                prepend-icon="mdi-camera"
                                label="Avatar"
                                v-model="user.profile"
                              ></v-file-input>
                            </div>
                          </div>
                          <v-text-field
                            v-model="user.address"
                            :rules="[(v) => !!v || 'Please Enter a Address']"
                            label="Address"
                            required
                          ></v-text-field>
                          <v-text-field
                            v-model="user.city"
                            :counter="10"
                            :rules="[(v) => !!v || 'Please Enter a city']"
                            label="City"
                            required
                          ></v-text-field>
                          <v-text-field
                            v-model="user.province"
                            :counter="10"
                            :rules="[
                              (v) => !!v || 'Please Enter a province number',
                            ]"
                            label="Province"
                            required
                          ></v-text-field>
                          <v-text-field
                            v-model="user.phone_number"
                            :counter="14"
                            :rules="[
                              (v) => !!v || 'Please Enter a phone number',
                            ]"
                            label="Phone Number"
                            required
                          ></v-text-field>
                        </div>
                        <div class="d-flex flex-column mx-5 justify-around">
                          <v-btn
                            class="btn btn-lg sign-in-btn mb-2"
                            @click.prevent="action('register_employee')"
                          >
                            Register as Employer
                          </v-btn>
                          <v-btn
                            class="btn btn-lg mb-2"
                            color="error"
                            @click="changeTab2()"
                            >Cancel</v-btn
                          >
                        </div>
                        <!-- <v-btn color="primary" @click.prevent="submit"
                          >Save</v-btn
                        > -->
                      </v-form>
                    </v-stepper-content>
                  </v-stepper-items>
                </v-stepper>
              </v-container>
            </v-main>
          </v-tab-item>
        </v-tabs>
      </div>
    </div>
  </div>
</template>

<script>
import { mapActions } from "vuex";
export default {
  name: "register",
  data() {
    return {
      tab: "tab-1",
      switch2: false,
      state: false,
      categories: [],
      items: [],
      user: {
        first_name: "",
        email: "",
        password: "",
        password_confirmation: "",
        gender: null,
        skill: null,
        scope: null,
        experience: null,
        skill: [],
        category: [],
        description: null,
        title: null,
        search: null,
        hourly_rate: null,
        project_rate: null,
        profile: null,
        employee_type: null,
        qualification: null,
        about: null,
        address: null,
        city: null,
        province: null,
        phone_number: null,
        education: null,
        role_id: null,
      },
      payment: true,
      show3: false,
      pass_rule: {
        required: (value) => !!value || "Required.",
      },
      emailRules: [
        (v) => !!v || "E-mail is required",
        (v) => /.+@.+/.test(v) || "E-mail must be valid",
      ],
      //for employee
      valid: true,
      e1: 1,
      step: 1,
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
      about: [
        (v) => !!v || "About is required",
        (v) =>
          (v && v.length <= 20) ||
          "Description must be less than 200 characters",
      ],
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
  },
  methods: {
    //for tabs
    submitUser() {
      this.signUp(this.user);
    },
    submitEmployee() {
      this.signUp(this.user);
    },
    action(ac) {
      if (ac == "register_user") {
        if (this.validate("register")) {
          this.user.role_id = 2;
          this.submitUser();
        }
      }
      if (ac == "change_tab") {
        if (this.validate("register")) {
          
          this.changeTab();
        }
      }
      if (ac == "register_employee") {
        if (this.validate("final")) {
          this.user.role_id = 3;
          this.submitEmployee();
        }
      }
    },
    changeTab() {
      this.tab = "tab-2";
    },
    changeTab2() {
      this.tab = "tab-1";
    },
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
      alert(this.user.title);
    },
    validate(type) {
      if (type == "register") {
        return this.$refs.form1.validate();
      }
      if (type == "qualification") {
        return this.$refs.form2.validate();
      }
      if (type == "skill") {
        return this.$refs.form3.validate();
      }
      if (type == "profile") {
        return this.$refs.form4.validate();
      }
      if (type == "final") {
        return this.$refs.form5.validate();
      }
    },
    steps(step) {
      if (this.valid) {
        this.step += 1;
        this.valid = false;
      }
    },
    //for skills
    async getSkill() {
      const res = await axios.get("skill");
      let skill_data = [];
      for (let i = 0; i < res.data.length; i++) {
        // console.log(res.data[i].skill);
        this.items.push(res.data[i].skill);
      }
    },
    async getCategories() {
      const res = await axios.get("jobs/category");
      let skill_data = [];
      for (let i = 0; i < res.data.length; i++) {
        // console.log(res.data[i].skill);
        this.categories.push(res.data[i].category_name);
      }
    },
    async postSkill(val) {
      await axios.post(`api/jobs_skill`, {
        skill: val,
      });
    },
    //for employee Registration

    // ...mapActions({
    //   signIn: "auth/login",
    // }),
    // async register() {
    //   this.processing = true;
    //   await axios.get("/sanctum/csrf-cookie").then((response) => {
    //     axios
    //       .post("api/register", this.user)
    //       .then((response) => {
    //         if (response.data.success) {
    //           console.log(response.data.success);
    //           window.location.href = "/login";
    ...mapActions({
      signUp: "auth/register",
    }),
  },
  //for date
  computed: {
    computedDateFormatted() {
      return this.formatDate(this.date);
    },
    url() {
      if (!this.user.profile) return;
      return URL.createObjectURL(this.user.profile);
    },
    confirm_pass() {
      return [
        (v) => !!v || "Please enter password",
        (v) => v === this.user.password || "Password do not match!",
      ];
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
  created() {
    this.getSkill();
    this.getCategories();
  },
  beforeRouteEnter(to, from, next) {
    if (window.Laravel.isLoggedin) {
      return next("/");
    }
    next();
  },
};
</script>

<style scoped>
/* *{
    margin: 0px;
    padding: 0px;
    box-sizing: border-box;
} */

.main-div {
  padding-top: 55px;
  display: flex;
  align-items: center;
  justify-content: center;
  width: 100%;
  min-height: 96vh;
}

.login-card {
  display: flex;
  flex-direction: column;
  min-width: 320px;
  align-items: center;
}

.image-holder {
  padding-top: 25px;
  width: 50%;
}

.image-holder img {
  object-fit: contain;
  object-position: center;
}

.form-holder {
  margin-left: 5%;
  display: flex;
  flex-direction: column;
  /* justify-content: center; */
  align-items: center;
}

.form-container {
  display: flex;
  flex-direction: column;
  align-items: center;
}

.form-group .form-input {
  max-width: 400px;
  min-width: 200px;
  width: 100%;
}

.form-input-2 {
  max-width: 400px;
  min-width: 300px;
  width: 100%;
}

.form-group {
  margin-bottom: 10px;
}

.work_type {
  display: flex;
  align-items: center;
}

.freelance {
  margin-bottom: 0;
  margin-right: 15px;
}

.btn {
  max-width: 380px;
  min-width: 240px;
  width: 100%;
  font-size: 18px;
}

.sign-in-btn {
  background-color: #0c0b0b !important;
  color: #ffffff !important;
}

@media only screen and (min-width: 769px) {
  .login-card {
    flex-direction: row;
    max-width: 1022px;
    min-width: 768px;
    width: 100%;
    box-shadow: rgba(0, 0, 0, 0.2) 0px 20px 30px;
  }

  .form-holder {
    padding: 25px;
    width: 40%;
  }

  .image-holder {
    height: 100%;
  }

  .image-holder img {
    height: 100%;
  }
}

@media only screen and (min-width: 1025px) {
  .login-card {
    max-width: 1400px;
    min-width: 1024px;
  }

  .name-group {
    display: flex;
    flex-direction: row;
    width: 420px;
    justify-content: space-between;
  }

  .first-name-container,
  .last-name-container {
    width: 200px;
  }
}
</style>
