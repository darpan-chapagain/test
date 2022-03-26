export default function guest ({ next, store }){
    console.log('lkkkk');
    if(store.getters['auth/authenticated']){
        console.log('lkkkk');
        console.log(store.getters['auth/authenticated'])
        return next({
           name: 'dashboard'
        })
    }
    return next()
   }