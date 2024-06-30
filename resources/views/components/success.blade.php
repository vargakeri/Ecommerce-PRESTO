
    @if (session()->has('success'))
    <h2 id="successMessage" style="background-color: #0C6B37;color: #ebeaea;; border-radius: 0px;font-family: CormorantGaramond;opacity: 1; transition: opacity 1s;" class="alert alert-success">{{session('success')}}</h2>
    @endif
