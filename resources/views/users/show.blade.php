@extends('layouts.app')
  
@section('title', 'Show User')
  
@section('contents')
    <h1 class="mb-0">Detail User</h1>
    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">name</label>
            <input type="text" name="name" class="form-control" placeholder="name" value="{{ $user->name }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">email</label>
            <input type="text" name="email" class="form-control" placeholder="email" value="{{ $user->email }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label>Role: </label>
            <div class="radio">
                <label><input type="radio" name="role" id="role1" value="1" @if ($user->role=="1") checked @endif disabled>Super Admin</label>
                <label><input type="radio" name="role" id="role2" value="2" @if ($user->role=="2") checked @endif disabled>Admin</label>
                <label><input type="radio" name="role" id="role3" value="3" @if ($user->role=="3") checked @endif disabled>User</label>
            </div>
        </div>
        <div class="col mb-3">
            <label class="form-label">image</label>
            <img class="image rounded-circle" src="{{asset('/storage/images/'.$user->image)}}" alt="profile_image" style="width: 80px;height: 80px; padding: 10px; margin: 0px; ">
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Created At</label>
            <input type="text" name="created_at" class="form-control" placeholder="Created At" value="{{ $user->created_at->format('Y-m-d H:i:s') }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Updated At</label>
            <input type="text" name="updated_at" class="form-control" placeholder="Updated At" value="{{ $user->updated_at->format('Y-m-d H:i:s') }}" readonly>
        </div>
    </div>
@endsection