@extends('dashboard.layouts.app')
@section('content')
<section>
<div class="container">
    <div>
        <div class="float-start">
            <h4 class="pb-3"> Task Page</h4>
        </div>
        <div class="float-end">

        </div>
        <div class="clearfix"></div>

    </div>

    @foreach ($tasks as $task)
    <div class="card mt-3">
        <h5 class="card-header">
            @if ($task->status === 1)
            {{ $task->name }}
            @else
            <del>{{ $task->name }}</del>
            @endif

            <span class="badge rounded-pill bg-info text-dark">
                {{ $task->created_at->diffForHumans() }}
            </span>
        </h5>
        <div class="card-body">
            <div class="card-text">
                <div class="float-start">
                    {{$task->description}}
                     <br>


                </div>
                <div class="float-end">
                    <a href="{{route('task.edit' , $task->id) }} " class="btn btn-success">

                        <i class="fa fa-plus-circle"></i> Edit
                    </a>

                    <div style="display: inline">
                        <form action="{{ route('task.destroy' , $task->id) }} " style="display: inline" method="POST" onsubmit="return confirm('Are you sure to delete ?')">
                            {{-- {{ route('task.destroy', $task->id) }} --}}
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="fa fa-trash"></i>Delete
                            </button>

                        </form>

                    </div>


                </div>
                <div class="clearfix"></div>


            </div>
        </div>

    </div>


@endforeach
@if (count($tasks) === 0)
<div class="alert alert-danger p-2">
    No Task Found. Please Create one task
    <br>
    <br>
    <a href="{{route('addTask')}}" class="btn btn-info">
        <i class="fa fa-plus-circle"></i> Create Task
    </a>
</div>
@endif
</div>
@endsection
