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
        <v-form>
          <div class="form-group">
            <v-text-field
              v-model="auth.email"
              class="form-input mb-2"
              :rules="emailRules"
              label="Email"
              required
            ></v-text-field>
          </div>
          <div class="form-group">
            <v-text-field
              v-model="auth.password"
              class="form-input mb-2"
              :append-icon="show3 ? 'mdi-eye' : 'mdi-eye-off'"
              :rules="[rules.required]"
              :type="show3 ? 'text' : 'password'"
              name="input-10-2"
              label="Password"
              hint="At least 8 characters"
              value=""
              @click:append="show3 = !show3"
            ></v-text-field>
          </div>
          <div class="form-group">
            <v-btn class="btn btn-lg btn-block sign-in-btn mb-2" @click="login"> Login </v-btn>
          </div>
          <p>
            Don't Have an Account?
            <router-link :to="{ name: 'register' }">Register Now!</router-link>
          </p>
        </v-form>
      </div>
    </div>
  </div>
</template>

<script>
import { mapActions } from "vuex";
import AuthInput from "../app_component/AuthInput.vue";
export default {
  name: "login",
  components: {
    AuthInput,
  },
  data() {
    return {
      // loginImage: require("asset('images/signin.png')"),
      auth: {
        email: "",
        password: "",
      },
      show3: false,
      password: "Password",
      rules: {
        required: (value) => !!value || "Required.",
        emailMatch: () => "Please enter a valid password",
      },
      emailRules: [
        v => !!v || 'E-mail is required',
        v => /.+@.+/.test(v) || 'E-mail must be valid',
      ],
    };
  },
  methods: {
    ...mapActions({
      signIn: "auth/login"
    }),

    login(){
      this.signIn(this.auth);
    }
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
  display: flex;
  align-items: center;
  justify-content: center;
  width: 100%;
  height: 96vh;
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

.form-group .form-input {
  max-width: 400px;
  min-width: 300px;
  width: 100%;
}

.form-group {
  margin-bottom: 10px;
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
}
</style>
