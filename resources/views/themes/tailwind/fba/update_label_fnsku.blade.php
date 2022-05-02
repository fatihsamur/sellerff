@extends('theme::layouts.app')

@section('content')
    @livewire('update-label-fnsku', ['order_id' => $id])
@endsection
