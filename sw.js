const staticCache = 'site-static';
const pageCache = 'site-pages';
const assets =[
    '/',
    '/index.html',
    '/js/app.js',
    '/js/jquery.js',
    '/images/icon.png',
    '/error.html'
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
    event.waitUntil(
        caches.keys().then(keys =>{
            return Promise.all(keys
                .filter(key => key !== staticCache && key !== pageCache)
                .map(key => caches.delete(key))
                )
        })
    )
});

self.addEventListener('fetch', event =>{
   event.respondWith(
    caches.match(event.request).then(res => {
        return res || fetch(event.request).then(fetchRes =>{
            return caches.open(pageCache).then(cache =>{
                cache.put(event.request.url, fetchRes.clone());
                return fetchRes;
            })
        });
    }).catch(()=> caches.match('/error.html'))
   );
})
