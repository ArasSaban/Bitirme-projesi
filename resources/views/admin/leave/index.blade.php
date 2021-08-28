@extends('admin.layouts.master')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Tüm izinler</div>
                    <div class="card-body">

                    
        <table class="table ">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Isim</th>
      <th scope="col">Başlangıç Tarihi</th>
      <th scope="col">Bitiş Tarihi</th>
      <th scope="col">Açıklama</th>
      <th scope="col">Izin Türü</th>
      <th scope="col">Yanıt</th>
      <th scope="col">Durum</th>
      <th scope="col">Onay / Red</th>
      
    </tr>
  </thead>
  <tbody>
      @foreach($leaves as $leave)
    <tr>
      <td>{{$leave->user->name}}</td>
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
     

      <td>
      <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal{{$leave->id}}"> 
        Kabul / Red
       </a>
                                                         <!-- Modal -->
                                                         <div class="modal fade" id="exampleModal{{$leave->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <form action ="{{route('accept.reject',[$leave->id])}}" method="post">@csrf 
                                                            
                                                        <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Onaylama</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                           <div class="form-group">
                                                            <label>Durum</label>
                                                            <select class="form-control" name="status">
                                                                <option value="0">Bekliyor</option>  
                                                                <option value="1">Kabul Et</option> 
                                                                <option value="2">Red Et</option>                                                            </select>
                                                                
                                                            </select>    
                                                          </div>
                                                            <br>
                                                          <div class="form-group">
                                                            <label>Açıklama</label>
                                                            <textarea class="form-control" name="message"></textarea>
                                                          </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Iptal</button>
                                                            <button type="submit" class="btn btn-danger">Tamam</button>
                                                        </div>
                                                        </div>
                                                        </form>
                                    
                                                    </div>
                                                    </div>

      </td>
    </tr>
    @endforeach
  </tbody>
</table>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
