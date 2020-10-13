
@if($errors->any())
    @foreach($errors->all() as $error)  
        {{$error}} <br>
    @endforeach
@endif

login
<form action="/login/login" method="post">
    @csrf
    <input type="text" name="login">
    <input type="text" name="password">
    <input type='submit' value='text' />

</form>
