<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>AGGIUNGI MEDICO</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Blog Template">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">    
    <link rel="shortcut icon" href="favicon.ico"> 
    
    <!-- FontAwesome JS-->
    <script defer src="https://use.fontawesome.com/releases/v5.7.1/js/all.js" integrity="sha384-eVEQC9zshBn0rFj4+TU78eNA19HMNigMviK/PU/FFjLXqa/GKPgX58rvt5Z8PLs7" crossorigin="anonymous"></script>
    
    <!-- Theme CSS -->  
    <link id="theme-style" rel="stylesheet" href="assets/css/theme-1.css">
    <script src="./SCRIPT/validaForm.js"></script>
</head> 

<body>
    <header class="header text-center">	    
        <nav class="navbar navbar-expand-lg navbar-dark" >
            <div id="navigation" class="collapse navbar-collapse flex-column" >
            </div>
    </nav> 
    </header>



    <div class="main-wrapper">
        <section class="cta-section theme-bg-light py-5">
		    <div class="container text-center">
			    <h2 class="heading">DOTTORI E PAZIENTI</h2>
			    <div class="intro">LOGIN</div>
		    </div><!--//container-->
	    </section>
	    <section class="blog-list px-3 py-5 p-md-5">
            <form name="form" class="signup-form justify-content-center pt-3" method="POST" action="./SCRIPT/login.php" onsubmit="return validaLogin()">
                <div class="form-group">
                    <label class="" for="username">Username</label>
                    <input type="text" id="username" name="username" class="form-control mr-md-1 semail" placeholder="Username">
                    <div id="errUsername"></div>

                    <label class="" for="password">Password</label>
                    <input type="text" id="password" name="password" class="form-control mr-md-1 semail" placeholder="Password">
                    <div id="errPassword"></div>                        
                </div>    
                <button type="submit" class="btn btn-primary">LOGIN</button>
                <?php
                if (isset($_SESSION['erroreCredenziali'])){
                    $_SESSION['erroreCredenziali'] = false;
                    echo("<p>credenziali errate :'(</p>");
                }
                ?>
            </form>
	    </section>
	    <br><br><br><br><br><br><br><br>
	    <footer class="footer text-center py-2 theme-bg-dark">
		   
	        <!--/* This template is released under the Creative Commons Attribution 3.0 License. Please keep the attribution link below when using for your own project. Thank you for your support. :) If you'd like to use the template without the attribution, you can buy the commercial license via our website: themes.3rdwavemedia.com */-->
                <small class="copyright">Designed with <i class="fas fa-heart" style="color: #fb866a;"></i> by <a href="http://themes.3rdwavemedia.com" target="_blank">Xiaoying Riley</a> for developers</small>
		   
	    </footer>
    
    </div><!--//main-wrapper-->

   
    <!-- Javascript -->          
    <script src="assets/plugins/jquery-3.3.1.min.js"></script>
    <script src="assets/plugins/popper.min.js"></script> 
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script> 

    <!-- Style Switcher (REMOVE ON YOUR PRODUCTION SITE) -->
    <script src="assets/js/demo/style-switcher.js"></script>     
    
</body>
</html> 
