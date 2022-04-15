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

In other to use a view, the view helper function  with the view name as parameter
has to be return :

``` 
return view('viewName');
```

## Route names

- The route names allow you to use the same route across multiple files by simply
using the name assigned to the route.
- It makes it easier to modify routes as the names don;t have to be modified across
multiple files.
- The name helper function is used to name a route. Assigning the name <i>contact<i> to the 
route <i>contact-us<i> is done as shown below:

``` 
Route::get('contact-us', [PageController::class, 'showContactPage'])->name('contact');
```

- In order to use this route in a view, the route helper function is used with the route
name. For example, using the contact-us route is as shown below.

``` 
<a href="{{ route('contact') }}"> Contact Us </a>
```

### Rendering data on blade using {{}}

- The curly braces are used to open php and echo/print the content that's in the braces.
- This format does not process html, in order to process html, an escape sequence is used
with a single pair of curly braces: <b>{!! (html content here) !!}</b>

## Passing Parameters between Routes, Controllers and Views

### Passing to Routes

- The method <i>route</i> takes an extra parameter which can hold keys and values
that are passed to the route. This is done using an associative array. 
- The name of the key has to be the same as the name of the variable that was used in the
route.

For example, given the route;

``` 
Route::get('students/{id}', [StudentController::class, 'show'])->name('studentDetails');
```

the {id} is the variable that needs to be replaced. To do so, we pass an extra parameter to the
route method where it is called as shown in the example below:

```
<a href="{{ route('studentDetails',  ['id' => 1] )}}">details</a>
```

### Passing to the Controller

- The variable can then be passed from the route to the Controller.
- Only the method that accessed the parameter in the route can access it directly in the
controller.
- The variables mustn't neccesarily be named the same but their order needs to be respected.
- Using the <i>id</i> in the show function of StudentController is as shown below.

``` 
public function show($studentId) { ... }
```

### Passing to the View

- From the controller, the variable can be passed to the view using two methods:

#### The compact method

```
return view('student-details', compact('studentId'));
```
- The limitation of this method is, the variable name can't be changed in a View without changing
all instances of it in the Controller.

#### The with method

```
return view('student-details')->with('selectedStudentId', $studentId);
```
- In case a different name needs to be used in the view, the first parameter of the <i>with</i>
method is used to assign the new name. 

## Database Migrations

- Database migration helps a team to be able to sync their databases
- The database connection needs to be configured in the <i>.env</i> folder
- Then, the database with the same name, user and password as specified in the <i>.env</i> file needs
to be created on our database server.
- A new table migration is later on created using the command:

```
php artisan make:migration name
```
- The table migration would contain the name of the tables we want to add in its Schema. For example:

<i>
     Schema::create('students', function (Blueprint $table) {
            $table->id();;
            $table->timestamps();
    });
</i>

- To migrate the tables that were created to the database server, the following command is run:

```
php artisan migrate
```

## Eloquent Models

- Each database table has a corresponding model which is used to interact with the table.
- Models are used to query data from and add data to a database.
- All models are singular and the database is plural in laravel.