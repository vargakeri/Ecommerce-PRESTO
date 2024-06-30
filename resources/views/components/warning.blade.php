@if (session()->has('warning'))
<h2 id="warningMessage" style="background-color:#ab9731;color: #ebeaea;border-radius: 0px;font-family: CormorantGaramond; opacity: 1; transition: opacity 1s;"  class="alert alert-warning">{{session('warning')}}</h2>
@endif