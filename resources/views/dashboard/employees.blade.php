@extends('dashboard.layouts.app')
@section('content')

<section>
   <div class="container">
    <div class="container">
        
        <div class="row">
            <table class="table">

                <thead>
                    {{-- <th>id</th> --}}
                    
                    <th>Task Name</th>
                    <th>Task Description</th>
                    <th>Has Complated</th>
                    <th>Task Date</th>
                  </thead>
                  <tbody>
                @foreach ($employee as $task)
                <tbody>
                    <tr>
                        {{-- <td>{{$task->id}}</td> --}}
                        {{-- <td>{{Auth::user()->name}}</td> --}}
                        <td>{{$task->task->name}}</td>
                        <td>{{$task->task->description}}</td>
                        @if($task->complated == 0)
                        <td class="text-danger">
                            <a href="{{route('complated' , $task->id)}}">
                                <button type="button" class="btn btn-warning">non complated</button>
                            </a>
                        </td>
                        @else
                        <td class="text-info"> <button type="button" class="btn btn-success">complated</button>
                        </td>
                        @endif
                        <td >{{$task->created_at->format('y/d/m')}}</td>   
                    </tr>
                </tbody>
                @endforeach
                
            </table>
        </div>
    </div>
   </div>
</section>
@endsection