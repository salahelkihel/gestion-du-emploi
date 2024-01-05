@extends('layouts.master')
@section('title','dashboard')
@section('content')

<div class="content">{!! Toastr::message() !!}  
            <!-- Animated -->
                <div class="animated fadeIn">

                    <div class="row">
                
                        <div class="col-lg-3 col-md-6">
                            <div class="card">
                                    <div class="card-body">
                                        <div class="stat-widget-five">
                                            <div class="stat-icon dib flat-color-3">
                                                <i class="menu-icon fa fa-database"></i>
                                            </div>
                                            <div class="stat-content">
                                                <div class="text-left dib">
                                                    <div class="stat-text"><span class="count">{{$classe}}</span></div>
                                                    <div class="stat-heading">Total classe </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                             </div>
                        </div>



                        <div class="col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="stat-widget-five">
                                            <div class="stat-icon dib flat-color-1">
                                                <i class="fa fa-users"></i>
                                            </div>
                                            <div class="stat-content">
                                                <div class="text-left dib">
                                                    <div class="stat-text"><span class="count">{{$etudiants}}</span></div>
                                                    <div class="stat-heading">Total etudiants</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                         </div>

                            <div class="col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="stat-widget-five">
                                            <div class="stat-icon dib flat-color-2">
                                                <i class="fa fa-user"></i>
                                            </div>
                                            <div class="stat-content">
                                                <div class="text-left dib">
                                                    <div class="stat-text"><span class="count">{{$enseignants}}</span></div>
                                                    <div class="stat-heading">Total enseignants</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="stat-widget-five">
                                            <div class="stat-icon dib flat-color-4">
                                                <i class="fa fa-cog"></i>
                                            </div>
                                            <div class="stat-content">
                                                <div class="text-left dib">
                                                    <div class="stat-text"><span class="count">{{$seances}}</span></div>
                                                    <div class="stat-heading">Total seances</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                        </div>
                   </div>
                   <div class="content"><img src="images/emploi.jpg" alt="Logo"></div>
  </div>
     
     
          
<!-- /Widgets -->
<!--  Traffic  -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

@endsection
