@extends('layouts.app')
@section('content')
    <h5 class="mb-3 mb-md-0">Тизимга хуш келибсиз, <span class="text-muted">{{ session()->get('fullname') }}</span></h5>
@endsection
