<footer>
    <div style="display: flex;">

<div class="footerDescription">
<h3>{{__('ui.news1')}}</h3>
<div >
<div class="cerca">
    <form action="{{route('newsletter.suscribe')}}" method="POST">
        @csrf
        <input
            style="font-size: 20px; font-family: CormorantGaramond; background-color: rgba(255, 255, 255, 0); "
            type="email" placeholder={{__('ui.news2')}} name="email">

        <button type="submit"  >{{__('ui.news3')}}</button>
        @error('email') <div><span class="text-danger">{{$message}}</span></div>@enderror
    </form>
</div>
</div>
<div class="FooterPaymentBox">
<i class="fa-brands fa-cc-mastercard" style="font-size:24px;color:#e9e9e9"></i>
<i class="fa-brands fa-cc-visa" style="font-size:24px;color:#e9e9e9"></i>
<i class="fa-brands fa-cc-amex" style="font-size:24px;color:#e9e9e9"></i>
<i class="fa-brands fa-paypal" style="font-size:24px;color:#e9e9e9"></i>
</div>
<p>{{__('ui.news4')}}</p>
</div>
<div style="position: relative;background-color: #c01a1a; ;"><hr style=";width: 120px; margin:0px;  "></div>
<div class="footerSocial">

<a href="https://www.facebook.com" ><i class="bi bi-facebook"></i></a>
<a href="https://www.instagram.com"><i class="bi bi-instagram"></i></a>
<a href="https://twitter.com"><i class="bi bi-twitter-x"></i></a>
<a href="https://www.tiktok.com"><i class="bi bi-tiktok"></i></a>
</div>

    </div>
</footer>