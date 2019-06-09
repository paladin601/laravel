<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Form;

class PagesController extends Controller
{
    public function indexClean(Request $request){
        $request->session()->forget('error');
        $request->session()->forget('success');
        return view('index');
    }
    public function index(){
        return view('index');
    }
    public function detail(Request $request){
        $request->session()->forget('error');
        $request->session()->forget('success');
        $form=new Form();
        if($form->is_empty()){
            return view('detail',['data'=>FALSE]);
        }else{
            return view('detail',['data'=>$form->findAll()]);
        }
    }
    public function store(Request $request){
        $form=new Form();
        $error=[];
        $msg="El campo {0} es Obligatorio";
        $data = $request->input('Nombre');
        if($data==""){
            array_push($error,str_replace("{0}","Nombre",$msg));
        }
        $data = $request->input('Apellido');
        if($data==""){
            array_push($error,str_replace("{0}","Apellido",$msg));
        }
        $data = $request->input('Cedula');
        if($data==""){
            array_push($error,str_replace("{0}","Cedula",$msg));
        }
        $data = $request->input('Edad');
        if($data==""){
            array_push($error,str_replace("{0}","Edad",$msg));
        }

        if(sizeof($error)>0){
            session(['error' => $error]);
            return redirect()->route('home')->withInput();
        }else{
            $form->edit($request);
            return redirect()->route('detail');
        }

    }
    public function update($cedula){
        $form=new Form();
        $user=$form->find($cedula);
        return view('update',compact('user'));
    }

    public function updateStore(Request $request){
        $form=new Form();
        $error=[];
        $msg="El campo {0} es Obligatorio";
        $data = $request->input('Nombre');
        if($data==""){
            array_push($error,str_replace("{0}","Nombre",$msg));
        }
        $data = $request->input('Apellido');
        if($data==""){
            array_push($error,str_replace("{0}","Apellido",$msg));
        }
        $cedula=$request->input("Cedula");

        $data = $request->input('Edad');
        if($data==""){
            array_push($error,str_replace("{0}","Edad",$msg));
        }

        if(sizeof($error)>0){
            $request->session()->forget('success');
            session(['error' => $error]);
            return redirect()->route('update',compact('cedula'))->withInput();
        }else{
            $request->session()->forget('error');
            $form=$form->find($cedula);
            $form->edit($request);
            session(['success' => "Se ha modificado con exito el registro "]);
            return redirect()->route('update',compact('cedula'))->withInput();
        }
    }

    public function remove(Request $request){
        $form=new Form();
        $form->remove($request->input('cedula'));
        return $request->input('cedula');
    }
}
