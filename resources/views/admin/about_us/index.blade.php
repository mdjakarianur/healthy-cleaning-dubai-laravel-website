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
                @lang('about_us.about_us')
            @endslot
            @slot('link_two_url')
                {{ route('about_us.index') }}
            @endslot

            @slot('active_link')
                @lang('about_us.about_us')
            @endslot
            @slot('page_title')
                @lang('about_us.about_us')
            @endslot
        @endcomponent

        <div class="card">
            <div class="card-body">
                <form method="post" action="{{ route('about_us.update', $data['data']->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <!-- Title -->
                        <div class="col-lg-6 col-md-6 col-12 mt-2">
                            <label>@lang('about_us.title')</label><span class="text-danger">*</span>
                            <input type="text" class="form-control form-control-sm @error('title') is-invalid @enderror"
                                name="title" value="{{ $data['data']->title }}">
                            @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Sub Title -->
                        <div class="col-lg-6 col-md-6 col-12 mt-2">
                            <label>@lang('about_us.sub_title')</label><span class="text-danger">*</span>
                            <input type="text"
                                class="form-control form-control-sm @error('sub_title') is-invalid @enderror"
                                name="sub_title" value="{{ $data['data']->sub_title }}">
                            @error('sub_title')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Description -->
                        <div class="col-12 mt-4">
                            <label>@lang('about_us.description')</label>
                            <textarea class="form-control form-control-sm @error('description') is-invalid @enderror" name="description" rows="6"
                                >{!! $data['data']->description !!}</textarea>
                            @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Image Up -->
                        <div class="col-lg-6 col-md-6 col-12 mt-2">
                            <label>@lang('about_us.image_up')</label>
                            <input type="file" name="image_up"
                                class="form-control form-control-sm @error('image_up') is-invalid @enderror">
                            @error('image_up')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <br>
                            @if ($data['data']->image_up && file_exists(public_path('backend/Images/AboutImage/' . $data['data']->image_up)))
                                <img src="{{ asset('backend/Images/AboutImage/' . $data['data']->image_up) }}"
                                    class="img-fluid" style="height:70px;">
                            @endif
                        </div>

                        <!-- Image Bottom -->
                        <div class="col-lg-6 col-md-6 col-12 mt-2">
                            <label>@lang('about_us.image_bottom')</label>
                            <input type="file" name="image_bottom"
                                class="form-control form-control-sm @error('image_bottom') is-invalid @enderror">
                            @error('image_bottom')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <br>
                            @if ($data['data']->image_bottom && file_exists(public_path('backend/Images/AboutImage/' . $data['data']->image_bottom)))
                                <img src="{{ asset('backend/Images/AboutImage/' . $data['data']->image_bottom) }}"
                                    class="img-fluid" style="height:70px;">
                            @endif
                        </div>
                    </div>

                    <div class="text-right mt-3">
                        <button class="btn btn-sm btn-success"><i class="fa fa-save"></i> @lang('common.submit')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
