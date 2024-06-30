## TNTSEARCH
## installazione
composer require laravel/scout
## se non c'è la pubblicazione del vendor
php artisan vendor:publish --provider="Laravel\Scout\ScoutServiceProvider"
composer require teamtnt/laravel-scout-tntsearch-driver
## per indicizzare le ricerche dare da terminale:
php artisan scout:flush "App\Models\Announcement"
## poi
php artisan scout:import "App\Models\Announcement"

## User5
- php artisan storage:link
- php artisan migrate

## User 6
## Solo la prima volta, assicurati che l'estensione GD sia abilitata nel tuo ambiente PHP. Puoi farlo controllando il file php.ini e assicurandoti che la riga seguente sia scommentata (senza il punto e virgola all'inizio):
- extension=gd
## poi
- riavvia il computer
- crea una cartella in app/public chiamata announcements e una images in cui mettere un file immagine di default: default.jpg
- composer require spatie/image
- composer require intervention/image
## da un altro terminale:
- composer update
## se non si ha la tabella jobs
- php artisan queue:table
- php artisan migrate
## file .env modificare la riga QUEUE_CONNECTION:
- QUEUE_CONNECTION=database
## .gitignore:
- aggiungere una riga con: /storage/*.index
## Da fare sempre: nuovo terminale, lanciare il comando seguente e lasciarlo attivo (apri un altro terminale)
- php artisan queue:work
(per chiudere ctrl+c)

## user 4
- composer require outhebox/blade-flags
- php artisan vendor:publish --tag=blade-flags-config
  