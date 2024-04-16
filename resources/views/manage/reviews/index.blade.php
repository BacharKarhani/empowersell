@extends('layouts.adminlayout')

@section('content')
    <h2>Manage Reviews</h2>

    <table>
        <thead>
            <tr>
                <th>User</th>
                <th>Product</th>
                <th>Review Text</th>
                <th>Created At</th>
                <th>Action</th> 
            </tr>
        </thead>
        <tbody>

@foreach($reviews as $review)
    <tr>
        <td>{{ $review->user_name }}</td>
        <td>{{ $review->product_name }}</td>
        <td>{{ $review->review_text }}</td>
        <td>{{ $review->created_at }}</td>
        <td>
            <form action="{{ route('manage.reviews.delete', ['id' => $review->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </td>
    </tr>
@endforeach

        </tbody>
    </table>
@endsection
