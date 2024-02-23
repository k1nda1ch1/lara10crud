@extends('layouts.app')
  
@section('title', 'Create User')
  
@section('contents')
    <h1 class="mb-0">Add User</h1>
    <hr />
    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        {{-- @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
        @endif --}}
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name')is-invalid @enderror" placeholder="name">
                @error('name')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="col">
                <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email')is-invalid @enderror" placeholder="email">
                @error('email')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror                
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <input type="password" name="password" class="form-control @error('password')is-invalid @enderror" placeholder="password">
                @error('password')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="col">
                <input type="password" name="password_confirmation" class="form-control @error('password_confirmation')is-invalid @enderror" placeholder="password確認">
                @error('password_confirmation')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label>Role: </label>
                <div class="radio">
                    <label><input type="radio" name="role" id="role1" value="1">Super Admin</label>
                    <label><input type="radio" name="role" id="role2" value="2">Admin</label>
                    <label><input type="radio" name="role" id="role3" value="3" checked>User</label>
                </div>
            </div>
        </div>
 
        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection