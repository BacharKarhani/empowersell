@extends('adminlayout')

@section('content')
    <h2>Manage Reviews</h2>

    <table>
        <thead>
            <tr>
                <th>User</th>
                <th>Product</th>
                <th>Review Text</th>
                <th>Action</th> <!-- Add this column for delete action -->
            </tr>
        </thead>
        <tbody>
<!-- resources/views/manage/reviews/index.blade.php -->

<!-- resources/views/manage/reviews/index.blade.php -->

@foreach($reviews as $review)
    <tr>
        <td>{{ $review->user_name }}</td>
        <td>{{ $review->product_name }}</td>
        <td>{{ $review->review_text }}</td>
        <td>
            <form action="{{ route('manage.reviews.delete', ['id' => $review->review_id]) }}" method="POST">
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
