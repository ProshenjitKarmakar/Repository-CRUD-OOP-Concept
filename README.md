
# How to Use the Repository Pattern in a Laravel Application - `Repository CRUD` 

A repository can be defined as a layer of abstraction between the domain 
and data mapping layers, one that provides an avenue of mediation between 
via a collection-like interface for accessing domain objects.

## Frontend Code
- We have to write some code for frontend structure. file location : `resources/views/student`

### Frontend Code - For create : `createStudent.blade.php`
```bash
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>District</title>
  </head>
  <body>
    
    <div class="container mt-5">
      <div class="row">
        <div class="col-md-4 col-md-offset-4">
          <h1>Student Information</h1>
          <hr>

            <form action="{{ Route('student.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="student_name">Student Name</label>
                    <input type="text"name="student_name" class="form-control" id="student_name" placeholder="name">
                </div>

                <div class="form-group">
                    <label for="student_name">Student Status</label>
                    <input type="text"name="student_status" class="form-control" id="student_status" placeholder="name">
                </div>
            
                <button type="submit" class="btn btn-primary btn-block">Submit</button><br>
                
                <a class="btn btn-sm btn-primary mt-3"  href="">Back</a>

            </form>
        </div>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
```

### Frontend Code - For student table : `index.blade.php`
```bash
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title></title>
  </head>
  <body>
    
    <div class="container mt-5">
      <div class="row">
        <div class="col-md-4 col-md-offset-4">
          <h1>Student Information</h1>
          <hr>
          <div class="br-pagetitle">
            <i class="icon ion-ios-home-outline"></i>
            <div>
              <h4>Student</h4>
              <p class="mg-b-0">Manage all your Students.</p>
            </div>
          </div>
        </div>
    
        <div class="br-pagebody">
            <div class="row row-sm">
                <div class="col-sm-12">
                    <div class="card p-3 shadow-base">
                    <table class="table productTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Student ID</th>
                                <th>Student Name</th>
                                <th>Student Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $sl=1; @endphp
                            @foreach($students as $student)
                            <tr>
                                <td>{{ $sl }}</td>
                                <td>{{ $student->student_id }}</td>
                                <td>{{ $student->student_name }}</td>
                                <td>{{ $student->student_status }}</td>
                                
                                <td>
                                    <a href="{{ Route('student.edit', $student->id) }}" class="btn btn-sm btn-info">Update</a>
    
                                    <button data-toggle="modal" data-target="#delete{{ $student->id }}" class="btn btn-sm btn-danger">Delete</button>   
                                </td>
                            </tr>
                                        <!-- Delete  Modal -->
                                        <div class="modal fade" id="delete{{ $student->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Confirmation Message</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure want to delete this product?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                        <a href="{{ Route('student.delete',$student->id) }}" class="btn btn-danger">Confirm</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @php $sl++; @endphp
                                @endforeach
                        </tbody>
                    </table>    
                    </div>
                </div>
            </div>
        </div>
            
        </div>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
```

### Frontend Code - For edit student table : `edit.blade.php`
```bash
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>District</title>
  </head>
  <body>
    
    <div class="container mt-5">
      <div class="row">
        <div class="col-md-4 col-md-offset-4">
          <h1>Student Information</h1>
          <hr>

            <form action="{{ Route('student.update', $student->id) }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="student_name">Student Name</label>
                    <input type="text"name="student_name" class="form-control" id="student_name" value={{ $student->student_name }}>
                </div>

                <div class="form-group">
                    <label for="student_name">Student Status</label>
                    <input type="text"name="student_status" class="form-control" id="student_status" value={{ $student->student_status }}>
                </div>
            
                <button type="submit" class="btn btn-primary btn-block">Submit</button><br>
                
                <a class="btn btn-sm btn-primary mt-3"  href="">Back</a>

            </form>
        </div>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
```
## File management to create `Repository Pattern` 
Repository Pattern also helps with keeping the code organized and avoiding duplication, 
as database-related logic is kept in one place. While this benefit is 
not immediately apparent in small projects, it becomes more observable 
in large-scale projects which have to be maintained for many years.


### Create the Repository - `Step 1`
- In the `app` directory, create a new folder called `Interfaces`. Then, in the Interfaces, create a new file called `StudentRepositoryinterface.php` and add the following code to it.
```bash
<?php

    namespace App\Interfaces;
    use Illuminate\Http\Request;
    interface StudentRepositoryinterface
    {
        public function getAllStudent();
        public function getStudentById($studentId);
        public function deleteStudent($studentId);
        public function createStudentInfo(Request $request);
        public function updateStudentInfo(Request $request, $id);
    }

?>
```

### Create the Repository - `Step 2`
- Next, in the `app` folder, create a new folder called `Repositories`. In this folder, create a new file called `StudentRepository.php` and add the following code to it.
```bash
<?php

    namespace App\Repositories;

    use App\Interfaces\StudentRepositoryinterface;
    use App\Models\Student;
    use Illuminate\Http\Request;
    class StudentRepository implements StudentRepositoryinterface
    {
        public function getAllStudent()
        {
            return Student::orderBy('id', 'desc')->get();
        }

        public function getStudentById($studentId)
        {
            $students = Student::findOrfail($studentId);
            return $students;
        }

        public function deleteStudent($id)
        {
            $student = Student::findOrfail($id);
            $student->delete();
            return $student;
        }

        public function createStudentInfo(Request $request)
        {
            $student = new Student();

            $student->student_id    = studentIDgenerator(new Student, 'student_id', 5, 'STD');
            $student->student_name  = $request->student_name;
            $student->student_status  = $request->student_status;
            $student->save();
            return $student;
        }

        public function updateStudentInfo(Request $request, $id)
        {
        
            $student = Student::findOrfail( $id);

            $student->student_name  = $request->student_name;
            $student->student_status  = $request->student_status;
            $student->update();
            return $student;
        }
    }
?>
```

