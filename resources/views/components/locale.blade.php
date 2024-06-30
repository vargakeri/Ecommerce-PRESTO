<form  style="width: 20px" action="{{route('set_language_locale',$lang)}}" method="POST">
@csrf

    <button  type="submit " style="background-color: transparent; border:none; width:40px;height:40px;">
        <x-icon name="flag-country-{{$nation}}" />
        



</form>