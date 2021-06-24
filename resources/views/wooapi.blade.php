@extends('layouts.app')

@include('leftsidebar')
@include('header')

@section('content')

<script>

    function delete_wooapi(val) {
        document.getElementById(val).submit();
        alert(val);
    }

</script>

<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Store Woocommerce Api</h3>
                        </div><!-- .nk-block-head-content -->
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                        <li class="nk-block-tools-opt">
                                            <div class="drodown">
                                                <a href="#" class="dropdown-toggle btn btn-icon btn-primary" data-toggle="modal" data-target="#add_wooapi_modal"><em class="icon ni ni-plus"></em></a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div><!-- .toggle-wrap -->
                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                
                <div class="card card-preview">
                    <div class="card-inner">
                        <table class="datatable-init table">
                            <thead>
                                <tr>
                                    <th>Email</th>
                                    <th>Store</th>
                                    <th>Consumer key</th>
                                    <th>Consumer secret</th>
                                    <th class="tb-tnx-action">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($wooapis as $wooapi)
                                <tr>
                                    <td>{{ $wooapi->email }}</td>
                                    <td>{{ $wooapi->store }}</td>
                                    <td>{{ $wooapi->consumer_key }}</td>
                                    <td>{{ $wooapi->consumer_secret }}</td>
                                    <td class="tb-tnx-action">
                                        <div class="dropdown">
                                            <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                                <ul class="link-list-plain">
                                                    <li data-toggle="modal" data-target="#edit_wooapi_modal"  data-id="{{ json_encode($wooapi) }}">
                                                        <a class="text-primary"><em class="icon ni ni-edit"></em><span>Edit</span></a>
                                                    </li>
                                                    <li onclick="delete_wooapi('delete_frm_{{ $wooapi->id }}')" >
                                                        <form action="{{ route('wooapi.destroy', $wooapi->id)}}" name="delete_frm_{{ $wooapi->id }}" id="delete_frm_{{ $wooapi->id }}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <a href="#" class="text-danger"><em class="icon ni ni-trash" style="color:#e85347"></em><span>Remove</span></a>
                                                        </form>
                                                    </li>
                                                </ul>
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
</div>


<!-- @@ Add Modal @e -->
<div class="modal fade" tabindex="-1" role="dialog" id="add_wooapi_modal">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
           
            <div class="modal-body modal-body-lg">
                <h5 class="title">Add Store API</h5>
                <div class="tab-content">
                    <div class="tab-pane active">
                        <div class="row gy-4">
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="form-group">
                                        <div class="form-control-wrap">
                                            <select class="form-select form-control form-control-lg" data-ui="xl" data-search="on" id="a_email" name="a_email">
                                            @foreach($staffs as $staff)
                                                <option value="{{ $staff->id }}">{{ $staff->email }}</option>
                                            @endforeach
                                            </select>
                                            <label class="form-label-outlined" for="select email">Select Email*</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="store">Store*</label>
                                    <input type="text" id="a_store" name="a_store" class="form-control form-control-lg" placeholder="Enter Store" require>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="con-key">Consumer key*</label>
                                    <input type="text" id="a_con_key" name="a_con_key" class="form-control form-control-lg" placeholder="Enter Consumer key" require>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="consumer-secret">Consumer secret*</label>
                                    <input type="text" id="a_con_secret" name="a_con_secret" class="form-control form-control-lg" placeholder="Enter Consumer secret">
                                </div>
                            </div>

                            <div class="col-12">
                                <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                    <li>
                                        <a href="#" class="btn btn-lg btn-primary" id="wooapi_save_btn">Save</a>
                                    </li>
                                    <li>
                                        <a href="#" data-dismiss="modal" class="link link-light">Cancel</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div><!-- .tab-pane -->
                   
                </div><!-- .tab-content -->
            </div><!-- .modal-body -->
        </div><!-- .modal-content -->
    </div><!-- .modal-dialog -->
</div><!-- .modal -->





<!-- @@ Edit Modal @e -->
<div class="modal fade" tabindex="-1" role="dialog" id="edit_wooapi_modal">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
           
            <div class="modal-body modal-body-lg">
                <h5 class="title">Edit Store API</h5>
                <div class="tab-content">
                    <div class="tab-pane active">
                        <div class="row gy-4">
                            <input type="hidden" id="e_wooapi_id" name="e_wooapi_id">
                            <input type="hidden" id="e_user_id" name="e_user_id">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="con-key">Email</label>
                                    <input type="text" id="e_email" name="e_email" class="form-control form-control-lg" readonly>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="con-key">Consumer key*</label>
                                    <input type="text" id="e_con_key" name="e_con_key" class="form-control form-control-lg" placeholder="Enter Consumer key" require>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="consumer-secret">Consumer secret*</label>
                                    <input type="text" id="e_con_secret" name="e_con_secret" class="form-control form-control-lg" placeholder="Enter Consumer secret">
                                </div>
                            </div>

                            <div class="col-12">
                                <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                    <li>
                                        <a href="#" class="btn btn-lg btn-primary" id="wooapi_update_btn">Update</a>
                                    </li>
                                    <li>
                                        <a href="#" data-dismiss="modal" class="link link-light">Cancel</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div><!-- .tab-pane -->
                   
                </div><!-- .tab-content -->
            </div><!-- .modal-body -->
        </div><!-- .modal-content -->
    </div><!-- .modal-dialog -->
</div><!-- .modal -->










<script>
$(document).ready(function(){

    $("#wooapi_save_btn").click(function(e){
        e.preventDefault();
        var user_id = $("#a_email").val();
        var store = $("#a_store").val();
        var consumer_key = $("#a_con_key").val();
        var consumer_secret = $("#a_con_secret").val();
       
        if(consumer_key != "" && consumer_secret != "" ) {
            $.ajax({
                url: "/wooapi",
                type:"POST",
                data:{
                    user_id: user_id,
                    store: store,
                    consumer_key: consumer_key,
                    consumer_secret: consumer_secret,
                    _token: "{{ csrf_token() }}",
                },
                success:function(response){
                    $("#add_wooapi_modal").modal('hide');
                    NioApp.Toast('Success.', 'success');
                    toastr.clear();
                    window.location.href = '{{route("wooapi")}}';
                },
            });
        }
    });


    $('#edit_wooapi_modal').on('show.bs.modal', function(e) {
        var wooapi_data = $(e.relatedTarget).data('id');
        $("#e_wooapi_id").val(wooapi_data.id);
        $("#e_user_id").val(wooapi_data.user_id);
        $("#e_email").val(wooapi_data.email);
        $("#e_con_key").val(wooapi_data.consumer_key);
        $("#e_con_secret").val(wooapi_data.consumer_secret);
    });



    $("#wooapi_update_btn").click(function(e){
        e.preventDefault();
        var id = $("#e_wooapi_id").val();
        var user_id = $("#e_user_id").val();
        var consumer_key = $("#e_con_key").val();
        var consumer_secret = $("#e_con_secret").val();

        if(consumer_key != "" && consumer_secret != "" ) {
            $.ajax({
                url: "/wooapi",
                type:"PUT",
                data:{
                    id: id,
                    user_id: user_id,
                    consumer_key: consumer_key,
                    consumer_secret: consumer_secret,
                    _token: "{{ csrf_token() }}",
                },
                success:function(response){
                    $("#edit_wooapi_modal").modal('hide');
                    NioApp.Toast('Success.', 'success');
                    toastr.clear();
                    window.location.href = '{{route("wooapi")}}';
                },
            });
        }

    });


   

});
</script>


@endsection
