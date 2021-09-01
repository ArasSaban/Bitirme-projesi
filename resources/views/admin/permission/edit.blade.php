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

              <form action="{{route('permissions.update',[$permission->id])}}" method ="post">@csrf
                  {{method_field('PATCH')}}
                <div class="card-header">{{ __('Dashboard') }}</div>
                    <div class="card-body">
                  <h3>{{$permission->role->name}}</h3>
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
                            <td><input type ="checkbox" name="name[department][can-add]" @if(isset($permission ['name'] ['department']['can-add'])) checked @endif   value="1"></td>
                            <td><input type ="checkbox" name="name[department][can-edit]" @if(isset($permission['name'] ['department']['can-edit'])) checked @endif  value="1"></td>
                            <td><input type ="checkbox" name="name[department][can-delete]"@if(isset($permission['name'] ['department']['can-delete'])) checked @endif value="1"></td>
                            <td><input type ="checkbox" name="name[department][can-view]" @if (isset($permission['name'] ['department']['can-view'])) checked @endif value="1"></td>
                            <td><input type ="checkbox" name="name[department][can-list]" @if(isset($permission['name'] ['department']['can-list'])) checked @endif value="1"></td>
                            
                            </tr>

                            <tr>
                            <td>Rol</td>
                            <td><input type ="checkbox" name="name[Role][can-add]" @if(isset($permission ['name'] ['role']['can-add'])) checked @endif value="1"></td>
                            <td><input type ="checkbox" name="name[Role][can-edit]" @if(isset($permission ['name'] ['role']['can-edit'])) checked @endif value="1"></td>
                            <td><input type ="checkbox" name="name[Role][can-delete]" @if(isset($permission ['name'] ['role']['can-delete'])) checked @endif value="1"></td>
                            <td><input type ="checkbox" name="name[Role][can-view]" @if(isset($permission ['name'] ['role']['can-view'])) checked @endif value="1"></td>
                            <td><input type ="checkbox" name="name[Role][can-list]" @if(isset($permission['name'] ['role']['can-list'])) checked @endif value="1"></td>
                            
                            </tr>

                            <tr>
                            <td>Erişim izinleri</td>
                            <td><input type ="checkbox" name="name[permission][can-add]" @if(isset($permission ['name'] ['permission']['can-add'])) checked @endif value="1"></td>
                            <td><input type ="checkbox" name="name[permission][can-edit]" @if(isset($permission ['name'] ['permission']['can-edit'])) checked @endif value="1"></td>
                            <td><input type ="checkbox" name="name[permission][can-delete]" @if(isset($permission ['name'] ['permission']['can-delete'])) checked @endif value="1"></td>
                            <td><input type ="checkbox" name="name[permission][can-view]" @if(isset($permission ['name'] ['permission']['can-view'])) checked @endif value="1"></td>
                            <td><input type ="checkbox" name="name[permission][can-list]" @if(isset($permission ['name'] ['permission']['can-list'])) checked @endif value="1"></td>
                            
                            </tr>



                            <tr>
                            <td>Kullancı</td>
                            <td><input type ="checkbox" name="name[user][can-add]" @if(isset($permission ['name'] ['user']['can-add'])) checked @endif value="1"></td>
                            <td><input type ="checkbox" name="name[user][can-edit]"  @if(isset($permission ['name'] ['user']['can-edit'])) checked @endif value="1"></td>
                            <td><input type ="checkbox" name="name[user][can-delete]"  @if(isset($permission ['name'] ['user']['can-delete'])) checked @endif value="1"></td>
                            <td><input type ="checkbox" name="name[user][can-view]"  @if(isset($permission ['name'] ['user']['can-view'])) checked @endif value="1"></td>
                            <td><input type ="checkbox" name="name[user][can-list]"  @if(isset($permission ['name'] ['user']['can-list'])) checked @endif value="1"></td>
                            
                            </tr>

                            <tr>
                            <td>Duyurular</td>
                            <td><input type ="checkbox" name="name[notice][can-add]" @if(isset($permission ['name'] ['notice']['can-add'])) checked @endif value="1"></td>
                            <td><input type ="checkbox" name="name[notice][can-edit]"  @if(isset($permission ['name'] ['notice']['can-edit'])) checked @endif value="1"></td>
                            <td><input type ="checkbox" name="name[notice][can-delete]"  @if(isset($permission ['name'] ['notice']['can-delete'])) checked @endif value="1"></td>
                            <td><input type ="checkbox" name="name[notice][can-view]"  @if(isset($permission ['name'] ['notice']['can-view'])) checked @endif value="1"></td>
                            <td><input type ="checkbox" name="name[notice][can-list]"  @if(isset($permission ['name'] ['notice']['can-list'])) checked @endif value="1"></td>
                            
                            </tr>

                            <tr>
                            <td>İzin formu</td>
                            <td></td>
                            <td><input type ="checkbox" name="name[leave][can-edit]"  @if(isset($permission ['name'] ['leave']['can-edit'])) checked @endif value="1"></td>
                            <td><input type ="checkbox" name="name[leave][can-delete]"  @if(isset($permission ['name'] ['leave']['can-delete'])) checked @endif value="1"></td>
                                
                            <td></td>                     
                            <td><input type ="checkbox" name="name[leave][can-list]" @if(isset($permission ['name'] ['leave']['can-list'])) checked @endif value="1"></td>
                            
                            </tr>
                        </tbody>
                    </table>
                    @if(isset(auth()->user()->role->permission['name']['permission']['can-edit']))

                    <button type="submit" class="btn btn-primary">Düzenle</button>
                    @endif
                    <a href="{{route('permissions.index')}}" class="float-right">Geri</a>

                    </div>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection