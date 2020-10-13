<a href="/">home</a><br>
<a href="/registration">registration</a><br>
<a href="/log">login</a><br>
<a href="/logout">logout</a><br>

@if(Auth::check())  
    <a href="#">{{Auth::user()->name}}</a><br>
@endif
<a href="/rest?from=11/09/2020&to=10/10/2020&currencyID=R01035">rest</a>