<!-- Content Wrapper. Contains page content -->
@extends('admin.layout.layout')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Client-Details</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Client-Details</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <div class="container">
                <div class="card" style="width: 65rem;">
                    <div class="card-body">
                      <p class="card-text font-weight-bold">Name&#160;:&#160;<span class="font-weight-normal">{{ $client['name'] }}</span></p>
                      <p class="card-text font-weight-bold">Email&#160;:&#160;<span class="font-weight-normal">{{ $client['email'] }}</span></p>
                      <p class="card-text font-weight-bold">Contact&#160;:&#160;<span class="font-weight-normal">{{ $client['contact_number'] }}</span></p>
                      <p class="card-text font-weight-bold">Address&#160;:&#160;<span class="font-weight-normal">{{ $client['address'] }}</span></p>
                      <p class="card-text font-weight-bold">Remarks&#160;:&#160;<span class="font-weight-normal">{{ $client['remarks'] }}</span></p>
                      <p class="card-text font-weight-bold">Quantity&#160;:&#160;<span class="font-weight-normal">{{ $client['quantity'] }}</span></p>
                      <p class="card-text font-weight-bold">Markers&#160;:&#160;<span class="font-weight-normal">{{ $client['markers'] }}</span></p>
                    </div>
                  </div>
            </div>
        </div>
    </section>
</div>
@endsection