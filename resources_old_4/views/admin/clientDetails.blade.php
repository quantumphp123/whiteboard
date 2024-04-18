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
                        <li class="breadcrumb-item active">Client-Details&#160;&&#160;Board-Details</li>
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
                        <p class="card-text font-weight-bold">Name&#160;:&#160;<span class="font-weight-normal">{{
                                $enquiry['name'] }}</span></p>
                        <p class="card-text font-weight-bold">Email&#160;:&#160;<span class="font-weight-normal">{{
                                $enquiry['email'] }}</span></p>
                        <p class="card-text font-weight-bold">Contact&#160;:&#160;<span class="font-weight-normal">{{
                                $enquiry['contact_number'] }}</span></p>
                        <p class="card-text font-weight-bold">School Name&#160;:&#160;<span
                                class="font-weight-normal">{{ $enquiry['school_name'] }}</span></p>
                        <p class="card-text font-weight-bold">Address&#160;:&#160;<span class="font-weight-normal">{{
                                $enquiry['address'] }}</span></p>
                        <p class="card-text font-weight-bold">Remarks&#160;:&#160;<span class="font-weight-normal">{{
                                $enquiry['remarks'] }}</span></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Board-Details</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="container">
                <div class="card" style="width: 65rem;">
                    <div class="card-body">
                        @if ($enquiry['dimension_id'] != null)
                        <p class="card-text font-weight-bold">Type&#160;:&#160;<span
                                class="font-weight-normal">Custom</span></p>
                        <p class="card-text font-weight-bold">Board Dimension&#160;:&#160;<span
                                class="font-weight-normal">{{ $size['width'].' X '.$size['length'].' inches'
                                }}</span></p>
                        @else
                        <p class="card-text font-weight-bold">Type&#160;:&#160;<span
                            class="font-weight-normal">Pre-Defined</span></p>
                        @endif
                            <p class="card-text font-weight-bold">Grade&#160;:&#160;<span
                                class="font-weight-normal">{{ $grade['grade'] }}</span></p>
                        <p class="card-text font-weight-bold">Quantity&#160;:&#160;<span class="font-weight-normal">{{
                                $enquiry['quantity'] }}</span></p>
                        <p class="card-text font-weight-bold">Markers&#160;:&#160;<span class="font-weight-normal">{{
                                $enquiry['markers'] }}</span></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection