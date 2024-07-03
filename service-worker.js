var CACHE_NAME = 'mytms-v1'; // Nama cache untuk versi ini

// Menambahkan file dan aset yang ingin di-cache
var urlsToCache = [
    '/',
    '/mytms/',
    '/mytms/index.php',
    '/mytms/assets/css/styles.css',
    '/mytms/assets/js/scripts.js',
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
    event.respondWith(
        caches.match(event.request)
            .then(function (response) {
                if (response) {
                    return response; // Gunakan cache jika ada
                }
                // Clone permintaan untuk caching di runtime
                var fetchRequest = event.request.clone();
                return fetch(fetchRequest).then(function (response) {
                    if (!response || response.status !== 200 || response.type !== 'basic') {
                        return response; // Jika respons tidak valid, langsung kembalikan
                    }
                    // Clone respons untuk menyimpannya di cache
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
