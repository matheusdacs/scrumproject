<?php

namespace App\Http\Controllers\project;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\model\project\Project;
use Validator;

class ProjectController extends Controller
{
    public function index(){
    	return view('project/newproject');
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:50',
            'description' => 'required|max:500',
        ]);
    }

    public function addproject(Request $request){

    	$validator = $this->validator($request->all());

        if ($validator->fails()) {  
			return response()->json( ['error' => $validator->errors()->all()]);
		}else{
	    	$projetos = new Project();
	    	
	    	$projetos->name 		= $request->input('name');
	    	$projetos->description 	= $request->input('description');

	    	$projetos->save();

	    	return response()->json( ['success' => 'Dados salvos com sucesso!']);	
    	}
    }

    public function listProjects(){
    	$projects = Project::all();

    	return view('project/listproject')->with(compact('projects'));

    }

    public function editprojects(Request $request){
        $validator = $this->validator($request->all());

        if ($validator->fails()) {  
            return response()->json( ['error' => $validator->errors()->all()]);
        }else{

            $project = Project::find($request->input('id'));
            $project->name = $request->input('name');
            $project->description = $request->input('description');
            $project->save();
            return response()->json( ['success' => 'Projeto salvo com sucesso!']);   
        }
    }

    public function deleteProject(Request $request){
        $project = Project::find($request->id);
        if(!is_null($project)){
            $project->delete();  
            return response()->json( ['success' => 'Projeto removido com sucesso:' + $request->id]);  
        }else{
            return response()->json( ['error' => 'Registro não encontrado para deletar!']);  
        }

              

    }




}
