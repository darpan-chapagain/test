<template>
    <v-layout row wrap align-center>
          <v-flex xs12 md8 lg8  offset-md2>
            <!-- <div v-for="article in articles" :key="article.title"> -->
              <v-card class="my-3" hover>
                <v-img
                  height="350px"
                  src="https://cdn.vuetifyjs.com/images/cards/house.jpg"
                ></v-img>
                  <v-container fill-height fluid>
                    <v-layout>
                      <v-flex xs12 align-end d-flex>
                        <span class="headline">Blog Title: Is this a good title?</span>
                      </v-flex>
                    </v-layout>
                  </v-container>
                <v-card-text>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Id cupiditate iste itaque molestiae porro, veniam voluptatum incidunt provident suscipit. Dolores!
                  k
                </v-card-text>
                <v-card-actions>
                  <v-chip small color="secondary" class="white--text">
                    2022-03-09
                  </v-chip>
                  <v-spacer></v-spacer>
                  <!-- <v-btn icon class="red--text">
                    <v-icon small>fa-reddit</v-icon>
                  </v-btn>
                  <v-btn icon class="light-blue--text">
                    <v-icon small>fa-twitter</v-icon>
                  </v-btn>
                  <v-btn icon class="blue--text text--darken-4">
                    <v-icon small>fa-facebook</v-icon>
                  </v-btn>
                  <v-btn icon class="red--text">
                    <v-icon small>fa-google-plus</v-icon>
                  </v-btn>
                  <v-btn icon class="blue--text text--darken-4">
                    <v-icon small>fa-linkedin</v-icon>
                  </v-btn>
                  <v-spacer></v-spacer> -->

         <v-btn small replace color="info"  target="_blank" >Read More</v-btn>
                </v-card-actions>
              </v-card>
            <!-- </div> -->
          </v-flex>
        </v-layout>
</template>

<script>
export default {
  name: "Blogs",
  props: {
    articles: Array,
  },
};
</script>
