   //Installation of the service Worker
self.addEventListener('install', evt => {
   evt.waitUntil( caches.open(cacheName).then(cache => {
      cache.addAll(assets);
      })
      )

});
self.addEventListener('activate', evt => {
    console.log('le Service Worker a été installé ');
   });
//fetch event to answer even if the customer is offline.
self.addEventListener('fetch', function(event) {
    event.respondWith(
    caches.open('ma_sauvegarde').then(function(cache) {
    return cache.match(event.request).then(function (response) {
    return response || fetch(event.request).then(function(response) {
    cache.put(event.request, response.clone());
    return response;
    });
    });
    })
    );
    });   