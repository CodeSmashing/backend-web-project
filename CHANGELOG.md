# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/),
and this project (tries) to adhere to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

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

- Reference to Perplexity AI chat log in README
- Add tag link definitions to CHANGELOG

## [0.0.1] - 2025-05-14

### Added

- This CHANGELOG file

### Changed

- README with project details, setup instructions, usage, structure, contributing guidelines, and license information

[1.0.0]: https://github.com/CodeSmashing/backend-web-project/releases/tag/v1.0.0
[0.0.2]: https://github.com/CodeSmashing/backend-web-project/releases/tag/v0.0.2
[0.0.1]: https://github.com/CodeSmashing/backend-web-project/releases/tag/v0.0.1
