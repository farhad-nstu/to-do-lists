@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <section class="vh-100" style="background-color: #eee;">
                            <div class="container py-5 h-100">
                                <div class="row d-flex justify-content-center align-items-center h-100">
                                    <div class="col-md-12 col-xl-10">

                                        <div class="card" style="overflow-y:scroll;max-height: 100vh;">
                                            <div class="card-header p-3">
                                                <h5 class="mb-0"><i class="fas fa-tasks me-2"></i>Task List</h5>
                                                <a href="javascript::void(0)" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#myModal" style="float: right">Add New</a>
                                            </div>
                                            <div class="card-body" data-mdb-perfect-scrollbar="true"
                                                style="position: relative; height: 400px">

                                                <table class="table mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Team Member</th>
                                                            <th scope="col">Task</th>
                                                            <th scope="col">Priority</th>
                                                            <th scope="col">Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr class="fw-normal">
                                                            <th>
                                                                <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-5.webp"
                                                                    class="shadow-1-strong rounded-circle" alt="avatar 1"
                                                                    style="width: 55px; height: auto;">
                                                                <span class="ms-2">Alice Mayer</span>
                                                            </th>
                                                            <td class="align-middle">
                                                                <span>Call Sam For payments</span>
                                                            </td>
                                                            <td class="align-middle">
                                                                <h6 class="mb-0"><span class="badge bg-danger">High
                                                                        priority</span></h6>
                                                            </td>
                                                            <td class="align-middle">
                                                                <a href="#!" data-mdb-toggle="tooltip" title="Done"><i class="fas fa-check text-success me-3"></i></a>
                                                                <a href="javascript::void(0)" onclick="editItem(1, 'test', 1)" data-mdb-toggle="tooltip" title="Edit"><i class="fas fa-pen text-info"></i></a>
                                                                <a href="#!" data-mdb-toggle="tooltip" title="Remove"><i class="fas fa-trash-alt text-danger"></i></a>
                                                            </td>
                                                        </tr>
                                                        <tr class="fw-normal">
                                                            <th>
                                                                <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-4.webp"
                                                                    class="shadow-1-strong rounded-circle" alt="avatar 1"
                                                                    style="width: 55px; height: auto;">
                                                                <span class="ms-2">Kate Moss</span>
                                                            </th>
                                                            <td class="align-middle">Make payment to Bluedart</td>
                                                            <td class="align-middle">
                                                                <h6 class="mb-0"><span class="badge bg-success">Low
                                                                        priority</span></h6>
                                                            </td>
                                                            <td class="align-middle">
                                                                <a href="#!" data-mdb-toggle="tooltip"
                                                                    title="Done"><i
                                                                        class="fas fa-check text-success me-3"></i></a>
                                                                        <a href="javascript::void(0)" onclick="editItem(2, 'test 2', 2)" data-mdb-toggle="tooltip" title="Edit"><i class="fas fa-pen text-info"></i></a>
                                                                <a href="#!" data-mdb-toggle="tooltip"
                                                                    title="Remove"><i
                                                                        class="fas fa-trash-alt text-danger"></i></a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </section>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('partials.modal')
    @push('custom_js')
        <script>
            function editItem(id, name, status) {
                $("#item_id").val(id)
                $("#item_name").val(name)
                $("#status").val(status)
                $("#myModal").modal('show');
            }
        </script>
    @endpush
@endsection
