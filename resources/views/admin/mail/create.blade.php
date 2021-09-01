@extends('admin.layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    @if(Session::has('Message'))
                <div class="alert alert-success">
                    {{Session::get('Message')}}
                </div>    
            @endif
        <div class="col-md-8 mt-5">
            <div class="card">
                <div class="card-header">Mail Gönderme</div>

                <div class="card-body">
                   <form action ="{{route('mails.store')}}" method ="post" enctype="multipart/form-data">@csrf
                        <label>Seçiniz</label>
                        <select id ="mail"  class="form-control">
                            <option value="0">Tüm çalışanlara </option>
                            <option value="1">Departman seçiniz </option>
                            <option value="2">Çalışan seçiniz </option>
                        </select>
                        <br>
                        <select id ="department" name="department_id" class="form-control">
                           
                        @foreach(App\Models\Department::all() as $department)
                            
                            <option value="{{$department->id}}"> {{$department->name}} </option>
                        @endforeach   
                        </select>

                           <br>

                        <select id ="person" name="user_id" class="form-control">
                       
                           @foreach(App\Models\User::all() as $user)
                               <option value="{{$user->id}}"> {{$user->name}} </option>
                           @endforeach   
                        </select>

                        <br>
                           <div class="form-group">
                                <label>Içerek</label>
                                <textarea name="body" class="form-control">

                                </textarea>
                           </div>
                            <br>
                           <div class="form-group">
                                <label>Dosya : </label>
                                <input type="file" name="file" lass="form-control">
                           </div>
                                    <br>
                           <div class="form-group">
                            <button type="submit" class="btn btn-primary">Gönder</button>
                           </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<style type="text/css">

#department {
    display: none;
}
#person {
    display : none;
}
</style>
@endsection
