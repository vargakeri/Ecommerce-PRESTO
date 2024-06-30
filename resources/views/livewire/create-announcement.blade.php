<div style="margin: 0px; " class="formCreate">



    <h1 style="width: 100%; text-align: center; padding-top: 20px;  font-family: CormorantGaramond; ">CREA IL TUO ANNUNCIO!</h1>





    <div style=" width:100%; display:flex; justify-content:center; ">
        <div style=" padding: 80px 0px; width:auto ;" class="container text-center m-0 ">

            <div class="row m-0 " style="width: 100%; background-color: #ffffff; padding:30px; border-radius: 10px; " >
                <div style="padding-right: 50px" class="col-12 col-ml-12 col-md-8 col-sm-12 p-0 ">
                    <div class="BoxInformazioni2">
                        <div style="height: auto; width:auto">

                            <section>
                                <div style="width: 100%" class="container">
                                    <div class="carousel">
                                        <input type="radio" name="slides" checked="checked" id="slide-1">
                                        <input type="radio" name="slides" id="slide-2">
                                        <input type="radio" name="slides" id="slide-3">
                                        <input type="radio" name="slides" id="slide-4">
                                        <input type="radio" name="slides" id="slide-5">
                                        <input type="radio" name="slides" id="slide-6">




                                        <ul class="carousel__slides">

                                            @foreach ($images as $key => $image)
                                                <li class="carousel__slide">
                                                    <figure>


                                                        <img id="ImagineInserimentoArticolo2"
                                                            style="margin-right: 0px; object-fit: cover;"
                                                            src="  {{ $image->temporaryUrl() }}" width="100%"
                                                            height="900px" alt="">

                                                    </figure>
                                                </li>
                                            @endforeach

                                            {{-- Imagine Anteprima --}}
                                            @if (empty($images) && empty($ImagineInserimentoArticolo['src']))
                                                <img id="fotoAnnuncioMobile" style="margin-right: 0px; object-fit: cover;"
                                                    src="{{ Storage::url('/images/default.jpg') }}" width="100%"
                                                    height="900px" alt="">
                                            @endif
                                            {{-- Fine Imagine Anteprima --}}



                                        </ul>

                                        <ul class="carousel__thumbnails">
                                            @foreach (collect($images)->take(6) as $key => $image)
                                                <div style="position: relative">
                                                   
                                                </div>
                                                <li style="overflow-x: scroll">
                                                    <label style="height: auto" for="slide-{{ $key + 1 }}">
                                                        <img id="miniFotoAnnuncioMobile2"
                                                            src="{{ $image->temporaryUrl() }}" alt="">
                                                          
                                                    </label>
                                                    <button class="cancellaFoto" wire:click="removeImage({{ $key }})" type="button" >elimina</button>
                                                </li>
                                            @endforeach

                                        </ul>

                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>


                <div style="position:relative; " class="col-12 col-ml-4 col-md-4 col-sm-12 p-0 ">
                    <div class="BoxInformazioni2">

                        <form wire:submit.prevent="store">
                            @csrf

                            <div class="mb-3">
                                <input style="width: 100%" placeholder="Titolo" wire:model.live="title" type="text"
                                    class="form-control @error('title') is-invalid @enderror">
                                @error('title')
                                    <p class="text-danger mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">

                                <textarea placeholder="Descrizione" wire:model.live="body" type="text"
                                    class="form-control @error('body') is-invalid @enderror"></textarea>
                                @error('body')
                                    <p class="text-danger mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">

                                <input placeholder="Prezzo" wire:model.live="price" type="text"
                                    class="form-control @error('price') is-invalid @enderror">
                                @error('price')
                                    <p class="text-danger mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">

                                <select
                                    style="padding: 10px; font-family: CormorantGaramond; font-size: 25px;color: #2c2c2cc8;    background-color: #ebeaea31;"
                                    wire:model.live="category" id="category" class="form-control">
                                    <option value="">Scegli la categoria..</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>


                     <div class="mb-3">
                                <div class="input-group">
                                    <input wire:model="temporary_images" type="file" class="form-control @error('temporary_images.*') is-invalid @enderror"
                                        id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" multiple>
                                </div>
                            
                                @error('temporary_images.*')
                                    <p class="text-danger mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            


                            <button class="creaBotton" type="submit"> Crea Articolo</button>

                        </form>

                    </div>
                </div>
            </div>







        </div>
    </div>






</div>
