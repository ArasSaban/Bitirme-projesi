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
            <form action="{{route('notices.store')}}" method="post">@csrf
            <div class="card">
                <div class="card-header"><span class="badge rounded-pill bg-primary">Duyuru Ekleme</span></div>

                <div class="card-body">

                  <div class="form-group">
                      <label>Başlık</label>
                      <input  type="text" name="title" class="form-control  @error('isim') is-invalid @enderror"> 
                      @error('name')
                      <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                         </span>
                      @enderror
                  </div>

                  <div class="form-group">
                      <label>Duyuru içerek</label>
                      <textarea   name="description" class="form-control  @error('açıklama') is-invalid @enderror"></textarea> 
                      @error('descreption')
                      <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                         </span>
                      @enderror
                  </div>

                  <div class="form-group">
                      <label>Tarih</label>

                      <input  type="" name="date" required="" class="form-control " id="datepicker" > 
                  </div>

                  <div class="form-group">
                      <label>Oluşturan</label>

                      <input  type="" name="name" required="" class="form-control " value="{{auth()->user()->name}}" > 
                  </div>
                    <br>
                  <div class="form-group">
                     <button type="submit" class="btn btn-primary"> Paylaş </button>
                  </div>
                </div>
            </div>
          </form>
        </div>
    </div>
</div>
@endsection
