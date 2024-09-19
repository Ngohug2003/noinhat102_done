@extends('Layouts.Admin.master')
@section('content')

<div class="container-fluid px-4">
    <x-forms.form-product_edit :categories="$categories" :product="$product" />
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        ClassicEditor
            .create(document.querySelector('#description'))
            .catch(error => {
                console.error(error);
            });
    });
</script>
@endsection