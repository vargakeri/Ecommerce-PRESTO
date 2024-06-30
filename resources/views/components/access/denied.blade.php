@if (session()->has('access.denied'))
<h2 class="alert alert-danger">{{session('access.denied')}}</h2>
@endif