@extends('layouts.postapp')
@section('mycontent')
<?php 
$readonly="";
if(Auth::user()->role=="User"){
$readonly="readonly";
}
?>
<h1> Edit form</h1>
<form method="post" action="{{route('posts.update',['post'=>$post->id])}}">
    <!-- add Cross-site request forgeries protector -->
    @csrf 
    @method('PUT')
    <div class="mb-3">
        <label class="form-label">Title</label>
        <input name="title" type="text" class="form-control" value="{{$post->title}}" {{$readonly}}>
    </div>
    <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea name="description" class="form-control"  {{$readonly}}>{{$post->description}}</textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Due Date</label>
        <input name="dueDate" type="date" class="form-control"  value="{{Carbon\Carbon::parse($post->dueDate)->format('Y-m-d')}}"  {{$readonly}}>
    </div>
    <!-- User Role-->
    <div class="mb-3">
        <label class="form-label">Status</label>
            <select id="status" name="status" class="form-control" required>
            @foreach($postStatus as $status)
            
                    <option value="{{ $status }}" @if($status == $post->status) selected @endif>{{ $status }}</option>
                @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Users</label>
        <select class="form-control" name="user_id"  {{$readonly}}> 
            @foreach($users as $user)
            <option value="{{$user->id}}" @if($user->id==$post->user_id) selected @endif >{{$user->name}}</option>
            @endforeach
        </select>
    </div>
   
    <button type="submit" class="btn btn-primary">Update Post</button>
</form>
@endsection