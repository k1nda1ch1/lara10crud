@extends('layouts.app')
  
@section('title', 'Profile')
  
@section('contents')
    <h1 class="mb-0">Profile</h1>
    <hr />
 
    {{-- <form method="POST" enctype="multipart/form-data" id="profile_setup_frm" action="" > --}}
    <div class="row">
        <div class="col-md-12 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>

                <form action="{{ route('profile.update', auth()->user()->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row" id="res"></div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label class="labels">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="full name" value="{{ auth()->user()->name }}">
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Email</label>
                            <input type="text" name="email" disabled class="form-control" value="{{ auth()->user()->email }}" placeholder="Email">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label class="labels">言語</label>
                            <label>言語： </label>
                            <select name="lang">
                                <option value="ja" @if (auth()->user()->lang=="ja") selected @endif>日本語</option>
                                <option value="id" @if (auth()->user()->lang=="id") selected @endif>インドネシア語</option>
                                <option value="en" @if (auth()->user()->lang=="en") selected @endif>英語</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Image</label>
                            <img class="image rounded-circle" src="{{asset('/storage/images/'.Auth::user()->image)}}" alt="profile_image" style="width: 80px;height: 80px; padding: 10px; margin: 0px; ">
                                <input type="file" name="image">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <button class="btn btn-warning">Update</button>
                        </div>
                    </div>
                </form> 
                {{-- <div class="mt-5 text-center"><button id="btn" class="btn btn-primary profile-button" type="submit">Save Profile</button></div> --}}
            </div>
        </div>
         
    </div>   
            
        </form>
@endsection