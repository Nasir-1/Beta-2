@extends('layouts.master')
@section('content')
  @if(session('success'))
  <div class="alert alert-success" role="alert">
  {{session('success')}}
</div>@endif
      <div class="row">
          <div class="col-6">
              <h1 class="text-secondary">Student Data</h1>
          </div>
          
          <div class="col-6">
              <!-- Button trigger modal -->
              <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Add Student Data
              </button></div>
          </div>

          <table class="table table-hover table-bordered">
                  <tr>
                      <th>No.</th>
                      <th>First name</th>
                      <th>Last name</th>
                      <th>Gender</th>
                      <th>Religion</th>
                      <th>Address</th>
                      <th>Action</th>

                  </tr>
                  <?php 
                      $number=1;
                  ?>
                  @foreach($student_data as $student)
                  <tr>
                      <td>{{$number++}}.</td>
                      <td>{{$student->first_name}}</td>
                      <td>{{$student->last_name}}</td>
                      <td>{{$student->gender}}</td>
                      <td>{{$student->religion}}</td>
                      <td>{{$student->address}}</td>
                      <td>
                          <a href="/students/{{$student->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                          <form action="{{route('students.destroy', $student->id)}}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Yakin hapus data ini?')">Delete</button>
                          </form>
                      </td>

                  </tr>
                  @endforeach
              </table>
          </div>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h4 class="modal-title text-secondary" id="exampleModalLabel">Add Data</h4>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                      <div class="modal-body">
                      <form action="/students/create" method="GET">
                      {{csrf_field()}}
                        <div class="form-group">
                          <label for="exampleInputEmail1" class="form-label">First name :</label>
                          <input name="first_name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="enter your first name here!" required>
                        </div>

                        <div class="form-group">
                          <label for="exampleInputEmail1" class="form-label">Last name :</label>
                          <input name="last_name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your last name here!" required>
                        </div>

                        <div class="form-group">
                          <label for="">Choose gender :</label>
                          <select name="gender" id="" class="form-control" required>
                            <option value="M">Male</option>
                            <option value="F">Female</option>
                          </select>
                        </div>
                        
                        <div class="form-group">
                          <label for="exampleInputEmail1" class="form-label">Religion :</label>
                          <input name="religion" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your Religion here!" required>
                        </div>

                        <div class="form-group">
                          <label for="">Address :</label>
                          <textarea name="address" class="form-control" name="" id="" cols="63" rows="3" placeholder="Enter your address here!" required></textarea>
                        </div>
                      
                      </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save</button></form>
                  </div>
              </div>
          </div>
@endsection
