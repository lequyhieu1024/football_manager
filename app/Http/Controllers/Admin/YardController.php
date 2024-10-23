<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\ImageRepository;
use App\Repositories\YardRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class YardController extends Controller
{
    protected $yardRepository;
    protected $imageRepository;

    public function __construct(YardRepository $yardRepository, ImageRepository $imageRepository)
    {
        $this->yardRepository = $yardRepository;
        $this->imageRepository = $imageRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $yards = $this->yardRepository->getAll($request->all());
        return view('admin.yards.index', compact('yards'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.yards.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $rules = [
                'name' => 'required',
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $yard = $this->yardRepository->create($request->all());
            if ($request->hasFile('thumbnail')) {
                $this->imageRepository->createImage($yard->id, $request->all());
            }
            DB::commit();
            return redirect()->route('yards.index')->with('success', 'Yard has been created successfully.');
        }catch (\Exception $e){
            DB::rollBack();
            echo $e->getMessage();
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $yard = $this->yardRepository->findOrFail($id);
        return view('admin.yards.form', compact('yard'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
