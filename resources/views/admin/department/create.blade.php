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
            <form action="{{route('departments.store')}}" method="post">@csrf
            <div class="card">
                <div class="card-header"><span class="badge rounded-pill bg-primary">Departman Ekleme</span></div>

                <div class="card-body">

                  <div class="form-group">
                      <label>Department Adı</label>
                      <input  type="text" name="name" class="form-control  @error('isim') is-invalid @enderror"> 
                      @error('name')
                      <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                         </span>
                      @enderror
                  </div>

                  <div class="form-group">
                      <label>Açıklama</label>
                      <textarea   name="description" class="form-control  @error('açıklama') is-invalid @enderror"></textarea> 
                      @error('descreption')
                      <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                         </span>
                      @enderror
                  </div>
                    <br>
                  <div class="form-group">
                     <button type="submit" class="btn btn-primary"> Kayıd Et </button>
                  </div>
                </div>
            </div>
          </form>
        </div>
    </div>
</div>
@endsection
