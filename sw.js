const staticCache = 'site-static';
const assets =[
    '/',
    '/index.html',
    '/js/app.js',
    '/js/jquery.js',
    '/images/icon.png',
    '/pages/login.html',
    '/pages/register.html',
    '/pages/dashboard.html',
    '/pages/update.html'
]
self.addEventListener('install', event =>{
    //caching assets file
    event.waitUntil(
        caches.open(staticCache).then(cache =>{
           // console.log('caching');
            cache.addAll(assets);
        })
    );
});

self.addEventListener('activate', event =>{
    console.log('activated');
});

self.addEventListener('fetch', event =>{
   event.respondWith(
    caches.match(event.request).then(res => {
        return res || fetch(event.request);
    })
   );
})
