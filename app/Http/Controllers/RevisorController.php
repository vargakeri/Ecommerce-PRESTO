<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\BecomeRevisor;
use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

class RevisorController extends Controller
{

  public function index()
  {
      $announcements_to_check_all = Announcement::whereNull('is_accepted')->get();
      $announcements_to_check = Announcement::whereNull('is_accepted')->orderBy('created_at','desc')->paginate(1);
      return view('revisor.index', compact('announcements_to_check','announcements_to_check_all'));
  }


    public function acceptAnnouncement(Announcement $announcement)
    {
        $announcement->setAccepted(true);
        return redirect()->back()->with('message', " L'annuncio è stato accettato!");
    }

    public function rejectAnnouncement(Announcement $announcement)
    {
        $announcement->setAccepted(false);
        return redirect()->back()->with('messageref', " L'annuncio è stato rifiutato!");
    }

    public function becomeRevisor()
    {
        Mail::to('admin@presto.it')->send(new BecomeRevisor(Auth::user()));
        return redirect()->back()->with('message', "Complimenti! Hai richiesto di diventare revisore correttamente.");
    }

    public function makeRevisor(User $user)
    {
        Artisan::call('presto:makeUserRevisor', ["email" => $user->email]);
        return redirect('/')->with('message', "Complimenti! Sei diventato revisore.");
    }

}
