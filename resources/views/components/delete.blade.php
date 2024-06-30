@if (session()->has('delete'))
<h2 id="errorMessage" style="background-color:#ab3131;color: #ebeaea;border-radius: 0px;font-family: CormorantGaramond; opacity: 1; transition: opacity 1s;" class="alert alert-danger">{{session('delete')}}</h2>
@endif