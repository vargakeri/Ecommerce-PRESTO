<x-layout>
    <x-success> </x-success>
    <div class="headerImage">
        <img src="{{ Storage::url('/Imagini/image-header.png') }}" width="100%" alt="">
        <div id="cercaHOME"  class="cerca">
            <form action="{{route('announcements.search')}}" method="GET">
                <input
                    style="font-size: 20px; font-family: CormorantGaramond; background-color: rgba(255, 255, 255, 0); "
                    type="search" placeholder=" cerca.." name="searched">
                <button type="submit"><i style="color: white; background-color: #2c2c2c; height: 100%;"
                        class="bi bi-search"></i></button>
            </form>
        </div>
    </div>
   
    <div id="SfondoCategorie" class="categorie">
        <div class="divCategorie">
            <h2>{{__('ui.allCategories')}}</h2>
        </div>


        <div style="height: 100%; width: 100%;  ">

            <div>
                <div class="row">
                  <div style="padding-right: 0px" class="col-12 col-md-3 col-lg-3 col-ml-3 col-sm-12">
                    <div class="listaCategorie">
                        <ul >
                            <li> <a style="color: white" onclick="Tech(),TechLink()" id="Tech" class="aMenuCategori"> <span>01. </span>{{__('ui.cat3')}}</a>
                            </li>
                            <hr>
                            <li> <a onclick="Donna(),DonnaLink()" id="Donna" class="aMenuCategori"> <span>02. </span>{{__('ui.cat2')}}</a></li>
                            <hr>
                            <li> <a onclick="Gioielli(),GioielliLink()" id="Gioielli" class="aMenuCategori"> <span>03. </span>{{__('ui.cat1')}}</a></li>
                            <hr>
                            <li> <a onclick="Uomo(),UomoLink()" id="Uomo" class="aMenuCategori"> <span>04. </span>{{__('ui.cat4')}}</a></li>
                            <hr>
                            <li> <a onclick="Giochi(),GiochiLink()" id="Giochi" class="aMenuCategori"> <span>05. </span>{{__('ui.cat5')}}</a></li>
                            <hr>
                            <li> <a onclick="Sport(),SportLink()" id="Sport" class="aMenuCategori"> <span>06. </span>{{__('ui.cat6')}}</a></li>
                            <hr>

                            <li> <a onclick="Auto(),AutoLink()" id="Auto" class="aMenuCategori"> <span>07. </span>{{__('ui.cat7')}}</a></li>
                            <hr>
                            <li> <a onclick="Orologio(),OrologioLink()" id="Orologio" class="aMenuCategori"> <span>08. </span>{{__('ui.cat8')}}</a></li>
                            <hr>
                            <li> <a onclick="Film(),FilmLink()" id="Film" class="aMenuCategori"> <span>09. </span>{{__('ui.cat9')}}</a></li>
                            <hr>
                            <li> <a onclick="Musica(),MusicaLink()" id="Musica" class="aMenuCategori"> <span>10. </span>{{__('ui.cat10')}}</a></li>
                            <hr>
                        </ul>
                        <i id="FrecciaIndicativaBasso" class="bi bi-caret-down-fill"></i>
                        <i id="FrecciaIndicativaDestra" class="  bi bi-caret-right-fill"></i>
                      


                    </div>
                  </div>
                  <div style="padding-right: 0px" class="col-12 col-md-9 col-lg-9 col-ml-9 col-sm-12">
                    <div class="boxImagineCategoria">
                        <div  id="ImagineContainerCategory" class="img"></div>
                        <div class="buttonImg">
                         <a  id="frecciaHref" href="{{ route('categoryShow', ['3']) }}" >   <i style="padding-left: 50px;" class="bi bi-arrow-right-circle"></i></a>
                        </div>
                    </div>
                  </div>
                </div>
              </div>







        </div>
    </div>
    <div class="preferiti">
        <h2>{{__('ui.beloved')}}</h2>
        <div>
            <div class="container text-center">
                <div class="row">
                    <div class="col-6 col-md-6 col-lg-3 col-ml-3 col-sm-6 p-0">
                      <a href="{{ route('categoryShow', ['2']) }}">  <button>{{__('ui.cat2')}}</button></a>
                    </div>
                    <div class="col-6 col-md-6 col-lg-3 col-ml-3 col-sm-6 p-0">
                        <a href="{{ route('categoryShow', ['4']) }}"><button>{{__('ui.cat4')}}</button></a>
                    </div>
                    <div class="col-6 col-md-6 col-lg-3 col-ml-3 col-sm-6 p-0">
                       <a href="{{ route('categoryShow', ['3']) }}"> <button>{{__('ui.cat3')}}</button></a>
                    </div>
                    <div class="col-6 col-md-6 col-lg-3 col-ml-3 col-sm-6 p-0">
                        <a href="{{ route('categoryShow', ['1']) }}"><button>{{__('ui.cat1')}}</button></a>
                    </div>
                </div>
            </div>

        </div>

    </div>
 
    <div id="BoxContatti" class="BoxContatti">


        <div class="container text-center">
            <div class="row">
                <div id="contattiBox" class="col-12 col-md-12 col-lg-5 col-ml-4 col-sm-12 ">
                    <div class="BoxDesContatti">
                        <h2>{{__('ui.contact')}}</h2>
                        <h5>
                            Mail: info@presto.com <br>
                            Tel: 123-456-7890 <br>
                            Via Gaetano Donizetti N.18, <br>
                            Milano, Lombardia, Italia
                            </h5>
                    </div>
                  </div>
              <div class="col-12 col-md-12 col-lg-7 col-ml-8 col-sm-12 ">
                <div style="height: 100%;width: 100%;display: flex;justify-content: center;align-items: center">
                    <form class="formContatto" action="{{route('contact.send')}}"  method="POST">
                        @csrf
                        <input style="width: 100%;color:white" name="name" type="text" placeholder="{{__('ui.form1')}}" >
                        @error('name') <div><span class="text-danger">{{$message}}</span></div>@enderror
                        <div style="width: 100%;display: flex;justify-content: space-between ">
                            <input style="width: 63%;color:white" name="telephone_number" type="tel" placeholder="{{__('ui.form2')}}">
                            @error('telephone_number') <div><span class="text-danger">{{$message}}</span></div>@enderror
                            <input style="width: 35%;color:white" name="order_number" type="text" placeholder="{{__('ui.form3')}}">
                            @error('order_number') <div><span class="text-danger">{{$message}}</span></div>@enderror
                        </div>
                        <input style="width: 100%;color:white" name="email" type="email" placeholder="{{__('ui.form4')}}">
                        @error('email') <div><span class="text-danger">{{$message}}</span></div>@enderror
                        <div style="width: 100%;display: flex;justify-content: space-between ">
                            <input id="inputMessaggioDes" name="body" type="text" placeholder="{{__('ui.form5')}}">
                            @error('body') <div><span class="text-danger">{{$message}}</span></div>@enderror
                            <button style="width: auto; height: 170px;" type="submit">{{__('ui.form6')}}</button>
                        </div>
                    </form>
                </div>
              </div>


            </div>
          </div>








    </div>

    <div  class="Informazioni">
        <div class="container text-center">
            <div class="row">
                <div class="col-6 col-sm-3 p-0">
                    <div style="cursor: default" class="BoxInformazioni">
                        <i class="bi bi-truck"></i>
                        <h6> <strong>{{__('ui.footer1')}}</strong> </h6>
                        <p>{{__('ui.footer2')}}</p>
                    </div>
                </div>
                <div class="col-6 col-sm-3 p-0">
                    <div style="cursor: default" class="BoxInformazioni">
                        <i class="bi bi-box2-heart"></i>
                        <h6> <strong>{{__('ui.footer3')}}</strong></h6>
                        <p>{{__('ui.footer4')}}</p>
                    </div>
                </div>
                <div class="col-6 col-sm-3 p-0">
                    <div style="cursor: default" class="BoxInformazioni">
                        <i class="bi bi-credit-card"></i>
                        <h6> <strong>{{__('ui.footer5')}}</strong> </h6>
                        <p>{{__('ui.footer6')}}</p>
                    </div>
                </div>
                <div class="col-6 col-sm-3 p-0">
                    <div style="cursor: default" class="BoxInformazioni">
                        <i class="bi bi-chat-dots"></i>
                        <h6> <strong>{{__('ui.footer7')}}</strong></h6>
                        <p>{{__('ui.footer8')}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-footer />
</x-layout>
