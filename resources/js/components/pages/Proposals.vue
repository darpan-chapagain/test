<template>
  <div style="margin:150px">
      <v-sheet rounded="lg" min-height="500">
          <!--  -->
          <v-card elevation="6" class="p-3 mt-5">
            <div class="proposal-title">
              <h3 class="text-center">Proposals</h3>
            </div>
            <v-divider></v-divider>
            <Proposals />
          </v-card>
        </v-sheet>
  </div>
</template>

<script>
import Proposals from "../app_component/proposals.vue";

export default {
components: {
    Proposals,
  },
}
</script>

<style>

</style>