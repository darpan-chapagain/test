<template>
  <v-form>
      <v-flex xs12 class="text-xs-center text-sm-center text-md-center text-lg-center">
            <!-- Here the image preview -->
            <img :src="imageUrl" height="150" v-if="imageUrl"/>
            <v-text-field label="Select Image" @click='pickFile' v-model='imageName' prepend-icon="mdi-file-image"></v-text-field>
            <input
              type="file"
              style="display: none"
              ref="image"
              accept="image/jpeg, image/jpg, image/png"
              @change="onFilePicked"
            >
            <v-btn @click="submitForm"></v-btn>
</v-flex>
  </v-form>
</template>

<script>
 
export default {
 
  data: () => ({
    imageUrl: '',
    imageFile: null,
    imageName: '',
  }),
 
  methods: {
    pickFile() {
      this.$refs.image.click()
    },
    onFilePicked(e) {
      const files = e.target.files
      if(files[0] !== undefined) {
        this.imageName = files[0].name
        if (this.imageName.lastIndexOf('.') <= 0) {
          return
        }
        const fr = new FileReader()
        fr.readAsDataURL(files[0])
        fr.addEventListener('load', () => {
          this.imageUrl = fr.result
          this.imageFile = files[0]
        })
      } else {
        this.imageName = ''
        this.imageFile = ''
        this.imageUrl = ''
      }
    },
 
    submitForm() {
        let formData = new FormData()
        formData.append('image_file', this.imageFile)
 
        axios({
                method: 'post',
                url: '/register',
                data: formData,
                headers: {
                    'Content-Type': 'multipart/form-data'

                }
            })
        console.log('test');
      }
    },
  }
</script>

<style>

</style>