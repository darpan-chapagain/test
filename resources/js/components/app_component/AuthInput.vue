<template>
  <div :class="formClass">
        <label>{{ lableText }}</label>
        <input :type="type" class="form-control" :id="inputID"
        :placeholder="input_placeholder" :name="in_name" :autocomplete="auto_complete" autofocus :v-model="$emit(in_auth)" required>
    </div>
</template>

<script>
export default {
    name: 'AuthInput',
    props: {
        formClass: String,
        inputClass: String,
        lableText: String,
        inputID: String, 
        input_placeholder: String, 
        in_name: String,
        auto_complete: String,
        in_auth: Object,
    },
}
</script>

<style scoped>
    .form-group input{
    max-width: 400px;
    min-width: 300px;
    width: 100%;
}
</style>