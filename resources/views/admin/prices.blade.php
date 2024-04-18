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
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session()->has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error</strong> {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Prices</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Prices</li>
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
                            <td>Item</td>
                            <td>Price(in USD Dollar)</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($board_prices as $price)
                            <tr>
                                <td>{{ $price->name . ' Board' }}</td>
                                <td>{{ $price->price }}</td>
                                <td>
                                    <button type="button" class="btn btn-outline-primary mt-3" data-bs-toggle="modal"
                                        data-bs-target="{{ '#boardModal' . $price->id }}">
                                        Edit
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        @foreach ($marker_prices as $price)
                            <tr>
                                <td>{{ ucwords(str_replace('_', ' ', $price->name)) }}</td>
                                <td>{{ $price->price }}</td>
                                <td>
                                    <button type="button" class="btn btn-outline-primary mt-3" data-bs-toggle="modal"
                                        data-bs-target="{{ '#markerModal' . $price->id }}">
                                        Edit
                                    </button>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </div>
    </div>
    <!-- Edit Board Price Modal -->
    @foreach ($board_prices as $price)
        <div class="modal fade" id="{{ 'boardModal' . $price->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Element</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('edit-price') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <input type="hidden" name="table" value="grades">
                                <input type="hidden" name="id" value="{{ $price->id }}">
                                <label for="item" class="form-label">Item</label>
                                <input type="text" class="form-control" id="item" value="{{ $price->name }}"
                                    aria-describedby="emailHelp" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="addElementImg" class="form-label">Price</label>
                                <input type="text" class="form-control" id="addElementImg" name="price"
                                    value="{{ $price->price }}" aria-describedby="emailHelp">
                            </div>
                            <button class="btn btn-primary btn-block">Update Price</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <!-- Edit Marker Price Modal -->
    @foreach ($marker_prices as $price)
        <div class="modal fade" id="{{ 'markerModal' . $price->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Price</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('edit-price') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <input type="hidden" name="table" value="marker_prices">
                                <input type="hidden" name="id" value="{{ $price->id }}">
                                <label for="item" class="form-label">Item</label>
                                <input type="text" class="form-control" id="item" value="{{ $price->name }}"
                                    aria-describedby="emailHelp" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="addElementImg" class="form-label">Price</label>
                                <input type="text" class="form-control" id="addElementImg" name="price"
                                    value="{{ $price->price }}" aria-describedby="emailHelp">
                            </div>
                            <button class="btn btn-primary btn-block">Update Price</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
@endsection
