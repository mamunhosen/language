<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <meta name="description" content="Online Forum">
 <meta name="author" content="Mamun Hosen">
 <link rel="icon" href="">
 <title>Angular @yield('title')</title>
 <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
 <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
 <link rel="stylesheet" type="text/css" href="{{asset('public/css/app.css')}}">
 <!-- JS -->
 <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
 <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.8/angular.min.js"></script> <!-- load angular -->
 <!-- Bootstrap -->
 <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>	
 <!-- ANGULAR -->
 <!-- all angular resources will be loaded from the /public folder -->
 <script src="{{asset('public/js/controllers/mainCntrl.js')}}"></script> <!-- load our controller -->
 <script src="{{asset('public/js/services/PhonebookService.js')}}"></script> <!-- load our service -->
 <script src="{{asset('node_modules/angular-loading-bar/src/loading-bar.js')}}"></script> <!-- loading bar -->
 <script src="{{asset('public/js/app.js')}}"></script> <!-- load our application -->
 </head>
 <nav style="background-color:red;height:80px">
 	<div class="pull-right" style="margin:20px 50px;">
       <form method="post">
       {{ csrf_field() }}
       	<div class="form-group">
		  <select class="form-control" name="language" id="language" data-url="{{ url('/language') }}">
		    <option value="en" {{Config::get('app.locale')=='en'?'selected':''}}>English</option>
		    <option value="bn" {{Config::get('app.locale')=='bn'?'selected':''}}>Bangla</option>
		  </select>
		</div>
       </form>
 	</div>
 </nav>
<body data-ng-app='phonebookApp'>
    <!-- all content to be displayed here -->
    @yield('content') 
<script type="text/javascript">
$( document ).ready(function() {
    $('#language').change(function(){
      var locale=$(this).val();
      var _token=$("input[name=_token]").val();
      var url=$(this).attr('data-url');

      $.ajax({
      	url:url,
      	type:"POST",
      	data:{locale:locale,_token:_token},
      	datatype:'json',
      	success:function(data){
          //console.log(data);
      	},
      	beforeSend:function(){

      	},
      	complete:function(data){
           window.location.reload(true);
      	}

      });

    });
});
</script>  
</body>
</html>