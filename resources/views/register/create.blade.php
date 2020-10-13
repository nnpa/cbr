@extends ('layouts.app');


@section ('content')


<div class="col-sm-8">

    <form method="POST" action="/registration">
        {{csrf_field()}}
        <div class="form-group">
            <label for="name">Name: </label>
            <input type='text' name='name' id='name'>
        </div>
        <div class="form-group">
            <label for="email">Email: </label>
            <input type='email' name='email' id='email'>
        </div>
         <div class="form-group">
            <label for="password">Password: </label>
            <input type='text' name='password' id='password'>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary" >Register</button>
                
        </div>
    </form>
    @include('layouts.errors')
</div>
@endsection