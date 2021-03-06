UIR **EVENTS**
===================

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)


Event management application for the **International University of Rabat**

---------------

The Team
-----------

Looking for additional team members.

| Name     | Role  | Twitter| Email |
| :------- | ----: | :----  | :---: |
| EL AMRI Ali | Web Developer | @MrShoodey | shoodey@gmail.com |


-------------------

Installation
-------------

> 1.  Download zip.
> 2.  Modify `.env`.
> 3.  Create  `events` database.
> 4.  Launch terminal then `cd`into folder.
> 5.  Run `npm install` *(requires nodejs & npm)*.
> 6.  Run `composer install` or `composer update`.
> 7.  Run `php artisan migrate`.
> 8.  php `artisan db:seed` to populate tables.
> 9.  Run your local server.
> 10.  Log in using `admin@uir-events.com` & `admin` credentials couple.

----------------------------

Completed Tasks
--------------------

[23/01/2016] List of completed tasks (non exhaustive)

> **Registration:**
> 
> * Users can register using (Full name, Email and Password).
> * Welcome email is sent, notifying that an admin will shortly activate account.
> 
> **Activation:**
> 
> * An admin will activate the new user's account from a link sent to his email address.
> * Only active account are allowed to log in and view the dashboard panel.
> 
> **Login:**
> 
> * Users can log in using (Email and Password)
> * As mentioned above, only active account are allowed to log in and view the dashboard panel.
>
> **Lockscreen:**
> 
> * When loging out, the user's session is locked, allowing him to simply re-login using only password.
> * The user can also chose to login user a different account.
>
> **Password Reset**
>
> * If password is forgotten, the user can send a password reset request to his email address.
> * The link will allow him to set a new password then login.
> 
> **Toasts:**
> 
> * The user is notified each time he performs a major action using [toastr](https://github.com/CodeSeven/toastr).
> 
> **Emails:**
>
> * An email is sent to the user's email address each time he performs a major action.
> * Email template is handled using [BeautyMail](https://github.com/Snowfire/Beautymail).
> 
> **Roles & Permissions:**
> 
> * Roles can be created in the fly.
> * Each role is assigned to a specific set of users.
> * Each role has a set of permissions.
> * An `admin` role is assigned to the application administrator, providing a full access.
> 
> **Breadcrumbs:**
> 
> * Breadcrumbs are used to help the user locate himself, using [Laravel Breadcrumbs](https://github.com/davejamesmiller/laravel-breadcrumbs)
> 
> **Bug Reports:**
> 
> * On any page, the user can click the `lady bug` button and send a request to the administrator containing issues encountered.

----------

TODO
-------


> **Notifications:**
>
> * Manage notifications using [notifynder](https://github.com/fenos/Notifynder).
>
> **Entities:**
>
> * Create entities which will regroup users under the same function (Community Managers, Club Presidents, Poles Assistants...)

-----------