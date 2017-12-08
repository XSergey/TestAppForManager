<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Manager</title>
        
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
        
        <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
        <link href="/js/emoji/css/emoji.css" rel="stylesheet">
        <script>
            var baseUrl = '/manager/';
			var _token = '{{csrf_token()}}';
        </script>
    </head>
    <body>
        <!-- Sidebar -->
        <div class="sidebar" data-color="purple">
            <div class="logo">
                <a href="/manager" class="simple-text">
                    <span>Manager</span>
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="active">
                        <a href="#users">
                            <i class="material-icons">supervisor_account</i>
                            <p>Users</p>
                        </a>
                    </li>
                    <li>
                        <a href="#user-groups">
                            <i class="material-icons">settings</i>
                            <p>User Groups</p>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" onclick="window.location.href = '{{ route('logout') }}'">
                            <i class="material-icons">exit_to_app</i>
                            <p>Log Out</p>
                        </a>
                    </li>
                </ul>
            </div>   
        </div>
        <!-- /Sidebar -->
        <div class="wrapper">
            <div class="main-panel">
                <!-- Header -->
                <nav class="navbar navbar-absolute">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="#"> </a>
                        </div>
                        <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav navbar-right">
                                <li>
                                    <div class="navbar-block">
                                        <span class="navbar-currency-title">
                                            <i class="material-icons">account_circle</i> 
                                            <span class="user-title" style="text-transform: uppercase;margin-left:10px;">{{Auth::user()->firstname}} {{Auth::user()->lastname}}
                                        </span>
                                    </div>
                                </li>                
                            </ul>                            
                        </div>
                    </div>
                </nav>
                <!-- /Header -->
                @yield('content')
            </div>
        </div>
        <footer></footer>
        <script src="https://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
        <script src="{{ mix('/js/app.js') }}" type="text/javascript"></script>
    </body>
</html>