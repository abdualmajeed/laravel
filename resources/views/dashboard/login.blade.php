<!DOCTYPE html>
<html>
 <head>
  <title>Admin Login</title>
  <link id="bootstrap-style" href="{{URL::to('backend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{URL::to('backend/css/bootstrap-responsive.min.css')}}" rel="stylesheet">
    <link id="base-style" href="{{URL::to('backend/css/style.css')}}" rel="stylesheet">
    <link id="base-style-responsive" href="{{URL::to('backend/css/style-responsive.css')}}" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
    <link rel="shortcut icon" href="{{URL::to('backend/img/favicon.ico')}}">
    <!-- end: Favicon -->


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style type="text/css">
   .box{
    width:450px;
    margin:0 auto;
    border:1px solid #ccc;
    margin-top: 150px;
   }

  </style>

 </head>
 <body>
  <br />
  <div class="container box">
   <h3 align="center"> Login Page</h3><br />

   <form method="post" action="{{route('saveLogin') }}">
    @csrf
    <fieldset>
    <div cla ss="form-group">
     <label>Enter Email</label>
     <input type="email" name="admin_email" class="form-control" />
    </div>
    <div class="form-group">
     <label>Enter Password</label>
     <input type="password" name="admin_password" class="form-control" />
    </div>
     <div class="clearfix"></div>


    <div class="row-1 " align="center">
        <div class="form-group ">
        <br>
            <input  type="submit" name="login" class="btn btn-success" value="Login" />
           </div>
    </div>
   </form>

  </div>
 </body>
</html>
