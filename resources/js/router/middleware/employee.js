export default function employee ({ next, store }){
    console.log(store.getters['auth/getRole']);
    if(store.getters['auth/getRole'] == 3){
        return next()
    }
    console.log('2nd');
    return next({
        name: 'dashboard'
     })
   }