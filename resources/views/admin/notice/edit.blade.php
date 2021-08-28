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
            <form action="{{route('notices.update',[$notice->id])}}" method="post">@csrf
                {{method_field('PATCH')}}
            <div class="card">
                <div class="card-header"><span class="badge rounded-pill bg-primary">Duyuru güncelle</span></div>

                <div class="card-body">

                  <div class="form-group">
                      <label>Başlık</label>
                      <input  type="text" name="title" class="form-control  @error('isim') is-invalid @enderror" value="{{$notice->title}}"> 
                      @error('name')
                      <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                         </span>
                      @enderror
                  </div>

                  <div class="form-group">
                      <label>Duyuru içerek</label>
                      <textarea   name="description" class="form-control  @error('açıklama') is-invalid @enderror">{{$notice->description}}</textarea> 
                      @error('descreption')
                      <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                         </span>
                      @enderror
                  </div>

                  <div class="form-group">
                      <label>Tarih</label>

                      <input  type="" name="date" required="" class="form-control " id="datepicker" value="{{$notice->date}}"> 
                  </div>

                  <div class="form-group">
                      <label>Oluşturan</label>

                      <input  type="" name="name" required="" class="form-control " value="{{$notice->name}}" > 
                  </div>
                    <br>
                  <div class="form-group">
                     <button type="submit" class="btn btn-primary"> Güncelle </button>
                  </div>
                </div>
            </div>
          </form>
        </div>
    </div>
</div>
@endsection
