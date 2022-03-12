<template>
  <div style="margin-top: 100px">
    <v-row>
      <v-col cols="12" lg="8">
        <v-sheet rounded="lg" min-height="268">
          <v-sheet elevation="3" class="p-1 mx-4 profile-card" min-height="650">
            <v-card
              class="mx-auto"
              style="margin-top: 20px"
              max-width="1000"
              tile
            >
              <v-img
                height="200"
                src="https://cdn.vuetifyjs.com/images/cards/server-room.jpg"
              ></v-img>
              <v-row style="margin: 1.5%; position: absolute; top: 130px">
                <v-col cols="12" lg="12">
                  <v-list-item
                    class="profile-detail"
                    style="display: flex; flex-direction: column"
                  >
                    <v-list-item-avatar size="150">
                      <img
                        src="https://www.w3schools.com/howto/img_avatar.png"
                        alt="John"
                      />
                    </v-list-item-avatar>
                    <v-list-item-content>
                      <v-list-item-title class="title" style="margin-top: 20px"
                        >User Name</v-list-item-title
                      >
                      <v-list-item-subtitle>Job Category</v-list-item-subtitle>
                    </v-list-item-content>
                  </v-list-item>
                </v-col>
                <v-col cols="12" lg="12">
                  <div
                    class="profile-btn mx-auto"
                    style="
                      max-width: 150px;
                      display: flex;
                      flex-direction: column;
                    "
                  >
                    <v-btn class="m-2 mt-4" rounded color="primary" dark
                      >Contact!</v-btn
                    >
                    <v-btn class="m-2 mt-4" rounded color="primary" dark
                      >Propose Job!</v-btn
                    >
                  </div></v-col
                >
              </v-row>
            </v-card>
          </v-sheet>
        </v-sheet>
      </v-col>
      <v-col cols="12" lg="4">
        <v-sheet :rounded="3" min-height="268">
          <v-sheet elevation="3" class="p-1 m-4" min-height="400">
            <div class="job-title m-4 centre">
              <h3>Client's Details</h3>
              <b-card-sub-title>Darpan Chapagain</b-card-sub-title>
              <v-divider></v-divider>
            </div>

            <div class="m-4">
              <div class="additional-user-detail">
                <h5 class="my-0 p-3">Additional Details</h5>
                <div class="attributes">
                  <v-list-item two-line>
                    <v-list-item-content>
                      <v-list-item-title>Phone No</v-list-item-title>
                      <v-list-item-subtitle class="pb-2"
                        >9843590522</v-list-item-subtitle
                      >

                      <v-list-item-title>Address</v-list-item-title>
                      <v-list-item-subtitle class="pb-2"
                        >Sinamangle</v-list-item-subtitle
                      >

                      <v-list-item-title>Gender</v-list-item-title>
                      <v-list-item-subtitle class="pb-2"
                        >Male</v-list-item-subtitle
                      >

                      <v-list-item-title>Email</v-list-item-title>
                      <v-list-item-subtitle class="pb-2"
                        >chapagaindarpan11@gmail.com</v-list-item-subtitle
                      >
                    </v-list-item-content>
                  </v-list-item>
                </div>
              </div>
            </div>
          </v-sheet>
        </v-sheet>
      </v-col>

      <v-col cols="12">
        <v-sheet :rounded="3" min-height="268">
          <v-sheet elevation="3" class="p-1 m-4" min-height="200">
            <div class="job-title m-4 centre">
              <h3>About!</h3>
              <b-card-sub-title
                >About sub | Agile | Team-work | Student</b-card-sub-title
              >
              <v-divider></v-divider>
            </div>

            <div class="m-4">
              <div class="additional-user-detail">
                <!-- <h5 class="my-0 p-3">Skills</h5>
                <div class="attributes">
                  <v-list-item two-line>
                    <v-list-item-content>
                      <v-list-item-title class="pb-2">Skill</v-list-item-title>

                      <v-list-item-title class="pb-2">Skill</v-list-item-title>

                      <v-list-item-title class="pb-2">Skill</v-list-item-title>

                      <v-list-item-title class="pb-2">Skill</v-list-item-title>
                    </v-list-item-content>
                  </v-list-item>
                </div> -->

                <pre style="white-space: pre-wrap; word-break: break-word">
                  
                  </pre
                >
              </div>
            </div>
          </v-sheet>
        </v-sheet>
      </v-col>

      <v-col cols="12">
        <!-- <v-sheet :rounded="3" min-height="268">
          <v-sheet elevation="3" class="p-1 m-4" min-height="200">
            <div class="job-title m-4 centre">
              <h3>Recent Updates!</h3>
              <b-card-sub-title>Posts and certifications</b-card-sub-title>
              <v-divider></v-divider>
            </div>

            <div class="m-4">
              <div class="posts p-5">
        
                  <v-row>
                    <v-col v-for="n in 9" :key="n" cols="12">
                      <Blogs />
                      <br>
                      <v-divider/>
                    </v-col>
                  </v-row>
                
              </div>
              <v-container fluid>
                <v-row dense>
                  <v-col
                    v-for="card in cards"
                    :key="card.title"
                    :subtitle="card.subtitle"
                    :cols="card.flex"
                  >
                    <v-card class="min-">
                      <v-img
                        :src="card.src"
                        class="white--text align-end"
                        gradient="to bottom, rgba(0,0,0,.1), rgba(0,0,0,.5)"
                        height="200px"
                      >
                        <v-card-title v-text="card.title"></v-card-title>
                      </v-img>

                      <v-card-subtitle v-text="card.subtitle">
                        1,000 miles of wonder
                      </v-card-subtitle>

                      <v-card-actions>
                        <v-spacer></v-spacer>

                        <v-btn icon>
                          <v-icon>mdi-heart</v-icon>
                        </v-btn>

                        <v-btn icon>
                          <v-icon>mdi-bookmark</v-icon>
                        </v-btn>

                        <v-btn icon>
                          <v-icon>mdi-share-variant</v-icon>
                        </v-btn>
                      </v-card-actions>
                    </v-card>
                  </v-col>
                </v-row>
              </v-container>
            </div>
          </v-sheet>
        </v-sheet> -->
        <v-row>
          <v-col v-for="n in 3" :key="n" cols="12">
            <Blogs />
            <br />
          </v-col>
        </v-row>
      </v-col>
    </v-row>
  </div>
