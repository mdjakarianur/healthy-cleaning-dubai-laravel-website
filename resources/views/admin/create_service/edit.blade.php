@extends('admin.layouts.master')
@section('body')
    <div class="content">

        @component('components.breadcrumb')
            <!-- link 1 -->
            @slot('link_one')
                @lang('common.dashboard')
            @endslot
            @slot('link_one_url')
                {{ route('admin.view') }}
            @endslot


            <!-- link 2 -->
            @slot('link_two')
                @lang('create_service.service')
            @endslot
            @slot('link_two_url')
                {{ route('create_service.index') }}
            @endslot


            <!-- Active Link -->
            @slot('active_link')
                @lang('create_service.edit_title')
            @endslot

            <!-- Page Title -->
            @slot('page_title')
                @lang('create_service.edit_title')
            @endslot

            @if (Auth::user()->can('Service view'))
                <!-- button one -->
                @slot('button_one_name')
                    @lang('common.view')
                @endslot

                @slot('button_one_route')
                    {{ route('create_service.index') }}
                @endslot

                @slot('button_one_class')
                    btn btn-sm btn-outline-primary
                @endslot

                @slot('button_one_icon')
                    <i class="fa fa-eye"></i>
                @endslot
            @endif
        @endcomponent

        <div class="card">
            <div class="card-body">

                <form method="post" action="{{ route('create_service.update', $data['data']->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-12 mt-2">
                            <label>@lang('common.sl')</label><span class="text-danger">*</span>
                            <input type="number" class="form-control form-control-sm @error('sl') is-invalid @enderror"
                                name="sl" id="sl" value="{{ $data['data']->sl }}">
                            @error('sl')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-lg-4 col-md-6 col-12 mt-2">
                            <label>@lang('create_service.select_category')</label><span class="text-danger">*</span>
                            <div class="showlabels">
                                <select
                                    class="form-select form-select-sm select2 @error('category_id') is-invalid @enderror"
                                    name="category_id" id="category_id">
                                    <option value="">@lang('common.select_one')</option>
                                    @if (isset($data['category']))
                                        @foreach ($data['category'] as $category)
                                            <option @if ($data['data']->category_id == $category->id) selected @endif
                                                value="{{ $category->id }}">
                                                @if (config('app.locale') == 'en')
                                                    {{ $category->category_name ?: $category->category_name_bn }}
                                                @else
                                                    {{ $category->category_name_bn ?: $category->category_name }}
                                                @endif
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            @error('category_id')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-lg-4 col-md-6 col-12 mt-2">
                            <label>@lang('create_service.service_name')</label><span class="text-danger">*</span>
                            <input type="text"
                                class="form-control form-control-sm @error('service_name') is-invalid @enderror"
                                name="service_name" id="service_name" value="{{ $data['data']->service_name }}">
                            @error('service_name')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 mt-2">
                            <label>@lang('create_service.sub_title')</label><span class="text-danger">*</span>
                            <input type="text"
                                class="form-control form-control-sm @error('sub_title') is-invalid @enderror"
                                name="sub_title" id="sub_title" value="{{ $data['data']->sub_title }}">
                            @error('sub_title')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        {{-- <div class="col-lg-6 col-md-6 col-12 mt-2">
                            <label>@lang('create_service.video_link')</label><span class="text-danger">*</span>
                            <input type="text"
                                class="form-control form-control-sm @error('video_link') is-invalid @enderror"
                                name="video_link" id="video_link" value="{{ $data['data']->video_link }}">
                            @error('video_link')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div> --}}
                        <div class="col-lg-6 col-md-6 col-12 mt-2">
                            <label>Banner</label>
                            <input type="file"
                                class="form-control form-control-sm @error('banner') is-invalid @enderror" name="banner"
                                id="banner">
                            @error('banner')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                            <br>
                            @php
                                $pathBanner = public_path() . '/backend/Service/Banner/' . $data['data']->banner;
                            @endphp

                            @if ($data['data']->banner && file_exists($pathBanner))
                                <img src="{{ asset('backend/Service/Banner/' . $data['data']->banner) }}"
                                    class="img-fluid border rounded p-1" style="height:70px;">
                            @endif
                        </div>
                        <div class="col-lg-6 col-md-12 col-12 mt-4">
                            <label>@lang('create_service.short_details')</label>
                            <textarea type="text" class="form-control form-control-sm @error('short_details') is-invalid @enderror"
                                name="short_details" id="summernote">{!! $data['data']->short_details !!}</textarea>
                            @error('short_details')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-lg-6 col-md-12 col-12 mt-4">
                            <label>@lang('create_service.description')</label>
                            <textarea type="text" class="form-control form-control-sm @error('description') is-invalid @enderror"
                                name="description" id="summernote1">{!! $data['data']->description !!}</textarea>
                            @error('description')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 mt-2">
                            <label>@lang('common.image')</label>
                            <input type="file" class="form-control form-control-sm @error('image') is-invalid @enderror"
                                name="image" id="image">
                            @error('image')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                            <br>
                            @php
                                $pathImage = public_path() . '/backend/Service/ServiceImage/' . $data['data']->image;
                            @endphp
                            @if (file_exists($pathImage))
                                <img src="{{ asset('backend/Service/ServiceImage') }}/{{ $data['data']->image }}"
                                    alt="" class="img-fluid" style="height: 70px;">
                            @endif
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 mt-2">
                            <label>Favicon</label>
                            <input type="file"
                                class="form-control form-control-sm @error('favicon') is-invalid @enderror" name="favicon"
                                id="favicon">
                            @error('favicon')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                            <br>
                            @php
                                $pathFavicon = public_path() . '/backend/Service/Favicon/' . $data['data']->favicon;
                            @endphp

                            @if ($data['data']->favicon && file_exists($pathFavicon))
                                <img src="{{ asset('backend/Service/Favicon/' . $data['data']->favicon) }}"
                                    class="img-fluid border rounded p-1" style="height:70px;">
                            @endif
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 mt-2">
                            <label>Slide Show</label><span class="text-danger">*</span>
                            <div class="showlabels">
                                <select class="form-select form-select-sm @error('click') is-invalid @enderror" name="click" id="click" onchange="GetCategorie()">
                                    <option value="">@lang('common.select_one')</option>
                                    <option value="1"
                                        {{ old('click', $data['data']->click ?? '') == 1 ? 'selected' : '' }}>
                                        Yes
                                    </option>
                                    <option value="0"
                                        {{ old('click', $data['data']->click ?? '') == 0 ? 'selected' : '' }}>
                                        No
                                    </option>
                                </select>
                            </div>
                            @error('click')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 mt-2">
                            <label>Home Page</label><span class="text-danger">*</span>
                            <div class="showlabels">
                                <select class="form-select form-select-sm @error('select') is-invalid @enderror" name="select" id="select" onchange="GetCategorie()">
                                    <option value="">@lang('common.select_one')</option>
                                    <option value="1"
                                        {{ old('select', $data['data']->select ?? '') == 1 ? 'selected' : '' }}>
                                        Yes
                                    </option>
                                    <option value="0"
                                        {{ old('select', $data['data']->select ?? '') == 0 ? 'selected' : '' }}>
                                        No
                                    </option>
                                </select>
                            </div>
                            @error('click')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 mt-2">
                            <label>@lang('common.meta_title')</label><span class="text-danger">*</span>
                            <input type="text"
                                class="form-control form-control-sm @error('meta_title') is-invalid @enderror"
                                name="meta_title" id="meta_title" value="{{ $data['data']->meta_title }}">
                            @error('meta_title')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 mt-2">
                            <label>@lang('common.meta_tag')</label><span class="text-danger">*</span>
                            <input type="text"
                                class="form-control form-control-sm @error('meta_tag') is-invalid @enderror"
                                name="meta_tag" id="meta_tag" value="{{ $data['data']->meta_tag }}">
                            @error('meta_tag')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-lg-6 col-md-12 col-12 mt-4">
                            <label>@lang('common.meta_description')</label>
                            <textarea type="text" class="form-control form-control-sm @error('meta_description') is-invalid @enderror"
                                name="meta_description" rows="6">{!! $data['data']->meta_description !!}</textarea>
                            @error('meta_description')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                    </div>

                    <div class="text-right mt-2" style="text-align: right;">
                        <button class="btn btn-sm btn-success"><i class="fa fa-save"></i> @lang('common.submit')</button>
                    </div>

                </form>
            </div>
        </div>
    @endsection
