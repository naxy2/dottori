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
    <?php
    session_start();
    include('./SCRIPT/connetti.php');
    include('./header.html');
    ?>


    <div class="main-wrapper">
        <section class="cta-section theme-bg-light py-5">
		    <div class="container text-center">
			    <h2 class="heading">DOTTORI E PAZIENTI</h2>
			    <div class="intro">ASSEGNO UN MEDICO A UN PAZIENTE</div>
		    </div><!--//container-->
	    </section>
	    <section class="blog-list px-3 py-5 p-md-5">
            <form name="form" class="signup-form justify-content-center pt-3" method="POST" action="./SCRIPT/aggiungiAssociazione.php" onsubmit="return validaAssociazione()">
                <div class="form-group">
                    <label class="" for="medico">Medico</label><br>
                    <select name="medico" class="" id="medico">
                        <?php
                        $medici_sql = mysqli_query($connessione, "SELECT * FROM `medico` ORDER BY `cognome`, `nome`");
                        while ($medico = mysqli_fetch_assoc($medici_sql)){
                            echo("
                                <option value='{$medico['codice']}'>{$medico['cognome']} {$medico['nome']} ({$medico['codice']})</option>
                            ");
                        }
                        ?>
                    </select>
                    <div id="errMedico"></div>  

                    <label class="" for="paziente">Paziente</label><br>
                    <select name="paziente" class="" id="paziente">
                        <?php
                        $pazienti_sql = mysqli_query($connessione, "SELECT * FROM `paziente` WHERE CF NOT IN (SELECT fkPaziente FROM associazione) ORDER BY `cognome`, `nome`");
                        while ($paziente = mysqli_fetch_assoc($pazienti_sql)){
                            echo("
                                <option value='{$paziente['CF']}'>{$paziente['cognome']} {$paziente['nome']} ({$paziente['CF']})</option>
                            ");
                        }
                        ?>
                    </select>
                    <div id="errPaziente"></div>                    
                    
                    <label class="" for="data">Data Associazione</label>
                    <input type="date" id="data" name="data" class="form-control mr-md-1" placeholder="Data">
                    <div id="errData"></div>
                </div>    
                <button type="submit" class="btn btn-primary">AGGIUNGI</button>
            </form>
            <?php
            if (isset($_SESSION['aggiuntoMedico'])){
                echo("<p>AGGIUNTO {$_SESSION['aggiuntoMedico']}</p>");
                unset($_SESSION['aggiuntoMedico']);
            }
            ?>
	    </section>
	    <br><br><br><br><br><br><br><br>
	    <footer class="footer text-center py-2 theme-bg-dark">
		   
	        <!--/* This template is released under the Creative Commons Attribution 3.0 License. Please keep the attribution link below when using for your own project. Thank you for your support. :) If you'd like to use the template without the attribution, you can buy the commercial license via our website: themes.3rdwavemedia.com */-->
                <small class="copyright">Designed with <i class="fas fa-heart" style="color: #fb866a;"></i> by <a href="http://themes.3rdwavemedia.com" target="_blank">Xiaoying Riley</a> for developers</small>
		   
	    </footer>
    
    </div><!--//main-wrapper-->
    
    <?php
    include("./colorPicker.html");
    ?>
   
    <!-- Javascript -->          
    <script src="assets/plugins/jquery-3.3.1.min.js"></script>
    <script src="assets/plugins/popper.min.js"></script> 
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script> 

    <!-- Style Switcher (REMOVE ON YOUR PRODUCTION SITE) -->
    <script src="assets/js/demo/style-switcher.js"></script>     
    
</body>
</html> 
