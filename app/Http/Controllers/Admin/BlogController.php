<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    //
    public function addBlog()
    {
        return view('admin.blog.add_blog');
    }

    public function saveBlog(Request $request)
    {
        //from validation
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image',
        ], [
            'title.required' => 'Blog title is required.',
            'description.required' => 'Blog description is required.',
        ]);

        //image upload
        if ($request->image) {
            $image = $request->image;
            $imageName = rand() . '.' . $image->getClientOriginalName();
            $image->move('upload/blog_images/', $imageName);
            $imageUrl = 'upload/blog_images/' . $imageName;
        }
        $blog = new Blog();
        $blog->user_id = Auth::user()->id;
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->image =  $imageUrl;
        $blog->save();
        return redirect()->back()->with('message', 'Blog created successfully');
    }


    public function manageBlog()
    {
        $Blogs = Blog::orderBy('id', 'desc')->get();
        return view('admin.blog.manage_blog', compact('Blogs'));
    }

    public function editBlog($id)
    {
        $Blog = Blog::find($id);
        return view('admin.blog.edit_blog', compact('Blog'));
    }

    public function updateBlog(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ], [
            'title.required' => 'Blog title is required.',
            'description.required' => 'Blog description is required.',
        ]);

        $blog = Blog::find($request->id);

        //image upload
        if ($request->image) {
            if (File::exists($blog->image)) {
                unlink($blog->image);
            }
            $image = $request->image;
            $imageName = rand() . '.' . $image->getClientOriginalName();
            $image->move('upload/blog_images/', $imageName);
            $imageUrl = 'upload/blog_images/' . $imageName;
            $blog->image =  $imageUrl;
        }
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->save();
        return redirect()->route('admin.manage.blog')->with('message', 'Blog Updated successfully');
    }


    public function deleteBlog($id)
    {
        $blog = Blog::find($id);
        if (File::exists($blog->image)) {
            unlink($blog->image);
        }

        $blog->delete();
        return redirect()->back()->with('message', 'Blog Deleted successfully');
    }
}
