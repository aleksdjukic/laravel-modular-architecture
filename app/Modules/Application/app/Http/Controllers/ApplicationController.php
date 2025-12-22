<?php

namespace Modules\Application\app\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Resources\ApiResourceFactory;
use Modules\Application\app\DTO\ApplyForJobDTO;
use Modules\Application\app\Enums\ApplicationStatus;
use Modules\Application\app\Http\Requests\ApplyForJobRequest;
use Modules\Application\app\Http\Requests\UpdateApplicationStatusRequest;
use Modules\Application\app\Http\Resources\ApplicationResource;
use Modules\Application\app\Services\ApplicationService;

class ApplicationController extends Controller
{
    use AuthorizesRequests;

    public function __construct(
        private readonly ApplicationService $applications
    ) {}

    public function index(Request $request)
    {
        $jobId   = $request->integer('job_id');
        $perPage = $request->integer('per_page') ?? 15;

        $items = $this->applications
            ->list($perPage, $jobId)
            ->load(['job.company']);

        return ApiResourceFactory::collection(
            $items,
            ApplicationResource::class
        );
    }

    public function show(int $id)
    {
        $application = $this->applications
            ->find($id)
            ->load(['job.company']);

        // $this->authorize('manage', $application);

        return new ApplicationResource($application);
    }

    public function store(ApplyForJobRequest $request)
    {
        $application = $this->applications
            ->apply(ApplyForJobDTO::fromValidated($request->validated()))
            ->load(['job.company']);

        return response()->json(
            new ApplicationResource($application),
            201
        );
    }

    public function updateStatus(UpdateApplicationStatusRequest $request, int $id)
    {
        $status = ApplicationStatus::from(
            $request->validated()['status']
        );

        $application = $this->applications
            ->updateStatus($id, $status)
            ->load(['job.company']);

        // $this->authorize('manage', $application);

        return new ApplicationResource($application);
    }

    public function destroy(int $id)
    {
        $this->applications->delete($id);

        return response()->noContent();
    }
}
