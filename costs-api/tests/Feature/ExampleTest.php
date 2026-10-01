<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Category;
use App\Models\Project;
use App\Models\Service;
use Illuminate\Support\Str;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/api/v1/status');

        $response->assertStatus(200);
    }

    public function test_models_use_uuid_and_relationships(): void
    {
        $user = User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('secret'),
            'authorization' => 'user',
        ]);

        $this->assertTrue(Str::isUuid($user->id));

        $category = Category::create([
            'name' => 'Dev',
            'cor' => '#000000',
        ]);

        $this->assertTrue(Str::isUuid($category->id));

        $project = new Project();
        $project->name = 'Test Project';
        $project->budget = 1000;
        $project->cost = 500;
        $project->user_id = $user->id;
        $project->category_id = $category->id;
        $project->save();

        $this->assertTrue(Str::isUuid($project->id));
        $this->assertEquals($user->id, $project->user->id);
        $this->assertEquals($category->id, $project->category->id);

        $service = new Service();
        $service->name = 'Test Service';
        $service->description = 'Desc';
        $service->cost = 200;
        $service->project_id = $project->id;
        $service->save();

        $this->assertTrue(Str::isUuid($service->id));
        $this->assertEquals($project->id, $service->project->id);

        $projectsResponse = $this->get('/api/v1/projects');
        $projectsResponse->assertStatus(200);
        $projectsResponse->assertJsonStructure([
            'status',
            'data' => [
                'totalProjects',
                'projects' => [
                    '*' => [
                        'name',
                        'budget',
                        'cost',
                        'id',
                        'user' => ['name', 'id'],
                        'category' => ['name', 'id'],
                    ]
                ]
            ]
        ]);
    }
}
