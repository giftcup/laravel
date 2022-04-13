# Laravel
## Learning Laravel: Beginner to Professional

## Starting a laravel project
- In order to create a laravel project using composer, run

```
composer create-project laravel/laravel app-name

```

## Creating and Using Controllers
- Controllers are responsible to controlling application logic and
act as a coordinator between the View and the Model.
- To create a new controller, run this command in the terminal:

```
php artisan make:controller NameController

```
Sometimes, even after running the command, it might be necessary
to include Controllers as a <i>namespace</i> in other to be
able to use them in a file. This is done by adding the following
line to the file the controller needs to be used in.

```
namespace App\Http\Controllers;

```

## Creating and Using Views

- The View component is involved in the application's user interface.
- Views are found in the resources folder.

In other to use a view, the function view with the view name as parameter
has to be return :

``` 
return view('viewName');

```