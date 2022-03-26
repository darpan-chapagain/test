<template>
  <div>
    <v-app>
      <v-card class="overflow-hidden">
        <v-app-bar
          absolute
          color="#03befc"
          elevate-on-scroll
          scroll-target="#scrolling-techniques-7"
          height="70px"
        >
          <v-app-bar-nav-icon
            @click="drawer = !drawer"
            class="drawer d-lg-none d-md-none"
          ></v-app-bar-nav-icon>

          <v-toolbar-title>Title</v-toolbar-title>

          <v-spacer></v-spacer>

          <v-btn icon>
            <v-icon>mdi-magnify</v-icon>
          </v-btn>

          <v-btn icon>
            <v-icon>mdi-heart</v-icon>
          </v-btn>

          <div class="navbar-nav m-3" v-if="isLoggedIn">
            <a class="nav-item nav-link" style="cursor: pointer" @click="logout"
              >Logout</a
            >
          </div>

          <v-menu left bottom>
            <template v-slot:activator="{ on, attrs }">
              <v-btn icon v-bind="attrs" v-on="on" class="m-3">
                <v-avatar>
                  <img
                    src="https://cdn.vuetifyjs.com/images/john.jpg"
                    alt="John"
                  />
                </v-avatar>
              </v-btn>
            </template>

            <v-list>
              <v-list-item @click="() => {}">
                <v-list-item-title> Option 1 </v-list-item-title>
              </v-list-item>
            </v-list>
          </v-menu>
        </v-app-bar>

        <v-navigation-drawer v-model="drawer" fixed temporary>
          <!--  -->
          <v-list nav dense>
            <v-list-item-group
              v-model="group"
              active-class="deep-purple--text text--accent-4"
            >
              <v-list-item>
                <v-list-item-icon>
                  <v-icon>mdi-home</v-icon>
                </v-list-item-icon>
                <v-list-item-title>Home</v-list-item-title>
              </v-list-item>

              <v-list-item>
                <v-list-item-icon>
                  <v-icon>mdi-account</v-icon>
                </v-list-item-icon>
                <v-list-item-title>Account</v-list-item-title>
              </v-list-item>
            </v-list-item-group>
          </v-list>
        </v-navigation-drawer>

        <v-sheet
          id="scrolling-techniques-7"
          class="overflow-y-auto"
          max-height="100vh"
        >
          <div style="min-height: 100vh; margin: 50px">
            <router-view />
          </div>
          <v-footer dark padless>
            <v-card flat tile class="indigo lighten-1 white--text text-center">
              <v-card-text>
                <v-btn
                  v-for="icon in icons"
                  :key="icon"
                  class="mx-4 white--text"
                  icon
                >
                  <v-icon size="24px">
                    {{ icon }}
                  </v-icon>
                </v-btn>
              </v-card-text>

              <v-card-text class="white--text pt-0">
                Phasellus feugiat arcu sapien, et iaculis ipsum elementum sit
                amet. Mauris cursus commodo interdum. Praesent ut risus eget
                metus luctus accumsan id ultrices nunc. Sed at orci sed massa
                consectetur dignissim a sit amet dui. Duis commodo vitae velit
                et faucibus. Morbi vehicula lacinia malesuada. Nulla placerat
                augue vel ipsum ultrices, cursus iaculis dui sollicitudin.
                Vestibulum eu ipsum vel diam elementum tempor vel ut orci. Orci
                varius natoque penatibus et magnis dis parturient montes,
                nascetur ridiculus mus.
              </v-card-text>

              <v-divider></v-divider>

              <v-card-text class="white--text">
                {{ new Date().getFullYear() }} — <strong>Vuetify</strong>
              </v-card-text>
            </v-card>
          </v-footer>
        </v-sheet>
      </v-card>
    </v-app>
  </div>
</template>

<script>
import { mapActions } from "vuex";
export default {
  name: "App",
  created() {
    if (window.Laravel.isLoggedin) {
      this.isLoggedIn = true;
    }
  },
  data() {
    return {
      isLoggedIn: false,
      icons: ["mdi-facebook", "mdi-twitter", "mdi-linkedin", "mdi-instagram"],
      drawer: null,
      group: null,
    };
  },
  methods: {
    ...mapActions({
      signOut: "auth/logout",
    }),
    created() {
      if (window.Laravel.isLoggedin) {
        this.isLoggedIn = true;
      }
    },
    async logout() {
      await axios.get("/sanctum/csrf-cookie").then((response) => {
        axios
          .post("/api/logout")
          .then((response) => {
            if (response.data.success) {
              console.log(response.data.success);
              window.location.href = "/login";
            } else {
              console.log(response);
            }
          })
          .catch(function (error) {
            console.error(error);
          });
      });
    },
  },
};
</script>

<style>
body::-webkit-scrollbar {
  display: none;
}
</style>