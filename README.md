# cBlog #

cBlog is a shorter form of Creative Blog. It allows you to create a blog-posts sorted by Categories, Tags, Users and Date.
The UI is very intuitive and simple to use. 
This interactive web-app has a back-end built with amazing PHP framework Laravel.
The front-end uses lightweight and well-known Java Script framework jQuery, with AJAX CRUD implemented.

### Steps for a proper set-up ###

(recommended OS - Ubuntu 16.04)
* git-clone this project to your machine
* run composer install
* make sure you have php version >=7.1 and all variations of it: php7.x-mysql, php7.x-xml and so on
* Copy .env.example file to .env on root folder. You can type copy .env.example .env if using command prompt Windows or cp .env.example .env if using terminal Ubuntu.
* Open your .env file and change the database name (DB_DATABASE) to an empty database name you already have on your machine, username (DB_USERNAME) and password (DB_PASSWORD) field correspond to your configuration.
* If you are a perfectionist as I'm change APP_NAME to cBlog	
* Run php artisan key:generate to generate a unique Laravel security key
* Install npm for further use of SASS
* Run php artisan migrate
* create and Admin account using this command: php artisan db:seed --class=AdminSeeder
* if throws error-> run composer update and then composer dump-autoload and try again
* now, you can run the page using php artisan serve or vale link (still inside cBlog directory)
* open users table in the database, there is a user with a 1 in the admin column. Copy the username. Switch to /login, paste the username and type default password 'secret'
* Now you are successfully logged in!
* for generating a post/s run php artisan db:seed --class=PostSeeder
* Go to the "/" and there should be posts, users and categories generated randomly using Faker.
* for using CSS and JS, compile /resources/assets/sass/app.sass using npm run watch

### Contribution guidelines ###

-ManyToMany relationship has to be implemented in Factories so that Tags can be linked with posts and vice versa

### Who do I talk to? ###

I'm young dev from Europe/Slovakia. My name is Matej Malicky and my dream is to become a web developer and manage only the best relationships between machines and people.
I come from Slovakia/Europe. This is my very first project, so do not hesitate to leave me TODOs. --> matej.malicky@gmail.com
-The project could not be done without tireless help of my dev-friends Vlado & Lukas
