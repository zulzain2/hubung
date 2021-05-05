// var CACHE_NAME = 'Sticky-Cache-V421-LTR';
// var REQUIRED_FILES = [
//     // '/login',
//     // '/register',
//     // '/forgot-password',
//     '/home',
//     '/chat',
//     '/meet',
//     'scripts/external_api.js',
//     'scripts/jquery-3.6.0.min.js'
// ];
// self['addEventListener']('install', function(event) {
//     event['waitUntil'](caches['open'](CACHE_NAME)['then'](function(_0xf25cx4) {
//         return _0xf25cx4['addAll'](REQUIRED_FILES)
//     })['then'](function() {
//         return self['skipWaiting']()
//     }))
// });
// self['addEventListener']('fetch', function(event) {
//     event['respondWith'](caches['match'](event['request'])['then'](function(_0xf25cx5) {
//         if (_0xf25cx5) {
//             return _0xf25cx5
//         };
//         return fetch(event['request'])
//     }))
// });
// self['addEventListener']('activate', function(event) {
//     event['waitUntil'](self['clients']['claim']())
// })









var CACHE_STATIC_NAME = 'static-v9';
var CACHE_DYNAMIC_NAME = 'dynamic-v9';
var STATIC_FILES = [
    '/offline',
    '/home',
    '/chat',
    '/meet',
    '/file',
    '/scripts/external_api.js',
    '/scripts/jquery-3.6.0.min.js'
];

var EXCLUDE_ROUTES = [
    '/meet/*'
];

// function trimCache(cacheName, maxItems) {
//   caches.open(cacheName)
//     .then(function (cache) {
//       return cache.keys()
//         .then(function (keys) {
//           if (keys.length > maxItems) {
//             cache.delete(keys[0])
//               .then(trimCache(cacheName, maxItems));
//           }
//         });
//     })
// }

self.addEventListener('install', function (event) {
  // console.log('[Service Worker] Installing Service Worker ...', event);
  self.skipWaiting()
  event.waitUntil(
    caches.open(CACHE_STATIC_NAME)
      .then(function (cache) {
        // console.log('[Service Worker] Precaching App Shell');

          cache.addAll(STATIC_FILES);

      })
  )
});

self.addEventListener('activate', function (event) {
  // console.log('[Service Worker] Activating Service Worker ....', event);
  event.waitUntil(
    caches.keys()
      .then(function (keyList) {
        return Promise.all(keyList.map(function (key) {
          if (key !== CACHE_STATIC_NAME && key !== CACHE_DYNAMIC_NAME) {
            // console.log('[Service Worker] Removing old cache.', key);
            return caches.delete(key);
          }
        }));
      })
  );
  return self.clients.claim();
});

function isInArray(string, array) {
  var cachePath;
  if (string.indexOf(self.origin) === 0) { // request targets domain where we serve the page from (i.e. NOT a CDN)
    // console.log('matched ', string);
    cachePath = string.substring(self.origin.length); // take the part of the URL AFTER the domain (e.g. after localhost:8080)
  } else {
    cachePath = string; // store the full request (for CDNs)
  }
  return array.indexOf(cachePath) > -1;
}

self.addEventListener('fetch', function(event) {

    if (isInArray(event.request.url, STATIC_FILES)) {
        event.respondWith(
          caches.match(event.request)
        );
    } 
    else {
        event.respondWith(
            caches.open(CACHE_DYNAMIC_NAME).then(function(cache) {
              return fetch(event.request)
              .then(function(response) {
                  if (isInArray(event.request.url, EXCLUDE_ROUTES))
                  {
                      
                  }
                  else
                  {
                      cache.put(event.request, response.clone());
                  }
                      return response;
              })
              .catch(function (err) {
                  return caches.open(CACHE_STATIC_NAME)
                    .then(function (cache) {
                      if (event.request.headers.get('accept').includes('text/html')) {
                        

                        return cache.match('/offline');
                        
                      }
                    });
                });
            })
          );
      }
  });

// self.addEventListener('fetch', function (event) {

//   if (isInArray(event.request.url, STATIC_FILES)) {
//     event.respondWith(
//       caches.match(event.request)
//     );
//   } else {
//     event.respondWith(
//       caches.match(event.request)
//         .then(function (response) {
//           if (response) {
//             return response;
//           } else {
//             return fetch(event.request)
//               .then(function (res) {
//                 return caches.open(CACHE_DYNAMIC_NAME)
//                   .then(function (cache) {
//                     // trimCache(CACHE_DYNAMIC_NAME, 3);
//                     if (isInArray(event.request.url, EXCLUDE_ROUTES))
//                     {
                        
//                     }
//                     else
//                     {
//                         cache.put(event.request.url, res.clone());
//                     }
//                     return res;
//                   })
//               })
//               .catch(function (err) {
//                 return caches.open(CACHE_STATIC_NAME)
//                   .then(function (cache) {
//                     if (event.request.headers.get('accept').includes('text/html')) {
//                       return cache.match('/offline.html');
//                     }
//                   });
//               });
//           }
//         })
//     );
//   }
// });

// self.addEventListener('fetch', function(event) {
//   event.respondWith(
//     caches.match(event.request)
//       .then(function(response) {
//         if (response) {
//           return response;
//         } else {
//           return fetch(event.request)
//             .then(function(res) {
//               return caches.open(CACHE_DYNAMIC_NAME)
//                 .then(function(cache) {
//                   cache.put(event.request.url, res.clone());
//                   return res;
//                 })
//             })
//             .catch(function(err) {
//               return caches.open(CACHE_STATIC_NAME)
//                 .then(function(cache) {
//                   return cache.match('/offline.html');
//                 });
//             });
//         }
//       })
//   );
// });

// self.addEventListener('fetch', function(event) {
//   event.respondWith(
//     fetch(event.request)
//       .then(function(res) {
//         return caches.open(CACHE_DYNAMIC_NAME)
//                 .then(function(cache) {
//                   cache.put(event.request.url, res.clone());
//                   return res;
//                 })
//       })
//       .catch(function(err) {
//         return caches.match(event.request);
//       })
//   );
// });

// Cache-only
// self.addEventListener('fetch', function (event) {
//   event.respondWith(
//     caches.match(event.request)
//   );
// });

// Network-only
// self.addEventListener('fetch', function (event) {
//   event.respondWith(
//     fetch(event.request)
//   );
// });