<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MatchFormRequest;
use App\Repositories\ClubRepository;
use App\Repositories\MatchRepository;
use App\Repositories\YardRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MatchController extends Controller
{
    protected $clubRepository;
    protected $yardRepository;
    protected $matchRepository;

    public function __construct(ClubRepository $clubRepository, YardRepository $yardRepository, MatchRepository $matchRepository) {
        $this->clubRepository = $clubRepository;
        $this->yardRepository = $yardRepository;
        $this->matchRepository = $matchRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $yards = $this->yardRepository->getNameAndIds();
        $clubs = $this->clubRepository->getNameAndIds();
        $matches = $this->matchRepository->filter($request->all());
        return view('admin.matches.index',compact('matches', 'yards', 'clubs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $yards = $this->yardRepository->getNameAndIds();
        $clubs = $this->clubRepository->getNameAndIds();
        return view('admin.matches.form', compact('clubs','yards'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MatchFormRequest $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->all();
            if ($request->hasFile('banner_club2')) {
                $data['banner_club2'] = Storage::disk('public')->put('uploads', $request->file('banner_club2'));
            }
            if ($request->hasFile('banner_club1')) {
                $data['banner_club1'] = Storage::disk('public')->put('uploads', $request->file('banner_club1'));
            }
            $this->matchRepository->create($data);
            DB::commit();
            return redirect()->route('matches.index')->with('success', 'Match has been created successfully!');
        } catch (\Exception $e) {
            DB::rollback();
            echo $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $match = $this->matchRepository->findOrFail($id);
        return view('admin.matches.show', compact('match'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $match = $this->matchRepository->findOrFail($id);
        $yards = $this->yardRepository->getNameAndIds();
        $clubs = $this->clubRepository->getNameAndIds();
        return view('admin.matches.form', compact('clubs','yards','match'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MatchFormRequest $request, string $id)
    {
        $data = $request->all();
        try {
            DB::beginTransaction();
            $match = $this->matchRepository->findOrFail($id);
            if ($request->hasFile('banner_club2')) {
                $data['banner_club2'] = Storage::disk('public')->put('uploads', $request->file('banner_club2'));
                if (file_exists('storage/' .$match->banner_club2) && $match->banner_club2) {
                    unlink('storage/' .$match->banner_club2);
                }
            }else {
                $data['banner_club2'] = $match->banner_club2;
            }
            if ($request->hasFile('banner_club1')) {
                $data['banner_club1'] = Storage::disk('public')->put('uploads', $request->file('banner_club1'));
                if (file_exists('storage/' .$match->banner_club1) && $match->banner_club1) {
                    unlink('storage/' .$match->banner_club1);
                }
            } else {
                $data['banner_club1'] = $match->banner_club1;
            }
            $this->matchRepository->update($data, $match->id);
            DB::commit();
            return redirect()->route('matches.index')->with('success', 'Match has been created successfully!');
        } catch (\Exception $e) {
            DB::rollback();
            echo $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

    }

    public function cancelMatch(string $id) {
        $this->matchRepository->cancelMatch($id);
        return redirect()->route('matches.index')->with('success', __('Match has been cancelled!'));
    }
}
