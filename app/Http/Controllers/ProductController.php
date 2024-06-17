<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller{
    public function index(){
        $products = Product::with('categoria')->orderBy('id', 'desc')->get();
        $total = Product::count();
        $categories = Category::all();
        return view('admin.product.home' , compact(['products', 'total', 'categories']));
    }

    public function create(){
        $categories = Category::all();
        return view('admin.product.create', compact('categories'));
    }

    public function save(Request $request){
        $validation = $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'price' => 'required',
        ]);
        $data = Product::create($validation);
        if ($data) {
            session()->flash('success', 'Produto adicionado com êxito');
            return redirect(route('admin.product'));
        } else {
            session()->flash('error', 'Algum problema ocorreu');
            return redirect(route('admin.product.create'));
        }
    }

    public function edit($id){
        $products = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.product.update', compact('products', 'categories'));
    }

    public function update(Request $request, $id){
        $validation = $request->validate([
            'title' => 'required',
            'category' => 'required',
            'price' => 'required',

        ]);
        $products = Product::findOrFail($id);
        $title = $request->title;
        $category = $request->category;
        $price = $request->price;

        $products->title = $title;
        $products->category = $category;
        $products->price = $price;
        $data = $products->save();
            if ($data) {
                session()->flash('success', 'Produto Atualizado com Sucesso');
                return redirect(route('admin.product'));
            } else {
                session()->flash('error', 'Algum problema ocorreu');
                return redirect(route('admin.product.update'));
            }
    }
    public function delete($id)
    {
        $products = Product::findOrFail($id)->delete();
        if ($products) {
            session()->flash('success', 'Produto deletado com sucesso');
            return redirect(route('admin.product'));
        } else {
            session()->flash('error', 'Produto não pôde ser deletado');
            return redirect(route('admin.product'));
        }
    }
}