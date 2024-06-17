<?php

namespace App\Http\Controllers;
use App\Models\Category;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::orderBy('id','desc')->get();
        $total = Category::count();
        return view ('admin.category.home' , compact(['categories', 'total']));
    }

    public function create(){
        return view ('admin.category.create');
    }

    public function store(Request $request){
        $validation = $request -> validate([
            'category'=>'required',
        ]);
        $data= Category::create($validation);
        if($data){
            session()->flash ('success','Categoria cadastrada com sucesso');
            return redirect(route('admin.category'));
        } else{
            session()->flash ('error','Um problema ocorreu');
            return redirect(route('admin.category.create'));
        }
    }
    public function edit($id){
        $categories=Category::findorFail($id);
        return view ('admin.category.update', compact ('categories'));
    }

    public function update (Request $request, $id){
        $validation = $request -> validate([
            'category'=>'required',
        ]);
        $categories= Category::findorFail($id);
        $category=$request->category;

        $categories->category= $category;

        $data = $categories->save();
            if ($data) {
                session()->flash('success', 'Categoria atualizado com Sucesso');
                return redirect(route('admin.category'));
            } else {
                session()->flash('error', 'Algum problema ocorreu');
                return redirect(route('admin.category.update'));
            }
    }

    public function delete($id)
    {
        $categories = Category::findOrFail($id)->delete();
        if ($categories) {
            session()->flash('success', 'Categoria deletado com sucesso');
            return redirect(route('admin.category'));
        } else {
            session()->flash('error', 'Categoria não pôde ser deletado');
            return redirect(route('admin.category'));
        }
    }
}
