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
                                                <h5 class="mb-0"><i class="fas fa-tasks me-2"></i>Task List of <span style="font-size: 20px; color: rgb(236, 22, 57)"> "{{ $item->item_name }}" </span></h5>
                                                <a href="{{ route('items.index') }}" class="btn btn-sm btn-info" style="float: right; margin-right: 5px !important;">Back</a>
                                                <a href="javascript::void(0)" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#myModal" style="float: right">Add New</a>
                                            </div>
                                            <div class="card-body" data-mdb-perfect-scrollbar="true"
                                                style="position: relative; height: 400px">

                                                <table class="table mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">Task</th>
                                                            <th scope="col">Status</th>
                                                            <th scope="col">Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($item->tasks as $key => $task)
                                                            <tr class="fw-normal">
                                                                <td class="align-middle">{{ ++$key }}</td>
                                                                <td class="align-middle">
                                                                    <span>{{ $task->task_name }}</span>
                                                                </td>
                                                                <td class="align-middle">
                                                                    <h6 class="mb-0"><span class="{{ $task->status == 1 ? 'badge bg-danger' : 'badge bg-primary' }}">{{ $task->status == 1 ? 'Completed' : 'Not Completed' }}</span></h6>
                                                                </td>
                                                                <td class="align-middle">
                                                                    <a href="javascript:void(0)" onclick="editTask(`{{ $task->id }}`, `{{ $task->task_name }}`, `{{ $task->status }}`)" data-mdb-toggle="tooltip" title="Edit"><i class="fas fa-pen text-primary"></i></a>
                                                                    <a href="{{ route('item.tasks.destroy',$task->id) }}" data-mdb-toggle="tooltip" title="Remove" onclick="return confirm('Are you sure you want to delete this task?');"><i class="fas fa-trash-alt text-danger"></i></a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
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
    @include('partials.taskModal')
    @push('custom_js')
        <script>
            function editTask(id, name, status) {
                $("#task_id").val(id)
                $("#task_name").val(name)
                $("#status").val(status)
                $("#myModal").modal('show');
            }
        </script>
    @endpush
@endsection
