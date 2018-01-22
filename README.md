# README #

This README would normally document whatever steps are necessary to get your application up and running.

### What is this repository for? ###

This is a demo-project of a Laravel-based blogging system. It allows you to create a blog-posts
sorted by Categories, Tags, Users and Date. The UI is very intuitive and simple to use.

### How do I get set up? ###

-git-clone this project to your machine
-run composer install
-Copy .env.example file to .env on root folder.
-Open your .env file so that it can interact with your database.
-If you are a perfectionist as I'm change APP_NAME to cBlog	
-Run php artisan key:generate
-Run php artisan migrate
-generate some users and posts: php artisan db:seed
-if throws error-> run composer update and then composer dump-autoload and try again
-now, you can run the page using php artisan serve or valet link (still inside cBlog directory)
-open users table in the database, there is a user with a 1 in the admin column. Copy the username. Switch to /login, paste the username and type default password 'secret'
-Now you are successfully logged in!
-Switch to "/" site and there are posts, users and categories each interactively linked
-as a Admin, you can register new users and in the future (TODO for v1.1) you will be able to edit or delete every post

### Contribution guidelines ###

-ManyToMany relationship has to be implemented in Factories so that Tags can be linked with posts and vice versa

### Who do I talk to? ###

-My name is Matej, I'm web developer from Slovakia/Europe. This is my very first project, so do not hesitate to leave me TODOs. --> matej.malicky@gmail.com
-The project could not be done without tireless help of my dev-friend Vlado
