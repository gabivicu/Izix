## Izix project

Please run 
           php artisan serve, 
           php artisan migrate,
           php artisan db:seed,
           composer install,
           npm run watch
           after cloning the project.
I made a CRUD for ArticleController and for CommentController I just added store() and deletedComments() methods.
I added the js part for checking how many times an user starts to write a comment and deletes it before publishing it in public/js/main.js
Go to http://127.0.0.1:8000/articles page and there you can add articles
Go to the page for one article http://127.0.0.1:8000/articles/1 and there you can add comments. In this texarea the comments will be tracked.