@extends('adminlayout')

@section('content')
    <h2>Manage Reviews</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Product</th>
                <th>Rating</th>
                <th>Review</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reviews as $review)
            <tr>
                <td>{{ $review->id }}</td>
                <td>{{ $review->user ? $review->user->name : 'User Not Found' }}</td>
                <td>{{ $review->product ? $review->product->name : 'Product Not Found' }}</td>
                <td>{{ $review->rating }}</td>
                <td>{{ $review->review }}</td>
            </tr>
            @endforeach
        </tbody>

    </table>
@endsection
