<?php

namespace App\Http\Controllers\Admin;

use App\Exports\StudentsExport;
use App\Models\Club;
use Exception;
use App\Jobs\SendEmailJob;
use Illuminate\Http\Request;
use App\Imports\StudentsImport;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\ImportStudentExcelRequest;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Repositories\PlayerRepository;
use App\Http\Requests\PlayerFormRequest;
use App\Repositories\ClubRepository;
use App\Http\Requests\RegisterSubjectFormRequest;
use App\Http\Requests\ScoreFormRequest;

class PlayerController extends Controller
{
    protected $playerRepository;
    protected $clubRepository;

    /**
     * Display a listing of the resource.
     */
    public function __construct(PlayerRepository $playerRepository, ClubRepository $clubRepository)
    {
//        $this->middleware('permission:list_student')->only(['index']);
//        $this->middleware('permission:create_student')->only(['create', 'store']);
//        $this->middleware('permission:show_student')->only(['show']);
//        $this->middleware('permission:update_student')->only(['edit', 'update']);
//        $this->middleware('permission:destroy_student')->only(['destroy']);
//        $this->middleware('permission:update_score')->only(['editScore', 'updateScores']);
//        $this->middleware('permission:self_register_subject|register_subject')->only(['registerSubject', 'storeRegisterSubject']);
//        $this->middleware('permission:import_excel')->only(['import', 'getTemplate']);
        $this->playerRepository = $playerRepository;
        $this->clubRepository = $clubRepository;
    }

    public function index(Request $request)
    {
        $players = $this->playerRepository->filter($request->all());
        return view('admin.players.index', compact('players'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $is_disabled = false;
        $clubs = $this->clubRepository->getNameAndIds();
        return view('admin.players.form', compact('clubs','is_disabled'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PlayerFormRequest $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->all();
            if ($request->hasFile('avatar')) {
                $data['avatar'] = Storage::disk('public')->put('uploads', $request->file('avatar'));
            }
            $this->playerRepository->create($data);
            DB::commit();
            return redirect()->route('players.index')->with('success', __('Create Player Successfully'));
        } catch (Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $player = $this->playerRepository->findOrFail($id);
        $clubs = $this->clubRepository->getNameAndIds();
        $is_disabled = true;
        return view('admin.players.form', compact('player', 'is_disabled','clubs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $is_disabled = false;
        $player = $this->playerRepository->findOrFail($id);
        $clubs = $this->clubRepository->getNameAndIds();
        return view('admin.players.form', compact('player', 'clubs','is_disabled'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PlayerFormRequest $request, string $id)
    {
        try {
            DB::beginTransaction();
            $data = $request->all();
            if ($request->hasFile('avatar')) {
                $data['avatar'] = Storage::disk('public')->put('uploads', $request->file('avatar'));
                if ($this->playerRepository->findOrFail($id)->avatar && file_exists('storage/' . $this->playerRepository->findOrFail($id)->avatar)) {
                    unlink('storage/' . $this->playerRepository->findOrFail($id)->avatar);
                }
            } else {
                $data['avatar'] = $this->playerRepository->findOrFail($id)->avatar;
            }
            $this->playerRepository->update($data, $id);
            DB::commit();
            return redirect()->route('players.index')->with('success', __('Updated Player Successfully'));
        } catch (Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            DB::beginTransaction();
            if ($this->playerRepository->findOrFail($id)->avatar && file_exists('storage/' . $this->playerRepository->findOrFail($id)->avatar)) {
                unlink('storage/' . $this->playerRepository->findOrFail($id)->avatar);
            }
            $this->playerRepository->delete($id);
            DB::commit();
            return redirect()->back()->with('success', __('Delete Player Successfully'));
        } catch (Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }
    }

//    public function getGoal($playerId)
//    {
//        $score = $this->playerRepository->getScoreByStudentSubjectId($studentId, $subjectId);
//        return view('admin.players.update-score', compact('score', 'studentId', 'subjectId'));
//    }
}
