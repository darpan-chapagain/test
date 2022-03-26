<template>
    <mdb-container>
      <mdb-chat-room color="grey" class="lighten-2">
        <mdb-row class="px-lg-2 px-2">
          <mdb-col md="6" xl="4" class="px-0 pt-3">
            <mdb-chat-list
              :data="basicChat"
              @click="changeActiveChat"
            ></mdb-chat-list>
          </mdb-col>
          <mdb-col md="6" xl="8" class="pl-md-3 px-lg-auto px-0 pt-3">
            <mdb-chat
              :loggedUserId="basicChat[activeChat].loggedUserId"
              :chat="basicChat[activeChat].chat"
              color="info"
              :avatarWidth="50"
              @send="sendMessage($event, basicChat[activeChat])"
            ></mdb-chat>
          </mdb-col>
        </mdb-row>
      </mdb-chat-room>
    </mdb-container>
</template>
<script>
  import { mdbChat, mdbChatList, mdbChatRoom, mdbCol, mdbRow, mdbContainer } from 'mdbvue';

  export default {
    components: {
      mdbRow,
      mdbCol,
      mdbChat,
      mdbChatList,
      mdbChatRoom,
      mdbContainer
    },

    data() {
      return {
        basicChat: [
          {
            loggedUserId: 1,
            active: true,
            lastId: 4,
            chat: [
              {
                id: 0,
                name: "Brad Pitt",
                online: true,
                img: "https://mdbootstrap.com/img/Photos/Avatars/avatar-6.webp",
                messages: [
                  {
                    id: 0,
                    date: "2019-04-21 15:00:09",
                    content:
                      "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium."
                  },
                  {
                    id: 1,
                    date: "2019-06-26 11:00",
                    content:
                      "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium."
                  },
                  {
                    id: 4,
                    date: "2019-07-01 09:20",
                    content:
                      "Can you pop out and buy lemons?"
                  }
                ]
              },
              {
                id: 1,
                name: "Lara Croft",
                img: "https://mdbootstrap.com/img/Photos/Avatars/avatar-5.webp",
                messages: [
                  {
                    id: 2,
                    date: "2019-06-26 11:15",
                    content:
                      "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium."
                  },
                  {
                    id: 3,
                    date: "2019-06-26 11:16",
                    content:
                      "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium."
                  }
                ]
              }
            ]
          },
          {
            id: 1,
            loggedUserId: 1,
            active: false,
            lastId: 2,
            chat: [
              {
                id: 1,
                name: "Lara Croft",
                online: true,
                img: "https://mdbootstrap.com/img/Photos/Avatars/avatar-5.webp",
                messages: [
                  {
                    id: 0,
                    date: "2019-04-21 15:00:09",
                    content:
                      "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium."
                  },
                  {
                    id: 1,
                    date: "2019-06-26 11:00",
                    content:
                      "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium."
                  }
                ]
              },
              {
                id: 2,
                name: "Ashley Olsen",
                img: "https://mdbootstrap.com/img/Photos/Avatars/avatar-2.webp",
                messages: [
                  {
                    id: 2,
                    date: "2019-06-26 11:15",
                    content: "Remember to bring me oranges",
                    unread: true
                  }
                ]
              }
            ]
          },
          {
            id: 2,
            loggedUserId: 1,
            active: false,
            lastId: 2,
            chat: [
              {
                id: 1,
                name: "Lara Croft",
                img: "https://mdbootstrap.com/img/Photos/Avatars/avatar-5.webp",
                messages: [
                  {
                    id: 0,
                    date: "2019-04-21 15:00:09",
                    content:
                      "Sed ut perspiciatis unde omnis iste natus remque laudantium."
                  },
                  {
                    id: 1,
                    date: "2019-06-26 11:00",
                    content: "Sed ut doloremque laudantium."
                  }
                ]
              },
              {
                id: 3,
                name: "Danny Smith",
                img: "https://mdbootstrap.com/img/Photos/Avatars/avatar-3.webp",
                messages: [
                  {
                    id: 2,
                    date: "2019-06-26 11:15",
                    content: "Call me later!",
                    unread: false
                  }
                ]
              }
            ]
          },
          {
            id: 1,
            loggedUserId: 1,
            active: false,
            lastId: 2,
            chat: [
              {
                id: 1,
                name: "Lara Croft",
                img: "https://mdbootstrap.com/img/Photos/Avatars/avatar-5.webp",
                messages: [
                  {
                    id: 0,
                    date: "2019-04-21 15:00:09",
                    content:
                      "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium."
                  },
                  {
                    id: 1,
                    date: "2019-06-26 11:00",
                    content:
                      "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium."
                  }
                ]
              },
              {
                id: 6,
                name: "Alex Turner",
                img: "https://mdbootstrap.com/img/Photos/Avatars/avatar-1.webp",
                messages: [
                  {
                    id: 2,
                    date: "2019-06-26 11:15",
                    content: "Hey, are you at home?",
                    unread: false
                  }
                ]
              }
            ]
          },
          {
            id: 2,
            loggedUserId: 1,
            active: false,
            lastId: 2,
            chat: [
              {
                id: 1,
                name: "Lara Croft",
                img: "https://mdbootstrap.com/img/Photos/Avatars/avatar-5.webp",
                messages: [
                  {
                    id: 0,
                    date: "2019-04-21 15:00:09",
                    content:
                      "Sed ut perspiciatis unde omnis iste natus remque laudantium."
                  },
                  {
                    id: 1,
                    date: "2019-06-26 11:00",
                    content: "Sed ut doloremque laudantium."
                  }
                ]
              },
              {
                id: 7,
                name: "Kate Moss",
                img: "https://mdbootstrap.com/img/Photos/Avatars/avatar-4.webp",
                messages: [
                  {
                    id: 2,
                    date: "2019-06-26 11:15",
                    content: "Wanna grab a bite later?",
                    unread: true
                  }
                ]
              }
            ]
          },
          {
            id: 1,
            loggedUserId: 1,
            active: false,
            lastId: 2,
            chat: [
              {
                id: 1,
                name: "Lara Croft",
                img: "https://mdbootstrap.com/img/Photos/Avatars/avatar-5.webp",
                messages: [
                  {
                    id: 0,
                    date: "2019-04-21 15:00:09",
                    content:
                      "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium."
                  },
                  {
                    id: 1,
                    date: "2019-06-26 11:00",
                    content:
                      "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium."
                  }
                ]
              },
              {
                id: 10,
                name: "Meg Ryan",
                online: true,
                img: "https://mdbootstrap.com/img/Photos/Avatars/avatar-12.webp",
                messages: [
                  {
                    id: 2,
                    date: "2019-06-26 11:15",
                    content: "Sed ut perspicantium.",
                    unread: false
                  }
                ]
              }
            ]
          },
          {
            id: 2,
            loggedUserId: 1,
            active: false,
            lastId: 2,
            chat: [
              {
                id: 1,
                name: "Lara Croft",
                img: "https://mdbootstrap.com/img/Photos/Avatars/avatar-6.webp",
                messages: [
                  {
                    id: 0,
                    date: "2019-04-21 15:00:09",
                    content:
                      "Sed ut perspiciatis unde omnis iste natus remque laudantium."
                  },
                  {
                    id: 1,
                    date: "2019-06-26 11:00",
                    content: "Sed ut doloremque laudantium."
                  }
                ]
              },
              {
                id: 3,
                name: "John Smith",
                img: "https://mdbootstrap.com/img/Photos/Avatars/avatar-13.webp",
                messages: [
                  {
                    id: 2,
                    date: "2019-06-26 11:15",
                    content: "Sed ut!",
                    unread: true
                  }
                ]
              }
            ]
          },
          {
            id: 1,
            loggedUserId: 1,
            active: false,
            lastId: 2,
            chat: [
              {
                id: 1,
                name: "Lara Croft",
                img: "https://mdbootstrap.com/img/Photos/Avatars/avatar-5.webp",
                messages: [
                  {
                    id: 0,
                    date: "2019-04-21 15:00:09",
                    content:
                      "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium."
                  },
                  {
                    id: 1,
                    date: "2019-06-26 11:00",
                    content:
                      "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium."
                  }
                ]
              },
              {
                id: 13,
                name: "Olenna Gervais",
                img: "https://mdbootstrap.com/img/Photos/Avatars/avatar-11.webp",
                messages: [
                  {
                    id: 2,
                    date: "2019-06-26 11:15",
                    content: "Sed ut perspicantium.",
                    unread: false
                  }
                ]
              }
            ]
          },
          {
            id: 2,
            loggedUserId: 1,
            active: false,
            lastId: 2,
            chat: [
              {
                id: 1,
                name: "Lara Croft",
                img: "https://mdbootstrap.com/img/Photos/Avatars/avatar-5.webp",
                messages: [
                  {
                    id: 0,
                    date: "2019-04-21 15:00:09",
                    content:
                      "Sed ut perspiciatis unde omnis iste natus remque laudantium."
                  },
                  {
                    id: 1,
                    date: "2019-06-26 11:00",
                    content: "Sed ut doloremque laudantium."
                  }
                ]
              },
              {
                id: 11,
                name: "Max Jackson",
                img: "https://mdbootstrap.com/img/Photos/Avatars/avatar-14.webp",
                messages: [
                  {
                    id: 2,
                    date: "2019-06-26 11:15",
                    content: "Sed laudantium!",
                    unread: false
                  }
                ]
              }
            ]
          }
        ],
        activeChat: 0,
      };
    },
    methods: {
      createMessage(e, id) {
        const { content, unread, date } = e;
        return {
          id: id + 1,
          date,
          content,
          unread
        };
      },
      sendMessage(e, chat) {
        const newMessage = this.createMessage(e, chat.lastId);
        chat.chat
          .find(el => {
            return el.id === chat.loggedUserId;
          })
          .messages.push(newMessage);

        chat.lastId += 1;
      },
      changeActiveChat(index) {
        this.activeChat = index;
        this.basicChat.forEach((chat, i) => {
          if (i === index) {
            chat.active = true;
          } else {
            chat.active = false;
          }
        });
      }
    }
  };
</script>
