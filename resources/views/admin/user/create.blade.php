@extends('admin.layouts.master')

@section('content')

<div class="container mt-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page"><span class="badge rounded-pill bg-primary"><h6>Kullancı kayıt</h6></span>
             </li>
            </ol>
        </nav>

        @if(Session::has('message'))
            <div class="alert alert-success">
                    {{Session::get('message')}}
            </div>    
        @endif

        <form action="{{route('users.store')}}" method="post" enctype="multipart/form-data">@csrf
        <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h6>Kullancının genel bilgileri</h6></span></div>

                <div class="card-body">

                  <div class="form-group">
                      <label>Ad</label>
                      <input  type="text" name="firstname" required="" class="form-control  "> 
                  </div>

                  <div class="form-group">
                      <label>Soyad</label>
                      <input type="text"  name="lastname" required="" class="form-control ">
                  </div>

                  <div class="form-group">
                      <label>Adres</label>
                      <input  type="text" name="Address"  class="form-control  ">
                  </div>

                  <div class="form-group">
                      <label>Tel No </label>
                      <input  type="text" name="mobile_number" class="form-control ">
                  </div>

                  <div class="form-group">
                      <label>Department</label>
                      <select  name="department_id"  required="">
                        @foreach(App\Models\Department::all() as $department)
                            <option value ="{{$department->id}}">{{$department->name}}</option>
                        @endforeach
                      </select>
                  </div>
                  
                  <div class="form-group">
                      <label>Maaş</label>
                      <input  type="text" required=""  name="designation" class="form-control ">
                  </div>

                  <div class="form-group">
                      <label>Başlangıç Tarihi</label>
                      <input  type="" required="" id="datepicker" name="start_from" class="form-control ">
                  </div>

                  <div class="form-group">
                      <label>image</label>
                      <input  type="file"  name="image" accept="image/*" class="form-control  ">
                  </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Giriş bilgileri</div>
                <div class="card-body">

                <div class="form-group">
                      <label>Mail Adresi</label>
                      <input  type="email" required="" name="email" class="form-control">
                  </div>

                  <div class="form-group">
                      <label>Password</label>
                      <input  type="password" required="" name="password" class="form-control">
                  </div>
                  <div class="form-group">
                      <label>Rol</label>
                      <select name="role_id" required="" name="role_id">
                      @foreach(App\Models\Role::all() as $role)
                            <option value ="{{$role->id}}">{{$role->name}}</option>
                        @endforeach

                      </select>
                  </div>
                </div>
            </div>
            <br>    
                  <div class="form-group">
                     <button type="submit" class="btn btn-primary"> Kayıt Et </button>
                  </div>
                </div>
            </div>
          
        </div>
        </form>
    </div>

@endsection
