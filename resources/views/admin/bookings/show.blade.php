@extends('admin.layouts.master')
@section('body')
<div class="content">

    @component('components.breadcrumb')
        @slot('link_one')
            @lang('common.dashboard')
        @endslot
        @slot('link_one_url')
            {{ route('admin.view') }}
        @endslot

        @slot('link_two')
            @lang('bookings.bookings')
        @endslot
        @slot('link_two_url')
            {{ route('bookings.index') }}
        @endslot

        @slot('active_link')
            @lang('bookings.view_details')
        @endslot

        @slot('page_title')
            @lang('bookings.view_details')
        @endslot
    @endcomponent

    <div class="card">
        <div class="card-body">
            <h4 class="mb-4">@lang('bookings.details')</h4>

            <table class="table table-bordered">
                <tr>
                    <th>@lang('bookings.booking_date')</th>
                    <td>{{ $data->booking_date }}</td>
                </tr>
                <tr>
                    <th>@lang('bookings.category_name')</th>
                    <td>{{ $data->category->category_name ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <th>@lang('bookings.service_name')</th>
                    <td>{{ $data->service->service_name ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <th>@lang('bookings.customer_name')</th>
                    <td>{{ $data->customer->customer_name ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <th>@lang('common.status')</th>
                    <td>
                        @if($data->status == 1)
                            <span class="badge bg-success">@lang('bookings.completed')</span>
                        @else
                            <span class="badge bg-warning">@lang('bookings.pending')</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>@lang('bookings.notes')</th>
                    <td>{{ $data->notes ?? '-' }}</td>
                </tr>
                <tr>
                    <th>@lang('bookings.created_at')</th>
                    <td>{{ $data->created_at->format('d M Y, h:i A') }}</td>
                </tr>
            </table>

            <a href="{{ route('bookings.index') }}" class="btn btn-secondary mt-3">
                <i class="fa fa-arrow-left"></i> @lang('bookings.back')
            </a>
        </div>
    </div>


@endsection
