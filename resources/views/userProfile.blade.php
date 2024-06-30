<x-layout>
    <div class="headerImage">

        <div id="cercaDati" class="cerca">
            <form action="{{ route('announcements.search') }}" method="GET">
                <input
                    style="font-size: 20px; font-family: CormorantGaramond; background-color: rgba(255, 255, 255, 0); "
                    type="search" placeholder=" cerca.." name="searched">
                <button type="submit"><i style="color: white; background-color: #2c2c2c; height: 100%;"
                        class="bi bi-search"></i></button>
            </form>
        </div>
    </div>

    <div style="border-top:#2c2c2c 1px solid;height:auto ">
        @if (session()->has('messageref'))
            <h2 id="errorMessage"
                style="background-color:#ab3131;color: #ebeaea;border-radius: 0px;margin:0px;;font-family: CormorantGaramond; opacity: 1; transition: opacity 1s;"
                class="alert alert-danger">{{ session('messageref') }}</h2>
        @endif
        @if (session('status') === 'profile-information-updated')
            <h2 id="successMessage"
                style="background-color:#0C6B37;color: #ebeaea;border-radius: 0px;margin:0px;;font-family: CormorantGaramond; opacity: 1; transition: opacity 1s;"
                class="alert alert-danger">Hai aggiornato correttamente il profilo</h2>
        @endif
        @if (session('status') === 'password-updated')
            <h2 id="successMessage"
                style="background-color:#0C6B37;color: #ebeaea;border-radius: 0px;margin:0px;;font-family: CormorantGaramond; opacity: 1; transition: opacity 1s;"
                class="alert alert-danger">Hai aggiornato correttamente la password</h2>
        @endif
        <x-success></x-success>
    </div>

    <div style="width: 100%; ;height: 50px; ">








        <h1 style="width: 100%; text-align: center; padding-top: 20px;  font-family: CormorantGaramond; ">DATI PERSONALI
        </h1>





    </div>
    <div style="border-top:#2c2c2c00 1px solid;height: auto; margin-bottom: 100px; margin-top:100px; ">
        <div style="width:80%; max-width:1000px;" class="container text-center">
            <div style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;" class="row">

                <div class="col-12 col-md-5 col-lg-4 col-ml-4 col-sm-12 p-0">
                    <div class="boxUserLeft">
                        <div>
                            <img style="object-fit: cover; border-radius: 100%;"
                                src="{{ Auth::user()->profile_photo_path !== null ? Auth::user()->getUrl(150, 150) : Storage::url('images/user.jpg') }}"
                                height="150px" width="150px" alt="">
                        </div>
                        <h3 style="color: #e9e9e9; font-family: CormorantGaramond; font-size: 30px;margin-top:5px">
                            {{ Auth::user()->name }}</h3>
                        <div id="infoPers" onclick="color('infoPers'); mostraContenuto('InfoPers');" class="infoPers"
                            style="display: flex; margin-top: 30px;">
                            <i style="margin-right: 20px;" class="bi bi-person"></i>
                            <a style="text-align:start">Informazioni personali</a>
                        </div>
                        <div id="myArticle" onclick="color('myArticle');mostraContenuto('MyArticle')" class="myArticle"
                            style="display: flex; margin-top: 30px">
                            <i style="margin-right: 20px;" class="bi bi-newspaper"></i>
                            <a style="text-align:start">I miei articoli</a>
                        </div>

                        <div id="setInfoPers" onclick="color('setInfoPers');mostraContenuto('SetInfoPers')"
                            class="setInfoPers" style="display: flex; margin-top: 30px">
                            <i style="margin-right: 20px;" class="bi bi-gear-wide-connected"></i>
                            <a style="text-align:start">Impostazioni dell'account</a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-7 col-lg-8 col-ml-8 col-sm-12 p-0">
                    <div class="boxContent boxInfoPers">
                        <h2 class="h2BoxProfile">Informazioni personali</h2>
                        <div class="mb-3">

                            <label style="text-align: start; width: 100%;margin-top:20px" for="name"
                                class="block text-sm font-medium text-gray-700 p-0">Nome e Cognome</label>
                            <p
                                style="height: auto;padding:5px 0px; width:100% ;border-bottom:#ababab 0.8px solid;margin:0px;text-align:start;;font-family:CoromorantGaramond  ">
                                {{ Auth::user()->name }}</p>

                            <label style="text-align: start; width: 100%;margin-top:20px" for="name"
                                class="block text-sm font-medium text-gray-700 p-0">Email</label>
                            <p
                                style="height: auto;padding:5px 0px; width:100% ;border-bottom:#ababab 0.8px solid;margin:0px;text-align:start;;font-family:CoromorantGaramond  ">
                                {{ Auth::user()->email }}</p>






                            <div style="display: flex; justify-content: space-between;">
                                <div style="width: 45%">
                                    <label style="text-align: start; width: 100%;margin-top:20px" for="name"
                                        class="block text-sm font-medium text-gray-700 p-0">Data creazione account</label>
                                    <p
                                        style="height: auto;padding:5px 0px; width:100% ;border-bottom:#ababab 0.8px solid;margin:0px;text-align:start;;font-family:CoromorantGaramond  ">
                                        {{ Auth::user()->created_at }}</p>


                                </div>
                                <div style="width: 45%;">

                                    <label style="text-align: start; width: 100%;margin-top:20px" for="name"
                                        class="block text-sm font-medium text-gray-700 p-0">Telefono</label>
                                    <p
                                        style="height: auto;padding:5px 0px; width:100% ;border-bottom:#ababab 0.8px solid;margin:0px;text-align:start;;font-family:CoromorantGaramond  ">
                                        {{ Auth::user()->telephone_number ?? '+39 0471 1655928' }}</p>


                                </div>
                            </div>
                            <h5
                                style="font-family:CoromorantGaramond;font-size:20px;text-align:start;margin-top:30px ;">
                                <strong>Informazioni sugli annunci</strong></h5>
                            <div style="display:flex;width:100%; justify-content:space-around;margin-top:20px">
                                <div style="display: flex;flex-direction:column">
                                    @php     $userAnnouncementCount = 0;        @endphp
                                    @foreach ($announcements as $announcement)
                                        @if ($announcement->is_accepted && $announcement->user_id == auth()->id())
                                            @php          $userAnnouncementCount++;     @endphp
                                        @endif
                                    @endforeach
                                    <i style="font-size: 30px;cursor: default;" class="bi bi-file-earmark-text"></i>
                                    <h5 style="font-family:CoromorantGaramond;font-size:17px ">Articoli publicati</h5>
                                    <p style="margin: 0px"> {{ $userAnnouncementCount }}</p>
                                </div>


                                <div style="display: flex;flex-direction:column">

                                    @foreach ($announcements as $announcement)
                                        @if ($announcement->is_accepted && $announcement->user_id == auth()->id())
                                            @php          $userAnnouncementCount++;     @endphp
                                        @endif
                                    @endforeach

                                    <i style="font-size: 30px;color: #d73d3d;cursor: default;"
                                        class="bi bi-suit-heart-fill"></i>
                                    <h5 style="font-family:CoromorantGaramond;font-size:17px ">Articoli preferiti</h5>
                                    <p style="margin: 0px">{{ auth()->user()->favoriteAnnouncements->count() }}</p>
                                </div>



                                <div style="display: flex;flex-direction:column">
                                    @php
                                        $pendingAnnouncementsCount = $announcements
                                            ->where('is_accepted', false)
                                            ->count();
                                    @endphp
                                    <i style="font-size: 30px;cursor: default;" class="bi bi-file-earmark-excel"></i>
                                    <h5 style="font-family:CoromorantGaramond;font-size:17px ">Articoli da revisionare
                                    </h5>
                                    <p style="margin: 0px">{{ $pendingAnnouncementsCount }}</p>
                                </div>

                            </div>




                        </div>
                    </div>
                    <div style="padding-bottom: 0px" class="boxContent boxMyArticle">




                        <h2 style="margin-bottom: 15px" class="h2BoxProfile">I miei articoli</h2>
                        <h5
                            style="text-align: start;font-family:CoromorantGaramond;border-bottom:#2c2c2c 0.5px solid;width:30%">
                            Articoli revisionati</h5>
                        <div style=";width:100%; height: 220px;margin-bottom:10px; overflow-y: scroll;">
                            @foreach ($announcements as $announcement)
                                @if ($announcement->is_accepted)
                                    <a style="text-decoration: none;color:#2c2c2c"
                                        href="{{ route('announcements.show', compact('announcement')) }}">
                                        <div class="DivMyArticle">
                                            <div style="height: 100%;">
                                                <div style="height: 100%">
                                                    <div style="height: 100%"
                                                        id="showCarousel-{{ $announcement->id }}"
                                                        class="carousel slide">
                                                        <div style="height: 100%; width:100px;"
                                                            class="carousel-inner">
                                                            @if ($announcement->images->isEmpty())
                                                                <!-- Se non ci sono immagini caricate, visualizza un'immagine di default -->
                                                                <div style="height:100%;">
                                                                    <img style="object-fit:cover; padding: 0px;height:100%;border-top-left-radius: 5px;
                                    border-bottom-left-radius: 5px; "
                                                                        src="{{ Storage::url('images/default.jpg') }}">
                                                                </div>
                                                            @else
                                                                @foreach ($announcement->images as $key => $image)
                                                                    <div style="height:100%;"
                                                                        class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                                                        <img style="object-fit: cover; padding: 0px; height:100% ;border-top-left-radius: 5px;
                                border-bottom-left-radius: 5px;"
                                                                            src="/storage/{{ $image->path }}"
                                                                            alt="" class="img-fluid " ">
                            </div>
 @endforeach
                                                                @endif
                                                        </div>
                                                        @if (
                                                            !$announcement->images->isEmpty() &&
                                                                count($announcement->images) > 1 &&
                                                                $announcement->images->first()->getUrl(600, 500) != Storage::url('images/default.jpg'))
                                                            <button id="FrecciaPrev2" class="carousel-control-prev"
                                                                type="button"
                                                                data-bs-target="#showCarousel-{{ $announcement->id }}"
                                                                data-bs-slide="prev">
                                                                <i class="bi bi-arrow-left-circle"></i>
                                                            </button>
                                                            <button id="FrecciaNext2" class="carousel-control-next"
                                                                type="button"
                                                                data-bs-target="#showCarousel-{{ $announcement->id }}"
                                                                data-bs-slide="next">
                                                                <i class="bi bi-arrow-right-circle"></i>
                                                            </button>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                style="height: 90%; background-color:rgba(255, 0, 0, 0);width:450px;display:flex; flex-direction:column; align-items:flex-start;margin-left:5px;margin-top:5px">
                                                <strong>
                                                    <h2
                                                        style="font-size: clamp(1.1rem, 1.4vw, 1.1rem);margin-bottom: 0px;  font-family: CormorantGaramond;">
                                                        {{ $announcement->title }}</h2>
                                                </strong>
                                                <h6
                                                    style="font-size: clamp(0.8rem, 1.0vw, 0.8rem);  font-family: CormorantGaramond;margin-bottom: 0px">
                                                    Categoria:
                                                    </strong>{{ $announcement->category->name }}</h6>
                                                <h6
                                                    style="  font-family: CormorantGaramond;font-size: clamp(0.9rem, 0.9vw, 0.9rem)">
                                                    Prezzo: {{ $announcement->price }}</h6>
                                                <p style="margin:0px;  font-family: CormorantGaramond;">Descrizione:
                                                </p>
                                                <textarea readonly
                                                    style="height: auto;width:80%; resize: none;border-radius:5px;  font-family: CormorantGaramond;;background:rgb(255, 255, 255);padding:5px"
                                                    name="" id="" cols="30" rows="10">{{ $announcement->body }}</textarea>
                                            </div>




                                            @if (auth()->user()->favoriteAnnouncements->contains($announcement))
                                                <form style="display: flex;width:45px;margin-right:5px"
                                                    action="{{ route('announcements.removeFromFavorites', ['announcement' => $announcement->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button style="width: 45px;" id="toggleHeart" type="submit">
                                                        <i id="AggiuntaPreferiti"
                                                            class="bi bi-heart-fill text-danger"></i>
                                                    </button>
                                                </form>
                                            @else
                                                <form style="display: flex;width:45px;margin-right:5px"
                                                    id="favoriteForm"
                                                    action="{{ route('announcements.addToFavorites', ['announcement' => $announcement->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    <button style="width: 45px;" id="toggleHeart" type="submit">
                                                        <i id="preferitiHover" class="bi bi-heart"></i>
                                                    </button>
                                                </form>
                                            @endif



                                            @auth
                                                @if (Auth::check() && Auth::user()->id == $announcement->user_id)
                                                    <form style="width: auto;"
                                                        action="{{ route('announcements.delete', $announcement) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="DivDeleteArticle" type="submit"
                                                            onclick="return confirm('Sei sicuro di voler eliminare questo annuncio?')">
                                                            <i style="font-size: 20px" class="bi bi-trash3"></i>
                                                @endif

                                                </button>
                                                </form>
                                            @endauth

                                        </div>
                                    </a>
                                @endif
                            @endforeach
                        </div>










                        <h5
                            style="text-align: start;font-family:CoromorantGaramond;border-bottom:#2c2c2c 0.5px solid;width:30%">
                            Articoli da revisionare</h5>
                        <div style=";width:100%; height: 220px; overflow-y: scroll;">




                            @foreach ($announcements as $announcement)
                                @if (!$announcement->is_accepted)
                                    <div class="DivMyArticle">
                                        <div style="height: 100%;">
                                            <div style="height: 100%">
                                                <div style="height: 100%" id="showCarousel-{{ $announcement->id }}"
                                                    class="carousel slide">
                                                    <div style="height: 100%; width:100px;" class="carousel-inner">
                                                        @if ($announcement->images->isEmpty())
                                                            <!-- Se non ci sono immagini caricate, visualizza un'immagine di default -->
                                                            <div style="height:100%;">
                                                                <img style="object-fit:cover; padding: 0px;height:100%;border-top-left-radius: 5px;
                            border-bottom-left-radius: 5px; "
                                                                    src="{{ Storage::url('images/default.jpg') }}">
                                                            </div>
                                                        @else
                                                            @foreach ($announcement->images as $key => $image)
                                                                <div style="height:100%;"
                                                                    class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                                                    <img style="object-fit: cover; padding: 0px; height:100% ;border-top-left-radius: 5px;
                        border-bottom-left-radius: 5px;"
                                                                        src="/storage/{{ $image->path }}" alt=""
                                                                        alt="" class="img-fluid " ">
                    </div>
 @endforeach
                                                            @endif
                                                    </div>
                                                    @if (
                                                        !$announcement->images->isEmpty() &&
                                                            count($announcement->images) > 1 &&
                                                            $announcement->images->first()->getUrl(600, 500) != Storage::url('images/default.jpg'))
                                                        <button id="FrecciaPrev2" class="carousel-control-prev"
                                                            type="button"
                                                            data-bs-target="#showCarousel-{{ $announcement->id }}"
                                                            data-bs-slide="prev">
                                                            <i class="bi bi-arrow-left-circle"></i>
                                                        </button>
                                                        <button id="FrecciaNext2" class="carousel-control-next"
                                                            type="button"
                                                            data-bs-target="#showCarousel-{{ $announcement->id }}"
                                                            data-bs-slide="next">
                                                            <i class="bi bi-arrow-right-circle"></i>
                                                        </button>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            style="height: 90%; background-color:rgba(255, 0, 0, 0);width:450px;display:flex; flex-direction:column; align-items:flex-start;margin-left:5px;margin-top:5px">
                                            <strong>
                                                <h2
                                                    style="font-size: clamp(1.1rem, 1.4vw, 1.1rem);margin-bottom: 0px;  font-family: CormorantGaramond;">
                                                    {{ $announcement->title }}</h2>
                                            </strong>
                                            <h6
                                                style="font-size: clamp(0.8rem, 1.0vw, 0.8rem);  font-family: CormorantGaramond;margin-bottom: 0px">
                                                Categoria:
                                                </strong>{{ $announcement->category->name }}</h6>
                                            <h6
                                                style="  font-family: CormorantGaramond;font-size: clamp(0.9rem, 0.9vw, 0.9rem)">
                                                Prezzo: {{ $announcement->price }}</h6>
                                            <p style="margin:0px;  font-family: CormorantGaramond;">Descrizione:</p>
                                            <textarea readonly
                                                style="height: auto;width:80%; resize: none;border-radius:5px;  font-family: CormorantGaramond;;background:rgb(255, 255, 255);padding:5px"
                                                name="" id="" cols="30" rows="10">{{ $announcement->body }}</textarea>
                                        </div>
                                        @auth
                                            @if (Auth::check() && Auth::user()->id == $announcement->user_id)
                                                <form style="width: auto;"
                                                    action="{{ route('announcements.delete', $announcement) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="DivDeleteArticle" class="ButtonDeleteArticle"
                                                        type="submit"
                                                        onclick="return confirm('Sei sicuro di voler eliminare questo annuncio?')">
                                                        <i style="font-size: 20px" class="bi bi-trash3"></i>
                                            @endif
                                            </button>
                                            </form>
                                        @endauth
                                    </div>
                                @endif
                            @endforeach










                        </div>









                    </div>

                    <div class="boxContent boxSetInfoPers">
                        <h2 class="h2BoxProfile">Impostazioni dell'account</h2>
                        <div class="mb-3">






