@extends('layouts.postapp')

@section('mycontent')
<form method="post" action="{{route('posts.store')}}">
    <!-- add Cross-site request forgeries protector -->
    @csrf
    <div class="mb-3">
        <label class="form-label">Title</label>
        <input name="title" type="text" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea name="description" class="form-control"></textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Due Date</label>
        <input name="dueDate" type="date" class="form-control">
    </div>
    <!-- User Role-->
    <div class="mb-3">
        <label class="form-label">Status</label>
            <select id="status" name="status" class="form-control" required>
                @foreach($postStatus as $status)
                    <option value="{{ $status }}">{{ $status }}</option>
                @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Users</label>
        <select class="form-control" name="user_id"> 
            @foreach($users as $user)
            <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-success">Create Post</button>
</form>
@endsection