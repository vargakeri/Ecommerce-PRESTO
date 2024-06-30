<?php

namespace App\Jobs;

use Exception;
use App\Models\Newsletter;
use App\Mail\SendNewsletter;
use Illuminate\Bus\Queueable;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use App\Mail\Exception as MailException;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendNewsletterJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
{
    $subject = "Newsletter Presto.it del ".date('F j, Y');
    try {
        // Recupera gli indirizzi email validi
        $userEmails = Newsletter::whereNotNull('email')->pluck('email');

        foreach ($userEmails as $email) {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                Log::info('Sending newsletter to: ' . $email);
                Mail::to($email)->send(new SendNewsletter($email, $subject));
            } else {
                Log::warning('Invalid email address: ' . $email);
            }
        }
    } catch (Exception $e) {
        
        Mail::to('admin@presto.it')->send(new MailException($e));
    }
}
}
