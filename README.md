# Blogging (Laravel 8)

## How to install project

1. First install [Git](http://git-scm.com/), [NodeJS](https://nodejs.org/), [Composer](https://getcomposer.org/)
1. Read on [How To Setup SSH for GIT](https://confluence.atlassian.com/bitbucket/set-up-ssh-for-git-728138079.html)
2. `git clone git@bitbucket.org:lptool/lpshipment.git`
3. copy `.env.example` into `.env` file and update DB_*, URL settings
4. set read/write permissions to
    * storage/*
5. run `php artisan key:generate` to update `API_KEY` in `.env` file
6. `composer install`
7. `npm install`
8. `npm run dev`
9. `php artisan migrate`
11. configure your "Apache" to use `public` directory as `DocumentRoot`
12.  Login with admin user
```
Email    - admin@blog.com
Password - admin@123
```



## Import Blogs from Heroku 
##### [Starting The Scheduler on server](https://laravel.com/docs/8.x/scheduling) or run command in terminal 
```
 php artisan command:import-heroku-blogs
```