<form id="form1" style="display:flex; justify-content:space-between" method="POST" action="/user/profile-information">
    @csrf
    @method('PUT')
    <div style="width: 39%">
        <label style="text-align: start; width: 100%; margin-top: 20px" for="name" class="block text-sm font-medium text-gray-700">Username</label>
        <input id="name" name="name" style="height: 40px" value="{{ Auth::user()->name }}" type="text" class="form-control @error('name') is-invalid @enderror">
        @error('name')
            <span class="fst-italic text-danger small">{{ $message }}</span>
        @enderror
    </div>
    <div style="width: 59%">
        <label style="text-align: start; width: 100%; margin-top: 20px" for="email" class="block text-sm font-medium text-gray-700">Email</label>
        <input id="email" name="email" style="height: 40px" value="{{ Auth::user()->email }}" type="email" class="form-control @error('email') is-invalid @enderror">
        @error('email')
            <span class="fst-italic text-danger small">{{ $message }}</span>
        @enderror
    </div>
</form>

<div style="display: flex; align-items: end;">
    <form id="form2" style="width: 100%" action="{{ route('number-upload') }}" method="POST">
        @csrf
        <label style="text-align: start; width: 100%; margin-top: 10px" for="telephone_number" class="block text-sm font-medium text-gray-700">Telefono</label>
        <input id="telephone_number" style="height: 40px" placeholder="{{ Auth::user()->telephone_number ?? 'Inserisci il tuo numero' }}" type="text" name="telephone_number" class="form-control">
    </form>

    <button style="padding: 5px 20px; height:auto" id="submitForms" class="bottoneMostaPasSave" type="button"><a style="; height:auto; text-decoration:none" href="{{ route('userProfile') }}">Salva</a>
    </button>
