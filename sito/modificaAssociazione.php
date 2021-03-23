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
    <script src="./SCRIPT/modifica.js"></script>
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
			    <div class="intro">MODIFICA MEDICO DI PAZIENTE</div>
		    </div><!--//container-->
	    </section>
	    <section class="blog-list px-3 py-5 p-md-5">
		    <div class="container">
                <h2>SELEZIONA PAZIENTE</h2>
			    <select name="pazienti" id="pazienti" onchange="modifica(this)">
                    <option value=""></option>
                    <?php
                    $pazienti_sql = mysqli_query($connessione, "SELECT * FROM `paziente` JOIN `associazione` ON (fkPaziente=CF) ORDER BY nome,cognome");
                    while($paziente = mysqli_fetch_assoc($pazienti_sql)){
                        $cf = $paziente['CF'];
                        $nome = $paziente['nome'];
                        $cognome = $paziente['cognome'];
                        if (isset($_GET['paziente'])){
                            $tmp = ($_GET['paziente']==$cf)?'SELECTED':'';
                            echo("<option value='$cf' $tmp>$nome $cognome</option>");
                        }else{
                            echo("<option value='$cf'>$nome $cognome</option>");
                        }
                    }
                    ?>
                </select>
            </div>
	    </section>

        <?php
        if (isset($_GET['paziente'])){
            $paziente = $_GET['paziente'];
            echo('<hr><section class="blog-list px-3 py-5 p-md-5">');

            echo("
            <div class='container'>
                <h2>DOTTORI</h2>");
            $dottori_sql = mysqli_query($connessione, "SELECT * FROM medico WHERE codice != (SELECT fkMedico FROM associazione WHERE fkPaziente = '$paziente')");
            $presenti = false;
            while ($dottore = mysqli_fetch_assoc($dottori_sql)){
                $presenti = true;
                //codice -cognome -nome -dataNascita -luogoNascita
                $codice = $dottore['codice'];
                $cognome = $dottore['cognome'];
                $nome = $dottore['nome'];
                $data = $dottore['dataNascita'];
                $luogo = $dottore['luogoNascita'];
                
                echo("
                <div class='item mb-5'>
                    <div class='media'>
                        <img class='mr-3 img-fluid post-thumb d-none d-md-flex' src='./IMMAGINI/paziente.jfif' alt='image'>
                        <div class='media-body'>
                            <h3 class='title mb-1'><a href='./SCRIPT/modificaAssociazione.php?paziente=$paziente&dottore=$codice'>$nome $cognome</a></h3>
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
                            </table>
                        </div>
                    </div>
                </div>
                ");
            }
            if (!$presenti){
                echo("<h2>Questo paziente non ha un dottore da moddificare</h2>");
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
