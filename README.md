<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

Notes :

    Data seeding : 
    ---------------

1. Create migrations table : php artisan make:migration create_posts_table
2. create MModel : php artisan make:model Post -- create a migration for the Posts table in database\migrations directory
3. php artisan make:factory PostFactory --model=Post -- create a factory name PostFactory in database\factories directory
4. add the created Factory to the DatabaseSeeder . -- seeder in seeder Directory
        \App\Models\Post::factory(1500)->create();
5. php artisan migrate:fresh --seed -->  seed the database with test data.
    
    Write the Database Relationships 
    -------------------------------

1. a category will have many posts.

        class Category extends Model
            {
            ...
            public function posts(){
            return $this->hasMany(Post::class);
            }
            ...
            }
2.    The comment will be written by a user and it will be on a post. 


creating the Api  
------------------

create Resource, controllers and api routes

When building an API, you may need a transformation layer that sits between your Eloquent models and the JSON responses that are actually returned to your application’s users. Laravel’s resource classes allow you to expressively and easily transform your models and model collections into JSON.

1. php artisan make:resource CategoryResource -- creates CategoryResource in app\Http\Resources directory. create the rest of the resources i.e PostResource, TagResource, UserResource, ImageResource, and VideoResource

 ```language
        public function toArray($request)
            {
            return [
            'category_id' => $this->id,
            'category_title' => $this->title,
            'category_color' => $this->color,
            ];
            }
            // (Optional) Additional code is attached to the response
            public function with($request){
            return [
             'version'=>"1.0.0",
            'author_url'=>"https://mwendofamilia.com"
            ];
            }
 ```

2. Create the required controllers
    **php artisan make:controller Api\CategoryApiController ** -->creates CategoryApiController in theapp\Http\Controllers\Api directory. Open that file and write the methods to perform actions.

        ```language
          public function index()
            {
                $categories = Category::all();
                return CategoryResource::collection($categories);
            }
            public function posts($id)
            {
                $posts = Post::where('category_id', $id)->orderBy('id', 'desc')->paginate();
                return PostResource::collection($posts); //Todo: create Resources
                // todo: create the rest of the functions i.e. CommentApiController, PostApiController, TagApiController, and UserApiController

            }
        ```


3.create routes for the API. 
    go to the routes directory and open api.phpfile. 
    create the api endoints that will reference th methods created in CategoryApiController, CommentApiController, PostApiController, TagApiController, and UserApiController.


creating the front-end 
----------------------
There is make:livewire command which creates two files, one in app\Http\Livewire directory and another in resources\views\livewire directory.
Different versions of this command are as follows:
```language
    php artisan make:livewire foo
    # Creates Foo.php & foo.blade.php
    php artisan make:livewire foo-bar
    # Creates FooBar.php & foo-bar.blade.php
    php artisan make:livewire Foo\\Bar
    php artisan make:livewire Foo/Bar
    php artisan make:livewire foo.bar
    # Creates Foo/Bar.php & foo/bar.blade.php
    php artisan make:livewire foo --inline
    # Creates only Foo.php
```
<!-- remember to install sunctum: 
    composer require laravel/sanctum
    
 -->


to disable teams in laravel : 
comment out the Feature::teams() line in config/jetstream.php