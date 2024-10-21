<?php

namespace App\Http\Controllers;

use App\Repositories\SystemRepository;
use Illuminate\Support\Facades\DB;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use App\Repositories\PlayerRepository;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Support\Facades\Storage;

class SystemController extends Controller
{
    protected $systemRepository;

    public function __construct(SystemRepository $systemRepository)
    {
        $this->systemRepository = $systemRepository;
    }
    /**
     * Display the system's profile form.
     */
    public function edit()
    {
        $system = $this->systemRepository->find(1);
//        dd($system);
        return view('profile.edit', compact('system'));
    }

    /**
     * Update the system's profile information.
     */
    public function updateAvatar(ProfileUpdateRequest $request)
    {
        try {
            DB::beginTransaction();
            $data['logo'] = Storage::disk('public')->put('uploads', $request->file('logo'));
            $system = $this->systemRepository->find(1);
            if (isset($system->logo) && file_exists(public_path('storage/'.$system->logo))) {
                unlink(public_path('storage/'.$system->logo));
            }
            $system = $this->systemRepository->update($data, $system->id);
            DB::commit();
            if (!$system) {
                return redirect()->back()->with('error', __('Update Failed'));
            }
            return redirect()->back()->with('success', __('Updated Successfully'));
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }
}
