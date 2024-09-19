@extends('Layouts.Admin.master')
@section('content')

<div class="container-fluid px-4">
    <x-forms.form-product :categories="$category"/>
</div>
@endsection