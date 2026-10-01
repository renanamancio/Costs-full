<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\ProjectResource;
use App\Http\Resources\ServiceResource;
use App\Http\Resources\UserResource;
use App\Models\Category;
use App\Models\Project;
use App\Models\Service;
use App\Models\User;
use App\Services\ApiResponse;
use Illuminate\Http\Request;


class MainController extends Controller
{
    public function status(){
        
        return ApiResponse::success([
            'currentStatusString' => 'API is Running!!!',
            'serverDate' => now()->toDateString(),
            'serverTime' => now()->toTimeString(),
            'serverTimestamp' => now()->timestamp,
            'serverTimezone' => now()->timezoneName,
            'apiVersion' => 'v1'
        ],);

    }

    public function listCategories(){
        
        $categories = Category::all();

        return ApiResponse::success([
            'totalCategories' => $categories->count(),
            'categories' => CategoryResource::collection($categories),
        ]);
    }

    public function listUsers(){

        $users = User::all();

        return ApiResponse::success([
            'totalUsers' => $users->count(),
            'users' => UserResource::collection($users),
        ]);
    }

    public function listProjects(){

        $projects = Project::with(['user', 'category'])->get();

        return ApiResponse::success([
            'totalProjects' => $projects->count(),
            'projects' => ProjectResource::collection($projects),
        ]);
    }

    public function listServices(){

        $perPage = request()->query('per_page', 10); // 10 values por página
        $services = Service::paginate($perPage);

        return ApiResponse::success([
            'services' => ServiceResource::collection($services),
            'pagination' => [
                'currentPage' => $services->currentPage(),
                'lastPage' => $services->lastPage(),
                'perPage' => $services->perPage(),
                'total' => $services->total(),
            ]
        ]);
    }

    public function getUser($id){

        $user = User::find($id);
        if(!$user){
            return ApiResponse::error("User with ID {$id} not found.", 404);
        } 
        
        return ApiResponse::success([
            'user' => new UserResource($user)
        ]);
    }

    public function getCategory($id){

        $category = Category::find($id);
        if(!$category){
            return ApiResponse::error("Category with ID {$id} not found.", 404);
        } 
        
        return ApiResponse::success([
            'category' => new CategoryResource($category)
        ]);
    }

    public function getProject($id){

        $project = Project::find($id);
        if(!$project){
            return ApiResponse::error("Project with ID {$id} not found.", 404);
        } 
        
        return ApiResponse::success([
            'project' => new ProjectResource($project)
        ]);
    }

    public function getService($id){

        $service = Service::find($id);
        if(!$service){
            return ApiResponse::error("Service with ID {$id} not found.", 404);
        } 
        
        return ApiResponse::success([
            'service' => new ServiceResource($service)
        ]);
    }

    public function getProjectsByUser($id){

        $user = User::find($id);
        if(!$user){
            return ApiResponse::error("User with ID {$id} not found.", 404);
        }

        $projects = Project::where('user_id', $id)
                    ->get()
                    ->toResourceCollection(ProjectResource::class)
                    ->resolve();

        $projects = array_map(function($project){
            unset($project['user']);
            return $project;
        }, $projects);

        return ApiResponse::success([
            'user' => new UserResource($user),
            'totalProjects' => count($projects),
            'projects' => $projects,
        ]);
    }

    public function listServicesOrdered($field, $direction){
        $validFields = ['id', 'name', 'cost', 'project_id', 'created_at', 'updated_at'];
        $validDirections = ['asc', 'desc'];

        //validate field
        if(!in_array($field, $validFields)){
            return ApiResponse::error("Invalid field for ordering: {$field}.", 400);
        }
        //validate direction
        if(!in_array($direction, $validDirections)){
            return ApiResponse::error("Invalid direction for ordering: {$direction}.", 400);
        }

        $perPage = request()->query('per_page', 10);
        $services = Service::orderBy($field, $direction)
                    ->paginate($perPage);

        return ApiResponse::success([
            'services' => ServiceResource::collection($services),
            'pagination' => [
                'currentPage' => $services->currentPage(),
                'lastPage' => $services->lastPage(),
                'perPage' => $services->perPage(),
                'total' => $services->total(),
            ]
        ]);
    }

    public function createCategory(Request $request){
        $validateData = $request->validate([
            'name' => 'required|string|max:50|unique:categories,name',
            'cor' => 'required|string|max:7|unique:categories,cor',
        ]);

        $category = Category::create($validateData);

        return ApiResponse::success(
            new CategoryResource($category),
            'Category created successfully.',
            201
        );
    }

    public function createUser(Request $request){
        $validateData = $request->validate([
            'name' => 'required|string|max:100|unique:users,name',
            'email' => 'required|string|max:50|unique:users,email',
        ]);

        $category = Category::create($validateData);

        return ApiResponse::success(
            new CategoryResource($category),
            'Category created successfully.',
            201
        );
    }

    public function createProject(Request $request){
        $validateData = $request->validate([
            'name' => 'required|string|max:50|unique:projects,name',
            'budget' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'user_id' => 'required|exists:users,id',
        ]);

        $project = Project::create($validateData);

        return ApiResponse::success(
            new ProjectResource($project),
            'Project created successfully.',
            201
        );
    }

    public function createService(Request $request){
        
    }

    public function updateCategory(Request $request, $id){
        $category = Category::find($id);
        if(!$category){
            return ApiResponse::error("Category with ID {$id} not found.", 404);
        }

        $validateData = $request->validate([
            'name' => 'string|max:50|unique:categories,name,'.$id,
            'cor' => 'string|max:7|unique:categories,cor,'.$id,
        ]);

        $category->update($validateData);

        return ApiResponse::success(
            new CategoryResource($category),
            'Category updated successfully.',
            200
        );
    }

    public function updateProject(Request $request, $id){
        $project = Project::find($id);
        if(!$project){
            return ApiResponse::error("Project  with ID {$id} not found.", 404);
        }

        $validateData = $request->validate([
            'name' => 'string|max:50|unique:projects,name,'.$id,
            'budget' => 'numeric|min:0',
            'category_id' => 'exists:categories,id',
        ]);

        $project->update($validateData);

        return ApiResponse::success(
            new ProjectResource($project),
            'Project updated successfully.',
            200
        );
    }

    public function deleteCategory($id){

        $category = Category::find($id);

        if(!$category) {
            return ApiResponse::error("Category with ID {$id} not found.", 404);
        }

        $category->delete();

        return ApiResponse::success(
            [],
            "Category deleted successfully"
        );
    }

    public function deleteProject($id){

        $project = Project::find($id);

        if(!$project) {
            return ApiResponse::error("Project with ID {$id} not found.", 404);
        }

        $project->delete();

        return ApiResponse::success(
            [],
            "Project deleted successfully"
        );
    }

}