</template>

<script>
import axios from "axios"; // importing the axios (a HTTP library) to connects the app with the News API
import Blogs from "../app_component/blogs.vue";
export default {
  components: { Blogs },
  name: "UserProfile",
  data: () => ({
    show: false,
    cards: [
      {
        title: "Pre-fab homes",
        src: "https://cdn.vuetifyjs.com/images/cards/house.jpg",
        flex: 12,
        subtitle: "testing",
      },
      {
        title: "Favorite road trips",
        src: "https://cdn.vuetifyjs.com/images/cards/road.jpg",
        flex: 6,
        subtitle: "testing",
      },
      {
        title: "Best airlines",
        src: "https://cdn.vuetifyjs.com/images/cards/plane.jpg",
        flex: 6,
        subtitle: "testing",
      },
    ],
    drawer: false, // false = Vuetify automatically "do the right thing" to show/hide the drawer
    api_key: "Your_API_KEY_HERE", // Your API Key go here
    articles: [],
    errors: [],
  }),
  // created () {
  //   axios.get('https://newsapi.org/v2/top-headlines?sources=techcrunch&apiKey='+this.api_key)
  //     .then(response => {
  //       //this.articles = response.data.articles
  //       this.articles = response.data.articles
  //       console.log('data:')
  //       console.log(response.data.articles) // This will give you access to the full object
  //     })
  //     .catch(e => {
  //       this.errors.push(e)
  //     })
  // },
};
</script>

<style scoped>
@import url("//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css");

@media only screen and (min-width: 769px) {
  .profile-btn,
  .profile-detail {
    flex-direction: row !important;
    margin: 0 !important;
  }
  .profile-card {
    min-height: 450px !important;
  }
}

@media only screen and (min-width: 1025px) {
  .profile-btn,
  .profile-detail {
    flex-direction: row !important;
    margin: 0 !important;
  }
  .profile-card {
    min-height: 450px !important;
  }
}
</style> 