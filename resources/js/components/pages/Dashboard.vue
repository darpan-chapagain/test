<template>
    <!-- <div class="pt-15">
        <div class="p-5">
            <v-text-field
            label="Search"
            hide-details
            prepend-icon="mdi-magnify"
            single-line
      ></v-text-field>
        </div>
        <b-row class="text-center">
            <b-col>
                <v-card
                elevation="6"
                class="p-3"
                >
                 Lorem ipsum dolor sit amet consectetur, adipisicing elit. Soluta dolorem distinctio obcaecati aliquid eaque, ipsum quis error facere eum. Obcaecati magnam delectus tempore, quo vero facere. Ab at quisquam libero aliquam praesentium reprehenderit eum eligendi quidem expedita consequuntur, quibusdam quasi soluta, ducimus tempora unde corrupti? Repudiandae placeat ducimus corrupti cumque.
                </v-card>
            </b-col>
            <b-col cols="7">
                <v-card
                elevation="6"
                class="p-3"
                >
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur doloribus aliquid quibusdam, asperiores cumque at blanditiis omnis sequi, laudantium amet molestias qui nobis expedita sint provident quae facere minima molestiae doloremque consequatur! Natus, distinctio qui illo fugiat cumque molestias veritatis animi, voluptas eligendi recusandae, nesciunt quam vero debitis modi rem.</p>                
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur doloribus aliquid quibusdam, asperiores cumque at blanditiis omnis sequi, laudantium amet molestias qui nobis expedita sint provident quae facere minima molestiae doloremque consequatur! Natus, distinctio qui illo fugiat cumque molestias veritatis animi, voluptas eligendi recusandae, nesciunt quam vero debitis modi rem.</p>                
                </v-card>
            </b-col>
            <b-col><v-card
                elevation="6"
                class="p-3"
                >
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quasi dignissimos eos vitae, praesentium voluptatibus, distinctio repellendus excepturi sit quia architecto doloremque necessitatibus id aliquid aliquam voluptates doloribus mollitia veritatis, consectetur voluptate iusto explicabo aspernatur laborum ducimus! Cupiditate temporibus quae quam incidunt consequuntur impedit ducimus, quia, corrupti non dicta ex corporis.
                </v-card>
            </b-col>
        </b-row>
    </div> -->

    <div class="pt-5 m-5">
        <div class="p-5">
            <v-text-field
            label="Search"
            hide-details
            prepend-icon="mdi-magnify"
            single-line
            style="width:50%; margin-left: 25%;"
            ></v-text-field>
        </div>
        <v-row>
          <v-col
            cols="12"
            sm="2"
          >
            <v-sheet
              rounded="lg"
              min-height="268"
            >
              <!--  -->
              <v-card
                elevation="6"
                class="p-3"
                >
                <h3>Filter</h3>
                <v-divider></v-divider>
                <div class="filter">
                     <v-container fluid>
                        <p>{{ radios || 'null' }}</p>
                        <v-radio-group
                        v-model="radios"
                        mandatory
                        >
                        <v-radio
                            label="Radio 1"
                            value="radio-1"
                        ></v-radio>
                        <v-radio
                            label="Radio 2"
                            value="radio-2"
                        ></v-radio>
                        </v-radio-group>
                    </v-container>
                 </div>
                </v-card>
            </v-sheet>
          </v-col>

          <v-col
            cols="12"
            sm="8"
          >
            <v-sheet
              min-height="70vh"
              rounded="lg"
            >
              <!--  -->
              <v-card
                elevation="6"
                
                >
                <div class="title px-4 pt-5">
                    <h1>Title</h1>
                </div>
                <v-divider/> 
                <div class="px-3 pt-4">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Deserunt, rerum.
                </div>
                <div class="job-post">
                    <v-divider/> 

                    <div class="jobs p-5">
                        <h5>Job Title: Lorem ipsum dolor sit amet.</h5>
                        <div class="attributes">
                            <v-chip outlined color="green" class="m-1">Hourly/Price: $###</v-chip>
                            <v-chip outlined class="m-1">Skill Level</v-chip>
                            <v-chip outlined class="m-1">Est. Time</v-chip>
                            <v-chip outlined class="m-1">Posted 2 hours ago</v-chip>
                        </div>
                        <v-divider></v-divider>
                        <div class="description">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Non, magni et ducimus cum eligendi similique corrupti porro quos nemo, veritatis atque quae facere totam odio harum hic excepturi quasi quam deleniti nostrum in voluptas, obcaecati delectus repellendus! Dolore fugiat architecto facere! Odit quis aut ab ea sequi perspiciatis nisi, vitae odio minima distinctio quod vel reprehenderit libero consequuntur, delectus ut laboriosam incidunt itaque, iure animi voluptates a? Esse mollitia tempore quidem tenetur delectus odit quis et accusamus commodi ab, aliquid omnis beatae reiciendis ex suscipit aut at, veritatis repudiandae nemo officiis maxime sunt blanditiis. Quaerat officia dicta dolorem, ipsum non dolore, doloremque soluta iusto quo molestias neque aliquam. Modi dolorum doloremque recusandae tempora similique vero nam numquam eligendi ea sunt atque tenetur dolorem placeat, rem harum! Voluptate deserunt quas eligendi dignissimos vel ratione eius aut laboriosam pariatur sunt reprehenderit iste ut amet rem suscipit officiis nihil voluptas, omnis minima aliquid corporis illo. Tenetur alias laborum possimus eveniet voluptatem totam eius neque quos mollitia reprehenderit, rerum culpa excepturi cumque, non ipsa nostrum suscipit inventore autem veritatis quo! Minus et sed accusantium doloribus, assumenda unde blanditiis culpa rem animi possimus sapiente neque impedit, deserunt quas veritatis voluptatum fugiat odio repudiandae cupiditate non.
                        </div>
                    </div>
                </div>

                </v-card>
            </v-sheet>
          </v-col>

          <v-col
            cols="12"
            sm="2"
          >
            <v-sheet
              rounded="lg"
              min-height="268"
            >
              <!--  -->
              <v-card
                elevation="6"
                class="p-3"
                >
                    <div class="user-details d-flex flex-column align-items-center">
                        <v-avatar>
                            <img
                                src="https://cdn.vuetifyjs.com/images/john.jpg"
                                alt="John"
                            >
                        </v-avatar>
                        <div class="user-name m-2">
                            <h5>User Name</h5> 
                        </div>  
                     </div>
                     <v-divider></v-divider>
                     <h6 class="text-center">Availibility</h6>
                     <div class="manage-time d-flex flex-row align-items-center justify-content-around mx-5">
                            <v-switch
                                v-model="available"
                                inset
                            ></v-switch>
                            <div class="time-chip">
                                <v-chip v-if="available" color="green">
                                Available
                                </v-chip>
                                <v-chip v-if="!available" color="red">
                                    Not Available
                                </v-chip>
                            </div>
                     </div>

                     <div class="manage-job d-flex flex-row align-items-center justify-content-around">
                        <h6 class="text-center my-0">No of jobs at same time</h6>
                        <v-chip>
                            2
                        </v-chip>
                     </div>
                     <v-divider></v-divider>
                     <div class="my-services">
                         <div class="title-btn manage-job d-flex flex-row align-items-center justify-content-around">
                             <h6>Job Categories</h6>
                                <v-btn>
                                    Edit
                                </v-btn>
                         </div>
                         <div class="services mt-5 ml-5">
                             <v-chip class="m-1">
                                cat-title
                            </v-chip >
                            <v-chip class="m-1">
                                cat-title
                            </v-chip>
                            <v-chip class="m-1">
                                cat-title
                            </v-chip>
                            <v-chip class="m-1">
                                cat-title
                            </v-chip>
                         </div>
                     </div>
                </v-card>
            </v-sheet>
            <v-sheet
              rounded="lg"
              min-height="268"
            >
              <!--  -->
              <v-card
                elevation="6"
                class="p-3 mt-5">
                <div class="proposal-title">
                    <h3 class="text-center">Proposals</h3>
                </div>
                <v-divider></v-divider>
                <div class="proposals">
                    <p><a href="">Lorem ipsum dolor sit amet.</a></p>
                    <p><a href="">Lorem ipsum dolor sit amet.</a></p>
                    <p><a href="">Lorem ipsum dolor sit amet.</a></p>
                </div>
              </v-card>
            </v-sheet>
          </v-col>
    </v-row>    
    </div>    
</template>

<script>
export default {
    name:"dashboard",
    data(){
        return {
            user:this.$store.state.auth.user,
            available: false,
        }
    }
}
</script>
