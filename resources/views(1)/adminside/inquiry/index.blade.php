@extends('layouts.admin.app')

@section('content')
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    </div>
    <div class="container-fluid mt--7">
        @if (session('success'))
            <div id="success-alert" class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <h3 class="mb-0">Inquiries</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Created At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($inquiries as $inquiry)
                                    <tr>
                                        <th scope="row">
                                            <div class="media align-items-center">

                                                <div class="media-body">
                                                    <span class="mb-0 text-sm">{{$inquiry->name}}</span>
                                                </div>
                                            </div>
                                        </th>
                                        <td>
                                            {{$inquiry->email}}
                                        </td>
                                        <td>
                                            <span class="badge badge-dot mr-4">
                                                <i class="bg-warning"></i> pending
                                            </span>
                                        </td>
                                        <td>
                                            {{$inquiry->phone}}
                                        </td>
                                        <td>
                                            {{$inquiry->created_at}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <nav aria-label="...">
                            <ul class="pagination justify-content-end mb-0">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1">
                                        <i class="fas fa-angle-left"></i>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                <li class="page-item active">
                                    <a class="page-link" href="#">1</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">
                                        <i class="fas fa-angle-right"></i>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