</div>


















                            <form style="width: 100%" action="{{ route('photo-upload') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                     <div style="display: flex; align-items: end; justify-content:space-between">
                             <div class="cambiaImg" >
                                        <label style="text-align: start; width: 100%;margin-top:20px" for="image"
                                            class="block text-sm font-medium text-gray-700">Cambia immagine Profilo</label>
        
                                        <input id="image" name="image"  type="file"
                                            class="form-control" >
        
                             </div>
                                        
                                    <div style="display: flex; justify-content: start;margin:0px; width:auto">
                                        <button  style="padding: 5px 20px;height:auto; "  class="bottoneMostaPasSave" type="submit" value="upload">
                                            {{ Auth::user()->profile_photo_path !== null ? 'Aggiorna' : 'Salva' }} <i class="bi bi-upload"></i></button>
                                    </div>
                     </div>
                            </form>









                            <form action="/user/password" method="POST">
                                @csrf
                                @method('PUT')
                                <label style="text-align: start; width: 100%;margin-bottom:0px;margin-top:30px"
                                    for="current_password" class="form-label">Password Attuale</label>
                                <div style="display: flex; justify-content: space-between">
                                    <input id="current_password" name="current_password" style="height: 40px"
                                        placeholder="Current password" type="password"
                                        class="form-control @error('current_password') is-invalid @enderror">
                                    @error('current_password')
                                        <span class="fst-italic text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

