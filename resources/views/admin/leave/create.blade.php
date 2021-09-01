@extends('admin.layouts.master')

@section('content')

<div class="container mt-2">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page"><h2><span class="badge rounded-pill bg-primary">İzin Formu</h2>
             </li>
            </ol>
        </nav>

        @if(Session::has('message'))
            <div class="alert alert-success">
                    {{Session::get('message')}}
            </div>    
        @endif

        <form action="{{route('leaves.store')}}" method="post" enctype="multipart/form-data">@csrf
        <div class="row justify-content-center">
        <div class="col-md-12 m-5">
            <div class="card">
                <div class="card-header">İzin Oluştur</div>

                <div class="card-body">

                

                  <div class="form-group">
                      <label>İzin Başlangıç Tarihi</label>

                      <input  type="" name="from" required="" class="form-control " id="datepicker" > 
                  </div>
                  </br>
                  

                  <div class="form-group">
                      <label>İzin Bitiş Tarihi</label>
                      <input  type="" name="to" required="" class="form-control " id="datepicker1" >
                  </div>
                  </br>
                  <div class="form-group">
                      <label>İzin Turu</label>
                      <select class="form-control" name="type">
                            <option value="yıllık">Yıllık izini</option>
                            <option value="hastalık">Hastalık</option>
                            <option value="evlilik">Evlilik</option>
                            <option value="diğer">Diğer</option>
                      </select>
                  </div>
                  </br>
                  <div class="form-group">
                      <label>Açıklama </label>
                      <textarea name="description" class="form-control "></textarea>
                  </div>

               
        </div>
        
            <br>    
                  <div class="form-group">
                     <button type="submit" class="btn btn-primary"> Kayıt Et </button>
                  </div>
                </div>
            </div>
          
        </div>
        </form>

        <table class="table ">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Başlangıç Tarihi</th>
      <th scope="col">Bitiş Tarihi</th>
      <th scope="col">Açıklama</th>
      <th scope="col">İzin Türü</th>
      <th scope="col">Yanıt</th>
      <th scope="col">Durum</th>
      <th scope="col">Güncelle</th>
      <th scope="col">Silme</th>
    </tr>
  </thead>
  <tbody>
      @foreach($leaves as $leave)
    <tr>
      <th scope="row">1</th>
      <td>{{$leave->from}}</td>
      <td>{{$leave->to}}</td>
      <td>{{$leave->description}}</td>
      <td>{{$leave->type}}</td>
      <td>{{$leave->message}}</td>
      <td>
      @if($leave->status == 0)
        <span class="badge bg-info text-dark">Bekliyor </span>
        @elseif($leave->status == 1)
        <span class="badge bg-success">Kabul Edildi </span>
        @else
        <span class="badge bg-danger">Red Edildi </span>
        @endif
      </td>
      @if(isset(auth()->user()->role->permission['name']['leave']['can-edit']))
      <td>
      <a href="{{route('leaves.edit',[$leave->id])}}"> 
       <i class="fas fa-edit"></i></a>
      </td>
    @endif

    @if(isset(auth()->user()->role->permission['name']['leave']['can-delete']))
      <td>
      <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal{{$leave->id}}" > 
       <i class="fas fa-trash"></i>
      </a>
            
                                                                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal{{$leave->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <form action ="{{route('leaves.destroy',[$leave->id])}}" method="post">@csrf 
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
      </td>
@endif
    </tr>
    @endforeach
  </tbody>
</table>
    </div>

@endsection
