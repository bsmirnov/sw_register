((window, navigator, drupalSettings) => {
  'use strict';

  Drupal.behaviors.serviceWorkerRegister = {
    attach: function (context, settings) {
      once('sw-register', 'body', context).forEach(function () {
        if ('serviceWorker' in navigator) {
          window.addEventListener('load', () => {
            navigator.serviceWorker.register(drupalSettings.sw_register.path)
              .then((registration) => {
                console.log('ServiceWorker registration successful with scope:', registration.scope);
              })
              .catch((error) => {
                console.error('ServiceWorker registration failed:', error);
              });
          });
        }
        else {
          console.warn('ServiceWorker is not supported in this browser.');
        }
      });
    }
  };
})(window, navigator, drupalSettings);
