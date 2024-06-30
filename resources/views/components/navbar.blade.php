<div id="MenuMobileBox">
    <i onclick="Esc()" id="EscMenuMobile" class="bi bi-x-circle"></i>
    <div style="display: flex;flex-direction: column;margin-top:90px" class="menu">
        <a href="{{ route('homepage') }}">HOME</a>
        <a href="{{ route('announcements.index') }}">SHOP</a>
        @if (!request()->routeIs('announcements.index') && !request()->routeIs('categoryShow'))
            <div class="dropdown">
                <button class="dropbtn">{{__('ui.allCategories')}}</button>
                <div style="z-index: 44" class="dropdown-content">
                    @foreach ($categories as $category)
                        <a class="dropdown-item"
                            href="{{ route('categoryShow', compact('category')) }}">{{ $category->name }}</a>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</div>
<nav>
    
    <!--Inizio Registrazione PopUp -->
    <div id="RegistrazioneUtente" class="RegistrazioneUtente">
        <div class="RegistrazioneContainer">

            <div class="containerKeri" id="Kericontainer">

                <div class="form-container sign-up-container">
                    <div
                        style="display: flex; justify-content: end;align-items: start; position: absolute; right: 10px;top:-5px;background-color: rgba(255, 255, 255, 0);height: auto;">
                        <a> <i onclick="CloseLogin()" style="background-color: white;" id="CloseLogin"
                                class="bi bi-x-circle"></i></a>
                    </div>

                    <form id="FormRegistrati" action="/register" method="POST">
                        @csrf
                        <h1 style="background-color: white ">{{__('ui.registration')}}</h1>
                        <span style="background-color: white ">{{__('ui.logForm')}}</span>

                        <input name="name" type="text" id="name" placeholder={{__('ui.form7')}}>
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <input name="email" type="email" id="email" placeholder="Email">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <input name="password" type="password" id="password" placeholder="Password">
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <input input name="password_confirmation" type="password" id="password_confirmation"
                            placeholder="Conferma Password">

                        <button style="margin-top: 20px" type="submit">{{__('ui.create')}}</button>
                    </form>

                </div>



                <div class="form-container sign-in-container">
                    <form style="margin-top: 0px" id="aceddiLogin" class=" " action="/login" method="POST">
                        @csrf
                        <h1 style="background-color: white">{{__('ui.logForm')}}</h1>
                        <div style="background-color: white" class="social-container">
                            <a style="background-color: white" href="{{ route('auth.google') }}" class="social"><i
                                    style="background-color: white" id="social" class="bi bi-google"></i></a>
                         
                           
                        </div>
                        <span style="background-color: white"> {{__('ui.moreLog')}}
                        </span>

                        <input name= "email" type="email" id="email" placeholder="Email">
                        @error('email')
                            <div style="background-color: white"><span
                                    style="color: rgb(243, 70, 70);background-color: white">{{ $message }}</span>
                            </div>
                        @enderror

                        <input name="password" type="password" placeholder="Password">
                        @error('password')
                            <div style="background-color: white"><span
                                    style="color: rgb(243, 70, 70);background-color: white">{{ $message }}</span>
                            </div>
                        @enderror
                       
                        <button type="submit">Login</button>
                    </form>
                </div>



                <div class="overlay-container">
                    <div class="overlay">
                        <div style="background-color: black" class="overlay-panel overlay-left">
                            <h1 style="font-weight: bold;
                        margin: 0;background-color: black">
                                {{__('ui.welcome')}}</h1>
                            <p
                                style="	font-size: 14px;
                                font-weight: 100;
                                line-height: 20px;
                                letter-spacing: 0.5px;
                                margin: 20px 0 30px;background-color: black">
                                {{__('ui.reWelcome')}}!</p>
                            <button class="ghost" id="signIn">Login</button>
                        </div>
                        <div style="background-color: black" class="overlay-panel overlay-right">
                            <div
                                style="display: flex; justify-content: end;align-items: start; position: absolute; right: 10px;top:-5px;background-color: rgba(255, 255, 255, 0);height: auto;">
                                <a><i onclick="CloseLogin()" style="background-color: rgb(0, 0, 0)" id="CloseLogin2"
                                        class="bi bi-x-circle"></i></a>
                            </div>
                            <h1 style="font-weight: bold;
                        margin: 0;background-color: black">
                               {{__('ui.hello')}}</h1>
                            <p
                                style="	font-size: 14px;
                            font-weight: 100;
                            line-height: 20px;
                            letter-spacing: 0.5px;
                        margin: 20px 0 30px;background-color: black">
                                {{__('ui.journey')}}</p>
                            <button class="ghost" id="signUp">{{__('ui.create')}}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Fine Registrazione PopUp -->
    <div class="menu">
        <a href="{{ route('homepage') }}">HOME</a>
        <a href="{{ route('announcements.index') }}">SHOP</a>
        @if (!request()->routeIs('announcements.index') && !request()->routeIs('categoryShow'))
            <div class="dropdown">
                <button class="dropbtn">{{__('ui.allCategories')}}</button>
                <div style="z-index: 44" class="dropdown-content">
                    @foreach ($categories as $category)
                        <a class="dropdown-item"
                            href="{{ route('categoryShow', compact('category')) }}">{{ $category->name }}</a>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
    <div onclick="toggleDisplayFlex()" class="menuMobile">
        <a>  <i style="color: #2c2c2c" class="bi bi-list"></i></a>
    </div>
    <div class="logo">
        <h1><a style="text-decoration: none;color:#2c2c2c;    " href="{{ route('homepage') }}">PRESTO</a
                href="{{ route('homepage') }}"></h1>
        <p  id="vaiGiu">{{__('ui.subTitle')}}</p>

    </div>
    <div class="login">
        <div class="lingua">
            <div  class="dropdown mt-0  ">
                <a role="button" data-bs-toggle="dropdown" aria-expanded="false"><span
                        class=" h4 bi bi-globe-americas"></span></a>


                    <ul  id="finestraLingue" class="dropdown-menu " >
                        <div style="padding-right: 0px;width: auto;margin:0px;font-family: CormorantGaramond;"
                            class="dropdown-item text-center m-0  ">
                            <x-locale lang="it" nation="it" /> Italiano
                        </div>
                        <div style="padding-right: 0px; width: auto;margin:0px;font-family: CormorantGaramond"
                            class="dropdown-item text-center m-0 ">
                            <x-locale lang="en" nation="us" /> Inglese
                        </div>
                    </ul>


            </div>
        </div>
        @guest
            <div onclick="OpenLogin()" style="display: flex;align-items: center;">
                <i style="padding-right:10px " class="bi bi-person-fill"> </i>
                <a class="loginA">{{__('ui.login')}}</a>
            </div>
        @endguest
        @auth
            <div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <div id="MenuDestraMobile" class="boxLog">
                        <p class="messaggioBenvenuto" style=" font-family: CormorantGaramond;margin:0px;margin-right:5px ">{{__('ui.welcome')}}: </p>
                        <p style="margin: 0px;font-family: CormorantGaramond;font-size: 20px;  ">
                            @if (Auth::user()->isAdmin())
                                @if (App\Models\Announcement::toBeRevisionedCount() > 0)
                                    <button
                                        style="background-color: #d73d3d;padding: 0.5px;margin-right:4px; border-radius: 100%; height: 10px;width: 10px; font-family: magnoglia; color:white;font-size:7px;cursor: default; position: relative; bottom:2px">{{ App\Models\Announcement::toBeRevisionedCount() }}</button>
                                @endif
                            @endif
                        <div style="" class="dropdown"><button style="padding-left:0px;padding-bottom:5.5px " class="dropbtn2"><a
                                    style="background-color: rgba(255, 255, 255, 0); border: none; "
                                    class="btn btn-secondary dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">{{ Auth::user()->name }}</a>
                            </button>
                            <div style="position: relative; right:90px">
                                <div style="position: absolute;left: 0;" class="dropdown-content">
                                    <a class="dropdown-item" href="{{ route('userProfile') }}" >{{__('ui.userA')}}</a>
                                    <a class="dropdown-item" href="{{ route('announcements.showFavorites') }}">{{__('ui.userB')}}</a>
                                    @auth @if (Auth::user()->isAdmin())
                                        <a style=" @if (App\Models\Announcement::toBeRevisionedCount() > 0) background-color: rgb(240, 64, 64) @endif"
                                            class="dropdown-item" href="{{ route('revisor.index') }}">{{__('ui.userC')}} </a>
                                          


                                    @endif @auth
                                    <a href="{{ route('announcements.create') }}">{{__('ui.userD')}}</a>
                                    @endauth @endauth
                                    @Auth
                                        <div @if (Auth::user()->is_revisor) style="display:none;" @endif>
                                            <a href="{{ route('become.revisor') }}">{{__('ui.guestRevisor')}}</a>
                                        </div>
                                    @endAuth
                                    <button
                                        style="background-color: rgba(255, 255, 255, 0);text-align: left;padding:0px;"type="submit"><a
                                            id="EscMenu"  type="submit">{{__('ui.userE')}} </a></button>
                                </div>
                            </div>
                        </div>
                        @if (App\Models\Announcement::toBeRevisionedCount() > 0)
                        @endif
                        </p>
                    </div>
                </form>
            </div>
        @endauth
    </div>

</nav>
