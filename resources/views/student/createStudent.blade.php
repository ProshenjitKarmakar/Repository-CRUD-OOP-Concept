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