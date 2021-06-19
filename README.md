# Laravel Trello Project

## References

<ul>
<li><a href="https://github.com/laravel-notification-channels/trello">Laravel Trello</a></li>
<li><a href="https://developer.atlassian.com/cloud/trello/guides/rest-api/api-introduction/">Trello API</a></li>
</ul>

## Getting Started

### Create a Trello Account

So at the first, you should have a Trello account, if you do NOT have an account, <a href="https://trello.com">Create a new one</a>, then create your WorkSpace as shown <a href="https://github.com/mahmoudmohamedramadan/Laravel-Trello/tree/master/public/img/create_workspace.png">here</a>.

### Laravel Installation

if you are NOT install Laravel Installer as a global Composer dependency, run the NEXT command

```
composer create-project laravel/laravel Laravel_Trello
```

and if you want to install Laravel Installer as a global Composer dependency, run the NEXT command

```
composer global require laravel/installer
```

then run the NEXT command

```
laravel new Laravel_Trello
```

### Package Installation

**before embarking on installing this package, you should remove `guzzlehttp/guzzle` package to fades away any ERROR happens**

to remove `guzzlehttp/guzzle` package, run the NEXT command

```
composer remove guzzlehttp/guzzle
```

and to install `laravel-notification-channels/trello` package, run the NEXT command

```
composer require laravel-notification-channels/trello
```

### Setting up the Trello service

after installation, add your Trello REST API Key to your `config/services.php`

```PHP
// config/services.php
...
'trello' => [
    'key' => env('TRELLO_API_KEY'),
],
...
```

and to get your API Key visit <a href="https://trello.com/app-key">App Key</a>, and from the same page also you can take your `Token`, **do NOT forget to put `TRELLO_API_KEY=PAST_YOUR_API_KEY_HERE` into `.env` file**

### Usage

to create your notification file, run the NEXT command

```
php artisan make:notification TrelloNotification
```

after creation, copy my code in <a href="https://github.com/mahmoudmohamedramadan/Laravel-Trello/tree/master/app/Notifications/TrelloNotification.php">TrelloNotification.php</a>


also, to create your controller, run the NEXT command

```
php artisan make:controller UserController
```

after creation, copy my code in <a href="https://github.com/mahmoudmohamedramadan/Laravel-Trello/tree/master/app/Http/Controllers/UserController.php">UserController.php</a>

after we've create `UserController.php`, we need to add a new route as show in <a href="https://github.com/mahmoudmohamedramadan/Laravel-Trello/tree/master/routes/web.php">web.php</a>

also, we need to create an awesome form, So we should run the NEXT command

```
composer require laravel/ui
```

also, run the NEXT command to get all `Auth` views

```
php artisan ui bootstrap --auth
```

and finally copy my code in <a href="https://github.com/mahmoudmohamedramadan/Laravel-Trello/tree/master/resources/views/layouts/app.blade.php">app.blade.php</a> and, <a href="https://github.com/mahmoudmohamedramadan/Laravel-Trello/tree/master/resources/views/home.blade.php">home.blade.php</a>

and to notify the user, put `routeNotificationForTrello` function into `User.php` model as shown <a href="https://github.com/mahmoudmohamedramadan/Laravel-Trello/tree/master/app/Models/User.php">User.php</a>

as you've seen in `routeNotificationForTrello.php`, this function returns an array WITH `token` (which already we've got), and `idList`, and to get `idList` after we've created a new Workspace, do the NEXT steps

<ol>
<li>Create a new Card as shown <a href="https://github.com/mahmoudmohamedramadan/Laravel-Trello/tree/master/public/img/click_card.png">here</a>, then click it</li>
<li>Click Share button as shown <a href="https://github.com/mahmoudmohamedramadan/Laravel-Trello/tree/master/public/img/share_card.png">here</a></li>
<li>Finally click Export JSON link</li>
</ol>

congratulations ! you've finally got `idList` 🎉🤙