### Create the Repository - `Step 3`
- `Creating the controllers :` With our repository in place, let's add some code to our controller. Open `app/Http/Controllers/StudentController.php` and update the code to match the following.
```bash
<?php

    namespace App\Http\Controllers;

    use App\Interfaces\StudentRepositoryinterface;
    use Illuminate\Http\JsonResponse;
    use Illuminate\Http\Request;
    use Illuminate\Http\Response;

    class StudentController extends Controller
    {
        private StudentRepositoryinterface $studentRepository;

        function __construct(StudentRepositoryinterface $studentRepository)
        {
            $this->studentRepository = $studentRepository;
        }
        /**
        * Display a listing of the resource.
        *
        * @return \Illuminate\Http\Response
        */
        public function index()
        {
            $students = $this->studentRepository->getAllStudent();
            return view('student.index',compact('students'));

            // return response()->json([
            //     'data' => $this->studentRepository->getAllStudent(),
            // ]);
        }

        /**
        * Show the form for creating a new resource.
        *
        * @return \Illuminate\Http\Response
        */
        public function create()
        {
            return view('student.createStudent');
        }

        /**
        * Store a newly created resource in storage.
        *
        * @param  \Illuminate\Http\Request  $request
        * @return \Illuminate\Http\Response
        */
        public function store(Request $request)
        {
            $store = $this->studentRepository->createStudentInfo($request);
            return view('student.createStudent');
        }

        /**
        * Display the specified resource.
        *
        * @param  int  $id
        * @return \Illuminate\Http\Response
        */
        public function show($id)
        {
            //
        }

        /**
        * Show the form for editing the specified resource.
        *
        * @param  int  $id
        * @return \Illuminate\Http\Response
        */
        public function edit($id)
        {
            $student = $this->studentRepository->getStudentById($id);
            return view('student.edit', compact('student'));
        }

        /**
        * Update the specified resource in storage.
        *
        * @param  \Illuminate\Http\Request  $request
        * @param  int  $id
        * @return \Illuminate\Http\Response
        */
        public function update(Request $request, $id)
        {
            $store = $this->studentRepository->updateStudentInfo($request, $id);
            return redirect()->route('student.create');
        }

        /**
        * Remove the specified resource from storage.
        *
        * @param  int  $id
        * @return \Illuminate\Http\Response
        */
        public function destroy($id)
        {
            $students = $this->studentRepository->deleteStudent($id);

            
        }
    }
?>
  
```

### Create the Repository - `Step 4`
- `Adding the routes :` To map each method defined in the controller to specific routes, add the following code to `routes/web.php`.
```bash
<?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\StudentController;

    /*
    |--------------------------------------------------------------------------
    | Web Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register web routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | contains the "web" middleware group. Now create something great!
    |
    */

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/create', [StudentController::class, 'index'])->name('student.create');
    Route::get('/show', [StudentController::class, 'create'])->name('student.show');
    Route::get('/edit/{id}', [StudentController::class, 'edit'])->name('student.edit');
    Route::get('/delete/{id}', [StudentController::class, 'destroy'])->name('student.delete');
    Route::post('/store', [StudentController::class, 'store'])->name('student.store');
    Route::post('/update/{id}', [StudentController::class, 'update'])->name('student.update');

?>

```




### Create the Repository - `Step 5`
- `Bind the interface and the implementation :` The last thing we need to do is bind `StudentRepository` to `StudentRepositoryinterface` in Laravel's Service Container; we do this via a Service Provider. Create one using the following command. It will create a php file in `App\Providers\RepositoryServiceProvider.php`
```bash
CLI Command : php artisan make:provider RepositoryServiceProvider
```






### Create the Repository - `Step 6`
- `Binding :` Open `app/Providers/RepositoryServiceProvider.php` and update the register function to match the following. Remember to include the import statement for `StudentRepository` and `StudentRepositoryinterface`.
```bash
<?php

    namespace App\Providers;

    use Illuminate\Support\ServiceProvider;
    use App\Interfaces\StudentRepositoryinterface;
    use App\Repositories\StudentRepository;

    class RepositoryServiceProvider extends ServiceProvider
    {
        /**
        * Register services.
        *
        * @return void
        */
        public function register()
        {
            $this->app->bind(StudentRepositoryinterface::class, StudentRepository::class);
        }

        /**
        * Bootstrap services.
        *
        * @return void
        */
        public function boot()
        {
            //
        }
    }
?>
```

### Create the Repository - `Step 7`
- `Adding providers array :` Finally, add the new Service Provider to the `providers` array in `config/app.php`.
```bash
'providers' => [
    // ...other declared providers
    App\Providers\RepositoryServiceProvider::class,
];
```
### Create the Repository - `Step 8`
- Test the application 
```bash
CLI Command : php artisan serve
```
## Screenshots

![App Screenshot](https://via.placeholder.com/468x300?text=App+Screenshot+Here)


## Some Usefull Links

 - [How to Use the Repository Pattern in a Laravel Application - A Small Project](https://www.twilio.com/blog/repository-pattern-in-laravel-application)
# Documented by :  `Proshenjit Karmakar - Full Stack Developer`.
