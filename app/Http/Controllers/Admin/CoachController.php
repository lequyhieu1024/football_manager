<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CoachFormRequest;
use App\Repositories\PlayerRepository;
use App\Repositories\CoachRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CoachController extends Controller
{
    protected $coachReposittory;
    protected $playerReposittory;

    public function __construct(CoachRepository $coachReposittory, PlayerRepository $playerReposittory)
    {
//        $this->middleware('permission:list_coach')->only(['index']);
//        $this->middleware('permission:create_coach')->only(['create', 'store']);
//        $this->middleware('permission:show_coach')->only(['show']);
//        $this->middleware('permission:update_coach')->only(['edit', 'update']);
//        $this->middleware('permission:destroy_coach')->only(['destroy']);
        $this->coachReposittory = $coachReposittory;
        $this->playerReposittory = $playerReposittory;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $coaches = $this->coachReposittory->getAll($request->all());
        return view('admin.coaches.index', compact('coaches'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.coaches.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CoachFormRequest $request)
    {
        $data = $request->all();
        if ($request->hasFile('avatar')) {
            $data['avatar'] = Storage::disk('public')->put('uploads', $request->file('avatar'));
        }
        $this->coachReposittory->create($data);
        return redirect()->route('coaches.index')->with('success', __('Created Successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $coachsHasClubs = $this->coachReposittory->getCoachHasClubs();
        $coach = $this->coachReposittory->findOrFail($id);
        return view('admin.coaches.form', compact('coach', 'coachsHasClubs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CoachFormRequest $request, string $id)
    {
        $data = $request->all();
        if ($request->hasFile('avatar')) {
            $data['avatar'] = Storage::disk('public')->put('uploads', $request->file('avatar'));
        }else {
            $data['avatar'] = $this->coachReposittory->findOrFail($id)->avatar;
        }
        $this->coachReposittory->update($data, $id);
        return redirect()->route('coaches.index')->with('success', __('Updated Successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $hasClub = $this->coachReposittory->isHasClub($id);
        if (empty($hasClub)) {
            $this->coachReposittory->delete($id);
            return redirect()->back()->with('success', __('Deleted Successfully'));
        } else {
            return redirect()->back()->with('error', __('Can not delete because coach has clubs'));
        }
    }
}
