<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class MakeUserRevisor extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'presto:makeUserRevisor {email}'; //la signature indica come viene lanciato questo comando

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Rendi un utente revisore'; //descrizione di questo comando


    /**
     * Execute the console command.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function handle()            //handle prende l'utente tramite la sua mail, se l'utente viene trovato viene cambiato il suo stato di revisore 
    {
        $user = User::where('email', $this->argument('email'))->first();
        if (!$user) {
            $this->error('Utente non trovato');
            return;
        }

        $user->is_revisor = true;
        $user->save();
        $this->info("L'utente {$user->name} è ora un revisore.");
    }
}
