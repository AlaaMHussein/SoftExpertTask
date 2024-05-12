@extends('layouts.postapp')
@section('mycontent')
        <!-- @if($post) -->
        <div class="card">

            <div class="card-header">
                Task Info
            </div>
            <div class="card-body">
                <h5 class="card-title"><b>ID:</b>{{$post->id}}</h5>

                <h5 class="card-title"><b>Title:</b>{{$post->title}}</h5>

                <h5 class="card-title"><b>Description:</b>{{$post->description}}</h5>
                <h5 class="card-title"><b>Status:</b>{{$post->status}}</h5>
                <h5 class="card-title"><b>Due Date:</b>{{$post->dueDate}}</h5>
                <h5 class="card-title"><b>Assignee:</b>{{$post->user->name}}</h5>


            </div>
        </div>

        <!-- @endif -->
        @endsection
    