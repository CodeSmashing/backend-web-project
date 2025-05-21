# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/),
and this project (tries) to adhere to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [2.1.0] - 2025-05-21

### Added

- Added `avatar`, `role`, `birthday`, `display_name` and `about_me` fields to the `users` table and corresponding forms/controllers (`register`, `profile-update`, `RegisteredUserController`, `ProfileController`).
- Added file upload functionality for user avatars in `RegisteredUserController` and `ProfileController`.
- Created `Faq` model, migration, factory, and seeder to replace the static `FAQ` model.
- Added `FaqSeeder` and `UserSeeder` for database seeding.
- Added new CSS classes and styles for dropdown menus, buttons, forms, and avatars.
- Added `toggle-alter-manager.js` for enabling/disabling form fields dynamically.
- Added `queries.css` for responsive design.

### Changed

- Updated `register.blade.php` to include new fields (`role`, `display_name`).
- Updated `profile.edit.blade.php` to allow users to update their profile information, including avatar and role.
- Refactored `help.blade.php` to use the new `Faq` model and updated the tag list functionality.
- Updated `navigation.blade.php` to include a dropdown menu for user settings with avatar display. [Stephanie Eckles](https://moderncss.dev/css-only-accessible-dropdown-navigation-menu/)
- Renamed `toggle-tags-manager.js` to `toggle-tag-list-manager.js` for consistency.
- Updated `welcome.blade.php` and `discussion-board.blade.php` to include sections and user display logic.
- Corrected link definition for [2.0.0]

### Removed

- Deleted the static `FAQ` model and replaced it with the dynamic `Faq` model.
- Removed unused components: `dropdown.blade.php` and `dropdown-link.blade.php`.

### Fixed

- Fixed various CSS inconsistencies, including hover states, button styles, and dropdown menus.
- Fixed tag list overflow handling in the FAQ search form.

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

[2.1.0]: https://github.com/CodeSmashing/backend-web-project/releases/tag/v2.1.0
[2.0.0]: https://github.com/CodeSmashing/backend-web-project/releases/tag/v2.0.0
[1.0.0]: https://github.com/CodeSmashing/backend-web-project/releases/tag/v1.0.0
[0.0.2]: https://github.com/CodeSmashing/backend-web-project/releases/tag/v0.0.2
[0.0.1]: https://github.com/CodeSmashing/backend-web-project/releases/tag/v0.0.1
