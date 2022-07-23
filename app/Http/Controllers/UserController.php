<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * function beranda() merupakan function yang akan menampilkan halaman beranda, dimana function
     * ini akan mengambil data post berdasarkan yang paling terbaru diinput
     */

    public function beranda()
    {
        $posts = Post::with(['CommentModel' => function ($q) {
            return $q->orderBy('created_at', 'asc');
        }, 'CommentModel.UserModel', 'CommentModel.UserModel.ProfileModel'])->orderBy('created_at', 'desc')->get();
        return view('beranda.index', compact('posts'));
    }

    /**
     * function editProfileView() digunakan untuk menampilkan halaman edit profile
     */

    public function editProfileView()
    {
        return view('profile.editProfile');
    }

    /**
     * function updateProfile() digunakan untuk melakukan update terhadap profile user
     */

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'bio' => 'required',
        ]);

        try {
            $user = User::with('ProfileModel')->where('id', Auth::id())->first();
          
            $fileName = '';
            if ($request->hasFile('profile_avatar')) {
                $image = $request->profile_avatar;
                $dest = 'img';
                $fileName = 'img' . '_' . auth()->user()->id . date("YmdHis") . "." . $image->getClientOriginalExtension();
                $image->move($dest, $fileName);
            }
            $user->update([
                'name' => $request->name,
                'username' => $request->name,
                'email' => $request->email,
                
            ]);

            $user->ProfileModel()->update([
                'bio' => $request->bio,
                'profile_pict'=>$fileName
            ]);

            toast('Profile Berhasil diupdate', 'success');
            return back();
        } catch (Exception $e) {
            toast($e->getMessage(), 'error');
            return back();
        }
    }
}
