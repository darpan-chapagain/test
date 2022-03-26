export default function user ({ next, store }){
    console.log(store.getters['auth/getRole']);
    if(store.getters['auth/getRole'] == 2){
        return next()
    }
   
    return next({
        name: 'dashboard'
     })
   }