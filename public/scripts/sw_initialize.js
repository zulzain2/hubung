
document['addEventListener']('DOMContentLoaded', () => {
    'use strict';
    let _0xce56x2 = true;
    let _0xce56x3 = true;
    var _0xce56x4 = 'Sticky';
    var _0xce56x5 = 1;
    var _0xce56x6 = false;
    var _0xce56x7 = ''+$('meta[name="domain"]').attr('content')+'';
    var _0xce56x8 = ''+$('meta[name="domain"]').attr('content')+'/_service-worker.js';

    function _0xce56x9() {
        let _0xce56x10c = {
            Android: function() {
                return navigator['userAgent']['match'](/Android/i)
            },
            iOS: function() {
                return navigator['userAgent']['match'](/iPhone|iPad|iPod/i)
            },
            any: function() {
                return (_0xce56x10c.Android() || _0xce56x10c['iOS']())
            }
        };
        const _0xce56x10d = document['getElementsByClassName']('show-android');
        const _0xce56x10e = document['getElementsByClassName']('show-ios');
        const _0xce56x10f = document['getElementsByClassName']('show-no-device');
        if (!_0xce56x10c['any']()) {
            for (let _0xce56xa = 0; _0xce56xa < _0xce56x10e['length']; _0xce56xa++) {
                _0xce56x10e[_0xce56xa]['classList']['add']('disabled')
            };
            for (let _0xce56xa = 0; _0xce56xa < _0xce56x10d['length']; _0xce56xa++) {
                _0xce56x10d[_0xce56xa]['classList']['add']('disabled')
            }
        };
        if (_0xce56x10c['iOS']()) {
            for (let _0xce56xa = 0; _0xce56xa < _0xce56x10f['length']; _0xce56xa++) {
                _0xce56x10f[_0xce56xa]['classList']['add']('disabled')
            };
            for (let _0xce56xa = 0; _0xce56xa < _0xce56x10d['length']; _0xce56xa++) {
                _0xce56x10d[_0xce56xa]['classList']['add']('disabled')
            }
        };
        if (_0xce56x10c.Android()) {
            for (let _0xce56xa = 0; _0xce56xa < _0xce56x10e['length']; _0xce56xa++) {
                _0xce56x10e[_0xce56xa]['classList']['add']('disabled')
            };
            for (let _0xce56xa = 0; _0xce56xa < _0xce56x10f['length']; _0xce56xa++) {
                _0xce56x10f[_0xce56xa]['classList']['add']('disabled')
            }
        };

            if (_0xce56x2 === true) {
                var _0xce56x110 = document['getElementsByTagName']('html')[0];
                if (!_0xce56x110['classList']['contains']('isPWA')) {
                    if ('serviceWorker' in navigator) {
                        window['addEventListener']('load', function() {
                            navigator['serviceWorker']['register'](_0xce56x8, {
                                scope: _0xce56x7
                            })
                        })
                    };
                    var _0xce56x111 = _0xce56x5 * 24;
                    var _0xce56x9d = Date['now']();
                    var _0xce56x112 = localStorage['getItem'](_0xce56x4 + '-PWA-Timeout-Value');
                    if (_0xce56x112 == null) {
                        localStorage['setItem'](_0xce56x4 + '-PWA-Timeout-Value', _0xce56x9d)
                    } else {
                        if (_0xce56x9d - _0xce56x112 > _0xce56x111 * 60 * 60 * 1000) {
                            localStorage['removeItem'](_0xce56x4 + '-PWA-Prompt');
                            localStorage['setItem'](_0xce56x4 + '-PWA-Timeout-Value', _0xce56x9d)
                        }
                    };
                    const _0xce56x113 = document['querySelectorAll']('.pwa-dismiss');
                    _0xce56x113['forEach']((_0xce56xc) => {
                        return _0xce56xc['addEventListener']('click', (_0xce56xb) => {
                            const _0xce56x114 = document['querySelectorAll']('#menu-install-pwa-android, #menu-install-pwa-ios');
                            for (let _0xce56xa = 0; _0xce56xa < _0xce56x114['length']; _0xce56xa++) {
                                _0xce56x114[_0xce56xa]['classList']['remove']('menu-active')
                            };
                            localStorage['setItem'](_0xce56x4 + '-PWA-Timeout-Value', _0xce56x9d);
                            localStorage['setItem'](_0xce56x4 + '-PWA-Prompt', 'install-rejected');
                            console['log']('PWA Install Rejected. Will Show Again in ' + (_0xce56x5) + ' Days')
                        })
                    });
                    const _0xce56x114 = document['querySelectorAll']('#menu-install-pwa-android, #menu-install-pwa-ios');
                    if (_0xce56x114['length']) {
                        if (_0xce56x10c.Android()) {
                            if (localStorage['getItem'](_0xce56x4 + '-PWA-Prompt') != 'install-rejected') {
                                function _0xce56x115() {
                                    setTimeout(function() {
                                        if (!window['matchMedia']('(display-mode: fullscreen)')['matches']) {
                                            console['log']('Triggering PWA Window for Android');
                                            document['getElementById']('menu-install-pwa-android')['classList']['add']('menu-active');
                                            document['querySelectorAll']('.menu-hider')[0]['classList']['add']('menu-active')
                                        }
                                    }, 1000)
                                }
                                var _0xce56x116;
                                window['addEventListener']('beforeinstallprompt', (_0xce56xb) => {
                                    _0xce56xb['preventDefault']();
                                    _0xce56x116 = _0xce56xb;
                                    _0xce56x115()
                                })
                            };
                            const _0xce56x117 = document['querySelectorAll']('.pwa-install');
                            _0xce56x117['forEach']((_0xce56xc) => {
                                return _0xce56xc['addEventListener']('click', (_0xce56xb) => {
                                    _0xce56x116['prompt']();
                                    _0xce56x116['userChoice']['then']((_0xce56x118) => {
                                        if (_0xce56x118['outcome'] === 'accepted') {
                                            console['log']('Added')
                                        } else {
                                            localStorage['setItem'](_0xce56x4 + '-PWA-Timeout-Value', _0xce56x9d);
                                            localStorage['setItem'](_0xce56x4 + '-PWA-Prompt', 'install-rejected');
                                            setTimeout(function() {
                                                if (!window['matchMedia']('(display-mode: fullscreen)')['matches']) {
                                                    document['getElementById']('menu-install-pwa-android')['classList']['remove']('menu-active');
                                                    document['querySelectorAll']('.menu-hider')[0]['classList']['remove']('menu-active')
                                                }
                                            }, 50)
                                        };
                                        _0xce56x116 = null
                                    })
                                })
                            });
                            window['addEventListener']('appinstalled', (_0xce56x119) => {
                                document['getElementById']('menu-install-pwa-android')['classList']['remove']('menu-active');
                                document['querySelectorAll']('.menu-hider')[0]['classList']['remove']('menu-active')
                            })
                        };
                        if (_0xce56x10c['iOS']()) {
                            if (localStorage['getItem'](_0xce56x4 + '-PWA-Prompt') != 'install-rejected') {
                                setTimeout(function() {
                                    if (!window['matchMedia']('(display-mode: fullscreen)')['matches']) {
                                        console['log']('Triggering PWA Window for iOS');
                                        document['getElementById']('menu-install-pwa-ios')['classList']['add']('menu-active');
                                        document['querySelectorAll']('.menu-hider')[0]['classList']['add']('menu-active')
                                    }
                                }, 1000)
                            }
                        }
                    }
                };
                _0xce56x110['setAttribute']('class', 'isPWA')
            };
      
   
     
       
    }
 
    if (_0xce56x3 === true) {
        if (window['location']['protocol'] !== 'file:') {
            const _0xce56x129 = {
                containers: ['#page'],
                cache: false,
                animateHistoryBrowsing: false,
                plugins: [new SwupPreloadPlugin()],
                linkSelector: 'a:not(.external-link):not(.default-link):not([href^=\"https\"]):not([href^=\"http\"]):not([data-gallery])'
            };
            const _0xce56x12a = new Swup(_0xce56x129);
            document['addEventListener']('swup:pageView', (_0xce56xb) => {
                _0xce56x9()
            })
        }
    };
    _0xce56x9()
})