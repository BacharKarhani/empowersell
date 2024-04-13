<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Review;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    // Manage Users
    public function index()
    {
        $users = User::with('role')->get();
        return view('manage.users.index', ['users' => $users]);
    }

    public function create()
    {
        // Logic for showing create user form
    }

    public function store(Request $request)
    {
        // Logic for storing new user
        $user = User::create($request->all());
    
        // Redirect to the show page for the newly created user
        return redirect()->route('manage.users.show', ['user' => $user->id]);
    }
    

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('manage.users.show', ['user' => $user]);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('manage.users.edit', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        // Logic for updating user
    }

    public function destroy($id)
    {
        // Logic for deleting user
    }

    // AdminController.php
    public function indexReviews()
    {
        $reviews = DB::table('users_products')
            ->leftJoin('users', 'users_products.user_id', '=', 'users.user_id')
            ->leftJoin('products', 'users_products.product_id', '=', 'products.product_id')
            ->leftJoin('reviews', 'users_products.review_id', '=', 'reviews.review_id')
            ->select('users.name as user_name', 'products.product_name as product_name', 'reviews.review_text', 'reviews.review_id')
            ->get();

        return view('manage.reviews.index', compact('reviews'));
    }
    
    public function deleteReview($id)
    {
        // Find the review by its ID
        $review = Review::findOrFail($id);
    
        // Detach the associated users and products
        $review->users()->detach();
        $review->product()->dissociate(); // If the relationship is not many-to-many
    
        // Delete the review
        $review->delete();
    
        // Redirect back with success message
        return redirect()->back()->with('success', 'Review and associated relationships deleted successfully.');
    }
    
    


    // Implement other Review management functions...

    // Manage Products
    public function indexProducts()
    {
        $products = Product::all();
        return view('manage.products.index', ['products' => $products]);
    }

    // Implement other Product management functions...

    // Manage Categories
    public function indexCategories()
    {
        $categories = Category::all();
        return view('manage.categories.index', ['categories' => $categories]);
    }

    // Implement other Category management functions...
}
