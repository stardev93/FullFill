@extends('layouts.app')

@include('leftsidebar')
@include('header')



@section('content')

<script>

     function delete_staff(val) {
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
                            <h3 class="nk-block-title page-title">Staff Lists</h3>
                            <div class="nk-block-des text-soft">
                                <p>You have total {{ count($staffs) }} staffs.</p>
                            </div>
                        </div><!-- .nk-block-head-content -->
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                        <li class="nk-block-tools-opt">
                                            <div class="drodown">
                                                <a href="#" class="dropdown-toggle btn btn-icon btn-primary" data-toggle="modal" data-target="#add-staff"><em class="icon ni ni-plus"></em></a>
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
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Last Login</th>
                                    <th>Status</th>
                                    <th class="tb-tnx-action">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            
                            @foreach($staffs as $staff)
                                <tr>
                                    <td data-toggle="modal" data-id="{{ $staff->id }}"  data-target="#profile-view">
                                        <a href="#">
                                            <div class="user-card">
                                                <div class="user-avatar bg-primary">
                                                    <span>
                                                        {{ strtoupper(substr(explode(" ", $staff->name )[0], 0, 1)) }}
                                                        @if(count(explode(" ", $staff->name)) == 2) 
                                                            {{ strtoupper(substr(explode(" ", $staff->name)[1], 0, 1)) }}
                                                        @endif</span>
                                                </div>
                                                <div class="user-info">
                                                    <span class="tb-lead">{{ $staff->name }}<span class="dot dot-success d-md-none ml-1"></span></span>
                                                </div>
                                            </div>
                                        </a>
                                    </td>
                                    <td>
                                        <span>{{ $staff->email }}</span>
                                    </td>
                                    <td>
                                        <span>{{ $staff->phone }}</span>
                                    </td>
                                    <td>
                                        <span>{{ $staff->last_login }}</span>
                                    </td>
                                    <td>
                                        @if($staff->state == 1)
                                            <span class="tb-status text-success">Active</span>
                                        @elseif($staff->state == 2)
                                            <span class="tb-status text-warning">Pending</span>
                                        @elseif($staff->state == 3)
                                            <span class="tb-status text-danger">Suspend</span>
                                        @elseif($staff->state == 4)
                                            <span class="tb-status text-info">Inactive</span>
                                        @endif
                                    </td>
                                    <td class="tb-tnx-action">
                                        <div class="dropdown">
                                            <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                                <ul class="link-list-plain">
                                                    <li data-toggle="modal" data-target="#profile-edit"  data-id="{{ $staff }}"><a href="#" class="text-primary"><em class="icon ni ni-edit"></em><span>Edit</span></a></li>
                                                    <li data-toggle="modal" data-target="#profile-view" data-id="{{ $staff->id }}"><a href="#" class="text-primary"><em class="icon ni ni-eye"></em><span>View</span></a></li>
                                                    <li onclick="delete_staff('delete_frm_{{ $staff->id }}')" >
                                                        <form action="{{ route('staff.destroy', $staff->id)}}" name="delete_frm_{{ $staff->id }}" id="delete_frm_{{ $staff->id }}" method="post">
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
<div class="modal fade" tabindex="-1" role="dialog" id="add-staff">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
           
            <div class="modal-body modal-body-lg">
                <h5 class="title">Add Stuff</h5>
                <div class="tab-content">
                    <div class="tab-pane active">
                        <div class="row gy-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="first-name">First Name*</label>
                                    <input type="text" id="a_fname" name="a_fname" class="form-control form-control-lg" placeholder="Enter First name" require>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="last-name">Last Name*</label>
                                    <input type="text" id="a_lname" name="a_lname" class="form-control form-control-lg" placeholder="Enter Last name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="display-name">Email*</label>
                                    <input type="text" id="a_email" name="a_email" class="form-control form-control-lg"  placeholder="Enter Email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="phone-no">Phone Number</label>
                                    <input type="text" id="a_phone" name="a_phone" class="form-control form-control-lg" placeholder="Phone Number">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="birth-day">Date of Birth</label>
                                    <input type="text" id="a_birthday" name="a_birthday" data-date-format="yyyy-mm-dd" class="form-control form-control-lg date-picker" placeholder="Enter your birthday">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label class="form-label" for="state">State</label>
                                    <select class="form-control" id="a_state" name="a_state">
                                        <option value="1">Active</option>
                                        <option value="2">Pending</option>
                                        <option value="3">Suspend</option>
                                        <option value="4">InActive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                    <li>
                                        <a href="#" class="btn btn-lg btn-primary" id="staff_save_btn">Save</a>
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


<!-- @@ Profile Edit Modal @e -->
<div class="modal fade" tabindex="-1" role="dialog" id="profile-edit">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
            <div class="modal-body modal-body-lg">
                <input type="hidden" id="edit_id" name="edit_id">
                <h5 class="title">Update Profile</h5>
                <div class="tab-content">
                    <div class="tab-pane active">
                        <div class="row gy-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="first-name">First Name*</label>
                                    <input type="text" class="form-control form-control-lg" id="e_fname" name="e_fname" value="" placeholder="Enter First name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="last-name">Last Name*</label>
                                    <input type="text" class="form-control form-control-lg" id="e_lname" name="e_lname" value="" placeholder="Enter Last name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="display-name">Email*</label>
                                    <input type="text" class="form-control form-control-lg" id="e_email" name="e_email" value="" placeholder="Enter display name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="phone-no">Phone Number</label>
                                    <input type="text" class="form-control form-control-lg" id="e_phone" name="e_phone" value="" placeholder="Phone Number">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="birth-day">Date of Birth</label>
                                    <input type="text" class="form-control form-control-lg date-picker" data-date-format="yyyy-mm-dd" id="e_birthday" name="e_birthday" placeholder="Enter your birthday">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="state">State</label>
                                    <select class="form-control" id="e_state" name="e_state">
                                        <option value="1">Active</option>
                                        <option value="2">Pending</option>
                                        <option value="3">Suspend</option>
                                        <option value="4">InActive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                    <li>
                                        <a href="#" id="staff_update_btn" class="btn btn-lg btn-primary">Update</a>
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



<div class="modal fade" tabindex="-1" role="dialog" id="profile-view">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
            <div class="modal-body modal-body-lg">
                <h5 class="title">Profile</h5>
                
                <div class="tab-content">
                    <div class="tab-pane active">
                        <div class="row gy-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="first-name">First Name</label>
                                    <input type="text" class="form-control form-control-lg" id="v_fname" name="v_fname" value="" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="last-name">Last Name</label>
                                    <input type="text" class="form-control form-control-lg" id="v_lname" name="v_lname" value="" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="display-name">Email</label>
                                    <input type="text" class="form-control form-control-lg" id="v_email" name="v_email" value="" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="phone-no">Phone Number</label>
                                    <input type="text" class="form-control form-control-lg" id="v_phone" name="v_phone" value="" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="birth-day">Date of Birth</label>
                                    <input type="text" class="form-control form-control-lg date-picker" id="v_birthday" name="v_birthday" readonly>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label" for="state">State</label>
                                    <select class="form-control" readonly>
                                        <option value="1">Active</option>
                                        <option value="2">Pending</option>
                                        <option value="3">Suspend</option>
                                        <option value="4">InActive</option>
                                    </select>
                                </div>
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

    $("#staff_save_btn").click(function(e){
        e.preventDefault();
        var name = $("#a_fname").val() + " " + $("#a_lname").val();
        var email = $("#a_email").val();
        var phone = $("#a_phone").val();
        var birthday = $("#a_birthday").val();
        var state = $("#a_state").val();

        if($("#a_fname").val() != "" && $("#a_lname").val() != "" && email != "" ) {
            $.ajax({
                url: "/staff",
                type:"POST",
                data:{
                    name: name,
                    email: email,
                    phone: phone,
                    birthday: birthday,
                    state: state,
                    _token: "{{ csrf_token() }}",
                },
                success:function(response){
                    $("#add-staff").modal('hide');
                    NioApp.Toast('Success.', 'success');
                    toastr.clear();
                    window.location.href = '{{route("staff")}}';
                },
            });
        }

    });


    $('#profile-edit').on('show.bs.modal', function(e) {
        var staff_data = $(e.relatedTarget).data('id');
        $("#e_fname").val(staff_data['name'].split(" ")[0]);
        $("#e_lname").val(staff_data['name'].split(" ")[1]);
        $("#e_email").val(staff_data['email']);
        $("#e_phone").val(staff_data['phone']);
        $("#e_birthday").val(staff_data['birthday']);
        $("#e_state").val(staff_data['state']);
        $("#edit_id").val(staff_data['id']);
    });

    $("#staff_update_btn").click(function(e){
        e.preventDefault();
        var id = $("#edit_id").val();
        var name = $("#e_fname").val() + " " + $("#e_lname").val();
        var email = $("#e_email").val();
        var phone = $("#e_phone").val();
        var birthday = $("#e_birthday").val();
        var state = $("#e_state").val();
        if($("#e_fname").val() != "" && $("#e_lname").val() != "" && email != "" ) {
            $.ajax({
                url: "/staff",
                type:"PUT",
                data:{
                    id: id,
                    name: name,
                    email: email,
                    phone: phone,
                    birthday: birthday,
                    state: state,
                    _token: "{{ csrf_token() }}",
                },
                success:function(response){
                    $("#profile-edit").modal('hide');
                    NioApp.Toast('Success.', 'success');
                    toastr.clear();
                    window.location.href = '{{route("staff")}}';
                },
            });
        }

    });



});
</script>
@endsection
