@extends('admin.layouts.master')

@section('content')

<div class="container mt-2">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page"><h2>İzin Formu Düzenle</h2>
             </li>
            </ol>
        </nav>

        @if(Session::has('message'))
            <div class="alert alert-success">
                    {{Session::get('message')}}
            </div>    
        @endif

        <form action="{{route('leaves.update',[$leave->id])}}" method="post" enctype="multipart/form-data">@csrf
            {{method_field('PATCH')}}
        <div class="row justify-content-center">
        <div class="col-md-12 m-5">
            <div class="card">
                <div class="card-header">İzin Oluştur</div>

                <div class="card-body">

                

                  <div class="form-group">
                      <label>İzin Başlangıç Tarihi</label>

                      <input  type="" name="from" required="" class="form-control " id="datepicker" value ="{{$leave->from}}"> 
                  </div>
                  </br>
                  

                  <div class="form-group">
                      <label>İzin Bitiş Tarihi</label>
                      <input  type="" name="to" required="" class="form-control " id="datepicker1" value ="{{$leave->to}}">
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
                      <textarea name="description" class="form-control ">{{$leave->description}}</textarea>
                  </div>

               
        </div>
        
            <br>    
                  <div class="form-group">
                     <button type="submit" class="btn btn-primary"> Güncelle </button>
                  </div>
                </div>
            </div>
          
        </div>
        </form>

  </tbody>
</table>
    </div>

@endsection
