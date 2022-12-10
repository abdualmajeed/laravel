@extends('dashboard.layouts.app')
@section('content')
<section>
    <div class="container">
        @if (session()->has('message'))

            <p class="alert alert-info">{{ session()->get('message') }}</p>

        @endif
        <div>
            <div class="float-start">
                <h4 class="pb-3"> Users Page</h4>
            </div>
            <div class="float-end">

            </div>
            <div class="clearfix"></div>

        </div>


    <div class="container">
        {{-- <a href="" class="btn btn-primary">Add</a> --}}
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th>name</th>
                        <th>email</th>
                        <th>phone</th>
                        <th>Type</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->phone}}</td>
                            @if($user->name == Auth::user()->name)
                            <td>Current User</td>
                            @else
                            <td>
User


                            <td>
                            @endif
                        </tr>

                    @endforeach
                <tbody>
            </table>
        </div>


        <a href="{{route('addUser')}}" class="btn btn-primary">New User</a>
    </div>
</section>
@endsection
