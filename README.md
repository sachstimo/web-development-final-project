# EsadeMoves - Student Housing Platform

A web platform for ESADE students to find and list housing options.

## Setup Instructions

1. Database Setup
   - Make sure MAMP is installed and running
   - Open phpMyAdmin (http://localhost/phpMyAdmin/)
   - Create a new database named 'esademoves'
   - Import the `database.sql` file

2. File Setup
   - Place all files in your MAMP htdocs directory
   - Ensure the directory structure is maintained:
     ```
     final-project/
     ├── css/
     │   └── style.css
     ├── includes/
     │   └── db.php
     ├── images/
     │   └── (your image files)
     ├── Static Pages
     │   ├── index.html
     │   └── about.html
     ├── Auth Pages
     │   ├── login.php
     │   ├── register.php
     │   └── logout.php
     ├── Processing
     │   ├── verify.php
     │   ├── process_register.php
     │   └── process_listing.php
     ├── Features
     │   ├── listings.php
     │   ├── create_listing.php
     │   └── profile.php
     └── Error Pages
         ├── error_login.html
         ├── query_error.html
         └── welcome.html
     ```

3. Configuration
   - Database connection settings are in `includes/db.php`
   - Default credentials:
     - Host: localhost
     - Username: root
     - Password: root
     - Database: esademoves

4. Access the Website
   - Start MAMP
   - Open http://localhost/final-project in your browser

## Cleanup Instructions

The following files and directories are not needed for production and should be removed:
- `web-development/` (reference files)
- `instructions/` (project documentation)
- `js/` (if empty)
- `.git/` (version control)

## Features

- User Registration (Students & Landlords)
- Housing Listings
- Student-specific features (Program selection, Roommate matching)
- Landlord listing management

## File Structure Explanation

### Core Files
- `*.html` - Static pages (index, about)
- `*.php` - Dynamic pages and processing scripts
- `includes/` - Configuration and shared files
- `css/` - Styling
- `images/` - Image assets

### Processing Files
- `verify.php` - Handles login authentication
- `process_register.php` - Handles user registration
- `process_listing.php` - Handles housing listings

## Security Notes

- Passwords are hashed using PHP's password_hash()
- SQL injection prevention through mysqli
- Session-based authentication
- Input validation and sanitization