<x-layout>
    <div class="headerImage">

        <div class="cerca">
            <form action="{{ route('announcements.search') }}" method="GET">
                <input
                    style="font-size: 20px; font-family: CormorantGaramond; background-color: rgba(255, 255, 255, 0); "
                    type="search" placeholder=" cerca.." name="searched">
                <button type="submit"><i style="color: white; background-color: #2c2c2c; height: 100%;"
                        class="bi bi-search"></i></button>
            </form>
        </div>
        <div style="width: 100%; border-top:#2c2c2c 1px solid;margin-bottom: 30px">
            <x-success>

            </x-success>

        </div>
    </div>

    <div style="border-top: #2c2c2c00 1px solid" class="containerCatalogo">

        <div class="containerFiltro">
            <h6 style="padding-top: 10px">
                <a href="{{ route('homepage') }}">Home / </a> <a href="{{ route('announcements.index') }}">Catalogo /
                </a><a style="cursor: default">{{ $category->name }}</a>
            </h6>
            <h3>Categorie</h3>
            <hr>

            @foreach ($categories as $category1)
                <a class="dropdown-item" href="{{ route('categoryShow', ['category' => $category1]) }}">
                    {{ $category1->name }}
                </a>
            @endforeach

        </div>

        <div class="containerProdotti">

            <div class="boxProdotti">

                <div class="container text-center p-0">

                    <div class="row">

                        <div class="boxTitoloCatalogo">
                            <h2  style="font-size: clamp(0.3rem, 9.0vw, 2.8rem);">{{ $category->name }}</h2>

                            <p style="text-align: start">Scopri i prodotti adatti per te, a un prezzo imperdibile</p>

                        </div>
                        <div
                            style="width: 100%;display: flex;justify-content: space-between; border-bottom: 1px solid #2c2c2c;margin-bottom: 15px;">
                            <p style="margin:  0px;display:flex;align-items: center;padding-left: 10px">
                                @if ($category->announcements->where('is_accepted', 1)->count() > 0)
                                    {{ $category->announcements->where('is_accepted', 1)->count() }}
                                @else
                                    0
                                @endif

                                prodotti
                            </p>
                     

                        </div>
                        @php
                            $announcementsCategory = $category->announcements()->orderBy('created_at', 'desc')->get();

                        @endphp


                        @forelse ($announcementsCategory as $announcement)
                            @if ($announcement->is_accepted)
                                <div class="col-12 col-md-6 col-lg-4 col-ml-4 col-sm-12 p-3">
                                    <a style="text-decoration: none"
                                        href="{{ route('announcements.show', compact('announcement')) }}">
                                        <div id="BoxInformazioniMobile" class="BoxInformazioni">
                                            <div id="showCarousel-{{ $announcement->id }}" class="carousel slide">
                                                <div class="carousel-inner">
                                                    @if ($announcement->images->isEmpty())
                                                        <!-- Se non ci sono immagini caricate, visualizza un'immagine di default -->
                                                        <div>
                                                            <img style="object-fit:cover; padding: 0px;height: 45vh; width: 100%;"
                                                                src="{{ Storage::url('images/default.jpg') }}"
                                                                height="100%" width="100%">
                                                        </div>
                                                    @else
                                                        @foreach ($announcement->images as $key => $image)
                                                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                                                <img style="object-fit: cover; padding: 0px; height: 45vh; width: 100%;"
                                                                    src="/storage/{{ $image->path }}" alt=""
                                                                    class="img-fluid " height="100%">
                                                            </div>
                                                        @endforeach
                                                    @endif

                                                </div>
                                                @if (!$announcement->images->isEmpty() && count($announcement->images) > 1 && $announcement->images->first()->getUrl(600, 500) != Storage::url('images/default.jpg'))
                                                    <button id="FrecciaPrev" style="height:88%"
                                                        class="carousel-control-prev" type="button"
                                                        data-bs-target="#showCarousel-{{ $announcement->id }}"
                                                        data-bs-slide="prev">
                                                        <i class="bi bi-arrow-left-circle"></i>
                                                    </button>
                                                    <button id="FrecciaNext" style="height: 88%"
                                                        class="carousel-control-next" type="button"
                                                        data-bs-target="#showCarousel-{{ $announcement->id }}"
                                                        data-bs-slide="next">
                                                        <i class="bi bi-arrow-right-circle"></i>
                                                    </button>
                                                @endif

                                                <div
                                                    style="display: flex; flex-direction: column; justify-content: start; align-items: start; padding: 5px">
                                                    <div class="d-flex justify-content-between align-items-center"
                                                        style="width: 100%;">
                                                        <h6 class="d-inline-block text-truncate"
                                                            style="max-width: 250px; margin-top: 3px;">
                                                            {{ $announcement->title }}</h6>
                                                        <div class="provakeri">
                                                            <p style="color: #2c2c2c;">Info: <a
                                                                    class="categoryCardDescription"
                                                                    href="{{ route('categoryShow', ['category' => $announcement->category->id]) }}">{{ $announcement->category->name }}</a>
                                                                |
                                                                {{ $announcement->created_at->format('d/m/Y') }}</p>
                                                        </div>
                                                    </div>
                                                    <div
                                                        style="display: flex;justify-content: space-between;width: 100%;alig-items: center;">
                                                        <p>€ {{ $announcement->price }}</p>

                                                       


                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </a>
                                </div>
                            @endif
                        @empty
                            <h2 style="font-family: CormorantGaramond;">Non sono presenti annunci per questa categoria!
                            </h2>



                        @endforelse


                    </div>
                </div>
            </div>
        </div>
    </div>





    <x-footer />
</x-layout>
