<?php

namespace Modules\Job\app\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Resources\ApiResourceFactory;
use Modules\Job\app\DTO\CreateJobDTO;
use Modules\Job\app\DTO\UpdateJobDTO;
use Modules\Job\app\Http\Requests\StoreJobRequest;
use Modules\Job\app\Http\Requests\UpdateJobRequest;
use Modules\Job\app\Http\Resources\JobResource;
use Modules\Job\app\Http\Resources\JobDetailResource;
use Modules\Job\app\Services\JobService;

class JobController extends Controller
{
    public function __construct(
        private readonly JobService $jobs
    ) {}

    public function index(Request $request)
    {
        $jobs = $this->jobs
            ->list($request->integer('per_page') ?? 15)
            ->load('company');

        return ApiResourceFactory::collection(
            $jobs,
            JobResource::class
        );
    }

    public function show(int $id)
    {
        $job = $this->jobs
            ->get($id)
            ->load('company');

        return new JobDetailResource($job);
    }

    public function store(StoreJobRequest $request)
    {
        $job = $this->jobs
            ->create(CreateJobDTO::fromValidated($request->validated()))
            ->load('company');

        return response()->json(
            new JobDetailResource($job),
            201
        );
    }

    public function update(int $id, UpdateJobRequest $request)
    {
        $job = $this->jobs
            ->update($id, UpdateJobDTO::fromValidated($request->validated()))
            ->load('company');

        return new JobDetailResource($job);
    }

    public function destroy(int $id)
    {
        $this->jobs->delete($id);

        return response()->noContent();
    }
}
