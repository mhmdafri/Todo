@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="page-title">
                    To-Do List
                </h1>
            </div>
        </div>
    </div>

    <div class="col-lg-12 mt-5">

        <form action="{{ route('todo.store') }}" method="POST" enctype="multipart/form">
            {{-- secure toke --}}
            @csrf
            <div class="row">
                <div class="col-lg-8">
                    <div class="form-group">
                        <input class="form-control" type="text" name="title" placeholder="Enter your task"
                            aria-label="default input example">
                    </div>
                </div>
                <div class="col-lg-4">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>
        </form>
        <div class="col-lg-12 mt-5">
            <div>
                <table class="table table-success table-striped-columns">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    @foreach ($tasks as $key => $task)



                    <tbody>
                      <tr>
                        <th scope="row">{{ $key++ }}</th>
                        <td>{{ $task -> title }}</td>
                        <td>
                            @if ($task->done == 0)
                                <span class="badge bg-warning">Not Completed</span>
                            @else
                                <span class="badge bg-success">Completed</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('todo.delete',$task -> id) }}"><i class="fa-solid fa-trash-can"></i>Delete</a>

                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
        </div>

    </div>
@endsection

@push('css')
    <style>
        .page-title {
            padding-top: 10vh;
            font-size: 5rem;
            color: #6f232c;
        }
    </style>
@endpush
