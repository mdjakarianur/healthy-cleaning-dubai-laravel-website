
@extends('customer.index')
@section('content')

@php
$customer = DB::table("customer_infos")->where('id',Auth('customer')->user()->id)->first();
@endphp

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">View Our Services</h4>
                        <div class="table-responsive pt-3">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Booking Date</th>
                                        <th>Category Name</th>
                                        <th>Service Name</th>
                                        <th>Service Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $sl = 1; @endphp
                                    @foreach($data as $showdata)
                                    <tr class="table-warning">
                                        <td>{{ $sl++ }}</td>
                                        <td>{{ $showdata->booking_date }}</td>
                                        <td>{{ $showdata->category->category_name ?? 'N/A' }}</td>
                                        <td>{{ $showdata->service->service_name ?? 'N/A' }}</td>
                                        <td>
                                            @if($showdata->status == 1)
                                                <span class="badge bg-success">Completed</span>
                                            @else
                                                <span class="badge bg-warning text-dark">In Progress</span>
                                            @endif
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

@endsection
