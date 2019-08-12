<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
 <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Add admin</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
</head>
<body>
<div class="container">
<hr>
<div class="card bg-light">
<article class="card-body mx-auto" style="max-width: 400px;">
  
    <h4 class="card-title mt-3 text-center">Update Account</h4>
    <form action= "{{URL('users') }}{{ (isset($user) ? '/'. $user->id : '' ) }}"  method="post">
        {{csrf_field()}}
    <div class="form-group input-group">
        @if (isset($user))
            {{method_field('PUT')}}
        @endif 
        <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
         </div>
        <input name="name"  placeholder="Full name" type="text"  class="form-control" value="{{isset($user) ? $user -> name : ''}}" required autofocus>
        
    </div> <!-- form-group// -->
    <div class="form-group input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
         </div>
        <input name="email"  placeholder="email" type="email"  class="form-control" value="{{isset($user) ? $user -> email : '' }}" required autofocus>
         
    </div> <!-- form-group// -->
    
   
   
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block"> Create Account  </button>
    </div> <!-- form-group// -->      
                                                                   
</form>
</article>
</div> <!-- card.// -->

</div> 

<!--container end.//-->
</body>
</html>
