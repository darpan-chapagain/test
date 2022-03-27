<template>
  <div class="job-post">
        <div v-for="a_job in allJobs" :key="a_job.id">
            <!-- <h5>Job Title: Lorem ipsum dolor sit amet.</h5>
            <div class="attributes">
                <v-chip outlined color="green" class="m-1">Hourly/Price: $###</v-chip>
                <v-chip outlined class="m-1">Skill Level</v-chip>
                <v-chip outlined class="m-1">Est. Time</v-chip>
                <v-chip outlined class="m-1">Posted 2 hours ago</v-chip>
            </div>
            <v-divider></v-divider>
            <div class="description">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Non, magni et ducimus cum eligendi similique corrupti porro quos nemo, veritatis atque quae facere totam odio harum hic excepturi quasi quam deleniti nostrum in voluptas, obcaecati delectus repellendus! Dolore fugiat architecto facere! Odit ...
            </div> -->
            
            <AJob 
                :a_job="a_job"
            />
        </div>
    </div>
</template>

<script>
 import AJob from './aJob.vue'

export default {
    name: 'Jobs',
    props: {
        allJobs: Array,
    },
    components: {
        AJob,
    }
}
</script>

<style>

</style>