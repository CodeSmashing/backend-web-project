# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/),
and this project (tries) to adhere to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [2.0.0] - 2025-05-17

### Added

- Added a `role` attribute to several forms for individual styling: `reset-password`, `login`, `register`, `password-update`, `send-verification`, `profile-update`. Added corresponding styling for form elements with these roles.
- Added optional `.centered` class for section elements to align content to the center using flexbox.
- Added two slots, `header` and `footer`, to each view where a header and/or footer is needed.
- Named the index route as `home`.

### Changed

- Updated header styling to use the available width and set the minimum height with the `--height-header` variable.
- Changed all views that used `layouts/guest.blade.php` to now use `layouts/app.blade.php`.
- Updated `app.blade.php` to more closely match `guest.blade.php`, and implemented the `@isset` rule for headers and footers.
- Refactored the home view (`welcome.blade.php`):
  - Now uses the app layout (`app.blade.php`).
  - Removed SVG elements.
  - Moved navigation logic to the navigation view (`navigation.blade.php`).
- Updated `navigation.blade.php`:
  - Removed the logo (for now).
  - Added links to all other routes.
  - Conditionally shows the "dashboard" route, or both "login" and "register" routes.
  - Displays user settings buttons and dropdowns if the user is logged in.

### Removed

- Deleted `application-logo.blade.php` (unwanted logo).
- Deleted `guest.blade.php` (now redundant).
- Removed almost all TailWind CSS styling from all views.
- Removed the ID "help" from the FAQ search form.

## [1.0.0] - 2025-05-17

### Added

- Added Ubuntu font as the primary font.
- Added reference to the Ubuntu font in the `README.md`.
- Created FAQ view (`help.blade.php`).
- Created discussion board view (`discussion-board.blade.php`).
- Created contact page view (`contact.blade.php`).
- Added new routes for the FAQ, discussion board, and contact pages in `routes/web.php`.
- Implemented a temporary FAQ model for storing questions and answers.
- Split styling into separate files: `style.css`, `font.css`, `color.css`, and `animations.css`.
- Added `toggle-tags-manager.js` for managing the FAQ search form's tag list visibility.

### Changed

- Updated `.env` to use a more fitting project title; changed titles in `welcome.blade.php`, `app.blade.php`, and `guest.blade.php` accordingly.
- Refactored `welcome.blade.php` to remove the long `<style>` tag previously used as a Tailwind CSS backup.
- Modified `guest.blade.php` to reduce reliance on provided Tailwind CSS.

## [0.0.2] - 2025-05-14

### Added

- Reference to Perplexity AI chat log in README.
- Add tag link definitions to CHANGELOG.

## [0.0.1] - 2025-05-14

### Added

- This CHANGELOG file

### Changed

- README with project details, setup instructions, usage, structure, contributing guidelines, and license information

[2.0.0]: https://github.com/CodeSmashing/backend-web-project/releases/tag/v1.0.0
[1.0.0]: https://github.com/CodeSmashing/backend-web-project/releases/tag/v1.0.0
[0.0.2]: https://github.com/CodeSmashing/backend-web-project/releases/tag/v0.0.2
[0.0.1]: https://github.com/CodeSmashing/backend-web-project/releases/tag/v0.0.1
