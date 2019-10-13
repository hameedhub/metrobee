if('serviceWorker' in navigator){
    navigator.serviceWorker.register('/sw.js')
    .then((res)=> console.log('registered', res))
    .catch((err)=>console.log('not registered', err));
}