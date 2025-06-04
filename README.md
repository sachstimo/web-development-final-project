# EsadeMoves - Student Housing Platform

A web platform for ESADE students to find and list housing options.

## Local Development Setup

1. Database Setup (MAMP)
   - Make sure MAMP is installed and running
   - Open phpMyAdmin (http://localhost/phpMyAdmin/)
   - Create a new database named 'esademoves'
   - Import the `database.sql` file

2. File Setup
   - Place all files in your MAMP htdocs directory
   - In `includes/db.php`, make sure `$is_local = true;`

3. Local Configuration
   - Default MAMP credentials:
     - Host: localhost
     - Username: root
     - Password: root
     - Database: esademoves

4. Access Local Website
   - Start MAMP
   - Open http://localhost/final-project in your browser

## Plesk Deployment

1. Database Setup
   - In Plesk, go to Databases
   - Create a new database (e.g., admin_esademoves)
   - Create a database user (e.g., admin_moves)
   - Note down the connection details:
     - Host (usually localhost:3306)
     - Database name
     - Username
     - Password

2. File Preparation
   - Update `includes/db.php`:
     - Set `$is_local = false;`
     - Update the Plesk credentials section with your database details
   - Create a ZIP file with all necessary files:
     ```
     *.php
     *.html
     css/*
     images/*
     includes/*
     ```

3. File Upload
   - In Plesk, go to File Manager
   - Navigate to httpdocs or public_html
   - Upload and extract your ZIP file
   - Import `database.sql` through phpMyAdmin

4. File Permissions
   - Files: 644 (-rw-r--r--)
   - Directories: 755 (drwxr-xr-x)
   - images/: 777 (if uploads needed)

## Features

- User Registration (Students & Landlords)
- Housing Listings
- Student-specific features (Program selection, Roommate matching)
- Landlord listing management

## File Structure

```
project/
├── css/
│   └── style.css
├── includes/
│   └── db.php
├── images/
├── Static Pages
│   ├── index.php
│   └── about.html
├── Auth Pages
│   ├── login.php
│   ├── register.php
│   └── logout.php
├── Processing
│   ├── verify.php
│   ├── process_register.php
│   └── process_listing.php
└── Features
    ├── listings.php
    ├── create_listing.php
    └── profile.php
```

## Security Features

- Passwords are hashed using PHP's password_hash()
- SQL injection prevention through mysqli
- Session-based authentication
- Input validation and sanitization

## Troubleshooting

1. Database Connection Issues
   - Verify database credentials in `includes/db.php`
   - Check if MySQL is running
   - Confirm correct port number (3306 for Plesk)

2. File Access Issues
   - Check file permissions
   - Verify paths in includes
   - Check error logs in Plesk

3. Upload Issues
   - Ensure images directory is writable
   - Check PHP upload limits in php.ini