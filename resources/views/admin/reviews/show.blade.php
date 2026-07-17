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
            @lang('reviews.reviews')
        @endslot
        @slot('link_two_url')
            {{ route('reviews.index') }}
        @endslot

        @slot('active_link')
            @lang('reviews.view_details')
        @endslot

        @slot('page_title')
            @lang('reviews.view_details')
        @endslot
    @endcomponent

    <div class="card">
        <div class="card-body">
            <h4 class="mb-4">@lang('reviews.details')</h4>

            <table class="table table-bordered">
                <tr>
                    <th>@lang('reviews.service_name')</th>
                    <td>{{ $data->service->service_name ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <th>@lang('reviews.name')</th>
                    <td>{{ $data->name }}</td>
                </tr>
                <tr>
                    <th>@lang('reviews.email')</th>
                    <td>{{ $data->email }}</td>
                </tr>
                <tr>
                    <th>@lang('reviews.phone')</th>
                    <td>{{ $data->phone }}</td>
                </tr>
                <tr>
                    <th>@lang('reviews.review')</th>
                    <td>{{ $data->review }}</td>
                </tr>
                <tr>
                    <th>@lang('reviews.rating')</th>
                    <td>
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($i <= $data->rating)
                                <i class="fa-solid fa-star" style="color: #ffbc00;"></i>
                            @else
                                <i class="fa-regular fa-star" style="color: #ffbc00;"></i>
                            @endif
                        @endfor
                        <span class="ms-2">({{ $data->rating }}/5)</span>
                    </td>
                </tr>
                <tr>
                    <th>@lang('reviews.created_at')</th>
                    <td>{{ $data->created_at->format('d M Y, h:i A') }}</td>
                </tr>
            </table>

            <a href="{{ route('reviews.index') }}" class="btn btn-secondary mt-3">
                <i class="fa fa-arrow-left"></i> @lang('reviews.back')
            </a>
        </div>
    </div>
</div>
@endsection

@push('styles')
    <!-- ✅ Font Awesome for stars -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
@endpush
