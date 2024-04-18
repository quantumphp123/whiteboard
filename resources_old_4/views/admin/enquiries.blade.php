<!-- Content Wrapper. Contains page content -->
@extends('admin.layout.layout')

@section('style')
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Enquiries</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Enquiries</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <table id="myTable">
                <thead>
                    <tr>
                        <td>Board</td>
                        <td>Name</td>
                        <td>Email</td>
                        <td>Contact</td>
                        <td>Type</td>
                        <td>Details</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($enquiries as $enquiry)
                    <tr>
                      @if ($enquiry['draft_id'] != null)
                      <td><a href="{{ route('admin-show-draft', [$enquiry['draft_id'], $enquiry['grade_id']]) }}"><i class="fa fa-eye text-primary" aria-hidden="true"><span class="ml-2">Open</span></i></a></td>
                      @else
                      <td><a href="{{ route('admin-show-pre-defined', $enquiry['grade_id']) }}"><i class="fa fa-eye text-primary" aria-hidden="true"><span class="ml-2">Open</span></i></a></td>
                      @endif
                        <td>{{ $enquiry['name'] }}</td>
                        <td>{{ $enquiry['email'] }}</td>
                        <td>{{ $enquiry['contact_number'] }}</td>
                        @if ($enquiry['draft_id'] != null)
                            <td>Custom</td>
                        @else
                            <td>Pre Defined</td>
                        @endif
                        <td><a href="{{ route('client-details', $enquiry['id']) }}"><i class="fa fa-eye text-primary" aria-hidden="true"><span class="ml-2">Open</span></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
</div>
@endsection

@section('script')
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        });
    </script>
@endsection