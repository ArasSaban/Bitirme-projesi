@extends('admin.layouts.master')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
    <nav aria-label="breadcrumb">
         <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page"><span class="badge bg-danger">Duyurular</span></li>
          </ol>
        </nav>
        @if(Session::has('message'))
                <div class="alert alert-success">
                    {{Session::get('message')}}
                </div>    
            @endif

        @if(count($notices)>0)
        @foreach($notices as $notice)
        <div class="col-md-12 mt-2">
      
            <div class="card alert-info">
                <div class="card-header alert alert-warning col-md-12"> <i class="fas fa-dele"></i> {{$notice->title}} </div>

                <div class="card-body">
                   <p>{{$notice->description}}</p>
                   <p class="badge bg-success">Tarih : {{$notice->date}}</p>
                   <p class="badge bg-warning text-dark">{{$notice->name}}</p>
                </div>

                <div class="card-footer">
                @if(isset(auth()->user()->role->permission['name']['notice']['can-edit']))
                <a href="{{route('notices.edit',[$notice->id])}}"> 
                    
                <i class="fas fa-edit"></i>
                @endif
                </a>
                    <span class="float-end">
                    @if(isset(auth()->user()->role->permission['name']['notice']['can-delete']))
                    <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal{{$notice->id}}" > 
                    <i class="fas fa-trash"></i></a>

                                                                 <!-- Modal -->
                                                                 <div class="modal fade" id="exampleModal{{$notice->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <form action ="{{route('notices.destroy',[$notice->id])}}" method="post">@csrf 
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
                    </span>
                   
                </div>
            </div>
            @endforeach
            @else
            <p>Duyuru Bulunmadı</p>
           @endif
        </div>
    </div>
</div>
@endsection
