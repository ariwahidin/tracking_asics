var CACHE_NAME = 'mytms-v1'; // Nama cache untuk versi ini

// Menambahkan file dan aset yang ingin di-cache
var urlsToCache = [
    '/mytms/assets/css/style.css',
    '/mytms/assets/js/script.js',
    // Tambahkan file lain yang ingin Anda cache di sini
];

// Install service worker dan cache aset yang diperlukan
self.addEventListener('install', function (event) {
    event.waitUntil(
        caches.open(CACHE_NAME)
            .then(function (cache) {
                console.log('Cache opened');
                return cache.addAll(urlsToCache);
            })
    );
});

// Menggunakan cache ketika jaringan tidak tersedia
self.addEventListener('fetch', function (event) {
    // Filter requests with unsupported schemes
    if (event.request.url.startsWith('chrome-extension')) {
        return;
    }

    event.respondWith(
        caches.match(event.request).then(function (response) {
            if (response) {
                return response;
            }

            return fetch(event.request).then(function (response) {
                if (!response || response.status !== 200 || response.type !== 'basic') {
                    return response;
                }

                var responseToCache = response.clone();

                caches.open(CACHE_NAME).then(function (cache) {
                    cache.put(event.request, responseToCache);
                });

                return response;
            });
        })
    );
});

// Menghapus cache lama saat service worker diaktifkan
self.addEventListener('activate', function (event) {
    var cacheWhitelist = [CACHE_NAME];

    event.waitUntil(
        caches.keys().then(function (cacheNames) {
            return Promise.all(
                cacheNames.map(function (cacheName) {
                    if (cacheWhitelist.indexOf(cacheName) === -1) {
                        return caches.delete(cacheName);
                    }
                })
            );
        })
    );
});