<div style="display:flex; justify-content:space-between">
    
                             <div style="width: 49%">
                                        <label style="text-align: start; width: 100%;margin-bottom:0px;margin-top:10px"
                                            for="password" class="form-label">Nuova password</label>
                                        <div style="display: flex; justify-content: space-between">
                                            <input id="password" name="password" style="height: 40px"
                                                placeholder="Password" type="password"
                                                class="form-control @error('password') is-invalid @enderror">
                                            @error('password')
                                                <span class="fst-italic text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>
                             </div>
    
                                  <div style="width: 49%">
                                        <label style="text-align: start; width: 100%;margin-bottom:0px;margin-top:10px"
                                            for="password_confirmation" class="form-label">Conferma password</label>
                                        <div style="display: flex; justify-content: space-between">
                                            <input id="password_confirmation" name="password_confirmation"
                                                style="height: 40px" placeholder="Password confirmation" type="password"
                                                class="form-control @error('password_confirmation') is-invalid @enderror">
                                            @error('password_confirmation')
                                                <span class="fst-italic text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>
                                  </div>
</div>



                                <div style="display: flex; justify-content: start;margin-top:10px">
                                    <button style="padding: 5px 20px;height:auto; margin-left:0px "  class="bottoneMostaPasSave" type="submit"> Aggiorna password</button>
                                </div>

                            </form>




                        </div>
                    </div>
                </div>






            </div>
        </div>


    </div>

    <x-footer />
</x-layout>
