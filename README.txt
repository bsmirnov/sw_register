# Service Worker Registration

## Overview
Service Worker Registration module enables Progressive Web App (PWA) functionality for your Drupal site by providing a simple interface to register service worker scripts.

## Requirements
- Drupal 9.4 or Drupal 10
- PHP 8.1 or higher
- A valid SSL certificate (HTTPS) or localhost environment
- Service Worker compatible browser

## Installation
1. Install the module using composer:
```bash
composer require drupal/sw_register
```

2. Enable the module:
```bash
drush en sw_register
```

## Configuration
1. Navigate to: Administration » Configuration » System » Service Worker Registration Settings
   (`/admin/config/system/sw_register/settings`)
2. Enter the relative path to your service-worker.js file (from the site root)
   Example: `sites/default/files/service-worker.js`

## Important Notes
- Service Workers require HTTPS or localhost for security reasons
- Ensure your service worker script is accessible at the specified path
- Test thoroughly in development before deploying to production

## Example Usage

### Basic Service Worker Script
```javascript
// sites/default/files/service-worker.js
self.addEventListener('install', function(event) {
  // Perform install steps
});

self.addEventListener('fetch', function(event) {
  // Handle fetch events
});
```

### Common Use Cases
1. Offline page functionality
2. Cache management
3. Push notifications
4. Background sync

## Version Compatibility
- 2.x versions: Drupal 9.4+ and Drupal 10
- 1.x versions: Drupal 8 and Drupal 9

## Troubleshooting
1. Verify HTTPS/localhost requirement is met
2. Check browser console for registration errors
3. Ensure service worker file permissions are correct
4. Clear site cache after configuration changes

## Development and Contributing
- Issue queue: [GitHub Issues](https://github.com/your-repo/sw_register/issues)
- Development: [GitHub Repository](https://github.com/your-repo/sw_register)
- Documentation: [Drupal.org Documentation](https://www.drupal.org/docs/contributed-modules/service-worker-registration)

## Maintainers
- [Your Name](https://www.drupal.org/u/your-username)
- [Other Contributors]

## License
This project is licensed under the GNU General Public License v2.0 or later.

## Related Resources
- [MDN Service Workers Guide](https://developer.mozilla.org/en-US/docs/Web/API/Service_Worker_API)
- [Google PWA Documentation](https://web.dev/progressive-web-apps/)
- [Drupal PWA Documentation](https://www.drupal.org/docs/develop/progressive-web-applications)

## Change Log

### 2.0.0 (Planned)
- Added Drupal 10 compatibility
- Updated JavaScript implementation to modern standards
- Improved error handling and validation
- Added new configuration options

### 1.0.0
- Initial release for Drupal 8
- Basic service worker registration functionality
- Administrative interface
