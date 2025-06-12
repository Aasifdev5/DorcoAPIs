@extends('layout.master')

@section('main_content')
<div class="container">
    <h2>Product List</h2>
    <a href="{{ route('products.create') }}" class="btn btn-success pull-right">Add Product</a>

    <form id="bulk-delete-form">
        @csrf
        @method('DELETE')
        <button type="button" id="bulk-delete-btn" class="btn btn-danger">Delete Selected</button>
    </form>
    <br>

    <table class="table" id="basic-1">
        <thead>
            <tr>
                <th><input type="checkbox" id="select-all"></th>
                <th>Code</th>
                <th>Name</th>
                <th>Category</th>
                <th>Subcategory</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td><input type="checkbox" class="product-checkbox" value="{{ $product->id }}"></td>
                <td>{{ $product->code }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->category->name ?? '—' }}</td>
                <td>{{ $product->subcategory->name ?? '—' }}</td>
                <td>
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline delete-form">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger delete-btn">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- SweetAlert Script -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.querySelectorAll('.delete-btn').forEach(button => {
    button.addEventListener('click', function(event) {
        event.preventDefault();
        let form = this.closest('.delete-form');

        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to undo this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });
});

// Bulk Delete
document.getElementById('bulk-delete-btn').addEventListener('click', function() {
    let selectedIds = Array.from(document.querySelectorAll('.product-checkbox:checked')).map(cb => cb.value);
    if (selectedIds.length === 0) {
        Swal.fire("No products selected", "Please select products to delete", "warning");
        return;
    }

    Swal.fire({
        title: "Delete selected products?",
        text: "This action cannot be undone.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, delete",
        cancelButtonText: "Cancel"
    }).then((result) => {
        if (result.isConfirmed) {
            fetch("{{ route('products.bulkDelete') }}", {
                method: "DELETE",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({ ids: selectedIds })
            }).then(response => response.json()).then(data => {
                Swal.fire("Deleted!", data.message, "success").then(() => location.reload());
            });
        }
    });
});

// Select All Checkbox
document.getElementById('select-all').addEventListener('change', function() {
    document.querySelectorAll('.product-checkbox').forEach(checkbox => {
        checkbox.checked = this.checked;
    });
});
</script>
@endsection
