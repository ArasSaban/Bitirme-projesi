<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Ana Sayfa</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-4 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Çalışan Sayısı <p><i class="fas fa-user fa-fw" style="font-size:100px;"></i></p></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#" style="font-size:18px;">{{App\Models\User::all()->count()}}</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Departman Sayısı <p><i class="fas fa-home" style="font-size:100px;"></i></p></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#" style="font-size:18px;">{{App\Models\Department::all()->count()}}</a>
                                        <div class="small text-white"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">İzinler <p><i class="fas fa-user-minus" style="font-size:100px;"></i></p></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#" style="font-size:18px;">{{App\Models\Leave::all()->count()}}</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                           
                        </div>


                        <div class="row">
                            <div class="col-xl-12">
                                <strong>Giriş Bilgileri</strong>
                                <div class="card mb-4">
                                    <div class="card-header" style="background-color : orange   ">
                                    <b>  Ad Soyad :</b> {{Auth::User()->name}}
                                    </div>   
                                    
                                    <div class="card-header" style="background-color : orange   ">
                                    <b>  Mail : </b>{{Auth::User()->email}}
                                    </div> 

                                    <div class="card-header" style="background-color : orange   ">
                                    <b>  Tel no :</b> {{Auth::User()->mobile_number}}
                                    </div> 

                                    <div class="card-header" style="background-color : orange   ">
                                    <b>  Başlangıç Günü :</b> {{Auth::User()->start_date}}
                                    </div> 

                                    <div class="card-header" style="background-color : orange   ">
                                       <b> Rol :</b> {{Auth::User()->role->name}}
                                    </div> 
                                    <div class="card-header" style="background-color : orange   ">
                                    <b>  Departman :</b> {{Auth::User()->department->name}}
                                    </div> 
                            </div>
                        </div>
                    </div>
      









                        <!-- <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area me-1"></i>
                                        Area Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Bar Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                        </div> -->
                     
                            </div>
                        </div>
                    </div>
                </main>     