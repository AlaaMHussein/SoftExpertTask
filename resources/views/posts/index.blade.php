@extends('layouts.postapp')
@section('mycontent')
@if(Auth::user()->role=="Manager")
<a href="{{route('posts.create')}}" type="button" class="btn btn-success mb-5">Create Task</a>
@endif

<table class="table table-bordered"">
  <thead>
    <tr>
      <th scope=" col">ID</th>
    <th scope="col">Title</th>
    <th scope="col">Assignee</th>

    <th scope="col">Created At</th>
    <th scope="col">Due Date</th>
    <th scope="col">Status</th>
    <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
        @foreach($posts as $post)
        <tr>
            <th scope="row">{{$post->id}}</th>
            <td>{{$post->title}}</td>
            <td>{{$post->user->name}}</td>
            <td>{{$post->created_at->format('Y-m-d')}}</td>
            <td>{{ Carbon\Carbon::parse($post->dueDate)->format('Y-m-d')}}</td>
            <td>{{$post->status}}</td>

            <td>
                <!-- <a href="{{route('posts.show',$post->id)}}" class="btn btn-info">View</a> -->
                <!-- <a href="/posts/{{$post->id}}" class="btn btn-info">View</a> -->

                <a href="{{route('posts.show',['post'=>$post->id])}}" class="btn btn-info">View</a>
                <a href="{{route('posts.edit',['post'=>$post->id])}}" class="btn btn-primary">Edit</a>
                @if(Auth::user()->role=="Manager")

                <form style="display: inline;" method="post" action="{{route('posts.destroy',['post'=>$post->id])}}">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
                @endif
            </td>
        </tr>
        @endforeach


    </tbody>
</table>
</div>
@endsection