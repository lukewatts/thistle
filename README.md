## Thistle Framework

**Name:** Thistle

**Author:** Affinity4

The Thistle Framework is built on the [Silex framework v1.3](http://silex.sensiolabs.org/doc/1.3). However, it comes with Controllers, Models, Views, a config file and routes already set up to use immediately.

### Views
Views are setup to use Twig. You can use them in your controllers with the ```view()``` function like so:

```
// app/routes.php
$app->get('/', 'App\Controller\Page::home')-bind('home');
```

```
// app/controllers/Page.php
namespace App\Controller;

use Silex\Application;

class Page extends BaseController
{
    public function home(Application $app)
    {
        return view('home', [
            'message' => 'Hello Wordl!'
        ]);
    }
}
```

```
// app/views/home.html.twig
<!DOCTYPE html>
<head>
    <title>{{ message }}</title>
</head>
<body>
    {{ message }}
</body>
```

### Models
You can easily create a Model and attach it to ```$app``` by first simply a file in the app/models directory:

```
// app/models
namespace App\Model;

class User extends BaseModel
{
    public function getTableName()
    {
        return 'users';
    }
}
```

That's all you need to do to tell this object to map to the 'users' table. Thistle will handle the rest.

You'll now have access to that object from ```$app['user']```. You can use this to retrieve rows from the users table, insert, delete and update.

Note: The keys are created from the name of the file/class in the app/models directory.
For example, if you're class is called UserPage, you will access that table using the ```$app['user_page']```

### Useful Methods when using Models
```
// SELECT * FROM users WHERE id = 1 LIMIT 1
$app['user']->find(1) // Finds the user with id of 1
```

Would return:
```
[
    'id'    => '1',
    'name'  => 'Luke Watts',
    'type'  => 'author'
]
```

```
// SELECT * FROM users WHERE name = "Luke Watts" LIMIT 1
$app['user]->findOneBy(['name' => 'Luke Watts']) // Returns one row where name = "Luke Watts"
```
Would return:
```
[
    'id'    => '1',
    'name'  => 'Luke Watts',
    'type'  => 'author'
]
```
```
// SELECT * FROM users WHERE name
$app['users']->findBy(['type' => "standard"]); // Returns array of users where type = "standard"
```
Would return
```
[
    0 => [
        'id'    => '2',
        'name'  => 'Jane Doe',
        'type'  => 'standard',
    ],
    1 => [
        'id'    => '3',
        'name'  => 'John Doe',
        'type'  => 'standard',
    ]
]
```

### Routing and Controllers
Routes can be found in the app/routes.php file. For more information on routes see the [Silex routing documentation](http://silex.sensiolabs.org/doc/1.3/usage.html#routing)

```
$app->get('/', 'App\Controller\Page::home')->bind('home');
```
This would map to the method "home" in the controller "Page" found in app/controllers/Page.php.

You can also use closure instead of controllers if you like for smaller routes.
```
$app->get('/test', function () use ($app) {
    return new Symfony\Component\HttpFoundation\Response('Success!');
})->bind('test');
```

### Silex
For anything else you can see the [Silex Documentation](http://silex.sensiolabs.org/doc/1.3) seeing as Thistle is mostly a boilerplate for Silex.

### Licence
Licenced under GNU GPLv3