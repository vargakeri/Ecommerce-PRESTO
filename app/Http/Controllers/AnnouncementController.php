<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class AnnouncementController extends Controller
{

    public function createAnnouncement()
    {
        return view('announcements.create');
    }

    public function showAnnouncement(Announcement $announcement)
    {
        return view('announcements.show', compact('announcement'));
    }
    public function indexAnnouncement()
    {
        $announcements_all = Announcement::where('is_accepted', true)->get();
        $announcements = Announcement::where('is_accepted', true)->orderBy('created_at','desc')->paginate(6);
        return view('announcements.index', compact('announcements','announcements_all'));
    }
    public function addToFavorites(Announcement $announcement)
    {
        $user = auth()->user();


            $user->favoriteAnnouncements()->attach($announcement);
            return redirect()->back()->with('success', 'Annuncio aggiunto ai preferiti!');

    }
    public function removeFromFavorites (Announcement $announcement)
    {
        $user = auth()->user();
        $user->favoriteAnnouncements()->detach($announcement);
        return redirect()->back()->with('messageref', 'Annuncio rimosso dai preferiti!');
    }

    public function showFavorites()
    {
        $user = auth()->user();
        $announcements = $user->favoriteAnnouncements()->orderBy('created_at','desc')->paginate(6);
        $announcements_all = $user->favoriteAnnouncements()->get();

        return view('announcements.index', compact('announcements','announcements_all'));
    }

    public function deleteAnnouncement(Announcement $announcement)
    {
        $announcement->delete();
        File::deleteDirectory(storage_path('app/public/announcements/'.$announcement->id));
        return back()->with('messageref', 'Annuncio eliminato con successo!');
    }


public function showUserProfile()
  {
      if (Auth::check()) {
          $user = Auth::user();
          $announcements = $user->announcements()->orderBy('created_at', 'desc')->paginate(6);
          $announcements_all = $user->announcements()->get();

          return view('userProfile', compact('user', 'announcements', 'announcements_all'));
      } else {
          return redirect()->route('login');
      }
  }
  public function indexAnnouncementTimeAsc()
    {
        $announcements_all = Announcement::where('is_accepted', true)->get();
        $announcements = Announcement::where('is_accepted', true)->orderBy('created_at')->paginate(6);
        return view('announcements.index', compact('announcements','announcements_all'));
    }
    public function indexAnnouncementPriceDesc()
    {
        $announcements_all = Announcement::where('is_accepted', true)->get();
        $announcements = Announcement::where('is_accepted', true)->orderBy('price','desc')->paginate(6);
        return view('announcements.index', compact('announcements','announcements_all'));
    }
    public function indexAnnouncementPriceAsc()
    {
        $announcements_all = Announcement::where('is_accepted', true)->get();
        $announcements = Announcement::where('is_accepted', true)->orderBy('price')->paginate(6);
        return view('announcements.index', compact('announcements','announcements_all'));
    }


}
