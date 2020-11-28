@extends('includes.header')

@section('content')
  <!-- Main content -->
  <section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  <div class="row">
                    <h4 class="card-title col-md-11">Update Customer</h4>
                    <div class="col-md-1">
                      <a href="{{route('customerIndex')}}" class="btn btn-default">Back</a>
                    </div>
                  </div>
                    
                </div>
                <div class="card-body">
                  {{ Form::open(array('url' => 'customer/'.$customer->id.'/update','method'=>'PUT')) }}
                    
                    <div class="row">
                      <div class="form-group col-md-6">
                        <label for="first_name">First Name</label>
                        {!! Form::text('first_name', $customer->f_name, array('class' => 'form-control')) !!}
                        @if ($errors->has('first_name'))
                          <p class="error">{{ $errors->first('first_name') }}</p>
                        @endif
                      </div>
                      <div class="form-group col-md-6">
                        <label for="last_name">Last Name</label>
                        {!! Form::text('last_name', $customer->l_name, array('class' => 'form-control')) !!}
                        @if ($errors->has('last_name'))
                          <p class="error">{{ $errors->first('last_name') }}</p>
                        @endif
                      </div>
                    </div>

                    <div class="row">
                      <div class="form-group col-md-6">
                        <label for="email">Email</label>
                        {!! Form::text('email', $customer->email, array('class' => 'form-control')) !!}
                        @if ($errors->has('email'))
                          <p class="error">{{ $errors->first('email') }}</p>
                        @endif
                      </div>
                      <div class="form-group col-md-6">
                        <label for="dob">Date of Birthday</label>
                        {!! Form::date('dob', $customer->dob, array('class' => 'form-control')) !!}
                        @if ($errors->has('dob'))
                          <p class="error">{{ $errors->first('dob') }}</p>
                        @endif
                      </div>
                      <div class="form-group col-md-12">
                        <label for="address">Address</label>
                        {!! Form::text('address', $customer->address, array('class' => 'form-control')) !!}
                        @if ($errors->has('address'))
                          <p class="error">{{ $errors->first('address') }}</p>
                        @endif
                      </div>
                    </div>

                    <div class="row">
                      <div class="form-group col-md-6">
                        <label for="city">City</label>
                        {!! Form::text('city', $customer->city, array('class' => 'form-control')) !!}
                        @if ($errors->has('city'))
                          <p class="error">{{ $errors->first('city') }}</p>
                        @endif
                      </div>
                      <div class="form-group col-md-6">
                        <label for="state">State</label>
                        {!! Form::text('state', $customer->state, array('class' => 'form-control')) !!}
                        @if ($errors->has('state'))
                          <p class="error">{{ $errors->first('state') }}</p>
                        @endif
                      </div>
                      <div class="form-group col-md-6">
                        <label for="zip_code">Zip Code</label>
                        {!! Form::text('zip_code', $customer->zip_code, array('class' => 'form-control')) !!}
                        @if ($errors->has('zip_code'))
                          <p class="error">{{ $errors->first('zip_code') }}</p>
                        @endif
                      </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>

                  {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
  </section>

@endsection