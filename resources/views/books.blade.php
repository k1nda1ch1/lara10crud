@extends('layouts.app')
  
@section('title', 'Todo List')
  
@section('contents')
    {{-- Calling Livewire Component --}}
    @livewire('book-manager')
@endsection