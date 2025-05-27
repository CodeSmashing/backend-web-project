# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/),
and this project (tries) to adhere to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [2.5.0] - 2025-05-27

### Added

- Added `ProfileController::updateFor()` method to allow administrators to update user profiles.
- Added `UserController` with an `index()` method to display a list of all users.
- Added `dashboard-actions-manager.js` to handle dynamic user profile editing on the dashboard.
- Added `users.index` route and corresponding `users/index.blade.php` view to display all users.
- Added `isAdmin()` method to the `User` model to check if a user has an admin role.
- Added new CSS styles for user tables and forms in `colors.css` and `style.css`.

### Changed

- Updated `ProfileUpdateRequest` validation rules to use `sometimes` instead of `nullable` for better flexibility.
- Updated `UserSeeder` to include the `role` attribute for certain seeded users.
- Updated `dashboard.blade.php` to include a dynamic user management table for administrators.
- Updated `navigation.blade.php` to include a link to the `users.index` route.

### Fixed

- Fixed disabled input styling in `colors.css` to use proper background colors for disabled states.

## [2.4.0] - 2025-05-27

### Added

- Added `PostController::getThreadPostList()` method to retrieve posts for a specific thread.
- Added `destroyed` attribute to `threads` and `posts` tables with a default value of `false`.
- Added `destroyed` and `is_locked` attribute casting to the `Thread` model.
- Added `destroyed` attribute casting to the `Post` model.
- Implemented `PostController` methods for managing posts:
  - `store()`: Handles post creation and returns a rendered view of the created post.
  - `update()`: Updates post content.
  - `destroy()`: Marks a post as destroyed without deleting it.
  - `delete()`: Permanently deletes a post.
  - `report()`: Placeholder for reporting posts.
- Implemented `ThreadController` methods for managing threads:
  - `store()`: Handles thread creation.
  - `update()`: Updates thread content.
  - `destroy()`: Marks a thread as destroyed without deleting it.
  - `delete()`: Permanently deletes a thread.
  - `report()`: Placeholder for reporting threads.
- Added `PostStoreRequest` and `PostUpdateRequest` for validating post-related requests.
- Added `ThreadStoreRequest` and `ThreadUpdateRequest` for validating thread-related requests.
- Added routes for thread and post related actions (`thread.store`, `thread.update`, `thread.destroy`, `thread.delete`, `thread.report`, `post.store`, `post.update`, `post.destroy`, `post.delete`, `post.report`) in `web.php`.
- Added `discussion-options-manager.js` to dynamically handle creating new threads.
- Added `post-action-manager.js` to dynamically edit posts.
- Added `reply-action-manager.js` to dynamically create posts (replies).
- Added `searchbox-manager.js` to (temporarily) dynamically handle the discussion page search box.
- Added `thread-action-manager.js` to dynamically edit threads.

### Changed

- Updated `Post` and `Thread` models to include the `destroyed` attribute in the `$fillable` array.
- Updated `Post` model to no longer include `title` in the `$fillable` array.
- Updated `Thread` model to use `content` instead of `description` and to include `is_locked` in the `$fillable` array.
- Updated `ThreadFactory` and `ThreadSeeder` to use `content` instead of `description`.
- Updated `PostFactory` and `PostSeeder` to no longer use `title`.
- Updated `0001_01_01_000000_create_users_table.php` to:
  - Use `UserRoleEnum` for the `role` attribute.
  - Store the `role` attribute as a string instead of an integer.
  - No longer have a `$casts` array.
- Updated `2025_05_22_090107_create_thread_table.php` to:
  - Use the column `content` instead of `description`:
  - Store the `is_locked` column as a `tinyInteger` instead of `boolean` and to default to `false`.
  - Include `destroyed` as a column.
- Updated `2025_05_22_090113_create_post_table.php` to:
  - No longer include `title` as a column.
  - Include `destroyed` as a column.
- Changed `UserRoleEnum` to:
  - Store cases as strings instead of integers.
  - Use the namespace `APP\Models\Enums` instead of `APP\Enums`.
  - Sit in the folder `Enums` instead of `enums`.
- Updated the `rules` method of `ProfileUpdateRequest` to check if a given role matches a `UserRoleEnum` value.
- Updated `User` to include the regular `$casts` array and to additionally cast `role` an a `UserRoleEnum` enum.
- Updated `colors.css` to:
  - Use the input it's disabled background color to instead be the general color for disabled elements.
  - Include styling for `.header-3-style`.
  - Include the disabled background color for buttons and the such.
  - Include styling for `[role="edit-thread"]` and `[role="create-thread"]`.
- Updated `font.css` to include styling for `.header-3-style`.
- Updated `style.css` to:
  - Include styling for `.header-3-style`.
  - Set the cursor to `not-allowed` for disabled buttons and the like.
  - Less specifically set the styling for `&>[class*="grid-item-"]`.
- Updated `discussion-board.blade.php` to create threads which include a form for performing certain actions with said thread.
- Updated `thread.blade.php` to create threads which include a form for performing certain actions with said threads.
- Updated `register.blade.php` to make use of `UserRoleEnum` for the role dropdown.
- Updated `update-profile-information-form.blade.php` to make use of `UserRoleEnum` for the role dropdown.
- Refactored `post-item.blade.php` into `post.blade.php`.
- Updated `post.blade.php` to:
  - Include a form for performing certain actions with original post.
  - Include a form for creating a reply post under the original post.

