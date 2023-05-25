<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use App\Models\Seller;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    // show dashboard
    public function dashboard()
    {
        return view('admin/dashboard');
    }
    // show all users
    public function users()
    {
        $users = User::all();
        return view('admin/users', compact('users'));
    }
    // search users
    public function searchInUsers(Request $request)
    {
        $request->validate([
            'search_key' => 'required',
        ]);

        $users = User::where('name', 'like', '%'. $request->search_key. '%')
            ->orWhere('email', 'like', '%'. $request->search_key. '%')->get();

        return view('admin/users', compact('users'));

    }
    // show all sellers
    public function sellers()
    {
        $sellers = Seller::all();
        return view('admin/sellers', compact('sellers'));
    }
    // search sellers
    public function searchInSellers(Request $request)
    {
        $request->validate([
            'search_key' => 'required',
        ]);

        $sellers = Seller::where('name', 'like', '%'. $request->search_key. '%')
            ->orWhere('email', 'like', '%'. $request->search_key. '%')->get();

        return view('admin/sellers', compact('sellers'));

    }
    // show all orders
    public function orders()
    {
        $orders = Order::all();
        return view('admin/orders', compact('orders'));
    }
    // search orders
    public function searchInOrders(Request $request)
    {
        $request->validate([
            'search_key' => 'required',
        ]);

        $orders = Order::where('line_1', 'like', '%'. $request->search_key. '%')
            ->orWhere('line_2', 'like', '%'. $request->search_key. '%')
            ->orWhere('province', 'like', '%'. $request->search_key. '%')
            ->orWhere('city', 'like', '%'. $request->search_key. '%')->get();

        return view('admin/orders', compact('orders'));

    }
    // show all products
    public function products()
    {
        $products = Product::latest()->paginate(10);
        return view('admin/products', compact('products'));
    }
    // search orders
    public function searchInProducts(Request $request)
    {
        $request->validate([
            'search_key' => 'required',
        ]);

        $products = Product::where('name', 'like', '%'. $request->search_key. '%')
            ->orWhere('description', 'like', '%'. $request->search_key. '%')
            ->latest()->paginate(10);

        return view('admin/products', compact('products'));

    }
    //    delete specific product  (softDelete)
    public function deleteProduct(Product $product)
    {
        $product->delete();
        Alert::success('success' ,"deleted success");
        return back();
    }
    // display all products in trash
    public function productsTrash()
    {
       $products = Product::onlyTrashed()->latest()->paginate(10);
       return view('admin/products-trash' ,compact('products'));
    }
    // restore product from trash
    public function restoreProduct($id )
    {
       $product = Product::onlyTrashed()->find($id);

       $product->restore();
        Alert::success('success' ,"Restore success");
        return back();
    }
}
