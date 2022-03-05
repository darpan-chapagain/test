<template>
  <v-container fluid m-5 style="max-width:800px;">
    <form>
        <v-combobox
      v-model="skill"
      :items="items"
      :search-input.sync="search"
      hide-selected
      hint="Maximum of 5 tags"
      label="Add some tags"
      multiple
      persistent-hint
      small-chips
    >
      <template v-slot:no-data>
        <v-list-item>
          <v-list-item-content>
            <v-list-item-title>
              No results matching "<strong>{{ search }}</strong>". Press <kbd>enter</kbd> to create a new one
            </v-list-item-title>
          </v-list-item-content>
        </v-list-item>
      </template>
    </v-combobox>
    <v-btn
      class="mr-4"
      @click="submit"
    >
      submit
    </v-btn>
    </form>
  </v-container>
</template>


<script>
export default {
name: 'WorkNo',
    data: () => ({
      
    }),
    methods: {

    }
}
</script>

<style>

</style>
