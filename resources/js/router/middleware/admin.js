export default function admin ({ next, store }){
    console.log(store.getters['auth/getRole']);
    if(store.getters['auth/getRole'] == 1){
        return next()
     }

     return next({
        name: 'dashboard'
     })
    }