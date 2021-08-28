@extends('admin.layouts.master')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <nav aria-label="breadcrumb">
         <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page"><span class="badge rounded-pill bg-warning text-dark">Tüm Kullancılar</span></li>
          </ol>
        </nav>
        <table id="datatablesSimple">
                                    <thead>
                                       
                                        <tr>
                                            <th>No</th>
                                            <th>Resim</th>
                                            <th>Ad </th>
                                            <th>Email</th>
                                            <th>Rol</th>
                                            
                                            <th>Departman </th>
                                            <th>Maaş</th>
                                            <th>Başlangıç Günü</th>
                                            <th>Adres </th>
                                            <th>Tel no</th>
                                            <th>Güncelle</th>
                                            <th>Silme</th>
                                            
                                        </tr>
                                       
                                    </thead>
                                    <tfoot>
                                     
                                    </tfoot>
                                    <tbody>
                                    @if(
                                           count($users)>0 
                                        )
                                        @foreach($users as $key => $user)
                                        <tr>
                                            <td class="p-3 mb-2 bg-secondary text-white">{{$key +1}}</td>
                                            <td><img src="{{asset('profile')}}/{{$user->image}} " width =100px height=100></td>
                                            <td>{{$user->name}}</td>
                                            <td >{{$user->email}}</td>
                                            <td class="p-3 mb-2 bg-success text-white">{{$user->role['name']??''}}</td>
                                            <td>{{$user->department['name']??''}}</td>
                                            <td>{{$user->designation}}</td>
                                            <td class="p-3 mb-2 bg-warning text-dark">{{$user->start_from}}</td>
                                            <td>{{$user->address}}</td>
                                            <td>{{$user->mobile_number}}</td>
                                            <td>
                                            @if(isset(auth()->user()->role->permission['name']['user']['can-edit']))
                                                <a href="{{route('users.edit',[$user->id])}}"> 
                                                <i class="fas fa-edit"></i></a>
                                            @endif
                                            </td>
                                            <td>
                                            @if(isset(auth()->user()->role->permission['name']['user']['can-delete']))    
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal{{$user->id}}" > 
                                                <i class="fas fa-trash"></i></a>

                                                                                                <!-- Modal -->
                                                    <div class="modal fade" id="exampleModal{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <form action ="{{route('users.destroy',[$user->id])}}" method="post">@csrf 
                                                            {{method_field('DELETE')}}
                                                        <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Dikkat</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Silmek istediğinizden emin misiniz ?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Iptal</button>
                                                            <button type="submit" class="btn btn-danger">Sil</button>
                                                        </div>
                                                        </div>
                                                        </form>
                                    
                                                    </div>
                                                    </div>
                                                    @endif
                                               
                                     </td>
                                   </tr>
                                @endforeach
                              @else 
                             <td>Kullancı bulunmadı</td>
                           @endif

                       </tbody>
                   </table>

        </div>
    </div>
</div>
<script>
     $(document).on('click','.delete',function(){
             let id = $(this).attr('data-id');
             $('#id').val(id);
        });
</script>
@endsection
