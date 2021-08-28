@extends('admin.layouts.master')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @if(Session::has('message'))
                <div class="alert alert-success">
                    {{Session::get('message')}}
                </div>    
            @endif
            <form action="{{route('departments.update',[$department->id])}}" method="post">@csrf
                {{method_field('PATCH')}}
            <div class="card">
                <div class="card-header">Departman Günceleme</div>

                <div class="card-body">

                  <div class="form-group">
                      <label>Department Adı</label>
                      <input  type="text" name="name" class="form-control  @error('isim') is-invalid @enderror" value="{{$department->name}}"> 
                      @error('isim')
                      <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                         </span>
                      @enderror
                  </div>

                  <div class="form-group">
                      <label>Açıklama</label>
                      <textarea   name="description" class="form-control  @error('açıklama') is-invalid @enderror">
                      {{$department->description}}
                      </textarea> 
                      @error('açıklama')
                      <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                         </span>
                      @enderror
                  </div>

                  <div class="form-group">
                  @if(isset(auth()->user()->role->permission['name']['department']['can-edit']))
    <br>
                     <button type="submit" class="btn btn-primary"> Güncelle </button>

                     @endif
                  </div>
                </div>
            </div>
          </form>
        </div>
    </div>
</div>
@endsection
