var CACHE_NAME = 'Sticky-Cache-V421-LTR';
var REQUIRED_FILES = [
    // '/login',
    // '/register',
    // '/forgot-password',
    // '/home',
    // '/chat',
    // '/meet',
    'scripts/external_api.js',
    'scripts/jquery-3.6.0.min.js'
];
self['addEventListener']('install', function(_0xf25cx3) {
    _0xf25cx3['waitUntil'](caches['open'](CACHE_NAME)['then'](function(_0xf25cx4) {
        return _0xf25cx4['addAll'](REQUIRED_FILES)
    })['then'](function() {
        return self['skipWaiting']()
    }))
});
self['addEventListener']('fetch', function(_0xf25cx3) {
    _0xf25cx3['respondWith'](caches['match'](_0xf25cx3['request'])['then'](function(_0xf25cx5) {
        if (_0xf25cx5) {
            return _0xf25cx5
        };
        return fetch(_0xf25cx3['request'])
    }))
});
self['addEventListener']('activate', function(_0xf25cx3) {
    _0xf25cx3['waitUntil'](self['clients']['claim']())
})