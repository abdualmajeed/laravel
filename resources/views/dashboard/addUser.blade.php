@extends('dashboard.layouts.app')
@section('content')
    <div class="container">
        <div>
            <div class="float-start">
                <h4 class="pb-3">Add User</h4>
            </div>
            <div class="clearfix"></div>
    
        </div>
        <div class="card card-body bg-light p-4">
            <form action="{{route('StoreUser')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name">
                    @error('name')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email">
                    @error('email')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Password</label>
                    <input type="text" class="form-control" id="password" name="password">
                    @error('password')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" id="phone" name="phone">
                    @error('phone')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
    
                <div class="mb-3">
                    <label for="description" class="form-label">Role</label>
                    <select name="role" id="role" class="form-control">
                        @foreach ($roles as $role)
                            <option value="{{ $role->name }}">{{ $role->name}}</option>
                        @endforeach
                    </select>
                </div>
    
                <a href="{{route('tasks')}}" class="btn btn-secondary mr-2"><i class="fa fa-arrow-left"></i> Cancel</a>
    
                <button type="submit" class="btn btn-success">
                    <i class="fa fa-check"></i>
                    Add
                </button>
            </form>
        </div>
    </div>

@endsection