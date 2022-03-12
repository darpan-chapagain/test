<template>
  <v-main>
    <v-container class="py-8 px-6 mt-4" fluid>
      <v-row>
        <!-- <v-col v-for="card in cards" :key="card" cols="12"> -->
        <v-col>
          <v-card>
            <v-subheader>Notifications</v-subheader>

            <v-list two-line>
              <template v-for="n in 6">
                <div :key="n" class="mx-5">
                <a href="#" style="text-decoration: none">
                    <v-alert
                    text
                    dense
                    color="teal"
                    icon="mdi-clock-fast"
                    border="left"
                  >
                    Vestibulum ullamcorper mauris at ligula. Nulla porta dolor.
                    Vestibulum facilisis, purus nec pulvinar iaculis, ligula mi
                    congue nunc, vitae euismod ligula urna in dolor. Curabitur
                    at lacus ac velit ornare lobortis.
                  </v-alert>
                </a>
                </div>
              </template>
            </v-list>
          </v-card>
        </v-col>
      </v-row>
    </v-container>
  </v-main>
</template>

<script>
export default {
  data: () => ({
    cards: ["Today", "Yesterday"],
    drawer: null,
    links: [
      ["mdi-inbox-arrow-down", "Inbox"],
      ["mdi-send", "Send"],
      ["mdi-delete", "Trash"],
      ["mdi-alert-octagon", "Spam"],
    ],
  }),
};
</script>

<style>
</style>