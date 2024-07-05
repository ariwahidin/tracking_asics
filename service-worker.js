// var CACHE_NAME = 'mytms-v1'; // Nama cache untuk versi ini

// // Menambahkan file dan aset yang ingin di-cache
// var urlsToCache = [
//     '/mytms/assets/css/style.css',
//     '/mytms/assets/js/script.js',
//     // Tambahkan file lain yang ingin Anda cache di sini
// ];

// // Install service worker dan cache aset yang diperlukan
// self.addEventListener('install', function (event) {
//     event.waitUntil(
//         caches.open(CACHE_NAME)
//             .then(function (cache) {
//                 console.log('Cache opened');
//                 return cache.addAll(urlsToCache);
//             })
//     );
// });

// // Menggunakan cache ketika jaringan tidak tersedia
// self.addEventListener('fetch', function (event) {
//     // Filter requests with unsupported schemes
//     if (event.request.url.startsWith('chrome-extension')) {
//         return;
//     }

//     event.respondWith(
//         caches.match(event.request).then(function (response) {
//             if (response) {
//                 return response;
//             }

//             return fetch(event.request).then(function (response) {
//                 if (!response || response.status !== 200 || response.type !== 'basic') {
//                     return response;
//                 }

//                 var responseToCache = response.clone();

//                 caches.open(CACHE_NAME).then(function (cache) {
//                     cache.put(event.request, responseToCache);
//                 });

//                 return response;
//             });
//         })
//     );
// });

// // Menghapus cache lama saat service worker diaktifkan
// self.addEventListener('activate', function (event) {
//     var cacheWhitelist = [CACHE_NAME];

//     event.waitUntil(
//         caches.keys().then(function (cacheNames) {
//             return Promise.all(
//                 cacheNames.map(function (cacheName) {
//                     if (cacheWhitelist.indexOf(cacheName) === -1) {
//                         return caches.delete(cacheName);
//                     }
//                 })
//             );
//         })
//     );
// });

// // Menghapus cache saat menerima pesan
// self.addEventListener('message', function (event) {
//     if (event.data.action === 'clearCache') {
//         caches.keys().then(function (cacheNames) {
//             cacheNames.forEach(function (cacheName) {
//                 caches.delete(cacheName);
//             });
//         });
//     }
// });

// Tidak pakai cache
self.addEventListener('install', function (event) {
    console.log('Service Worker installed');
});

self.addEventListener('fetch', function (event) {
    // Do nothing for fetch events, essentially bypassing the cache
    event.respondWith(fetch(event.request));
});

self.addEventListener('activate', function (event) {
    console.log('Service Worker activated');
});

// Optionally, you can add a message event listener if you need to handle custom actions like clearing cache (though no cache is used here)
self.addEventListener('message', function (event) {
    console.log('Received message: ', event.data);
    // No caching logic to clear
});

