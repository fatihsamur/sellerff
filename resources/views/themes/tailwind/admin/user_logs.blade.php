@extends('theme::layouts.app')

@section('content')


@livewire('user-logs', ['id' => $id] )

@endsection
