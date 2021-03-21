<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>ASL</title>
    
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

</head> 

<body>
    <?php
    include('./header.html');
    include('./SCRIPT/connetti.php');
    ?>


    <div class="main-wrapper">
        <section class="cta-section theme-bg-light py-5">
		    <div class="container text-center">
			    <h2 class="heading">DOTTORI E PAZIENTI</h2>
			    <div class="intro">LISTA PAZIENTI MEDICO</div>
		    </div><!--//container-->
	    </section>
	    <section class="blog-list px-3 py-5 p-md-5">
		    <div class="container">
                <h2>SELEZIONARE UN MEDICO</h2>
			    <?php
                $medici_sql = mysqli_query($connessione, "SELECT * FROM `medico`");
                while ($medico = mysqli_fetch_assoc($medici_sql)){
                    //codice -cognome -nome -dataNascita -luogoNascita
                    $codice = $medico['codice'];
                    $cognome = $medico['cognome'];
                    $nome = $medico['nome'];
                    $data = $medico['dataNascita'];
                    $luogoNascita = $medico['luogoNascita'];
                    echo("
                    <div class='item mb-5'>
                        <div class='media'>
                            <img class='mr-3 img-fluid post-thumb d-none d-md-flex' src='./IMMAGINI/medico.jfif' alt='image'>
                            <div class='media-body'>
                                <h3 class='title mb-1'><a href='./listaPazienti.php?medico=$codice'>$nome $cognome</a></h3>
                                <table>
                                    <tr>
                                        <td>CODICE: </td>
                                        <td>$codice</td>
                                    </tr>
                                    <tr>
                                        <td>DATA NASCITA: </td>
                                        <td>$data</td>
                                    </tr>
                                    <tr>
                                        <td>LUOGO NASCITA: </td>
                                        <td>$luogoNascita</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
			        </div>
                    ");
                }
                ?>
            </div>
	    </section>

        <?php
        $medico;
        if (isset($_GET['medico'])){
            $medico = $_GET['medico'];
            echo('<hr><section class="blog-list px-3 py-5 p-md-5">');

            echo("
            <div class='container'>
                <h2>PAZIENTI</h2>");
            $pazienti_sql = mysqli_query($connessione, "SELECT * FROM paziente JOIN associazione ON (fkPaziente=CF) WHERE fkMedico='$medico'");
            while ($paziente = mysqli_fetch_assoc($pazienti_sql)){
                //codice -cognome -nome -dataNascita -luogoNascita
                $codice = $paziente['CF'];
                $cognome = $paziente['cognome'];
                $nome = $paziente['nome'];
                $data = $paziente['dataNascita'];
                $luogo = $paziente['luogoNascita'];
                $indirizzo = $paziente['indirizzo'];
                echo("
                <div class='item mb-5'>
                    <div class='media'>
                        <img class='mr-3 img-fluid post-thumb d-none d-md-flex' src='./IMMAGINI/paziente.jfif' alt='image'>
                        <div class='media-body'>
                            <h3 class='title mb-1'>$nome $cognome</h3>
                            <table>
                                <tr>
                                    <td>CODICE FISCALE: </td>
                                    <td>$codice</td>
                                </tr>
                                <tr>
                                    <td>DATA NASCITA: </td>
                                    <td>$data</td>
                                </tr>
                                <tr>
                                    <td>LUOGO NASCITA: </td>
                                    <td>$luogo</td>
                                </tr>
                                <tr>
                                    <td>INDIRIZZO: </td>
                                    <td>$indirizzo</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                ");
            }
            echo("
            </div>
            </section>");
        }
        ?>    

	    <footer class="footer text-center py-2 theme-bg-dark">
		   
	        <!--/* This template is released under the Creative Commons Attribution 3.0 License. Please keep the attribution link below when using for your own project. Thank you for your support. :) If you'd like to use the template without the attribution, you can buy the commercial license via our website: themes.3rdwavemedia.com */-->
                <small class="copyright">Designed with <i class="fas fa-heart" style="color: #fb866a;"></i> by <a href="http://themes.3rdwavemedia.com" target="_blank">Xiaoying Riley</a> for developers</small>
		   
	    </footer>
    
    </div><!--//main-wrapper-->
	<div id="config-panel" class="config-panel d-none d-lg-block">
        <div class="panel-inner">
            <a id="config-trigger" class="config-trigger config-panel-hide text-center" href="#"><i class="fas fa-cog fa-spin mx-auto" data-fa-transform="down-6" ></i></a>
            <h5 class="panel-title">Choose Colour</h5>
            <ul id="color-options" class="list-inline mb-0">
                <li class="theme-1 active list-inline-item"><a data-style="assets/css/theme-1.css" href="#"></a></li>
                <li class="theme-2  list-inline-item"><a data-style="assets/css/theme-2.css" href="#"></a></li>
                <li class="theme-3  list-inline-item"><a data-style="assets/css/theme-3.css" href="#"></a></li>
                <li class="theme-4  list-inline-item"><a data-style="assets/css/theme-4.css" href="#"></a></li>
                <li class="theme-5  list-inline-item"><a data-style="assets/css/theme-5.css" href="#"></a></li>
                <li class="theme-6  list-inline-item"><a data-style="assets/css/theme-6.css" href="#"></a></li>
                <li class="theme-7  list-inline-item"><a data-style="assets/css/theme-7.css" href="#"></a></li>
                <li class="theme-8  list-inline-item"><a data-style="assets/css/theme-8.css" href="#"></a></li>
            </ul>
            <a id="config-close" class="close" href="#"><i class="fa fa-times-circle"></i></a>
        </div><!--//panel-inner-->
    </div><!--//configure-panel-->    
   
    <!-- Javascript -->          
    <script src="assets/plugins/jquery-3.3.1.min.js"></script>
    <script src="assets/plugins/popper.min.js"></script> 
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script> 

    <!-- Style Switcher (REMOVE ON YOUR PRODUCTION SITE) -->
    <script src="assets/js/demo/style-switcher.js"></script>     
    
</body>
</html> 
