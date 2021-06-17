@extends('layouts.master')

@section('content')
  
  @if(session('success'))
  <div class="alert alert-success" role="alert">
  {{session('success')}}
</div>@endif
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
      <div class="row">
      <div class="col-lg-12">
      <form action="/teachers/{{$teacher->id}}" method="POST">
      <h1 class="text-center text-secondary">Edit Teacher Data</h1>
                {{csrf_field()}}
                @method('PUT')
                <div class="form-group">
                    <label for="exampleInputEmail1" class="form-label">first name :</label>
                    <input name="first_name" type="text" class="form-control" value="{{$teacher->first_name}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan nama depan anda disini!">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1" class="form-label">last name :</label>
                    <input name="last_name" type="text" class="form-control" value="{{$teacher->last_name}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan nama belakang anda disini!">
                </div>

                <div class="form-group">
                    <label for="">choose gender :</label>
                    <select name="gender"  id="" class="form-control">
                    <option value="M" @if($teacher->gender == 'M')selected @endif>male</option>
                    <option value="F" @if($teacher->gender == 'F')selected @endif>female</option>
                    </select>
                </div>
                        
                <div class="form-group">
                    <label for="exampleInputEmail1" class="form-label">religion :</label>
                    <input name="religion" value="{{$teacher->religion}}" type="text" class="form-control"  id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Agama anda disini!" >
                </div>

                <div class="form-group">
                    <label for="">address :</label>
                          <textarea name="address" class="form-control" value="{{$teacher->address}} id="" cols="63" rows="3">{{$teacher->address}}</textarea>
                </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-warning ">Change</button>
                </div>
            </form>
        </div>
    </div>
    </div>
    </div>
    </div>
    @endsection