<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Newsletter;
use Illuminate\Http\Request;
use App\Jobs\SendNewsletterJob;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\NewsletterRequest;

class NewsletterController extends Controller
{
    public function addEmail(NewsletterRequest $request){

        Newsletter::create($request->all());
        return redirect()->back()->with(['success'=>'Ti sei iscritto con successo alla nostra newsletter!']);
    }
    public function sendNewsletter(){
        SendNewsletterJob::dispatch();
        return redirect()->route('homepage');
    }
    public function sendContact(Request $request){

        $data = $request->all();

        if($data['email']==''){
            return redirect()->back()->with('delete','I campi inseriti non posso essere vuoti');
        }


        Mail::to('admin@presto.it')->send(new ContactMail($data['name'],$data['email'],$data['body'],$data['order_number'],$data['telephone_number']));

        return redirect()->back()->with('success','Il form è stato inviato correttamente');
    }
}
