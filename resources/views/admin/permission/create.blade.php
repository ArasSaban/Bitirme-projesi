@extends('admin.layouts.master')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @if(Session::has('message'))
                <div class="alert alert-success">
                    {{Session::get('message')}}
                </div>    
            @endif
            <div class="card">

              <form action="{{route('permissions.store')}}" method ="post">@csrf
                <div class="card-header"><span class="badge rounded-pill bg-primary">Erişim izini oluşturma</span></div>
                    <div class="card-body">
                    <select class="form-control" name="role_id">
                        <option value =""> Role seçiniz</option>
                        @foreach(App\Models\Role::all() as $role)
                        <option value="{{$role->id}}">
                            {{$role->name}}</option>
                        @endforeach    
                    </select>
                    <table class="table table-primary mt-5">
                        <thead>
                            <tr>
                            <th scope="col">Erişim izinleri</th>
                            <th scope="col">Ekleme</th>
                            <th scope="col">Düzeltme</th>
                            <th scope="col">Silme</th>
                            <th scope="col">Görüntülme</th>
                            <th scope="col">Listeleme</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <td>Departman</td>
                            <td><input type ="checkbox" name="name[department][can-add]" value="1"></td>
                            <td><input type ="checkbox" name="name[department][can-edit]" value="1"></td>
                            <td><input type ="checkbox" name="name[department][can-delete]" value="1"></td>
                            <td><input type ="checkbox" name="name[department][can-view]" value="1"></td>
                            <td><input type ="checkbox" name="name[department][can-list]" value="1"></td>
                            
                            </tr>

                            <tr>
                            <td>Rol</td>
                            <td><input type ="checkbox" name="name[Role][can-add]" value="1"></td>
                            <td><input type ="checkbox" name="name[Role][can-edit]" value="1"></td>
                            <td><input type ="checkbox" name="name[Role][can-delete]" value="1"></td>
                            <td><input type ="checkbox" name="name[Role][can-view]" value="1"></td>
                            <td><input type ="checkbox" name="name[Role][can-list]" value="1"></td>
                            
                            </tr>

                            <tr>
                            <td>Erişim izinleri</td>
                            <td><input type ="checkbox" name="name[permission][can-add]" value="1"></td>
                            <td><input type ="checkbox" name="name[permission][can-edit]" value="1"></td>
                            <td><input type ="checkbox" name="name[permission][can-delete]" value="1"></td>
                            <td><input type ="checkbox" name="name[permission][can-view]" value="1"></td>
                            <td><input type ="checkbox" name="name[permission][can-list]" value="1"></td>
                            
                            </tr>

                            <tr>
                            <td>Kullancı</td>
                            <td><input type ="checkbox" name="name[user][can-add]" value="1"></td>
                            <td><input type ="checkbox" name="name[user][can-edit]" value="1"></td>
                            <td><input type ="checkbox" name="name[user][can-delete]" value="1"></td>
                            <td><input type ="checkbox" name="name[user][can-view]" value="1"></td>
                            <td><input type ="checkbox" name="name[user][can-list]" value="1"></td>
                            
                            </tr>

                            <tr>
                            <td>Duyurular</td>
                            <td><input type ="checkbox" name="name[notice][can-add]" value="1"></td>
                            <td><input type ="checkbox" name="name[notice][can-edit]" value="1"></td>
                            <td><input type ="checkbox" name="name[notice][can-delete]" value="1"></td>
                            <td><input type ="checkbox" name="name[notice][can-view]" value="1"></td>
                            <td><input type ="checkbox" name="name[notice][can-list]" value="1"></td>
                            
                            </tr>
                            <tr>
                                <td>Onaylama</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><input type="checkbox" name="name[leave] [can-list]" value="1"> </td>
                            </tr>
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-primary">Kayıd Et</button>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection
