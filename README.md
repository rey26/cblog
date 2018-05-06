# README #

This README would normally document whatever steps are necessary to get your application up and running.

### What is this repository for? ###

This is a demo-project of a Laravel-based blogging system. It allows you to create a blog-posts
sorted by Categories, Tags, Users and Date. The UI is very intuitive and simple to use.

### How do I get set up? ###

<<<<<<< HEAD
* git-clone this project to your machine
* run composer install
* Copy .env.example file to .env on root folder. You can type copy .env.example .env if using command prompt Windows or cp .env.example .env if using terminal Ubuntu.
* Open your .env file and change the database name (DB_DATABASE) to whatever you have, username (DB_USERNAME) and password (DB_PASSWORD) field correspond to your configuration.
* If you are a perfectionist as I'm change APP_NAME to cBlog	
* Run php artisan key:generate
* Install npm for further use of SASS
* Run php artisan migrate
* create and Admin account using this command: php artisan db:seed --class=AdminSeeder
* if throws error-> run composer update and then composer dump-autoload and try again
* now, you can run the page using php artisan serve or vale link (still inside cBlog directory)
* open users table in the database, there is a user with a 1 in the admin collumn. Copy the username. Switch to /login, paste the username and type default password 'secret'
* Now you are successfully logged in!
* for generating a post/s run php artisan db:seed --class=PostSeeder
* Refresh the site and there are posts, users and categories.
* for using CSS and JS, compile /resources/assets/sass/app.sass using npm run watch
=======
-git-clone this project to your machine
-run composer install
-Copy .env.example file to .env on root folder.
-Open your .env file so that it can interact with your database.
-If you are a perfectionist as I'm change APP_NAME to cBlog	
-make sure you have php version >=7.1 and all variations of it: php7.x-mysql, php7.x-xml and so on
-install latest version of npm(v5.6.0) and node(v8.x)
-run npm update && npm run dev for proper functionality of SASS and .js files
-Run php artisan key:generate
-Run php artisan migrate
-generate some users and posts: php artisan db:seed
-if throws error-> run composer update and then composer dump-autoload and try again
-now, you can open the page in the browser using php artisan serve or valet link (still inside cBlog directory)
-open users table in the database, there is a user with a 1 in the admin column. Copy the username. Switch to /login, paste the username and type default password 'secret'
-Now you are successfully logged in!
-Switch to "/" site and there are posts, users and categories each interactively linked
-as a Admin, you can register new users and in the future (TODO for v1.1) you will be able to edit or delete every post
>>>>>>> 4b8238cefb389caf26b3804aa494d440c00c43e7

### Contribution guidelines ###

-ManyToMany relationship has to be implemented in Factories so that Tags can be linked with posts and vice versa

### Who do I talk to? ###

<<<<<<< HEAD
* I'm young dev from Europe/Slovakia. My name is Matej Malicky and my dream is to become a web developer and manage only the best relationships between machines and people.
=======
-My name is Matej, I'm web developer from Slovakia/Europe. This is my very first project, so do not hesitate to leave me TODOs. --> matej.malicky@gmail.com
-The project could not be done without tireless help of my dev-friend Vlado
>>>>>>> 4b8238cefb389caf26b3804aa494d440c00c43e7
