@extends('dashboard.layouts.app')
@section('content')
<div class="container">
    <div>
        <div class="float-start">
            <h4 class="pb-3">Edit Task <span class="badge bg-info">{{ $task->name }}</span></h4>
        </div>
        <div class="float-end">
            <a href="{{ route('tasks') }}" class="btn btn-info">
                <i class="fa fa-plus-circle"></i> All Task
            </a>
        </div>
        <div class="clearfix"></div>

    </div>
    <div class="card card-body bg-light p-4">
        <form action="{{route('task.update' ,  $task->id)}}" method="POST" >
            @csrf
            @method('PUT')
            <input type="hidden" , name="id" , value="{{$task->id}}">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="name" value="{{ $task->name }}">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea type="text" class="form-control" id="description" name="description" rows="5">{{ $task->description }}</textarea>
            </div>
            <div class="mb-3">
                <div class="row">
                    @foreach($users as $user)
                        @if($user->hasRole('client'))
                            <div class="col-md-4">
                                <input type="checkbox" name="users[]" value="{{$user->id}}" class="form-check-input" id="">
                                <label for="">{{$user->name}}</label>
                            </div>
                        @endif
                    @endforeach

                </div>
            </div>

            <a href="{{ route('tasks') }}" class="btn btn-secondary mr-2"><i class="fa fa-arrow-left"></i> Cancel</a>

            <button type="submit" class="btn btn-success">
                <i class="fa fa-check" ></i>
                Save Edit
            </button>
        </form>
    </div>

</div>
@endsection
