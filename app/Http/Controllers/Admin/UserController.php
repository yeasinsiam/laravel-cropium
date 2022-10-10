<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUserPostRequest;
use App\Http\Requests\UpdateUserPutRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $search = request('search');


        $users = User::whereNotIn('id',  [auth()->id()])
            ->where('name', 'like', '%' . $search . '%')
            ->orWhere('email', 'like', '%' . $search . '%')
            ->orderByDesc('id')
            ->paginate(10)
            ->withQueryString();




        // $usersList = $users->filter(function ($user) {
        //     return $user->id !== auth()->id();
        // });




        $activeMenu = ['user', 'all-users'];

        return view('pages.admin.user.users', compact('users',  'search', 'activeMenu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $activeMenu = ['user', 'create-user'];

        return view('pages.admin.user.create', compact("activeMenu"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegisterUserPostRequest $request)
    {

        // Add new photo
        $photo_file = $this->storePhotoFile();

        User::create(array_merge($request->all(), [
            'photo' => $photo_file->hashName(),
            'email_verified_at' => Carbon::now(),
        ]));


        return back()->with('success-message', 'User Created Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

        $activeMenu = ['user', 'all-users'];

        return view('pages.admin.user.edit-user', compact('user', 'activeMenu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserPutRequest $request, User $user)
    {



        $allRequestedValue = $request->all();


        if ($request->photo) {
            // Delete  old photo
            $this->deletePhotoFile($user);

            // Add new photo
            $photo_file = $this->storePhotoFile();

            $allRequestedValue['photo'] = $photo_file->hashName();
        }

        $user->update($allRequestedValue);

        return back()->with('success-message', 'User Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->deletePhotoFile($user);
        $user->delete();
        return back()->with('success-message', 'User removed successfully!');
    }


    /**
     * Store photo file from file object
     *
     * @return Illuminate\Http\UploadedFile
     */
    public function storePhotoFile()
    {
        $photo = request()->file('photo');
        $photo->storeAs('/public/user-photos/', $photo->hashName());
        return $photo;
    }


    /**
     * Delete photo file from storage
     *
     * @param  \App\Models\User  $user
     * @return Void
     */
    public function deletePhotoFile($user)
    {
        Storage::delete('/public/user-photos/' . $user->photo);
    }
}