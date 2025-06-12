@extends('layout.master')

@section('main_content')
<div class="container">
    <h2>Edit Product</h2>

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Category --}}
        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select name="category_id" id="category_id" class="form-control">
                <option value="">Select Category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ $product->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Subcategory --}}
        <div class="mb-3">
            <label for="subcategory_id" class="form-label">Subcategory</label>
            <select name="subcategory_id" id="subcategory_id" class="form-control">
                <option value="">Select Subcategory</option>
            </select>
        </div>

        {{-- Product Code --}}
        <div class="mb-3">
            <label for="code" class="form-label">Product Code</label>
            <input type="text" name="code" class="form-control" value="{{ $product->code }}">
        </div>

        {{-- Product Name --}}
        <div class="mb-3">
            <label for="name" class="form-label">Product Name</label>
            <input type="text" name="name" class="form-control" value="{{ $product->name }}">
        </div>

        {{-- Description --}}
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control">{{ $product->description }}</textarea>
        </div>

        {{-- Image --}}
        <div class="mb-3">
            <label for="image" class="form-label">Product Image</label>
            <input type="file" name="image" class="form-control">
            @if($product->image)
                <img src="{{ asset($product->image) }}" alt="Product Image" width="100" class="mt-2">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update Product</button>
        <a href="{{ route('products.list') }}" class="btn btn-secondary">Back</a>
    </form>
</div>

{{-- jQuery and AJAX Script --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        var selectedSubcategoryId = "{{ $product->subcategory_id }}";

        function loadSubcategories(categoryId, selectedId = null) {
            $('#subcategory_id').empty().append('<option value="">Loading...</option>');
            $.ajax({
                url: '/get-subcategories/' + categoryId,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    $('#subcategory_id').empty();
                    $('#subcategory_id').append('<option value="">Select Subcategory</option>');
                    $.each(data, function (key, value) {
                        $('#subcategory_id').append(
                            '<option value="' + value.id + '"' +
                            (selectedId == value.id ? ' selected' : '') +
                            '>' + value.name + '</option>'
                        );
                    });
                }
            });
        }

        // Initial load if category is preselected
        var initialCategoryId = $('#category_id').val();
        if (initialCategoryId) {
            loadSubcategories(initialCategoryId, selectedSubcategoryId);
        }

        // Load subcategories when category changes
        $('#category_id').on('change', function () {
            var categoryId = $(this).val();
            if (categoryId) {
                loadSubcategories(categoryId);
            } else {
                $('#subcategory_id').empty().append('<option value="">Select Subcategory</option>');
            }
        });
    });
</script>
@endsection
