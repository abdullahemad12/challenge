<<<<<<< HEAD
# CakePHP Application Skeleton

[![Build Status](https://img.shields.io/travis/cakephp/app/master.svg?style=flat-square)](https://travis-ci.org/cakephp/app)
[![License](https://img.shields.io/packagist/l/cakephp/app.svg?style=flat-square)](https://packagist.org/packages/cakephp/app)

A skeleton for creating applications with [CakePHP](http://cakephp.org) 3.x.

The framework source code can be found here: [cakephp/cakephp](https://github.com/cakephp/cakephp).

## Installation

1. Download [Composer](http://getcomposer.org/doc/00-intro.md) or update `composer self-update`.
2. Run `php composer.phar create-project --prefer-dist cakephp/app [app_name]`.

If Composer is installed globally, run

```bash
composer create-project --prefer-dist cakephp/app
```

In case you want to use a custom app dir name (e.g. `/myapp/`):

```bash
composer create-project --prefer-dist cakephp/app myapp
```

You can now either use your machine's webserver to view the default home page, or start
up the built-in webserver with:

```bash
bin/cake server -p 8765
```

Then visit `http://localhost:8765` to see the welcome page.

## Update

Since this skeleton is a starting point for your application and various files
would have been modified as per your needs, there isn't a way to provide
automated upgrades, so you have to do any updates manually.

## Configuration

Read and edit `config/app.php` and setup the `'Datasources'` and any other
configuration relevant for your application.

## Layout

The app skeleton uses a subset of [Foundation](http://foundation.zurb.com/) CSS
framework by default. You can, however, replace it with any other library or
custom styles.
=======
# challenge

# summary
I created this website as a test task assigned by deemaLabs. This website allows the user to create an account or login with an existing account. The user is then redirected to the a static page which can't ba accessed unless the user is logged in. In fact, no page is made accissible to a non authorized user other than the login and register pages. The user than can go to the posts veiw page which will display all the available posts. The user can add a new post or add a comment on an existing post! he can as well delete and edit his own posts but he is not allowed to delete or edit other users comments..... All the tables are done with migrations! In order to create the data base run "bin/cake migrations migrate" in the terminal...The categories table exists however it's not used becuase I didn't know what will they be used and nothing in the description specified creating a description page



# Note

I created this website just to domestrate my abilities! It may not complete and the front end may not look extremely beautiful; however, I implemented all the required features that were send to me on the Email


# Abdullah Emad
>>>>>>> 3de4cc8e9a42379557881b236255fc34869528b8
