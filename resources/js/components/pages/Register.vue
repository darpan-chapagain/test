<template>
    <div class="main-div">
        <div class="login-card">
        <div class="image-holder">
            <img src="images/signin.png" alt="image" class="img-fluid">
        </div>
        <div class="form-holder">
            <div>
            <h2>Sign In</h2>
            </div>
            <div class="form-group name-group">
                <div class="first-name-container">
                    <label for="first_name">First Name</label>
                    <input type="text" class="form-control name-in"
                    aria-describedby="emailHelp" placeholder="Enter First Name" name="last_name" v-model="user.first_name" autofocus required>
                </div>
                <div class="last-name-container">
                    <label for="last_name">Last Name</label>
                    <input type="text" class="form-control name-in"
                    aria-describedby="emailHelp" placeholder="Enter Last Name" name="last_name" v-model="user.last_name" autofocus required>
                </div>
            </div>
            <form action="javascript:void(0)" class="form-container">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email"
                aria-describedby="emailHelp" placeholder="Enter Email" name="email" v-model="user.email" autocomplete="email" autofocus required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control mb-2"
                id="exampleInputPassword1" placeholder="Password" name="password" required v-model="user.password"
                autocomplete="current-password">
            </div>
            <div class="form-group">
                <label for="password">Confirm Password</label>
                <input type="password" class="form-control mb-2"
                id="exampleInputPassword1" placeholder="Confrim Password" name="password_confirmation" required v-model="user.password_confirmation"
                autocomplete="current-password">
            </div>
            <div class="form-group work_type">
                <p class="freelance"> freelancer? </p>
                <div class="switch">
                <v-switch
                    v-model="switch1"
                    inset
                    :label="`${switch1.toString()}`"
                ></v-switch>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-lg btn-block sign-in-btn mb-2" :disabled="processing" @click="register">Register</button>
            </div>
            <p>Already have an account? <router-link :to="{name:'login'}">Login Now!</router-link></p>>
            </form>
        </div>
        </div>
    </div>
</template>

<script>
import { mapActions } from 'vuex'
export default {
    name:'register',
    data(){
        return {
            switch1: "yes",
            switch2: "no",
            user:{
                first_name:"",
                email:"",
                password:"",
                password_confirmation:""
            },
            processing:false
        }
    },
    methods:{
        ...mapActions({
            signIn:'auth/login'
        }),
        async register(){
            this.processing = true
            await axios.get('/sanctum/csrf-cookie').then(response => {
                axios.post('api/register',this.user).then(response=>{
                    if (response.data.success) {
                        console.log(response.data.success)
                        window.location.href = "/login"
                    } else {
                        this.error = response.data.message
                    }
                }).catch(({response:{data}})=>{
                    alert(data.message)
                }).finally(()=>{
                    this.processing = false

                })
                
            })
                
        }
    },
    beforeRouteEnter(to, from, next) {
        if (window.Laravel.isLoggedin) {
            return next('/');
        }
        next();
    }
}
</script>

<style scoped>
/* *{
    margin: 0px;
    padding: 0px;
    box-sizing: border-box;
} */

.main-div{
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    height: 96vh;
}

.login-card{
    display: flex;
    flex-direction: column;
    min-width: 320px;
    align-items: center;
}

.image-holder{
    padding-top: 25px;
    width: 50%;
}

.image-holder img{
    object-fit: contain;
    object-position: center;
}

.form-holder{
    margin-left: 5%;
    display: flex;
    flex-direction: column;
    /* justify-content: center; */
    align-items: center;
}

.form-container{
    display: flex;
    flex-direction: column;
    align-items: center;
}

.form-group input{
    max-width: 400px;
    min-width: 200px;
    width: 100%;
}

.form-group{
    margin-bottom: 10px;
}


.work_type{
    display: flex;
    align-items: center;
}

.freelance{
    margin-bottom: 0;
    margin-right: 15px;
}

.divider:after,
.divider:before {
  content: "";
  flex: 1;
  height: 1px;
  background: #eee;
}

.btn{
    max-width: 380px;
    min-width: 240px;
    width: 100%;
    font-size: 18px;
}

.sign-in-btn{
    background-color: #0C0B0B !important; 
    color: #ffffff !important;
}

@media only screen and (min-width: 769px){
    .login-card{
        flex-direction: row;
        max-width: 1022px;
        min-width: 768px;
        width: 100%;
        box-shadow: rgba(0, 0, 0, 0.2) 0px 20px 30px;
    }

    .form-holder{
        padding: 25px;
        width: 40%;
    }

    .image-holder{
        height: 100%;
    }

    .image-holder img{
        height: 100%;
    }
    
}

@media only screen and (min-width: 1025px) {
    .login-card{
        max-width: 1400px;
        min-width: 1024px;
    }

    .name-group{
    display: flex;
    flex-direction: row;
    width: 420px;
    justify-content: space-between;
}

    .first-name-container, .last-name-container{
        width: 200px;
    }

}
</style>
