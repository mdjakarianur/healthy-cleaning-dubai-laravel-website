@extends('customer.index')
@section('content')

@php
    $data = DB::table("customer_infos")->where('id',Auth('customer')->user()->id)->first();
@endphp

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Change Password</h4>
                        <form method="post" class="row" action="{{ url('upchangepasswordcustomer') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group col-md-3">
                                <label>Old Password</label>
                                <input type="password" name="old_password" class="form-control" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label>New Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Confirm New Password</label>
                                <input type="password" name="password_confirmation" class="form-control" required>
                            </div>
                            <div class="brn-group">
                                <button type="submit" class="btn btn-primary me-2">Update Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

