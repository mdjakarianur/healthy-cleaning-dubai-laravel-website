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
    @lang('faq.faq')
    @endslot
    @slot('link_two_url')
    {{route('faq.index')}}
    @endslot


    <!-- Active Link -->
    @slot('active_link')
    @lang('faq.create_title')
    @endslot

    <!-- Page Title -->
    @slot('page_title')
    @lang('faq.create_title')
    @endslot


    @if(Auth::user()->can('Faq view'))
    <!-- button one -->
    @slot('button_one_name')
    @lang('common.view')
    @endslot

    @slot('button_one_route')
    {{route('faq.index')}}
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

            <form method="post" action="{{route('faq.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-12 mt-2">
                        <label>@lang('common.sl')</label><span class="text-danger">*</span>
                        <input type="number" class="form-control form-control-sm @error('sl') is-invalid @enderror" name="sl" id="sl"  value="{{ old('sl') }}">
                        @error('sl')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-lg-4 col-md-6 col-12 mt-2">
                        <label>@lang('faq.select_category')</label><span class="text-danger">*</span>
                        <div class="showlabels">
                            <select class="form-select form-select-sm select2 @error('category_id') is-invalid @enderror" name="category_id" id="category_id" onchange="return GetService()">
                                <option value="">@lang('common.select_one')</option>
                                @if(isset($data['category']))
                                @foreach ($data['category'] as $category)
                                <option @if(old('category_id') == $category->id) selected @endif value="{{ $category->id }}">
                                    @if(config('app.locale') == 'en')
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
                        <label>@lang('faq.select_service')</label><span class="text-danger">*</span>
                        <div class="showlabels">
                            <select class="form-select form-select-sm select2 @error('service_id') is-invalid @enderror" name="service_id" id="service_id">
                                <option value="">@lang('common.select_one')</option>

                            </select>
                        </div>
                        @error('service_id')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 mt-2">
                        <label>@lang('faq.questions')</label><span class="text-danger">*</span>
                        <input type="text" class="form-control form-control-sm @error('name') is-invalid @enderror" name="questions" id="questions"  value="{{ old('questions') }}">
                        @error('questions')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-lg-6 col-md-12 col-12 mt-2">
                        <label>@lang('faq.answer')</label>
                        <textarea type="text" class="form-control form-control-sm @error('answer') is-invalid @enderror" name="answer"  id="summernote"></textarea>
                        @error('answer')
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

    <script>
        function GetService()
        {
            let category_id = $('#category_id').val();
            if(category_id != "")
            {
                $.ajax({
                    headers : {
                        'X-CSRF-TOKEN' : '{{ csrf_token() }}'
                    },

                    url : '{{url('GetService')}}/'+category_id,

                    type : 'GET',

                    success : function(data)
                    {
                        $('#service_id').html(data);
                    }
                })
            }
            else{
                let html = '';
                alert('Select Category');
                $('#service_id').html(html);
            }
        }
    </script>
@endsection
