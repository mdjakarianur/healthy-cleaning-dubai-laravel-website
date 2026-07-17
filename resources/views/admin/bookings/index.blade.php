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
    @lang('bookings.bookings')
    @endslot
    @slot('link_two_url')
    {{route('bookings.index')}}
    @endslot


    <!-- Active Link -->
    @slot('active_link')
    @lang('bookings.index_title')
    @endslot

    <!-- Page Title -->
    @slot('page_title')
    @lang('bookings.index_title')
    @endslot





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
                            <th>@lang('bookings.booking_date')</th>
                            <th>@lang('bookings.category_name')</th>
                            <th>@lang('bookings.service_name')</th>
                            <th>@lang('bookings.name')</th>
                            <th>@lang('bookings.email')</th>
                            <th>@lang('bookings.phone')</th>
                            <th>@lang('common.status')</th>
                            <th>@lang('common.action')</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>


@push('footer_script')
<script>
document.addEventListener("DOMContentLoaded", function() {
    // Datatables Responsive
    $(".myTable").DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('bookings.index') }}",
        columns: [
            {data: 'booking_date', name: 'booking_date'},
            {data: 'category_name', name: 'category_name'},
            {data: 'service_name', name: 'service_name'},
            {data: 'customer_name', name: 'customer_name'},
            {data: 'email', name: 'email'},
            {data: 'phone', name: 'phone'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
});
</script>

<script>
    function changeBookingsStatus(id)
    {
        // alert(id);
        $.ajax({
            headers : {
                'X-CSRF-TOKEN' : '{{ csrf_token() }}'
            },

            url : '{{ route('bookings.status') }}',

            type : 'POST',

            data : {id},

            success : function(res)
            {

            }
        })
    }
</script>

@endpush


@endsection
