# Backend Web project

Final project for Backend Web course

___

## Project Overview

This repository contains the final project for the the **Backend Web** course.
It is built using the [Laravel](https://laravel.com/) framework and tries to follow modern PHP and Laravel best practices.

___

## Getting Started

### Requirements

- **PHP 8.x**
- **Composer**
- **PHPUnit**

___

### Setup

```bash
# Clone the repository
git clone https://github.com/CodeSmashing/backend-web-project.git
cd BackendWeb

# Install PHP dependencies
composer install

# Copy and configure environment variables
cp .env.example .env
php artisan key:generate

# Run migrations (if needed)
php artisan migrate

# Start the development server
php artisan serve
```

___

## Usage

- Access the application at [http://localhost:8000](http://localhost:8000) after running `php artisan serve`.
- API endpoints are available under `/api`.

___

## Structure

```bash
app/             # Application logic (controllers, models, services, helpers)
routes/          # Route definitions (web.php for web, api.php for API)
resources/views/ # Blade templates
public/          # Publicly accessible files (entry point, assets)
```

___

## Functionality

- Guest users can:
  - View threads
  - View posts
  - View FAQ
  - View user names
  - Make an account:
    - Display name
    - Real name
    - Email
    - Role
    - Password
  - Log into an account using their email and password
- Users/admins can
  - Make a thread:
    - Title
    - Content
  - Make a post under a post:
    - Content
  - Edit their profile:
    - Avatar
    - Display name
    - Real name
    - About
    - Birthday
    - Role
    - Email
  - Update their password
- Admins can
  - Access the admin dashboard:
    - Update profile info of any user

## Extras

- Stylesheet

## Implementation Technical Requirements Assignment

- Views
  - 1 Layout -> App
  - Used components for: posts, input, navigation and dropdown
  - Redirecting users if they aren't logged in/ aren't an Admin
- Routes
  - Routes use controller methods -> to fetch posts, users ect...
  - (some) Routes use middelware -> authentication
- Controller
  - Used controllers for (some) of the logic of all pages
- Models
  - Made all the necessary models for the entities required
- Database
  - Is equipped with seeders and factories to populate the database
- Authentication
  - Login/out
  - Remeber methods
  - Register
  - Default Admin
    - admin
    - <admin@ehb.be>
    - Password!321

___

## AI help chat logs

[Perplexity](https://www.perplexity.ai/search/for-a-dynamic-website-made-usi-3mMlBPgmRZqcCzSKrIjCqg)

___

## Contributing

Pull requests are welcome for improvements or fixes!
Feel free to fork the repository and submit your changes.

___

## References & Inspiration

This project was inspired by or uses design ideas from the following sources:

- [FAQ Page Design](https://kayako.com/blog/faq-page-design/)
- [FAQ SOS KinderDorp](https://www.sos-kinderdorpen.be/nl/faq)
- [Contact SOS KinderDorp](https://www.sos-kinderdorpen.be/nl/contact)
- [Events SOS KinderDorp](https://www.sos-kinderdorpen.be/nl/events)
- [CSS cheat-sheet](https://uniformcss.com/cheatsheet/font-sizes/)
- [Proverbs poster](https://www.pinterest.com/pin/100627372920223271/)
- [Dropdown tag menu](https://www.pinterest.com/pin/48976714683519705/)
- [Checklist menu](https://www.pinterest.com/pin/10344274113968806/)
- [Form Design](https://www.pinterest.com/pin/469218854950540835/)
- [Dropdown tag menu](https://www.pinterest.com/pin/72902087702132797/)
- [Accessible Dropdown Menu](https://moderncss.dev/css-only-accessible-dropdown-navigation-menu/)
- [Discussion page design](https://www.pinterest.com/pin/315814992609508510/)
- [The Front Page of the Internet](https://www.reddit.com)

**Potential future references:**

- [Menu Icons](https://www.pinterest.com/pin/7740630605578941/)
- [Notification modals](https://www.pinterest.com/pin/2955556002052703/)
- [Web breakpoints](https://www.pinterest.com/pin/9570217952844458/)
- [Retro Delorean poster](https://www.pinterest.com/pin/18366310975667439/)
- [Old computer screen](https://www.pinterest.com/pin/16747829861254747/)
- [Folder structure](https://www.pinterest.com/pin/2674081024930099/)
- [Retro UI](https://www.pinterest.com/pin/26599454045213868/)
- [Dashboard](https://www.pinterest.com/pin/293859944456625197/)
- [Profile page](https://www.pinterest.com/pin/422986590023194671/)
- [Order](https://www.pinterest.com/pin/39688040459699603/)
- [Scrollable shadows](https://stackoverflow.com/questions/9333379/check-if-an-elements-content-is-overflowing)
- [Example Navigation Menu](https://www.w3.org/WAI/ARIA/apg/patterns/disclosure/examples/disclosure-navigation/)
- [File input text hiding](https://stackoverflow.com/a/7691323)

___

## Licenses

This project is open-source and available under the [MIT license](LICENSE).

This project uses the Ubuntu font, licensed under the [Ubuntu Font Licence Version 1.0](public/css/fonts/UFL.txt).

Bootstrap Icons are © 2019–2025 The Bootstrap Authors and are released under the MIT License.
See [Bootstrap Icons License](licenses/BOOTSTRAP-ICONS-LICENSE) for details.
