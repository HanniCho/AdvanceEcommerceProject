<!-- admin\admin_master-->
@extends('admin.admin_master')
@section('admin')
@php
$today = App\Models\Order::where('status','Delivered')
                ->where('delivered_date',Carbon\Carbon::now()->format('d F Y'))
                ->where('is_return_order',0)->sum('amount');
$month = App\Models\Order::where('status','Delivered')
                ->where('order_month',Carbon\Carbon::now()->format('F'))
                ->where('is_return_order',0)->sum('amount');
$year = App\Models\Order::where('status','Delivered')
                ->where('order_year',Carbon\Carbon::now()->format('Y'))
                ->where('is_return_order',0)->sum('amount');
$return = App\Models\Order::where('status','Returned')
                ->where('order_year',Carbon\Carbon::now()->format('Y'))->sum('amount');

$users = App\Models\User::get();
$brands = App\Models\Brand::get();
$products = App\Models\Product::get();

$returns = App\Models\Order::where('is_return_order',2)->get();
@endphp
<div class="container-full">
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xl-3 col-6">
                <div class="box overflow-hidden pull-up">
                    <div class="box-body">							
                        <div class="icon bg-primary-light rounded w-60 h-60">
                            <i class="text-primary mr-0 font-size-24 mdi mdi-account-multiple"></i>
                        </div>
                        <div>
                            <p class="text-mute mt-20 mb-0 font-size-16">Today's Sales</p>
                            <h3 class="text-white mb-0 font-weight-500">${{$today}}<small class="text-success"><i class="fa fa-caret-up"></i></small></h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-6">
                <div class="box overflow-hidden pull-up">
                    <div class="box-body">							
                        <div class="icon bg-warning-light rounded w-60 h-60">
                            <i class="text-warning mr-0 font-size-24 mdi mdi-car"></i>
                        </div>
                        <div>
                            <p class="text-mute mt-20 mb-0 font-size-16">This Month's Sales</p>
                            <h3 class="text-white mb-0 font-weight-500">${{$month}}<small class="text-success"><i class="fa fa-caret-up"></i></small></h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-6">
                <div class="box overflow-hidden pull-up">
                    <div class="box-body">							
                        <div class="icon bg-info-light rounded w-60 h-60">
                            <i class="text-info mr-0 font-size-24 mdi mdi-sale"></i>
                        </div>
                        <div>
                            <p class="text-mute mt-20 mb-0 font-size-16">This Year's Sales</p>
                            <h3 class="text-white mb-0 font-weight-500">${{$year}}<small class="text-success"><i class="fa fa-caret-up"></i></small></h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-6">
                <div class="box overflow-hidden pull-up">
                    <div class="box-body">							
                        <div class="icon bg-danger-light rounded w-60 h-60">
                            <i class="text-danger mr-0 font-size-24 mdi mdi-phone-incoming"></i>
                        </div>
                        <div>
                            <p class="text-mute mt-20 mb-0 font-size-16">Total Return Money</p>
                            <h3 class="text-danger mb-0 font-weight-500">${{$return}} <small class="text-danger"><i class="fa fa-caret-down"></i></small></h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-6">
                <div class="box overflow-hidden pull-up">
                    <div class="box-body">							
                        <div class="icon bg-danger-light rounded w-60 h-60">
                            <i class="text-danger mr-0 font-size-24 mdi mdi-phone-incoming"></i>
                        </div>
                        <div>
                            <p class="text-mute mt-20 mb-0 font-size-16">Total Customers</p>
                            <h3 class="text-success float-right mb-0 font-weight-500">{{count($users)}} <small class="text-success"><i class="fa fa-caret-up"></i></small></h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-6">
                <div class="box overflow-hidden pull-up">
                    <div class="box-body">							
                        <div class="icon bg-danger-light rounded w-60 h-60">
                            <i class="text-danger mr-0 font-size-24 mdi mdi-phone-incoming"></i>
                        </div>
                        <div>
                            <p class="text-mute mt-20 mb-0 font-size-16">Total Brands</p>
                            <h3 class="text-success float-right mb-0 font-weight-500">{{count($brands)}} <small class="text-success"><i class="fa fa-caret-up"></i></small></h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-6">
                <div class="box overflow-hidden pull-up">
                    <div class="box-body">							
                        <div class="icon bg-danger-light rounded w-60 h-60">
                            <i class="text-danger mr-0 font-size-24 mdi mdi-phone-incoming"></i>
                        </div>
                        <div>
                            <p class="text-mute mt-20 mb-0 font-size-16">Total Products</p>
                            <h3 class="text-success float-right mb-0 font-weight-500">{{count($products)}} <small class="text-success"><i class="fa fa-caret-up"></i></small></h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-6">
                <div class="box overflow-hidden pull-up">
                    <div class="box-body">							
                        <div class="icon bg-danger-light rounded w-60 h-60">
                            <i class="text-danger mr-0 font-size-24 mdi mdi-phone-incoming"></i>
                        </div>
                        <div>
                            <p class="text-mute mt-20 mb-0 font-size-16">Total Returns</p>
                            <h3 class="text-danger float-right mb-0 font-weight-500">{{count($returns)}} <small class="text-danger"><i class="fa fa-caret-down"></i></small></h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="box">
                    <div class="box-header">
                        <h4 class="box-title align-items-start flex-column">
                            New Arrivals
                            <small class="subtitle">More than 400+ new members</small>
                        </h4>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table no-border">
                                <thead>
                                    <tr class="text-uppercase bg-lightest">
                                        <th style="min-width: 250px"><span class="text-white">products</span></th>
                                        <th style="min-width: 100px"><span class="text-fade">pruce</span></th>
                                        <th style="min-width: 100px"><span class="text-fade">deposit</span></th>
                                        <th style="min-width: 150px"><span class="text-fade">agent</span></th>
                                        <th style="min-width: 130px"><span class="text-fade">status</span></th>
                                        <th style="min-width: 120px"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>										
                                        <td class="pl-0 py-8">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 mr-20">
                                                    <div class="bg-img h-50 w-50" style="background-image: url({{asset('backend/images/gallery/creative/img-1.jpg')}})"></div>
                                                </div>

                                                <div>
                                                    <a href="#" class="text-white font-weight-600 hover-primary mb-1 font-size-16">Vivamus consectetur</a>
                                                    <span class="text-fade d-block">Pharetra, Nulla , Nec, Aliquet</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="text-fade font-weight-600 d-block font-size-16">
                                                Paid
                                            </span>
                                            <span class="text-white font-weight-600 d-block font-size-16">
                                                $45,800k
                                            </span>
                                        </td>
                                        <td>
                                            <span class="text-fade font-weight-600 d-block font-size-16">
                                                Paid
                                            </span>
                                            <span class="text-white font-weight-600 d-block font-size-16">
                                                $45k
                                            </span>
                                        </td>
                                        <td>
                                            <span class="text-fade font-weight-600 d-block font-size-16">
                                                Sophia
                                            </span>
                                            <span class="text-white font-weight-600 d-block font-size-16">
                                                Pharetra
                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge badge-primary-light badge-lg">Approved</span>
                                        </td>
                                        <td class="text-right">
                                            <a href="#" class="waves-effect waves-light btn btn-info btn-circle mx-5"><span class="mdi mdi-bookmark-plus"></span></a>
                                            <a href="#" class="waves-effect waves-light btn btn-info btn-circle mx-5"><span class="mdi mdi-arrow-right"></span></a>
                                        </td>
                                    </tr>
                                    <tr>										
                                        <td class="pl-0 py-8">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 mr-20">
                                                    <div class="bg-img h-50 w-50" style="background-image: url(../images/gallery/creative/img-2.jpg)"></div>
                                                </div>

                                                <div>
                                                    <a href="#" class="text-white font-weight-600 hover-primary mb-1 font-size-16">Vivamus consectetur</a>
                                                    <span class="text-fade d-block">Pharetra, Nulla , Nec, Aliquet</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="text-fade font-weight-600 d-block font-size-16">
                                                Paid
                                            </span>
                                            <span class="text-white font-weight-600 d-block font-size-16">
                                                $45,800k
                                            </span>
                                        </td>
                                        <td>
                                            <span class="text-fade font-weight-600 d-block font-size-16">
                                                Paid
                                            </span>
                                            <span class="text-white font-weight-600 d-block font-size-16">
                                                $45k
                                            </span>
                                        </td>
                                        <td>
                                            <span class="text-fade font-weight-600 d-block font-size-16">
                                                Sophia
                                            </span>
                                            <span class="text-white font-weight-600 d-block font-size-16">
                                                Pharetra
                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge badge-warning-light badge-lg">In Progress</span>
                                        </td>
                                        <td class="text-right">
                                            <a href="#" class="waves-effect waves-light btn btn-info btn-circle mx-5"><span class="mdi mdi-bookmark-plus"></span></a>
                                            <a href="#" class="waves-effect waves-light btn btn-info btn-circle mx-5"><span class="mdi mdi-arrow-right"></span></a>
                                        </td>
                                    </tr>
                                    <tr>										
                                        <td class="pl-0 py-8">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 mr-20">
                                                    <div class="bg-img h-50 w-50" style="background-image: url(../images/gallery/creative/img-3.jpg)"></div>
                                                </div>

                                                <div>
                                                    <a href="#" class="text-white font-weight-600 hover-primary mb-1 font-size-16">Vivamus consectetur</a>
                                                    <span class="text-fade d-block">Pharetra, Nulla , Nec, Aliquet</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="text-fade font-weight-600 d-block font-size-16">
                                                Paid
                                            </span>
                                            <span class="text-white font-weight-600 d-block font-size-16">
                                                $45,800k
                                            </span>
                                        </td>
                                        <td>
                                            <span class="text-fade font-weight-600 d-block font-size-16">
                                                Paid
                                            </span>
                                            <span class="text-white font-weight-600 d-block font-size-16">
                                                $45k
                                            </span>
                                        </td>
                                        <td>
                                            <span class="text-fade font-weight-600 d-block font-size-16">
                                                Sophia
                                            </span>
                                            <span class="text-white font-weight-600 d-block font-size-16">
                                                Pharetra
                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge badge-success-light badge-lg">Success</span>
                                        </td>
                                        <td class="text-right">
                                            <a href="#" class="waves-effect waves-light btn btn-info btn-circle mx-5"><span class="mdi mdi-bookmark-plus"></span></a>
                                            <a href="#" class="waves-effect waves-light btn btn-info btn-circle mx-5"><span class="mdi mdi-arrow-right"></span></a>
                                        </td>
                                    </tr>
                                    <tr>										
                                        <td class="pl-0 py-8">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 mr-20">
                                                    <div class="bg-img h-50 w-50" style="background-image: url(../images/gallery/creative/img-4.jpg)"></div>
                                                </div>

                                                <div>
                                                    <a href="#" class="text-white font-weight-600 hover-primary mb-1 font-size-16">Vivamus consectetur</a>
                                                    <span class="text-fade d-block">Pharetra, Nulla , Nec, Aliquet</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="text-fade font-weight-600 d-block font-size-16">
                                                Paid
                                            </span>
                                            <span class="text-white font-weight-600 d-block font-size-16">
                                                $45,800k
                                            </span>
                                        </td>
                                        <td>
                                            <span class="text-fade font-weight-600 d-block font-size-16">
                                                Paid
                                            </span>
                                            <span class="text-white font-weight-600 d-block font-size-16">
                                                $45k
                                            </span>
                                        </td>
                                        <td>
                                            <span class="text-fade font-weight-600 d-block font-size-16">
                                                Sophia
                                            </span>
                                            <span class="text-white font-weight-600 d-block font-size-16">
                                                Pharetra
                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge badge-danger-light badge-lg">Rejected</span>
                                        </td>
                                        <td class="text-right">
                                            <a href="#" class="waves-effect waves-light btn btn-info btn-circle mx-5"><span class="mdi mdi-bookmark-plus"></span></a>
                                            <a href="#" class="waves-effect waves-light btn btn-info btn-circle mx-5"><span class="mdi mdi-arrow-right"></span></a>
                                        </td>
                                    </tr>
                                    <tr>										
                                        <td class="pl-0 py-8">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 mr-20">
                                                    <div class="bg-img h-50 w-50" style="background-image: url(../images/gallery/creative/img-5.jpg)"></div>
                                                </div>

                                                <div>
                                                    <a href="#" class="text-white font-weight-600 hover-primary mb-1 font-size-16">Vivamus consectetur</a>
                                                    <span class="text-fade d-block">Pharetra, Nulla , Nec, Aliquet</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="text-fade font-weight-600 d-block font-size-16">
                                                Paid
                                            </span>
                                            <span class="text-white font-weight-600 d-block font-size-16">
                                                $45,800k
                                            </span>
                                        </td>
                                        <td>
                                            <span class="text-fade font-weight-600 d-block font-size-16">
                                                Paid
                                            </span>
                                            <span class="text-white font-weight-600 d-block font-size-16">
                                                $45k
                                            </span>
                                        </td>
                                        <td>
                                            <span class="text-fade font-weight-600 d-block font-size-16">
                                                Sophia
                                            </span>
                                            <span class="text-white font-weight-600 d-block font-size-16">
                                                Pharetra
                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge badge-warning-light badge-lg">In Progress</span>
                                        </td>
                                        <td class="text-right">
                                            <a href="#" class="waves-effect waves-light btn btn-info btn-circle mx-5"><span class="mdi mdi-bookmark-plus"></span></a>
                                            <a href="#" class="waves-effect waves-light btn btn-info btn-circle mx-5"><span class="mdi mdi-arrow-right"></span></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
@endsection