<x-layout>
    <div style="border-bottom:#2c2c2c 1px solid; " class="headerImage">
        <div  class="cerca">
            <form action="{{route('announcements.search')}}" method="GET">
                <input
                    style="font-size: 20px; font-family: CormorantGaramond; background-color: rgba(255, 255, 255, 0); "
                    type="search" placeholder={{__('ui.find')}} name="searched">
                <button type="submit"><i style="color: white; background-color: #2c2c2c; height: 100%;"
                        class="bi bi-search"></i></button>
            </form>
        </div>
    </div>
    <x-success></x-success>



    @if (session()->has('message'))
    <h2 class="alert alert-success">{{session('message')}}</h2>
    @endif
   
     
            <div style="height: auto; margin:0px 50px">
                <livewire:create-announcement />
            </div>
     
 
</x-layout>
<x-footer/>