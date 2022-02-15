<template>
    <!-- <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12 col-md-6 offset-md-3">
                <div class="card shadow sm">
                    <div class="card-body">
                        <h1 class="text-center">Login</h1>
                        <hr/>
                        <form action="javascript:void(0)" class="row" method="post">
                            <div class="form-group col-12">
                                <label for="email" class="font-weight-bold">Email</label>
                                <input type="text" v-model="auth.email" name="email" id="email" class="form-control">
                            </div>
                            <div class="form-group col-12">
                                <label for="password" class="font-weight-bold">Password</label>
                                <input type="password" v-model="auth.password" name="password" id="password" class="form-control">
                            </div>
                            <div class="col-12 mb-2">
                                <button type="submit" :disabled="processing" @click="login" class="btn btn-primary btn-block">
                                    {{ processing ? "Please wait" : "Login" }}
                                </button>
                            </div>
                            <div class="col-12 text-center">
                                <label>Don't have an account? <router-link :to="{name:'register'}">Register Now!</router-link></label>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <div class="main-div">
        <div class="login-card">
        <div class="image-holder">
            <img src="images/signin.png" alt="image" class="img-fluid">
        </div>
        <div class="form-holder">
            <div>
            <h2>Sign In</h2>
            </div>
            <form action="javascript:void(0)" class="form-container">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email"
                aria-describedby="emailHelp" placeholder="Enter Email" name="email" v-model="auth.email" autocomplete="email" autofocus required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control mb-2"
                id="exampleInputPassword1" placeholder="Password" name="password" required v-model="auth.password"
                autocomplete="current-password">
            </div>
            <div class="form-group">
                <a href="#">
                    Forgot Password
                </a>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-lg btn-block sign-in-btn mb-2" :disabled="processing" @click="login">Log In</button>
            </div>
            <p>Don't Have an Account? <router-link :to="{name:'register'}">Register Now!</router-link></p>
            </form>
        </div>
        </div>
    </div>
</template>

<script>
import { mapActions } from 'vuex'
export default {
    name:"login",
    data(){
        return {
            // loginImage: require("asset('images/signin.png')"), 
            auth:{
                email:"",
                password:""
            },
            processing:false
        }
    },
    methods:{
        ...mapActions({
            signIn:'auth/login'
        }),
        async login(){
            this.processing = true
            await axios.get('/sanctum/csrf-cookie').then(response => {
                axios.post('api/login',this.auth).then(response=>{
                    if (response.data.success) {
                        this.signIn()
                    } else {
                        this.error = response.data.message
                    }
                }).catch(({response:{data}})=>{
                    alert(data.message)
                }).finally(()=>{
                    this.processing = false
                })
                
            })            
        },
    },
    beforeRouteEnter(to, from, next) {
        if (window.Laravel.isLoggedin) {
            return next('/dashboard');
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
    min-width: 300px;
    width: 100%;
}

.form-group{
    margin-bottom: 10px;
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

.social-btn{
    background-color: #ffffff;
    color: #0C0B0B;
}

.facebook{
    border:2px solid #3b5998 !important;
    color: #3b5998 !important;
}

.facebook:hover{
    background-color: #3b5998 !important;
    color: #ffffff !important;
}

.google{
    border: 2px solid #0C0B0B !important;
}

.google:hover{
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
}
</style>