### Removed

- Removed `getPostList()` method from `ThreadController`.
- Removed `post-container.blade.php` as it wasn't all that useful.

### Fixed

- Added a forgotten mention of the original cast for the user `role` column in `0001_01_01_000000_create_users_table.php`.

## [2.3.0] - 2025-05-24

### Added

- Introduced `Thread` and `Post` models, migrations, factories, and seeders:
  - `Thread` model with attributes: `user_id`, `title`, `description`, `is_locked`.
  - `Post` model with attributes: `user_id`, `title`, `content`, `thread_id`, `post_id`.
  - Migrations for `threads` and `posts` tables.
  - Factories for generating sample `Thread` and `Post` data.
  - Seeders for populating threads and posts with sample data.
- Added `UserRoleEnum` for managing user roles in a type-safe manner.
- Created reusable Blade components for posts and threads:
  - `post-container.blade.php`: Wrapper for post items.
  - `post-item.blade.php`: Displays individual posts with editable fields.
  - `post-list.blade.php`: Recursive component for nested posts.
  - `thread.blade.php`: Displays individual threads in full
- Added `ThreadController` for handling thread-related logic:
  - `show()`: Displays a thread and its posts.
  - `getPostList()`: Retrieves posts for a thread.
- Updated `.gitignore` to exclude `.markdownlint.json` and `public/images/arrow.svg`.
- Added Bootstrap Icons license file (`licenses/BOOTSTRAP-ICONS-LICENSE.md`).
- Added `References & Inspiration` section to README.

### Changed

- Updated `FaqFactory` and `FaqSeeder` to remove unnecessary spaces in `tagList` values.
- Updated CSS to include styling for threads, posts and icons along with general adjustments:
  - Removed styling references as these have been moved to the README.
  - Added styles for `.anchor-style`, `.header-6-style`, `.paragraph-style` to allow for styling of an element as if it were a different element.
  - Added styles for `.thread`, `.thread-expanded`, `.thread-page-link`, `.post`, `.post-container`, `.post-list`, `.icon`, etc...
  - Updated styles for `hr` elements to allow a smaller version.
- Updated `dropdown-title.blade.php` to provide a default display name if none is set.
- Updated `discussion-board.blade.php` to create sections for every thread found in or eloquent model.
- Changed `help.blade.php` to give the hidden tag fields for every FAQ section a value equal to the tag instead of the name.
- Changed `navigation.blade.php` to use a submit button instead an anchor for logging out.
- Updated `web.php` to include a route for individual discussion threads.
- Updated `0001_01_01_000000_create_users_table.php`:
  - Changed the `avatar` column to set a default avatar.
  - Changed the `about_me` column from a `string` to a `text` column.
  - Added a cast for the `role` column to UserRoleEnum.
- Refactored `toggle-tag-list-manager.js` to use an exported function for better modularity.

### Removed

- Deleted unused `responsive-nav-link.blade.php` component.
- Removed unused protected `$password` from `FaqFactory.php`.

## [2.2.0] - 2025-05-22

### Added

- Introduced reusable Blade components for dropdown menus:
  - `dropdown.blade.php`: Wrapper for dropdown functionality.
  - `dropdown-title.blade.php`: Dropdown title with user avatar and display name.
  - `dropdown-menu.blade.php`: Dropdown menu items.
- Added dropdown menu example to `stylesheet.blade.php` for demonstration purposes.

### Changed

- Refactored `navigation.blade.php` to use new dropdown components for user settings.
- Updated CSS class naming conventions:
  - Replaced `dropdown__title` with `dropdown-title`.
  - Replaced `dropdown__menu` with `dropdown-menu`.
- Enhanced dropdown styling in `colors.css` and `style.css`:
  - Improved padding, margins, and alignment for dropdown elements.
  - Adjusted hover and focus states for better accessibility.
- Updated navigation anchor `target` attribute to `data-target` when creating navigation anchors using `nav-link.blade.php`.

### Removed

- Removed inline dropdown logic from `navigation.blade.php` in favor of reusable components.
- Removed unused /[for*="toggle-alter-"/] rule from `style.css`

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

[2.5.0]: https://github.com/CodeSmashing/backend-web-project/releases/tag/v2.5.0
[2.4.0]: https://github.com/CodeSmashing/backend-web-project/releases/tag/v2.4.0
[2.3.0]: https://github.com/CodeSmashing/backend-web-project/releases/tag/v2.3.0
[2.2.0]: https://github.com/CodeSmashing/backend-web-project/releases/tag/v2.2.0
[2.1.0]: https://github.com/CodeSmashing/backend-web-project/releases/tag/v2.1.0
[2.0.0]: https://github.com/CodeSmashing/backend-web-project/releases/tag/v2.0.0
[1.0.0]: https://github.com/CodeSmashing/backend-web-project/releases/tag/v1.0.0
[0.0.2]: https://github.com/CodeSmashing/backend-web-project/releases/tag/v0.0.2
[0.0.1]: https://github.com/CodeSmashing/backend-web-project/releases/tag/v0.0.1
