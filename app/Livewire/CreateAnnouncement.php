<?php

namespace App\Livewire;

use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use App\Jobs\RemoveFaces;
use App\Jobs\ResizeImage;
use App\Jobs\WatermarkLogo;
use App\Models\Announcement;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;


class CreateAnnouncement extends Component
{
    use WithFileUploads;
    public $title;
    public $body;
    public $price;
    public $category;
    public $validated;
    public $temporary_images;
    public $images = [];
    public $image;
    public $announcement;
    public $selectedImage = 0;


    protected $rules = [
        'title' => 'required|min:4',
        'body' => 'required|min:8',
        'category' => 'required',
        'price' => 'required|numeric|max:999999',
        'images.*' => 'image|max:2048',
        'temporary_images.*' => 'image|max:2048|mimes:png,jpg,jpeg,webp,gif,bmp,tiff',
    ];
    protected $messages = [
        'required' => 'il campo :attribute è richiesto',
        'min' => 'il campo :attribute è troppo corto',
        'numeric' => 'Il campo :attribute dev\'essere un numero',
        'max' => "Valore massimo di :attribute dev'essere massimo di dieci cifre.",
        'temporary_images.required' => "L'immagine è richiesta",
        'temporary_images.*.image' => "i file devono essere immagini",
        'temporary_images.*.max' => "L'immagine dev'essere al massimodi 2mb",
        'images.image' => "L'immagine deve essere un'immagine",
        'images.max' => "L'immagine dev'essere al massimo di 2mb",
    ];
    public function updatedTemporaryImages()
    {
        if ($this->validate([
            'temporary_images.*' => 'image|max:2048|mimes:png,jpg,jpeg,webp,gif,bmp,tiff'
        ])) {
            foreach ($this->temporary_images as $image) {
                $this->images[] = $image;
            }
        }
    }


    public function removeImage($key)
    {
        if (in_array($key, array_keys($this->images))) {
            unset($this->images[$key]);
            $this->images = array_values($this->images); // Reimposta gli indici delle immagini
        }
    }


    public function store()
    {
        $this->validate();

        $this->announcement = Category::find($this->category)->announcements()->create($this->validate());

        if (count($this->images)) {
            foreach ($this->images as $image) {
                //$this->announcement->images()->create(['path'=>$image->store('images','public')]);
                $newFileName = "announcements/{$this->announcement->id}";
                $newImage = $this->announcement->images()->create(['path' => $image->store($newFileName, 'public')]);

                RemoveFaces::withChain([
                    new WatermarkLogo($newImage->id),
                    new ResizeImage($newImage->path, 600, 500),
                    new GoogleVisionSafeSearch($newImage->id),
                    new GoogleVisionLabelImage($newImage->id),
                ])->dispatch($newImage->id);
            }

            File::deleteDirectory(storage_path('/app/livewire-tmp'));
        }
        Auth::user()->announcements()->save($this->announcement);

        $this->cleanForm();
        redirect()->route('announcements.create')->with('success', 'Annuncio inserito con successo, dopo la verifica sarà pubblicato!');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function cleanForm()
    {
        $this->title = '';
        $this->body = '';
        $this->price = '';
        $this->category = '';
        $this->images = [];
        $this->temporary_images = [];
    }

    public function render()
    {
        return view('livewire.create-announcement');
    }
}
