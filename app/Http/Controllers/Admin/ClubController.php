<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\CoachRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ClubRepository;
use App\Http\Requests\ClubFormRequest;
use Illuminate\Support\Facades\Storage;

class ClubController extends Controller
{
    protected $clubRepository;
    protected $coachRepository;

    public function __construct(ClubRepository $clubRepository, CoachRepository $coachRepository)
    {
//        $this->middleware('permission:list_department')->only(['index']);
//        $this->middleware('permission:create_department')->only(['create', 'store']);
//        $this->middleware('permission:show_department')->only(['show']);
//        $this->middleware('permission:update_department')->only(['edit', 'update']);
//        $this->middleware('permission:destroy_departmentc')->only(['destroy']);
        $this->clubRepository = $clubRepository;
        $this->coachRepository = $coachRepository;
    }

    public function index(Request $request)
    {

        $clubs = $this->clubRepository->getAll($request->all());
        return view('admin.clubs.index', compact('clubs'));
    }

    public function create()
    {
        $coaches = $this->coachRepository->getNameAndIds();
        return view('admin.clubs.form', compact('coaches'));
    }

    public function store(ClubFormRequest $request)
    {
        $data = $request->all();
        if ($request->hasFile('logo')) {
            $data['logo'] = Storage::disk('public')->put('uploads', $request->file('logo'));
        }
        $this->clubRepository->create($data);
        return redirect()->route('clubs.index')->with('success', __('Created Successfully'));
    }

    public function edit($id)
    {
        $coaches = $this->coachRepository->getNameAndIds();
        $club = $this->clubRepository->findOrFail($id);
        return view('admin.clubs.form', compact('club','coaches'));
    }

    public function update(ClubFormRequest $request, $id)
    {
        $data = $request->all();
        $club = $this->clubRepository->findOrFail($id);
        if ($request->hasFile('logo')) {
            $data['logo'] = Storage::disk('public')->put('uploads', $request->file('logo'));
            if (file_exists('storage/' . $club->logo) AND !empty($club->logo)) {
                unlink('storage/' . $club->logo);
            }
        } else {
            $data['logo'] = $club->logo;
        }
        $this->clubRepository->update($data, $id);
        return redirect()->route('clubs.index')->with('success', __('Updated Successfully'));
    }

    public function destroy($id)
    {
        $this->clubRepository->delete($id);
        return redirect()->back()->with('success', __('Deleted Successfully'));
    }
}
