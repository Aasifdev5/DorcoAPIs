<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class ProductController extends Controller {

   public function index($category, $subcategory, Request $request) {
    return response()->json(
        Product::where('category_id', $category)
               ->where('subcategory_id', $subcategory)
               ->paginate(10)
    );
}
    // Show Product List
    public function list()
    {


        if (Session::has('LoggedIn')) {
            $user_session = User::where('id', Session::get('LoggedIn'))->first();
        }

        $products = Product::with('category')->get();
        return view('admin.products.index', compact('products', 'user_session'));
    }
    public function getSubcategories($category_id)
    {
        $subcategories = Subcategory::where('parent_category_id', $category_id)->get();
        return response()->json($subcategories);
    }
    // Show Create Form
    public function create()
    {


        if (Session::has('LoggedIn')) {
            $user_session = User::where('id', Session::get('LoggedIn'))->first();
        }

        $categories = Category::all();
        return view('admin.products.create', compact('categories', 'user_session'));
    }

    // Store Product
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'code' => 'required|unique:products',
            'name' => 'required',
            'description' => 'required',
            'image' => 'image|nullable|max:2048',
        ]);

        $image = null;

        if ($request->hasFile('image')) {
            $image = $this->storeImage($request->file('image'), 'products');
        }

        Product::create([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'code' => $request->code,
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image,
        ]);

        return redirect()->route('products.list')->with('success', 'Product added successfully');
    }

    // Show Edit Form
    public function edit(Product $product)
    {


        if (Session::has('LoggedIn')) {
            $user_session = User::where('id', Session::get('LoggedIn'))->first();
        }

        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories', 'user_session'));
    }

    // Update Product
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'code' => "required|unique:products,code,{$product->id}",
            'name' => 'required',
            'description' => 'required',
            'image' => 'image|nullable|max:2048',
        ]);
// dd($request->all());
        if ($request->hasFile('image')) {
            $this->deleteFile($product->image); // Delete old image
            $product->image = $this->storeImage($request->file('image'), 'products');
        }

        $product->update([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'code' => $request->code,
            'name' => $request->name,
            'description' => $request->description,
            'image' => $product->image,
        ]);

        return redirect()->route('products.list')->with('success', 'Product updated successfully');
    }

    // Delete Product
    public function destroy(Product $product)
    {
        $this->deleteFile($product->image);
        $product->delete();
        return redirect()->route('products.list')->with('success', 'Product deleted successfully');
    }

    // Bulk Delete Products
    public function bulkDelete(Request $request)
    {
        $products = Product::whereIn('id', $request->ids)->get();

        foreach ($products as $product) {
            $this->deleteFile($product->image);
            $product->delete();
        }

        return response()->json(['message' => 'Selected products deleted successfully']);
    }

    // Store Image Helper Function
    private function storeImage($file, $destination)
    {
        $file_name = time() . '-' . Str::random(10) . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads/' . $destination), $file_name);
        return 'uploads/' . $destination . '/' . $file_name;
    }

    // Delete Image Helper Function
    private function deleteFile($path)
    {
        if ($path && File::exists(public_path($path))) {
            File::delete(public_path($path));
        }
    }
}
