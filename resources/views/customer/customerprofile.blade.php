@extends('customer.index')
@section('content')



    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Update your information</h4>
                            <form method="post" class="row" action="{{ url('/updatecustomerdashboard') }}/{{ $data->id }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group col-md-3">
                                    <label>Customer Name</label>
                                    <input type="text" class="form-control" name="customer_name"
                                        value="{{ $data->customer_name }}">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Phone Number</label>
                                    <input type="number" class="form-control" name="phone" min="11"
                                        value="{{ $data->phone }}">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" value="{{ $data->email }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Address</label>
                                    <textarea class="form-control" name="address">{!! $data->address !!}</textarea>
                                </div>
                                <div class="brn-group">
                                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                                    <button class="btn btn-light">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endsection
