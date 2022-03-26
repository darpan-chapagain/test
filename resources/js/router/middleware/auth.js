// import store from '../store'
export default function auth ({ next, store }){
    console.log('kam garyo?')
    if(!store.getters['auth/authenticated']){
        return next({
           name: 'login'
        })
    }
    return next()
   }
