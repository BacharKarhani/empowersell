@extends('layouts.adminlayout')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<style>
    .profile img {
        border-radius: 50%;
        width: 50%;
        height: 30%;
    }

    .profile {
        text-align: center;
    }
</style>

@section('content')

<div class="profile">
    <h1>User Profile</h1>

    @if($profileType == 'vendor')
    <p><img src="{{ $user->profile_picture }}" alt="Profile Picture"></p>

    <p><strong>Name:</strong> {{ $user->name }}</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>
    <p><strong>Gender:</strong> {{ $user->gender }}</p>
    <p><strong>Address:</strong> {{ $user->address }}</p>
    <p><strong>Phone number:</strong> {{ $user->phone_number }}</p>
    <p><strong>Role:</strong> {{ $user->role->role_name }}</p>

    <!-- Products by vendor based on categories -->
    <div id="vendorProducts">
        <h2>Products by Vendor</h2>
        <label for="category">Select Category:</label>
        <select name="category" id="category">
            <option value="">Select Category</option>
            @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
            @endforeach
        </select>
        <div id="products"></div>
    </div>

    @elseif($profileType == 'customer')
    <p><img src="{{ $user->profile_picture }}" alt="Profile Picture"></p>

    <p><strong>Name:</strong> {{ $user->name }}</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>
    <p><strong>Gender:</strong> {{ $user->gender }}</p>
    <p><strong>Address:</strong> {{ $user->address }}</p>
    <p><strong>Phone number:</strong> {{ $user->phone_number }}</p>
    <p><strong>Role:</strong> {{ $user->role->role_name }}</p>
    @endif
</div>

<!-- AJAX Script for fetching products based on category -->
<script>
    $(document).ready(function() {
        $('#category').change(function() {
            var category_id = $(this).val();
            var user_id = "{{ $user->id }}"; // Get the current vendor's ID
            
            $.ajax({
                url: "{{ route('fetch.products.by.category') }}",
                method: 'POST',
                data: {
                    category_id: category_id,
                    user_id: user_id,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    // Clear previous products
                    $('#products').empty();

                    // Render products
                    $.each(response.products, function(index, product) {
                        // Customize how each product is rendered
                        var productHtml = '<div>' + product.name + '</div>';
                        $('#products').append(productHtml);
                    });
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error:', error);
                }
            });
        });
    });
</script>




@endsection
