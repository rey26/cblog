# README #

This README would normally document whatever steps are necessary to get your application up and running.

### What is this repository for? ###

This is a demo-project of a Laravel-based blogging system. It allows you to create a blog-posts
sorted by Categories, Tags, Users and Date. The UI is very intuitive and simple to use.

### How do I get set up? ###

* git-clone this project to your machine
* run composer install
* Copy .env.example file to .env on root folder. You can type copy .env.example .env if using command prompt Windows or cp .env.example .env if using terminal Ubuntu.
* Open your .env file and change the database name (DB_DATABASE) to whatever you have, username (DB_USERNAME) and password (DB_PASSWORD) field correspond to your configuration.
* If you are a perfectionist as I'm change APP_NAME to cBlog	
* Run php artisan key:generate
* Run php artisan migrate
* create and Admin account using this command: php artisan db:seed --class=AdminSeeder
* if throws error-> run composer update and then composer dump-autoload and try again
* now, you can run the page using php artisan serve or vale link (still inside cBlog directory)
* open users table in the database, there is a user with a 1 in the admin collumn. Copy the username. Switch to /login, paste the username and type default password 'secret'
* Now you are successfully logged in!
* for generating a post/s run php artisan db:seed --class=PostSeeder
* Refresh the site and there are posts, users and categories.
* for using CSS and JS, compile /resources/assets/sass/app.sass using npm run watch

### Contribution guidelines ###

* Writing tests
* Code review
* Other guidelines

### Who do I talk to? ###

* I'm young dev from Europe/Slovakia. My name is Matej Malicky and my dream is to become a web developer and manage only the best relationships between machines and people.