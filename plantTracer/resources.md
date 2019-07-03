
## RESOURCES

## VERSION 5.4 

Plant Tracer was built using Laravel version 5.4. All of the basic information I used in learning how to built it can be found here: https://laracasts.com/series/laravel-from-scratch-2017
IN SUMMARY, all the back-end PHP and MySqli code should go under app/Http/Controllers. https://laravel.com/docs/5.8/database All the front-end code should go under resources/views. https://laravel.com/docs/5.8/blade
Laravel is currently on version 5.7, meaning that certain features may be different. For example, foo.dev will now be foo.test when testing a laravel site locally via Laravel Valet. More info on this can be found here https://laravel.com/docs/5.8/valet under the section INSTALLATION.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of any modern web application framework, making it a breeze to get started learning the framework.

If you're not in the mood to read, [Laracasts](https://laracasts.com) contains over 1100 video tutorials on a range of topics including Laravel, modern PHP, unit testing, JavaScript, and more. Boost the skill level of yourself and your entire team by digging into our comprehensive video library.

## USING ANGULAR WITH LARAVEL

To transform PHP variables to Javascript variables in case it it optimal to pass variables as such between controller and blade (view) files, refer to the video here: https://www.youtube.com/watch?v=EttuAGYJ_so&list=PLyA7Sa1aaX8QnVOAZtStS-T3BGEoT0ANn&index=2&t=0s
I referred to this video in order to use AngularJS with Laravel in my blade files. However, it would be more efficient to simply use the built-in Laravel PHP for the blade files when multiple divs need to be populated dynamically (for loops, etc). To do so, refer here: https://laravel.com/docs/5.8/blade under the section LOOPS

## UPLOADING TO THE SERVER

Simply put all files and folders under the public folder in the server. For example, in BlueHost, I simply took all the contents of the plantTracer directory in the public_html directory, and that did the trick. Keep files in their respective folders (so upload the contents of plantTracer to public_html, but do not, for example, take email.blade.php out of the views folder in the resources directory).

## CONNECTING TO DATABASE

Simply configure DB credentials in the .env file 
