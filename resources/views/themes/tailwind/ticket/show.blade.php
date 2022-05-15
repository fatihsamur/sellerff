@extends('theme::layouts.app')

@section('content')
    @livewire('show-ticket', ['id' => $id])
@endsection
