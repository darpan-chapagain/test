<template>
  <v-container m-5 style="max-width:800px;">
      <v-form
    ref="form"
    v-model="valid"
    lazy-validation
    
  >
    <v-select
      v-model="select"
      :items="items"
      :rules="[v => !!v || 'Item is required']"
      label="Item"
      required
    ></v-select>

    <v-btn
      :disabled="!valid"
      color="success"
      class="mr-4"
      type="submit"
      @click="submit"
    >
      Save
    </v-btn>
  </v-form>
  </v-container>
</template>

<script>
export default {
    name: 'AvailabilityForm',
    data: () => ({
        select: null,
        items: [
            'Item 1',
            'Item 2',
            'Item 3',
            'Item 4',
      ],

    }),
}
</script>

<style>

</style>