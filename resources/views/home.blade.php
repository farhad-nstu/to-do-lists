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
                                                            <th scope="col">#</th>
                                                            <th scope="col">Item</th>
                                                            <th scope="col">Status</th>
                                                            <th scope="col">Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($items as $key => $item)
                                                            <tr class="fw-normal">
                                                                {{--  <th>
                                                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-5.webp"
                                                                        class="shadow-1-strong rounded-circle" alt="avatar 1"
                                                                        style="width: 55px; height: auto;">
                                                                    <span class="ms-2">Alice Mayer</span>
                                                                </th>  --}}
                                                                <td class="align-middle">{{ ++$key }}</td>
                                                                <td class="align-middle">
                                                                    <span>{{ $item->item_name }}</span>
                                                                </td>
                                                                <td class="align-middle">
                                                                    <h6 class="mb-0"><span class="{{ $item->status == 1 ? 'badge bg-danger' : 'badge bg-primary' }}">{{ $item->status == 1 ? 'Completed' : 'Not Completed' }}</span></h6>
                                                                </td>
                                                                <td class="align-middle">
                                                                    <a href="javascript:void(0)" onclick="editItem(`{{ $item->id }}`, `{{ $item->item_name }}`, `{{ $item->status }}`)" data-mdb-toggle="tooltip" title="Edit"><i class="fas fa-pen text-info"></i></a>
                                                                    <a href="javascript:void(0)" data-mdb-toggle="tooltip" title="Remove" onclick="checkConfirmation(`{{ $item->id }}`)"><i class="fas fa-trash-alt text-danger"></i></a>
                                                                    <form id="delete-form-{{ $item->id }}" action="{{ route('items.destroy',$item->id) }}" method="POST" style="display: none;">
                                                                        @csrf @method('delete')
                                                                    </form>
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
    @include('partials.modal')
    @push('custom_js')
        <script>
            function editItem(id, name, status) {
                $("#item_id").val(id)
                $("#item_name").val(name)
                $("#status").val(status)
                $("#myModal").modal('show');
            }
            function checkConfirmation(id) {
                if(confirm("Are You Sure to delete this?")) {
                    event.preventDefault(); 
                    $("#delete-form-"+id).submit();
                }
                return false
            }
        </script>
    @endpush
@endsection
