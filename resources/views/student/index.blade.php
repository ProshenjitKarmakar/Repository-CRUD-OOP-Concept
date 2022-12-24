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