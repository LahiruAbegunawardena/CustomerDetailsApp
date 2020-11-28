@extends('includes.header')

@section('content')
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              
              <div class="row">
                <h3 class="card-title col-md-10">Customer Details</h3>
                <div class="col-md-2">
                  <a href="{{route('customerCreate')}}" class="btn btn-success btn-sm">Create Customer</a>
                </div>
              </div>
              

            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="customerDet" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>City/State</th>
                    <th>Mobile no</th>
                    <th>Phone no</th>
                    <th>Action</th>
                  </tr>
                </thead>

                <tbody>
                    
                  @foreach ($customers as $key => $customer)
                    <tr>
                      <td>{{$key + 1}}</td>
                      <td>{{$customer->f_name}}</td>
                      <td>{{$customer->l_name}}</td>
                      <td>{{$customer->email}}</td>
                      <td>{{$customer->address}}</td>
                      <td>{{$customer->city}}/ {{$customer->state}}</td>
                      <td>
                        @foreach ($customer->contacts as $item)
                          {{$item->mobile}}
                        @endforeach
                      </td>
                      <td>
                        @foreach ($customer->contacts as $item)
                          {{$item->phone}}
                        @endforeach
                      </td>
                      <td>
                        <a href="{{url('customer/'.$customer->id.'/edit')}}" class="btn btn-info btn-sm"> Edit </a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th>#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>City/State</th>
                    <th>Mobile no</th>
                    <th>Phone no</th>
                    <th>Action</th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection