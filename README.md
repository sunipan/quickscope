# Quickscope - A PHP Reddit Clone

Developed within a group for a school project.

Installation:

[Download and install XAMPP](https://www.apachefriends.org/download.html)

Clone the git repository into the htdocs folder of your XAMPP root directory

[Download and install Composer for PHP package management](https://getcomposer.org/download/)

Composer packages needed are PHPMailer and PHPDotEnv:

```
composer require phpmailer/phpmailer

composer require vlucas/phpdotenv
```

The database set up is located in src/database

Configure your .env with the correct information by following the example

Configure the forgotProcess.php in src/server folder with the correct SMTP for resetting passwords. I used a new email that I made up on google then assinged the email and passwords to the env variables.

All done!

Boot up your XAMPP SQL and Apache and explore the site, create a post, a forum, change your profile picture.

> Note: The admin feature can only be accessed by admins who are users manually set in the database, tick isAdmin in the users table to 1 for the specific user you wish to make an admin.
