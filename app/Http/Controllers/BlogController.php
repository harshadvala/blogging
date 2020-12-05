<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class BlogController
 * @package App\Http\Controllers
 */
class BlogController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $blogs = Blog::with(['user'])
            ->orderBy('publication_date', $request->get('orderBy', 'desc'))
            ->paginate(10)
            ->appends($request->except('page'));

        return view('blogs.index', ['blogs' => $blogs]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function myBlogs(Request $request)
    {
        $blogs = Blog::with(['user'])
            ->orderBy('publication_date', $request->get('orderBy', 'desc'))
            ->where('user_id', Auth::id())
            ->paginate(10)
            ->appends($request->except('page'));

        return view('blogs.my-blogs', ['blogs' => $blogs]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('blogs.create');
    }

    /**
     * @param BlogRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Database\Eloquent\MassAssignmentException
     */
    public function store(BlogRequest $request)
    {
        $blog = new Blog();
        $blog->fill($request->all());
        $blog->publication_date = Carbon::now();
        $blog->user_id = Auth::id();
        $blog->save();

        return redirect()->route('home');
    }
}
