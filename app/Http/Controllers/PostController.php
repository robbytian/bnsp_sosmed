<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Exception;
use App\Models\Post;
use Dotenv\Util\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * function store() digunakan untuk menambahkan data post baru
     */

    public function store(Request $request)
    {
        $request->validate([
            'text_post' => 'required|max:250',
            'image' => 'mimes:jpeg,png',
            'file' => 'max:10240',
        ]);

        try {
            $hashtags = [];

            //method regular expression untuk mencari kata yang diawali #
            preg_match_all('/#(\w+)/', $request->text_post, $hashtags);

            $pictureName = '';
            $fileName = '';

            //mengecek apakah ada inputan image
            if ($request->hasFile('image')) {
                $image = $request->image;
                $dest = 'img';
                $pictureName = 'img' . '_' . auth()->user()->id . date("YmdHis") . "." . $image->getClientOriginalExtension();
                $image->move($dest, $pictureName);
            }

            //mengecek apakah ada inputan file
            if ($request->hasFile('file')) {
                $image = $request->file;
                $dest = 'file';
                $fileName = 'file' . '_' . auth()->user()->id . date("YmdHis") . "." . $image->getClientOriginalExtension();
                $image->move($dest, $fileName);
            }
            $post = Post::create([
                'text' => $request->text_post,
                'user_id' => Auth::id(),
                'picture' => $pictureName,
                'file' => $fileName,
            ]);

            $post->attachTags($hashtags[1]);

            toast('Post Berhasil Dikirim', 'success');
            return back();
        } catch (Exception $e) {
            toast($e->getMessage(), 'error');
            return back();
        }
    }

    /**
     * function show() digunakan untuk menampilkan data detail dari suatu post, function ini
     * memerulkan 1 parameter yaitu id post
     */

    public function show($id)
    {
        $post =  Post::with(['CommentModel', 'CommentModel.UserModel', 'CommentModel.UserModel.ProfileModel'])->where('id', $id)->first();
        return view('post.detailPost', compact('post'));
    }

    /**
     * function explore digunakan untuk mencari postingan atau komentar berdasarkan hashtag
     */

    public function explore(Request $request)
    {
        $posts = [];
        $comments = [];
        if (!empty($request->get('hashtag'))) {
            $hashtag = $request->get('hashtag');

            //mengecek apabila data request hashtag diawali dengan #, maka symbol # akan dihilangkan
            if (Str::substr($hashtag, 0, 1) == '#') {
                $hashtag = str_replace('#', '', $hashtag);
            }

            //mencari data post yang sesuai dengan tag yang diinputkan
            $posts = Post::withAnyTags([$hashtag])->get();

            //mencari data komentar yang sesuai dengan tag yang diinputkan
            $comments = Comment::with('PostModel')->withAnyTags([$hashtag])->get();
        }
        return view('post.explorePost', compact('posts', 'comments'));
    }

    /**
     * function delete() digunakan untuk menghapus suatu data post, function ini memerlukan 1
     * parameter yaitu id post
     */

    public function delete($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        toast('Post Berhasil Dihapus', 'success');
        return back();
    }

    /**
     * function update() digunakan untuk mengedit suatu data post, function ini memerlukan 1
     * parameter yaitu id post
     */

    public function update(Request $request, $id)
    {
        $request->validate([
            'text_post' => 'required|max:250',
            'image' => 'mimes:jpeg,png,jpg',
            'file' => 'max:10240',
        ]);

        try {
            $post = Post::findOrFail($id);
            $hashtags = [];

            //method regular expression untuk mencari kata yang diawali #
            preg_match_all('/#(\w+)/', $request->text_post, $hashtags);

            $pictureName = $post->picture;
            $fileName = $post->file;

            //mengecek apakah ada inputan image
            if ($request->hasFile('image')) {
                $image = $request->image;
                $dest = 'img';
                $pictureName = 'img' . '_' . auth()->user()->id . date("YmdHis") . "." . $image->getClientOriginalExtension();
                $image->move($dest, $pictureName);
            }

            //mengecek apakah ada inputan file
            if ($request->hasFile('file')) {
                $image = $request->file;
                $dest = 'file';
                $fileName = 'file' . '_' . auth()->user()->id . date("YmdHis") . "." . $image->getClientOriginalExtension();
                $image->move($dest, $fileName);
            }
            $post->update([
                'text' => $request->text_post,
                'picture' => $pictureName,
                'file' => $fileName,
            ]);
            $post->tags()->detach();
            $post->attachTags($hashtags[1]);

            toast('Post Berhasil Diupdate', 'success');
            return back();
        } catch (Exception $e) {
            toast($e->getMessage(), 'error');
            return back();
        }
    }
}
