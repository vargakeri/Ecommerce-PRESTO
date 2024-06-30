<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class FrontController extends Controller
{
    protected $categories;

    public function __construct()
    {
        // Fetch the Site Settings object
        $this->categories = Category::all();
        View::share('categories', $this->categories);
    }
    public function welcome()
    {
        return view('homepage');
    }
    public function categoryShow(Category $category)
    {
        return view('categoryShow', compact('category'));
    }

    public function searchAnnouncements(Request $request)
    {
        $announcements_all = Announcement::search($request->searched)->where('is_accepted',true)->get();
        $announcements = Announcement::search($request->searched)->where('is_accepted',true)->orderBy('created_at','desc')->get();
        return view('announcements.index',compact('announcements','announcements_all'));
    }

    public function setLanguage($lang)
    {
        session()->put('locale',$lang);
        return redirect()->back();
    }
}
