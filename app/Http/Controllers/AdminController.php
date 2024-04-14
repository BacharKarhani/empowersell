<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Review;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use App\Models\UsersProduct;

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
        
            // Find the user by id
            $user = User::findOrFail($id);
    
            // Delete associated records in the users_product table
            UsersProduct::where('user_id', $id)->delete();
    
            // Now you can safely delete the user
            $user->delete();
            return redirect()->route('manage.users.index');
    }
    
    
    // AdminController.php
    public function indexReviews()
    {
        $reviews = DB::table('users_product')
            ->leftJoin('users', 'users_product.user_id', '=', 'users.id')
            ->leftJoin('products', 'users_product.product_id', '=', 'products.id')
            ->leftJoin('reviews', 'users_product.review_id', '=', 'reviews.id')
            ->select('users.name as user_name', 'products.product_name as product_name', 'reviews.review_text', 'reviews.id')
            ->get();

        return view('manage.reviews.index', compact('reviews'));
    }
    
    public function deleteReview($id)
    {
        // Find the review by its ID
        $review = Review::findOrFail($id);
    
        // Detach the associated users
        $review->users()->detach();
    
        // Dissociate the associated product
        $review->product()->dissociate(); 
    
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
