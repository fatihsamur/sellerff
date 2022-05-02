@extends('theme::layouts.app')

@section('content')
    @livewire('update-tracking', ['order_id' => $id])
@endsection
