@extends('admin.layouts.master')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <nav aria-label="breadcrumb">
         <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page"><span class="badge rounded-pill bg-warning text-dark">Tüm Departmanlar</span></li>
          </ol>
        </nav>
        
        <table id="datatablesSimple">
                                    <thead>
                                       
                                        <tr>
                                            <th>No</th>
                                            <th>İsim</th>
                                            <th>Açıklama</th>
                                            <th>Düzenleme</th>
                                            <th>Silme</th>
                                            
                                        </tr>
                                       
                                    </thead>
                                    <tfoot>
                                     
                                    </tfoot>
                                    <tbody>
                                    @if(
                                           count($departments)>0 
                                        )
                                        @foreach($departments as $key => $department)
                                        <tr>
                                            <td>{{$key +1}}</td>
                                            <td>{{$department->name}}</td>
                                            <td>{{$department->description}}</td>
                                            <td>
                                                @if(isset(auth()->user()->role->permission['name']['department']['can-edit']))
                                                <a href="{{route('departments.edit',[$department->id])}}"> 
                                                <i class="fas fa-edit"></i></a>
                                                @endif
                                            </td>
                                            <td> 
                                            @if(isset(auth()->user()->role->permission['name']['department']['can-delete']))
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal{{$department->id}}" > 
                                                <i class="fas fa-trash"></i></a>

                                                                                                <!-- Modal -->
                                                    <div class="modal fade" id="exampleModal{{$department->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <form action ="{{route('departments.destroy',[$department->id])}}" method="post">@csrf 
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
                             <td>Departman bulunmadı</td>
                           @endif

                       </tbody>
                   </table>

        </div>
    </div>
</div>
@endsection
