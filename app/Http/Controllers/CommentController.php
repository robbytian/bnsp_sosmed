<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * function store() digunakan untuk menambahkan komentar pada suatu postingan,
     * function ini memerlukan parameter id post
     */

    public function store(Request $request, $id)
    {
        $request->validate([
            'comment' => 'required|max:250',
            'image' => 'mimes:jpeg,png',
            'file' => 'max:10240',
        ]);

        try {
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
            $hashtags = null;

            //method regular expression untuk mencari kata yang diawali #
            preg_match_all('/#(\w+)/', $request->comment, $hashtags);
            $comment = Comment::create([
                'text' => $request->comment,
                'user_id' => Auth::id(),
                'post_id' => $id,
                'picture' => $pictureName,
                'file' => $fileName,
            ]);

            $comment->attachTags($hashtags[1]);

            toast('Komentar Berhasil Dikirim', 'success');
            return back();
        } catch (Exception $e) {
            toast($e->getMessage(), 'error');
            return back();
        }
    }

    /**
     * function delete digunakan untuk mengahapus data komentar, function ini memerlukan 1 buah
     * parameter yaitu id post
     */

    public function delete($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();
        toast('Comment Berhasil Dihapus', 'success');
        return back();
    }

    /**
     * function update digunakan untuk mengubah data komentar, function ini memerlukan 1 buah
     * parameter yaitu id post
     */

    public function update(Request $request, $id)
    {
        $request->validate([
            'comment' => 'required|max:250',
            'image' => 'mimes:jpeg,png',
            'file' => 'max:10240',
        ]);

        try {
            $comment = Comment::findOrFail($id);
            $hashtags = [];

            //method regular expression untuk mencari kata yang diawali #
            preg_match_all('/#(\w+)/', $request->comment, $hashtags);

            $pictureName = $comment->picture;
            $fileName = $comment->file;

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
            $comment->update([
                'text' => $request->comment,
                'picture' => $pictureName,
                'file' => $fileName,
            ]);
            $comment->tags()->detach();
            $comment->attachTags($hashtags[1]);

            toast('Komentar Berhasil Diupdate', 'success');
            return back();
        } catch (Exception $e) {
            toast($e->getMessage(), 'error');
            return back();
        }
    }
}
