@extends('dashboard.layouts.app')
@section('content')
    <div class="container">
        <div>


        </div>
        <div class="card card-body bg-light p-s">
            <form action="{{ route('storeTask') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="name">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea type="text" class="form-control" id="description" name="description" rows="4"></textarea>
                </div>
                <div class="mb-3">
                    <div class="row">
                        @foreach ($users as $user)
                            @if ($user->hasRole('client'))
                                <div class="col-md-4">
                                    <input type="checkbox" name="users[]" value="{{ $user->id }}"
                                        class="form-check-input" id="">
                                    <label for="">{{ $user->name }}</label>
                                </div>
                            @endif
                        @endforeach

                    </div>
                </div>

                <a href="{{ route('tasks') }}" class="btn btn-secondary mr-2"><i class="fa fa-arrow-left"></i> Back</a>

                <button type="submit" class="btn btn-success">
                    <i class="fa fa-check"></i>
                    Save
                </button>
            </form>
        </div>
    </div>
@endsection
