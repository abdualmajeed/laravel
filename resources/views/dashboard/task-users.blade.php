@extends('dashboard.layouts.app')
@section('content')
<section>
    <div class="container">

        <div class="row">
            <table class="table">

                <tr>

                    <th>user name</th>
                    <th>task name</th>
                    <th>has complated</th>
                    <th>task date</th>
                    <th>status</th>

                </tr>


                @foreach ($taskUsers as $task)
                    <tr>
                        <td>{{$task->user->name}}</td>
                        <td>{{$task->task->name}}</td>
                        @if($task->complated == 0)
                        <td class="text-danger">in progress</td>
                        @else
                        <td class="text-info">complated</td>
                        @endif
                        <td >{{$task->created_at->format('y/d/m')}}</td>
                        @if($task->status == 0)
                        <td class="text-danger"><a href="{{route('status_task' , $task->id)}}">non active</a></td>
                        @else
                        <td class="text-danger"><a href="{{route('status_task' , $task->id)}}"> active</a></td>
                        @endif
                    </tr>
                @endforeach

            </table>
        </div>
    </div>
</section>
@endsection
