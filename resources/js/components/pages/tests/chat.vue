<template>
  <div id="app">
    <v-app app>
      <v-container class="fill-height">
        <v-row class="fill-height pb-14" align="end">
          <v-col>
            <v-sheet
              id="scrolling-techniques-7"
              class="overflow-y-auto p-5"
              height="80vh"
              max-height="80vh"
              style="background: red"
              ref="chats"
            >
              <div style="max-height: 60vh; margin: 50px" id="chats">
                <ul
                  v-for="(item, index) in chat"
                  :key="index"
                  :class="[
                    'd-flex flex-row align-center my-2',
                    item.from == 'user' ? 'justify-end' : null,
                  ]"
                  id="messages"
                >
                  <li
                    class="user d-flex flex-row align-center"
                    v-if="item.from == 'user'"
                  >
                    <v-card
                      class="mt-8 mr-2"
                      max-width="350px"
                      color="blue"
                      dark
                    >
                      <v-list-item two-line>
                        <v-list-item-content>
                          <span class="white--text mr-3">{{ item.msg }}</span>
                        </v-list-item-content>
                      </v-list-item>
                    </v-card>
                    <v-avatar color="blue" size="36" class="mr-2">
                      <span class="white--text">{{ item.from[0] }}</span>
                    </v-avatar>
                  </li>
                  <li
                    class="peron d-flex flex-row align-center mb-4"
                    v-if="item.from != 'user'"
                  >
                    <v-avatar color="red" size="36" class="mr-2">
                      <span class="white--text">{{ item.from[0] }}</span>
                    </v-avatar>
                    <v-card class="mt-10" max-width="350px">
                      <v-list-item two-line>
                        <v-list-item-content>
                          <span class="blue--text ml-3">{{ item.msg }}</span>
                        </v-list-item-content>
                      </v-list-item>
                    </v-card>
                  </li>
                </ul>
              </div>
            </v-sheet>
            <div>
              <v-container class="ma-0 pa-0">
                <v-row no-gutters>
                  <v-col>
                    <div class="d-flex flex-row align-center">
                      <v-text-field
                        v-model="msg"
                        placeholder="Type Something"
                        @keypress.enter="send"
                      ></v-text-field>
                      <v-btn id="send" icon class="ml-4" @click="send"
                        ><v-icon>mdi-send</v-icon></v-btn
                      >
                    </div>
                  </v-col>
                </v-row>
              </v-container>
            </div>
          </v-col>
        </v-row>
      </v-container>
    </v-app>
  </div>
</template>

<script>
export default {
  data() {
    return {
      chat: [],
      msg: null,
    };
  },
  methods: {
    scrollToBottom() {
      // const content = this.$refs.chats;
      // content.scrollTop = content.scrollHeight;
      // document.body.scrollTop = document.body.scrollHeight;
      let divx = document.getElementById("scrolling-techniques-7");
      divx.scrollTop = divx.scrollHeight;
      console.log(divx);
      console.log(
        "scroll height is " +
          divx.scrollHeight +
          " scroll Top is " +
          divx.scrollTop
      );
    },

    test() {
      alert("test");
    },
    send: function () {
      this.chat.push({
        from: "user",
        msg: this.msg,
      });
      this.scrollToBottom();
      this.msg = null;
      this.addReply();
    },
    addReply() {
      this.chat.push({
        from: "sushant",
        msg: "Hmm",
      });
      this.scrollToBottom();
    },
  },
  mounted() {
    this.scrollToBottom();
  },
  updated() {
    this.scrollToBottom();
    // this.$nextTick(() => this.scrollToEnd());
  },
  // mounted: function () {
  //   v

  //   document.getElementById("send").click(function () {
  //     console.log('yes')
  //   });
  // },
};
</script>

<style scoped>
li {
  decoration: none;
}
</style>