<template>
  <v-container m-5>
    <form>
      <v-menu
        ref="menu1"
        v-model="menu1"
        :close-on-content-click="false"
        transition="scale-transition"
        offset-y
        max-width="290px"
        min-width="auto"
      >
        <template v-slot:activator="{ on, attrs }">
          <v-text-field
            v-model="dateFormatted"
            label="Date"
            hint="MM/DD/YYYY format"
            persistent-hint
            prepend-icon="mdi-calendar"
                    :close-on-content-click="false"

            v-bind="attrs"
            @blur="date = parseDate(dateFormatted)"
            v-on="on"
          ></v-text-field>
        </template>
        <v-date-picker
          v-model="date"
          range
          no-title
        ></v-date-picker>
      </v-menu>
      <p>
        Date in ISO format: <strong>{{ date }}</strong>
      </p>
      <v-btn class="mr-4" @click="submit"> submit </v-btn>
    </form>
  </v-container>
</template>


<script>
export default {
  data: (vm) => ({
    date: new Date(Date.now() - new Date().getTimezoneOffset() * 60000)
      .toISOString()
      .substr(0, 10),
    dateFormatted: vm.formatDate(
      new Date(Date.now() - new Date().getTimezoneOffset() * 60000)
        .toISOString()
        .substr(0, 10)
    ),
    menu1: false,
  }),

  computed: {
    computedDateFormatted() {
      return this.formatDate(this.date);
    },
  },

  watch: {
    date(val) {
      this.dateFormatted = this.formatDate(this.date);
    },
  },

  methods: {
    formatDate(date) {
      if (!date) return null;

      const [year, month, day] = date.split("-");
      return `${month}/${day}/${year}`;
    },
    parseDate(date) {
      if (!date) return null;

      const [month, day, year] = date.split("/");
      return `${year}-${month.padStart(2, "0")}-${day.padStart(2, "0")}`;
    },
    async sendDate(value) {
      await axios.post(`api/job`, {
        time: value,
      });
    },
    submit() {
      // this.sendDate(moment(this.date).format("YYYY-MM-DDThh:mm"));
      alert(moment(this.date).format("YYYY-MM-DDThh:mm"));
    },
  },
  created() {
    console.log(moment(this.date).format("YYYY-MM-DDThh:mm"));
  },
};
</script>

<style>
</style>