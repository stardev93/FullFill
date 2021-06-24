@extends('layouts.app')

@include('leftsidebar')
@include('header')

@section('content')

<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h4 class="nk-block-title">Order List</h4>
                        </div>
                    </div>
                    
                    <div class="card card-preview">
                      
                        <div class="row gy-4" style="padding-left:5px; padding-top:20px; padding-right:5px">
                            <div class="col-lg-2 col-sm-6">
                                <div class="form-control-wrap" style="margin-top:15px; margin-left:20px">
                                    <h5>Orders</h5>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div class="form-group">
                                    <div class="form-control-wrap" style="margin-top:15px">
                                        <h5>Scan Order Barcode</h5>
                                    </div>
                                </div>
                            </div>
    {{ json_encode($wooInfos) }}
                            <div class="col-lg-4 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group">
                                        <div class="form-control-wrap">
                                            <select class="form-select form-control form-control-lg" data-ui="xl" data-search="on" id="select_store">
                                            @foreach($wooInfos as $woo)
                                                <option value=`{{$woo->store}}`>{{$woo->store}}</option>
                                            @endforeach
                                            </select>
                                            <label class="form-label-outlined" for="select store">Select store</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-2 col-sm-6">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <select class="form-select form-control form-control-xl" data-ui="xl" id="filter_by">
                                            <option value="all">All</option>
                                            <option value="completed">Completed</option>
                                            <option value="processing">Processing</option> 
                                        </select>
                                        <label class="form-label-outlined" for="filter-by">Filter by</label>
                                    </div>
                                </div>
                            </div>

                                
                        </div>
                        <hr class="preview-hr" style="margin-top:1rem; margin-bottom:1rem">
                        <div class="card-inner">
                            <table class="datatable-init table">
                                <thead>
                                    <tr>
                                        <th>Order Name</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th>Total</th>
                                        <th>Tracking</th>
                                        <th>Items</th>
                                        <th class="tb-tnx-action">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($orderDatas as $order)
                                    <tr data-id="{{$order->id}}">
                                        <td>Tiger Nixon</td>
                                        <td>{{$order->status}}</td>
                                        <td>{{$order->date_created}}</td>
                                        <td>{{$order->total}}</td>
                                        <td>423454</td>
                                        <td>12</td>
                                        <td class="tb-tnx-action">
                                            <div class="dropdown">
                                                <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                                    <ul class="link-list-plain">
                                                        <li><a href="{{ route('home.order.view', 1)}}" class="text-primary"><em class="icon ni ni-edit"></em><span>Edit</span></a></li>
                                                        <li><a href="#" class="text-primary" data-toggle="modal" data-target="#view_modal"><em class="icon ni ni-eye"></em><span>View</span></a></li>
                                                        <li><a href="#" class="text-danger"><em class="icon ni ni-trash" style="color:#e85347"></em><span>Remove</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    @endforeach
                               
                                   
                                </tbody>
                            </table>
                        </div>
                    </div><!-- .card-preview -->
                </div> <!-- nk-block -->
            </div>
        </div>
    </div>
</div>





<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection
