@extends('adminlte::page')

@section('title', 'Sistema Tec')

@section('content_header')
{{ __('Dashboard') }}
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
