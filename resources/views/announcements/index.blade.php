<x-layout>
    <div class="headerImage">

        <div class="cerca">
            <form action="{{ route('announcements.search') }}" method="GET">
                <input
                    style="font-size: 20px; font-family: CormorantGaramond; background-color: rgba(255, 255, 255, 0); "
                    type="search" placeholder={{ __('ui.find') }} name="searched">
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
                <a href="{{ route('homepage') }}">Home / </a> <a style="cursor: default;">
                    @if (request()->routeIs('announcements.showFavorites'))
                        Preferiti
                    @else
                        Catalogo
                    @endif
                </a>
            </h6>
            <h3>{{ __('ui.allCategories2') }} </h3>
            <hr>
            @foreach ($categories as $category)
                <a class="dropdown-item"
                    href="{{ route('categoryShow', compact('category')) }}">{{ __('ui.cat' . $category->id) }}</a>
            @endforeach
        </div>

        <div class="containerProdotti">

            <div class="boxProdotti">

                <div class="container text-center p-0">

                    <div class="row">

                        <div class="boxTitoloCatalogo">
                            <h2 style="font-size: clamp(0.3rem, 9.0vw, 2.8rem);">
                                @if (request()->routeIs('announcements.showFavorites'))
                                    PREFERITI
                                @else
                                    {{ __('ui.index1') }}
                                @endif
                            </h2>
                            <p style="text-align: start">
                                @if (request()->routeIs('announcements.showFavorites'))
                                    Tutti gli articoli preferiti in un unico posto
                                @else
                                    {{ __('ui.sentenceA') }}
                                @endif


                            </p>

                        </div>
                        <div
                            style="width: 100%;display: flex;justify-content: space-between; border-bottom: 1px solid #2c2c2c;margin-bottom: 15px;padding:0px">
                            <p style="margin:  0px;display:flex;align-items: center;padding-left: 20px">
                                {{ $announcements_all->count() }} {{ __('ui.product1') }}</p>


                            <div style="padding-right: 20px" class="dropdown">
                                <a style="background-color: #ebeaea;border:#2c2c2c 0.5px "
                                    class="btn btn-light dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ __('ui.filter1') }}
                                </a>

                                <ul style="width: auto;background-color: #ebeaea" class="dropdown-menu">
                                    <li><a class="dropdown-item"
                                            href="{{ route('announcements.index.price.asc') }}">{{ __('ui.filter2') }}</a>
                                    </li>
                                    <li><a class="dropdown-item"
                                            href="{{ route('announcements.index.price.desc') }}">{{ __('ui.filter3') }}</a>
                                    </li>
                                    <li><a class="dropdown-item"
                                            href="{{ route('announcements.index') }}">{{ __('ui.filter4') }}</a></li>
                                    <li><a class="dropdown-item"
                                            href="{{ route('announcements.index.time.asc') }}">{{ __('ui.filter5') }}</a>
                                    </li>
                                </ul>
                            </div>






                        </div>
                        @forelse ($announcements as $announcement)
                            <div class="col-12 col-md-6 col-lg-4 col-ml-4 col-sm-12 p-3">
                                <a style="text-decoration: none"
                                    href="{{ route('announcements.show', compact('announcement')) }}">
                                    <div id="BoxInformazioniMobile" class="BoxInformazioni">
                                        <div id="showCarousel-{{ $announcement->id }}" class="carousel slide">
                                            <div class="carousel-inner">
                                                @if ($announcement->images->isEmpty())
                                                    <!-- Se non ci sono immagini caricate, visualizza un'immagine di default -->
                                                    <div>
                                                        <img style="object-fit:cover;object-position: top;; padding: 0px;height: 45vh; width: 100%;"
                                                            src="{{ Storage::url('images/default.jpg') }}"
                                                            height="100%" width="100%">
                                                    </div>
                                                @else
                                                    @foreach ($announcement->images as $key => $image)
                                                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                                            <img style="object-fit: cover;; padding: 0px; height: 45vh; width: 100%;object-position: top;"
                                                                src="/storage/{{ $image->path }} " alt=""
                                                                class="img-fluid " height="100%">
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                            @if (
                                                !$announcement->images->isEmpty() &&
                                                    count($announcement->images) > 1 &&
                                                    $announcement->images->first()->getUrl(600, 500) != Storage::url('images/default.jpg'))
                                                <button id="FrecciaPrev" style="height: 88%"
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

                        @empty
                            <div class="col-12">
                                <div class="">
                                    <p class="lead">
                                        @if (request()->routeIs('announcements.showFavorites'))
                                            Non hai aggiunto nessun articolo ai preferiti
                                        @else
                                            Non ci sono annunci per questa ricerca
                                        @endif
                                    </p>
                                </div>
                            </div>
                        @endforelse


                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    @if ($announcements instanceof \Illuminate\Pagination\LengthAwarePaginator)
        <div class="d-flex justify-content-end my-4 me-3">
            <div class="pagination">
                @if ($announcements->onFirstPage())
                    <span class="disabled me-2">&laquo;</span>
                @else
                    <a class="me-2" href="{{ $announcements->previousPageUrl() }}">&laquo;</a>
                @endif
                @php
                    $currentPage = $announcements->currentPage();
                    $lastPage = $announcements->lastPage();
                    $start = max($currentPage - 2, 1);
                    $end = min($currentPage + 2, $lastPage);
                @endphp

                @if ($start > 1)
                    <a style="color: #2c2c2c;text-decoration:none; " class="mx-1"
                        href="{{ $announcements->url(1) }}">1</a>
                    @if ($start > 2)
                        <span class="mx-1">...</span>
                    @endif
                @endif

                @for ($i = $start; $i <= $end; $i++)
                    @if ($i == $currentPage)
                        <span class="active mx-3 text-danger">{{ $i }}</span>
                    @else
                        <a style="color: #2c2c2c;text-decoration:none; " class="mx-1"
                            href="{{ $announcements->url($i) }}">{{ $i }}</a>
                    @endif
                @endfor

                @if ($end < $lastPage)
                    @if ($end < $lastPage - 1)
                        <span class="mx-1">...</span>
                    @endif
                    <a style="color: #2c2c2c;text-decoration:none; " class="mx-1"
                        href="{{ $announcements->url($lastPage) }}">{{ $lastPage }}</a>
                @endif

                @if ($announcements->hasMorePages())
                    <a style="color: #2c2c2c;text-decoration:none; " class="ms-2"
                        href="{{ $announcements->nextPageUrl() }}">&raquo;</a>
                @else
                    <span class="disabled ms-2">&raquo;</span>
                @endif
            </div>

        </div>


    @endif
    <script>
        function navigaPagina() {
            var selectElement =
                document.getElementById('seleziona Pagina');
            var selectedRoute =
                selectedElement.value;
            if (selectedRoute) {
                window.location.href =
                    selectedRoute;
            }
        }
    </script>
    <x-footer />
</x-layout>
