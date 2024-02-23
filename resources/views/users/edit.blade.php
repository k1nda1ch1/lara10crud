@extends('layouts.app')
  
@section('title', 'Edit User')
  
@section('contents')
    <h1 class="mb-0">Edit user</h1>
    <hr />
    <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">name</label>
                <input type="text" name="name" class="form-control" placeholder="name" value="{{ $user->name }}" >
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
                    <label><input type="radio" name="role" id="role1" value="1" @if ($user->role=="1") checked @endif>Super Admin</label>
                    <label><input type="radio" name="role" id="role2" value="2" @if ($user->role=="2") checked @endif>Admin</label>
                    <label><input type="radio" name="role" id="role3" value="3" @if ($user->role=="3") checked @endif>User</label>
                </div>
            </div>
            <div class="col mb-3">
                <label class="form-label">image</label>
                <img class="image rounded-circle" src="{{asset('/storage/images/'.$user->image)}}" alt="profile_image" style="width: 80px;height: 80px; padding: 10px; margin: 0px; ">
                <input type="file" name="image">
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label>言語： </label>
                <select name="lang">
                    <option value="ja" @if ($user->lang=="ja") selected @endif>日本語</option>
                    <option value="id" @if ($user->lang=="id") selected @endif>インドネシア語</option>
                    <option value="en" @if ($user->lang=="en") selected @endif>英語</option>
                </select>
                
            </div>
            <div class="col mb-3">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
@endsection