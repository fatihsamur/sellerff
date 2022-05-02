@extends('theme::layouts.app')



@section('content')


@livewire('admin-user-list', ['user' => $user])


@endsection
