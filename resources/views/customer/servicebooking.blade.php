
@extends('customer.index')
@section('content')

@php
$data = DB::table("customer_infos")->where('id',Auth('customer')->user()->id)->first();
@endphp

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Book Service</h4>
                        <form method="post" class="row" action="{{ url('createservice') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group col-md-4">
                                <label>Booking Date</label>
                                <input type="date" class="form-control" name="booking_date" id="booking_date">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Category Name</label>
                                <select class="form-control" name="category_id" id="category_id" onchange="return GetService()" required>
                                    <option value="">Select One</option>
                                    @if($category)
                                    @foreach ($category as $c)
                                    <option value="{{ $c->id }}">
                                        @if(config('app.locale') == 'en')
                                        {{ $c->category_name ?: $c->category_name_bn }}
                                        @else
                                        {{ $c->category_name_bn ?: $c->category_name }}
                                        @endif
                                    </option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="form-group col-md-4" id="ServiceBox">
                                <label>Service Name</label>
                                <select class="form-control" name="service_id" id="service_id" required>
                                    <option value="">Select One</option>

                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Note</label>
                                <textarea class="form-control" name="notes" id="notes" cols="30" rows="10"></textarea>
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


    <script>
        function GetService()
        {
            let category_id = $('#category_id').val();
            if(category_id != '')
            {
                $.ajax({
                    headers : {
                        'X-CSRF-TOKEN' : '{{ csrf_token() }}'
                    },

                    url : '{{ url('GetService') }}',

                    type : 'POST',

                    data : {category_id},

                    beforeSend : function()
                    {
                        $('#ServiceBox').html('Loading....');
                    },
                    success : function(res)
                    {
                        if(res == 'no_group')
                        {
                            $('#ServiceBox').hide();
                        }
                        else
                        {
                            $('#ServiceBox').show();
                            $('#ServiceBox').html(res);

                        }
                    }
                });
            }
            else
            {
                $('#ServiceBox').show();
                $('#ServiceBox').html('<b class="text-danger">Select Service First !</b>');
            }
        }
    </script>

@endsection
