# Launch

**Launch** is a comprehensive classifieds, ad-listing, and job portal web application tailored for the UAE market. It allows users to buy, rent, and book everything from used cars and properties to finding jobs and services across Dubai, Abu Dhabi, Sharjah, and the rest of the UAE.

## Features

- **Ad Listings & Classifieds**: Browse and post ads across various categories like Properties, Cars, Jobs, and general Classifieds.
- **Vendor Management**: Vendors can register, log in, and manage their posted ads and product listings via a dedicated vendor dashboard.
- **Job Portal**: Employers can post job openings and candidates can apply directly through the platform.
- **Admin Dashboard**: Comprehensive admin panel to manage vendors, user applications, product categories, subcategories, and ad attributes.
- **Advanced Search & Filtering**: Search ads and listings by category, location (City/State), and price range.
- **Responsive Design**: Modern and responsive user interface built with Tailwind CSS.

## Tech Stack

- **Backend**: Laravel (PHP 8.3+)
- **Frontend**: Blade Templates, Tailwind CSS, Vite
- **Database**: MySQL

## Prerequisites

- PHP >= 8.3
- Composer
- Node.js & NPM
- MySQL

## Local Setup & Installation

1. **Clone the repository** (if applicable):
   ```bash
   git clone <repository-url>
   cd launchlaravel
   ```

2. **Install PHP dependencies**:
   ```bash
   composer install
   ```

3. **Install NPM dependencies**:
   ```bash
   npm install
   ```

4. **Environment Setup**:
   Copy the `.env.example` file to `.env`:
   ```bash
   cp .env.example .env
   ```
   *Note: Update the `.env` file with your local database credentials. The default database name expected is `launchincs_db`.*

5. **Generate Application Key**:
   ```bash
   php artisan key:generate
   ```

6. **Run Database Migrations**:
   ```bash
   php artisan migrate
   ```

7. **Compile Frontend Assets**:
   ```bash
   npm run build
   # Or for active development:
   # npm run dev
   ```

8. **Start the Development Server**:
   ```bash
   php artisan serve
   ```
   The application will be accessible at `http://localhost:8000` (or `http://launch_laravel.test` if using Laravel Valet).

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
