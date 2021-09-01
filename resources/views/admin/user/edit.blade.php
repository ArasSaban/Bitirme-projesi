@extends('admin.layouts.master')

@section('content')

<div class="container mt-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Kullancı bilgilerini güncelle
             </li>
            </ol>
        </nav>

        @if(Session::has('message'))
            <div class="alert alert-success">
                    {{Session::get('message')}}
            </div>    
        @endif

        <form action="{{route('users.update',[$user->id])}}" method="post" enctype="multipart/form-data">@csrf
        {{method_field('PATCH')}}
        <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Kullancının genel bilgileri</div>

                <div class="card-body">

                  <div class="form-group">
                      <label>Ad Soyad</label>
                      <input  type="text" name="name" required="" class="form-control  " value ="{{$user->name}}"> 
                  </div>

                 

                  <div class="form-group">
                      <label>Adres</label>
                      <input  type="text" name="address"  class="form-control" value ="{{$user->address}}">
                  </div>

                  <div class="form-group">
                      <label>Tel No </label>
                      <input  type="text" name="mobile_number" class="form-control " value ="{{$user->mobile_number}}">
                  </div>
<br>
                  <div class="form-group" >
                      <label>Department</label>
                      <select  name="department_id"  required="">
                        @foreach(App\Models\Department::all() as $department)
                            <option value ="{{$department->id}}"@if($user->department_id== $department->id) selected @endif>{{$department->name}}</option>
                        @endforeach
                      </select>
                  </div>
                  <br>
                  <div class="form-group">
                      <label>Maaş</label>
                      <input  type="text" required="" name="designation" class="form-control " value ="{{$user->designation}}">
                  </div>

                  <div class="form-group">
                      <label>Başlangıç Tarihi</label>
                      <input  type="" id="datepicker" required="" name="start_from" class="form-control" value ="{{$user->start_from}}">
                  </div>

                  <div class="form-group">
                      <label>image</label>
                      <input  type="file"  name="image" accept="image/*" class="form-control" >
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
                      <input  type="email" required="" name="email" class="form-control" value ="{{$user->email}}">
                  </div>

                  <div class="form-group">
                      <label>Password</label>
                      <input  type="password"  name="password" class="form-control">
                  </div>
                  <br>
                  <div class="form-group">
                      <label>Rol</label>
                      <select name="role_id" required="" name="role_id">
                      @foreach(App\Models\Role::all() as $role)
                            <option value ="{{$role->id}}"@if($user->role_id== $role->id) selected @endif>{{$role->name}}</option>
                        @endforeach

                      </select>
                  </div>
                </div>
            </div>
            <br>    
                  <div class="form-group">
                  @if(isset(auth()->user()->role->permission['name']['department']['can-edit']))

                     <button type="submit" class="btn btn-primary"> Güncelle </button>
                     @endif
                  </div>
                </div>
            </div>
          
        </div>
        </form>
    </div>

@endsection
