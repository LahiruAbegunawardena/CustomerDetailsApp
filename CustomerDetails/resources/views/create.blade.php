@extends('includes.header')

@section('content')
  <!-- Main content -->
  <section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  <div class="row">
                    <h4 class="card-title col-md-11">Create Customer</h4>
                    <div class="col-md-1">
                      <a href="{{route('customerIndex')}}" class="btn btn-default">Back</a>
                    </div>
                  </div>
                    
                </div>
                <div class="card-body">
                  {{ Form::open(array('route' => 'customerStore','method'=>'POST')) }}
                    
                    <div class="row">
                      <div class="form-group col-md-6">
                        <label for="first_name">First Name</label>
                        {!! Form::text('first_name', null, array('class' => 'form-control')) !!}
                        @if ($errors->has('first_name'))
                          <p class="error">{{ $errors->first('first_name') }}</p>
                        @endif
                      </div>
                      <div class="form-group col-md-6">
                        <label for="last_name">Last Name</label>
                        {!! Form::text('last_name', null, array('class' => 'form-control')) !!}
                        @if ($errors->has('last_name'))
                          <p class="error">{{ $errors->first('last_name') }}</p>
                        @endif
                      </div>
                    </div>

                    <div class="row">
                      <div class="form-group col-md-6">
                        <label for="email">Email</label>
                        {!! Form::text('email', null, array('class' => 'form-control')) !!}
                        @if ($errors->has('email'))
                          <p class="error">{{ $errors->first('email') }}</p>
                        @endif
                      </div>
                      <div class="form-group col-md-6">
                        <label for="dob">Date of Birthday</label>
                        {!! Form::date('dob', null, array('class' => 'form-control')) !!}
                        @if ($errors->has('dob'))
                          <p class="error">{{ $errors->first('dob') }}</p>
                        @endif
                      </div>
                      <div class="form-group col-md-12">
                        <label for="address">Address</label>
                        {!! Form::text('address', null, array('class' => 'form-control')) !!}
                        @if ($errors->has('address'))
                          <p class="error">{{ $errors->first('address') }}</p>
                        @endif
                      </div>
                    </div>

                    <div class="row">
                      <div class="form-group col-md-6">
                        <label for="city">City</label>
                        {!! Form::text('city', null, array('class' => 'form-control')) !!}
                        @if ($errors->has('city'))
                          <p class="error">{{ $errors->first('city') }}</p>
                        @endif
                      </div>
                      <div class="form-group col-md-6">
                        <label for="state">State</label>
                        {!! Form::text('state', null, array('class' => 'form-control')) !!}
                        @if ($errors->has('state'))
                          <p class="error">{{ $errors->first('state') }}</p>
                        @endif
                      </div>
                      <div class="form-group col-md-6">
                        <label for="zip_code">Zip Code</label>
                        {!! Form::text('zip_code', null, array('class' => 'form-control')) !!}
                        @if ($errors->has('zip_code'))
                          <p class="error">{{ $errors->first('zip_code') }}</p>
                        @endif
                      </div>
                    </div>

                    <div class="row">
                      <label class="col-md-10">Contact Details</label>
                      <a class="btn btn-primary" onclick="addContact()">Add</a>

                    </div>
                    
                    <div class="contact-det-par">
                      <div class="row contact-det">
                        <div class="form-group col-md-6">
                          <label for="phone[]">Phone No</label>
                          {!! Form::text('phone[]', null, array('class' => 'form-control')) !!}
                          @if ($errors->has('phone[]'))
                            <p class="error">{{ $errors->first('phone[]') }}</p>
                          @endif
                        </div>
                        <div class="form-group col-md-6">
                          <label for="mobile[]">Mobile No</label>
                          {!! Form::text('mobile[]', null, array('class' => 'form-control')) !!}
                          @if ($errors->has('mobile[]'))
                            <p class="error">{{ $errors->first('mobile[]') }}</p>
                          @endif
                        </div>
                      </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Save</button>

                  {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
  </section>

@endsection