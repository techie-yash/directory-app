<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Page;
use Auth;
use App\Traits\ImageUploadTrait; 
use App\Traits\AuthHelperTrait;


class ProductController extends Controller
{
    //
    use ImageUploadTrait;
    use AuthHelperTrait;

    public function addCategory()
    {
        $userId = $this->getAuthenticatedUserId();
        $categories = Category::where('user_id',$userId)->get()->toArray();
        $products = Product::where('user_id',$userId)->get()->toArray();
        return view('customer.ProFeatures.category-list',compact('categories','products'));
    }

    public function storeCategory(Request $request)
    {
        $userId = $this->getAuthenticatedUserId();

        Category::create([
            'name' => $request->input('name'),
            'user_id' => $userId,
        ]);
        
        return redirect()->route('addCategory')->with('success', 'Category added successfully');
    }

    public function deleteCategory($id)
    {
        $id = base64_decode($id);
        $deleteCategory = Category::find($id);
        $deleteCategory->delete();

        return redirect()->route('addCategory')->with('success', 'Category deleted successfully.');
    }


    public function addProduct(Request $request)
    {
        $userId = $this->getAuthenticatedUserId();
        $categorie = Category::where('user_id',$userId)->get()->toArray();

        if($request->isMethod('post')){
            $imageFilename = null;
            if ($request->hasFile('media')) {
                $image = $request->file('media');
                $imageFilename = $this->uploadmedia($image, 'media'); 
            }

            Product::create([
                'title' => $request->input('title'),
                'user_id' => $userId,
                'category_id' => $request->input('type'),
                'description' => $request->input('description'),
                'price' => $request->input('price'),
                'before_price' => $request->input('before_price'),
                'discount_price' => $request->input('discount_price'),
                'discount_percentage' => $request->input('discount_percentage'),
                'until_date' => $request->input('until_date'),
                'media' => $imageFilename,
            ]);
            
            return redirect()->route('addCategory')->with('success', 'Product added successfully');

        }
        return view('customer.ProFeatures.add-product',compact('categorie'));
    }

    public function deleteProduct($id)
    {
        $id = base64_decode($id);
        $deleteProduct = Product::find($id);
        $deleteProduct->delete();

        return redirect()->route('addCategory')->with('success', 'Product deleted successfully.');
    }

    public function addPage(Request $request)
    {

        $userId = $this->getAuthenticatedUserId();


        if($request->isMethod('post')){

            // dd($user);
            page::create([
                'title' => $request->input('title'),
                'user_id' => $userId,
            ]);
            
            return redirect()->route('addPage')->with('success', 'page added successfully');

        }
        return view('customer.ProFeatures.add-page');
    }


}
