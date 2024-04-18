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
            @error('elements')
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Oops!</strong> Please add elements before submit the form.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @enderror
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Elements</h1>
                    <button type="button" class="btn btn-outline-primary mt-3" data-bs-toggle="modal"
                        data-bs-target="#addElementModal">
                        Add Element
                    </button>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Elements</li>
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
                        <td>Element</td>
                        <td>Grade</td>
                        <td>Created At</td>
                        <td>Delete</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($elements as $element)
                    <tr>
                        <td><img src="{{ url('public/storage/'.$element['name']) }}" alt="element_image"
                                style="height: 100px; width: 100px;"></td>
                        <td>{{ $element['grade'] }}</td>
                        <td>{{ $element['created_at'] }}</td>
                        <td><a href="{{ route('remove-element', $element['id']) }}" class="mx-2">
                                <i class="fa fa-remove text-danger" aria-hidden="true"></i>
                            </a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>

    <section>
        <!-- Modal -->
        <div class="modal fade" id="addElementModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Element</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('add-element') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="addElementImg" class="form-label">Elements</label>
                                <input type="file" class="form-control" id="addElementImg" name="elements[]"
                                    aria-describedby="emailHelp" multiple>
                            </div>
                            <div class="mb-3">
                                <label for="addElementGrade" class="form-label">Grade</label>
                                <select name="gradeId" class="form-select" id="addElementGrade">
                                    @foreach ($grades as $grade)
                                    <option value="{{ $grade['id'] }}">{{ $grade['grade'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button class="btn btn-primary btn-block">Add Element</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
</script>
<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
            $('#myTable').DataTable();
        });
</script>
@endsection