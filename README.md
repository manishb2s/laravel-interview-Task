# Basic Laravel Blog

This repository contains a blog scaffolding built with Laravel 8 featuring:

- API Authentication using Laravel Sanctum
- Web Authentication and Registration using Laravel Breeze
- Author, Comment and Post Resources

**All resources are managed through the API** and as such the project has no front-end (except for authentication).

## Project Status
**At this stage, the project is incomplete. Your job is to complete the following tasks:**

## Incomplete Tasks

**The requirements of the project are very simple. Anyone with the access to the project's API should be able to list, create, update and delete `authors`, `posts` and `comments`.**

- Protect the API resources so that only authenticated users can access those routes. View the documentation for `Laravel Sanctum` to figure out how to complete this step.
- The API resources are registering all the default routes, but since there's no front-end, the application only requires the `index`, `show`, `store`, `update` and `destroy` endpoints. Make sure the remaining routes are not registered. Laravel provides a console command to view the registered routes. 
- **The API resource controllers are empty and must be implemented.** Make sure to remove the methods that are no longer consumed by the API routes. Make sure to use the FormRequests when creating and updating a resource.
- Add the missing `comments` method (`HasMany` **relation**) to the `Post` model.
- Add the missing `user` method (`BelongsTo` **relation**) to the `Comment` model.
- Hide the `post_id` and `user_id` attributes for JSON output for the `Comment` model.
- Hide the `author_id` attribute for JSON output for the `Post` model.
- Add the missing attribute to the `PostFactory`.
- Make sure the FormRequests are validating all the fields properly. Most of the FormRequest are already implemented. You can view the migrations and models to figure out the fields required by a particular FormRequest.
- When creating and updating an author, make sure that the author's name is at-least 2 characters long and does not exceed 50 characters. In addition, make sure that only alphabet (lower and uppercase) and space characters are allowed as the valid name.
- By default, Laravel uses `/home` as the route to redirect to the home page. Change this from `/home` to `/`.
- The `/login` and `/register` routes inside `routes/auth.php` show the login and registration forms respectively.
    - Update the login view to include a button to show the registration form.
    - Update the registration view to include a button to show the login form.
- Add the missing `/logout` route to `routes/api.php`

## Instructions
- Clone this repository.
- Create a branch off of `main` to complete the required tasks. You can name the branch anything you want.
- Install dependencies:
    - `composer install`
    - `yarn install` or `npm install`
- Compile assets:
    - `yarn dev` or `npm run dev`
- Complete the tasks mentioned above. Try to commit after a group of related tasks are complete.
- Once all the tasks are complete, push the changes to the repository.
- Create a pull-request for code review. Your branch will be merged to `main` after the code review is successful.
- **You have three days to complete the tasks after you have accepted the invitation to collaborate on the repository.**
- **Ideally, you should complete all the tasks but if you're stuck, move on to the next task and try to complete the remaining tasks later.**

## Submission Checklist
Before you create a pull-request to submit the changes, make sure that:

- You are not committing any unrelated files to the repository. Add the unrelated files to `.gitignore` (located at the project root).
- You cleanup your code to remove the debug statements like `dd`, un-used variables, imports and methods.

## Notes
- Web authentication uses [Laravel Breeze](https://laravel.com/docs/8.x/breeze)
- API authentication uses [Laravel Sanctum](https://laravel.com/docs/8.x/sanctum)
- The code contains comments hinting at how to complete the task.

## Company Portfolio
- https://www.business2sell.com.au
- https://www.commercialproperty2sell.com.au
- https://www.bondcleaningincanberra.com.au
- https://www.bondcleaninginmelbourne.com.au/
- https://www.bondcleaninginperth.com.au/vacate-cleaning/ 
