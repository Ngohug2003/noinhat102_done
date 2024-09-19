@extends('Layouts.Admin.master')
@section('content')

<div class="container-fluid px-4">
    <x-forms.form-category_edit :category="$category"/>
</div>
@endsection