<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request; 


class EmployeeController extends Controller
{
    public function index(){
        $employees = Employee::orderBy('id','desc')->get();
        $total = Employee::count();
        return view('admin.employee.home', compact(['employees', 'total'])) ;
    }

    public function create(){
        return view ('admin.employee.create');
    }

    public function store(Request $request){
        $validation = $request-> validate([
            'name'=>'required',
            'surname'=>'required',
            'occupation'=>'required',
            'cpf'=>'required',
            'wage'=>'required',
        ]);
        $data= Employee::create($validation);
        if($data){
            session()->flash ('success','Funcionário cadastrado com sucesso');
            return redirect(route('admin.employee'));
        } else{
            session()->flash ('error','Um problema ocorreu');
            return redirect(route('admin.employee.create'));
        }
    }

    public function edit($id){
        $employees=Employee::findorFail($id);
        return view ('admin.employee.update', compact ('employees'));
    }

    public function update (Request $request, $id){
        $validation = $request-> validate([
            'name'=>'required',
            'surname'=>'required',
            'occupation'=>'required',
            'cpf'=>'required',
            'wage'=>'required',
        ]);
        $employees= Employee::findorFail($id);
        $name=$request->name;
        $surname=$request->surname;
        $occupation=$request->occupation;
        $cpf=$request->cpf;
        $wage=$request->wage;

        $employees->name= $name;
        $employees->surname= $surname;
        $employees->occupation= $occupation;
        $employees->cpf= $cpf;
        $employees->wage=$wage;

        $data = $employees->save();
            if ($data) {
                session()->flash('success', 'Funcionário atualizado com Sucesso');
                return redirect(route('admin.employee'));
            } else {
                session()->flash('error', 'Algum problema ocorreu');
                return redirect(route('admin.employee.update'));
            }
    }

    public function delete($id)
    {
        $employees = Employee::findOrFail($id)->delete();
        if ($employees) {
            session()->flash('success', 'Funcionário deletado com sucesso');
            return redirect(route('admin.employee'));
        } else {
            session()->flash('error', 'Funcionário não pôde ser deletado');
            return redirect(route('admin.employee'));
        }
    }
}
