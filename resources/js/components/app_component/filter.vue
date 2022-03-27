<template>
  <div class="filter">
    <v-container fluid>
        <p>{{ radios || 'Filter By' }}</p>
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
</template>

<script>
export default {
    name: 'FilterBy',
    data(){
        return{
            radios: null,
            value: null
        }
    }
}
</script>

<style>

</style>