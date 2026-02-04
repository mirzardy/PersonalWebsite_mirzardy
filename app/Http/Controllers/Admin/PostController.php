<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::latest()->get()
        ]);
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:48',
            'excerpt' => 'required|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:png,jpg,jpeg',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('posts', 'public');
        }

        $data['slug'] = Str::slug($data['title']);
        $data['user_id'] = Auth::id();

        Post::create($data);

        return redirect('/admin/posts')->with('success', 'Post Created!');
    }

    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

   public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'title' => 'required|max:48',
            'excerpt' => 'required|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:png,jpg,jpeg'
        ]);

        if ($request->title !== $post->title) {
            $slug = Str::slug($request->title);

            // Pastikan slug unik
            $count = Post::where('slug', 'like', "{$slug}%")
                ->where('id', '!=', $post->id)
                ->count();

            $data['slug'] = $count ? "{$slug}-{$count}" : $slug;
        }

        if ($request->hasFile('image')) {
            // simpan file baru
            $data['image'] = $request->file('image')->store('posts', 'public');
        }

        $post->update($data);

        return redirect()->route('admin.posts.index')->with('success', 'Post Berhasil diupdate');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index')->with('success', 'Post berhasil dihapus');
    }
}
