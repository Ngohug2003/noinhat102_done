@extends('Layouts.Admin.master')
@section('content')

<div class="container-fluid px-4">
    <x-forms.form-post_edit :post="$post"/>
</div>
@endsection