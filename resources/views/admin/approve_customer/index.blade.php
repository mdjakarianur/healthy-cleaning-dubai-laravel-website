@extends('admin.layouts.master')
@section('body')
<div class="content">

    @component('components.breadcrumb')
    <!-- link 1 -->
    @slot('link_one')
    @lang('common.dashboard')
    @endslot
    @slot('link_one_url')
    {{route('admin.view')}}
    @endslot


    <!-- link 2 -->
    @slot('link_two')
    @lang('approve_customer.approve_customer')
    @endslot
    @slot('link_two_url')
    {{route('approve_customer.index')}}
    @endslot


    <!-- Active Link -->
    @slot('active_link')
    @lang('approve_customer.index_title')
    @endslot

    <!-- Page Title -->
    @slot('page_title')
    @lang('approve_customer.index_title')
    @endslot


    @if(Auth::user()->can('Approve Customer create'))
    <!-- button one -->
    @slot('button_one_name')
    @lang('common.create')
    @endslot

    @slot('button_one_route')
    {{route('approve_customer.create')}}
    @endslot

    @slot('button_one_class')
    btn btn-sm btn-outline-primary
    @endslot

    @slot('button_one_icon')
    <i class="fa fa-plus"></i>
    @endslot

    @endif


    @endcomponent

    <div class="card">
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="table-responsive">
                <table class="table myTable  fs--1 mb-0">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Customer Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Approve Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="tbody" id="showtdata">
                        @php
                        $sl=1;
                        @endphp
                        @if($data)
                        @foreach($data as $showdata)
                        <tr id="tr{{ $showdata->id }}">
                            <td>{{$sl++}}</td>
                            <td>{{$showdata->customer_name}}</td>
                            <td>{{$showdata->email}}</td>
                            <td>{{$showdata->phone}}</td>
                            <td>{{$showdata->address}}</td>
                            <td>
                                @if($showdata->status == 1)
                                <a href="{{ url('/DenyCustomer/'. $showdata->id) }}" class="btn btn-success btn-sm">Approve</a>
                                @else
                                <a href="{{ url('/ApproveCustomer/'. $showdata->id) }}" class="btn btn-warning btn-sm">Deny</a>
                                @endif
                            </td>
                            <td>
                                <div>
                                    <form action="{{ route('approve_customer.destroy',$showdata->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onClick="return confirm('Are You Sure?')">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>



@endsection
