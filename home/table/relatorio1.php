<?php

require '../../inc/conn.php';


$tipo = $_POST['optionsRadios'];
$datai = $_POST['dataIni'];
$dataf = $_POST['dataFim'];

if($tipo == 'Receita' && !empty($datai) && !empty($dataf)){

    
$date=explode("-",$datai);
$anoi = $date[0];
$mesi = $date[1];
$diai = $date[2];

$date1=explode("-",$dataf);
$anof = $date1[0];
$mesf = $date1[1];
$diaf = $date1[2];


$total =  "SELECT SUM(valor) AS TOTAL FROM `extrato` WHERE `ano` >= '$anoi' AND `mes` >= '$mesi' AND `dia` >= '$diai' AND `ano` <= '$anof' AND `mes` <= '$mesf' AND `dia` <= '$diaf' AND `tipo` = '$tipo'";
$result = mysqli_query($connection, $total);


    $extrato =  "SELECT * FROM `extrato` WHERE `ano` >= '$anoi' AND `mes` >= '$mesi' AND `dia` >= '$diai' AND `ano` <= '$anof' AND `mes` <= '$mesf' AND `dia` <= '$diaf' AND `tipo` = '$tipo'";
    $resultado = mysqli_query($connection, $extrato);

?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Reltorio 1</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../../assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="../../assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../../assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="../../assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../assets/images/favicon.png" />
  </head>
  <body>
        <div class="col-12 grid-margin">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">Extrato de <?php echo '  '.$tipo.'  ' ; ?>periodo de <?php echo $diai.'/'.$mesi.'/'.$anoi.' - '. $diaf.'/'.$mesf.'/'.$anof; ?></h4>
                        <?php while ($r = mysqli_fetch_assoc($result)) { ?>

                            <h3 class="card-title" > O total de receita é:  <?php echo ' R$ '. number_format($r['TOTAL']/1000,2,",","."); ?></h3>

                            <?php 
                        }
                        ?>
                        
                        <div class="table-responsive">
                          <table class="table">
                            <thead>
                              <tr>
                                <th>Num.Doc.</th>
                                <th>Descrição         </th>
                                <th> Data Lançamento</th>
                                <th> Tipo</th>
                                <th> Valor</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php while ($row = mysqli_fetch_assoc($resultado)) { ?>
                                
                              <tr>
                                <td><?php echo $row['idExtrato']; ?></td>
                                <td><?php echo $row['descricao']; ?></td>
                                <td><?php echo $row['dia'].'/'.$row['mes'].'/'.$row['ano']; ?></td>
                                <?php if($row['tipo'] == 'Receita'){ ?>
    
                                  <td><i class="mdi mdi-arrow-up-drop-circle text-success"></i><?php echo ' '. $row['tipo']; ?></td>
                               <?php }else{ ?>
                                <td><i class="mdi mdi-arrow-down-drop-circle text-danger"></i><?php echo ' '. $row['tipo']; ?></td>
                               <?php } ?>
                                
                                <td><?php echo 'R$ '. number_format($row['valor']/1000,2,",",".");  ?></td>
                                                           
                              </tr>
                              <?php } ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                    <a type="button" class="btn btn-danger" href="../forms/relatorio1.php">Voltar</a>
                  </div>

                  

                               </body>
                      <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../../assets/vendors/chart.js/Chart.min.js"></script>
    <script src="../../assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="../../assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="../../assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="../../assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <script src="../../assets/js/settings.js"></script>
    <script src="../../assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="../../assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>
<?php






}else if($tipo == 'Despesa' && !empty($datai) && !empty($dataf)){

$date=explode("-",$datai);
$anoi = $date[0];
$mesi = $date[1];
$diai = $date[2];


$date1=explode("-",$dataf);
$anof = $date1[0];
$mesf = $date1[1];
$diaf = $date1[2];


$total =  "SELECT SUM(valor) AS TOTAL FROM `extrato` WHERE `ano` >= '$anoi' AND `mes` >= '$mesi' AND `dia` >= '$diai' AND `ano` <= '$anof' AND `mes` <= '$mesf' AND `dia` <= '$diaf' AND `tipo` = '$tipo'";
$result = mysqli_query($connection, $total);

    $extrato =  "SELECT * FROM `extrato` WHERE `ano` >= '$anoi' AND `mes` >= '$mesi' AND `dia` >= '$diai' AND `ano` <= '$anof' AND `mes` <= '$mesf' AND `dia` <= '$diaf' AND `tipo` = '$tipo'";
    $resultado = mysqli_query($connection, $extrato);

    ?>
 <!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Reltorio 1</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../../assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="../../assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../../assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="../../assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../assets/images/favicon.png" />
  </head>
  <body>
        <div class="col-12 grid-margin">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">Extrato de <?php echo '  '.$tipo.'  ' ; ?>periodo de <?php echo $diai.'/'.$mesi.'/'.$anoi.' - '. $diaf.'/'.$mesf.'/'.$anof; ?></h4>
                        
                        <?php while ($r = mysqli_fetch_assoc($result)) { ?>

                    <h3 class="card-title" > O total de despesa é:  <?php echo ' R$ '. number_format($r['TOTAL']/1000,2,",","."); ?></h3>

                    <?php 
                        }
                    ?>
                        <div class="table-responsive">
                          <table class="table">
                            <thead>
                              <tr>
                                <th>Num.Doc.</th>
                                <th>Descrição         </th>
                                <th> Data Lançamento</th>
                                <th> Tipo</th>
                                <th> Valor</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php while ($row = mysqli_fetch_assoc($resultado)) { ?>
                                
                              <tr>
                                <td><?php echo $row['idExtrato']; ?></td>
                                <td><?php echo $row['descricao']; ?></td>
                                <td><?php echo $row['dia'].'/'.$row['mes'].'/'.$row['ano']; ?></td>
                                <?php if($row['tipo'] == 'Receita'){ ?>
    
                                  <td><i class="mdi mdi-arrow-up-drop-circle text-success"></i><?php echo ' '. $row['tipo']; ?></td>
                               <?php }else{ ?>
                                <td><i class="mdi mdi-arrow-down-drop-circle text-danger"></i><?php echo ' '. $row['tipo']; ?></td>
                               <?php } ?>
                                
                                <td><?php echo 'R$ '. number_format($row['valor']/1000,2,",",".");  ?></td>
                                                           
                              </tr>
                              
                              <?php } ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                    <a type="button" class="btn btn-danger" href="../forms/relatorio1.php">Voltar</a>
                  </div>

                  

                               </body>
                      <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../../assets/vendors/chart.js/Chart.min.js"></script>
    <script src="../../assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="../../assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="../../assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="../../assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <script src="../../assets/js/settings.js"></script>
    <script src="../../assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="../../assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>
    <?php

}else if($tipo == 'Ambos' && !empty($datai) && !empty($dataf)){

$date=explode("-",$datai);
$anoi = $date[0];
$mesi = $date[1];
$diai = $date[2];

$date1=explode("-",$dataf);
$anof = $date1[0];
$mesf = $date1[1];
$diaf = $date1[2];


$total =  "SELECT SUM(valor) AS TOTAL FROM `extrato` WHERE `ano` >= '$anoi' AND `mes` >= '$mesi' AND `dia` >= '$diai' AND `ano` <= '$anof' AND `mes` <= '$mesf' AND `dia` <= '$diaf'";
$result = mysqli_query($connection, $total);

    $extrato = "SELECT * FROM `extrato` WHERE `ano` >= '$anoi' AND `mes` >= '$mesi' AND `dia` >= '$diai' AND `ano` <= '$anof' AND `mes` <= '$mesf' AND `dia` <= '$diaf'";
    $resultado = mysqli_query($connection, $extrato);

    ?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Reltorio 1</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../../assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="../../assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../../assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="../../assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../assets/images/favicon.png" />
  </head>
  <body>
        <div class="col-12 grid-margin">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">Extrato de lançamentos periodo de <?php echo $diai.'/'.$mesi.'/'.$anoi.' - '. $diaf.'/'.$mesf.'/'.$anof; ?></h4>
                        <?php while ($r = mysqli_fetch_assoc($result)) { ?>

                        <h3 class="card-title" > O total de lançamentos é:  <?php echo ' R$ '. number_format($r['TOTAL']/1000,2,",","."); ?></h3>

                        <?php 
                         }
                        ?>
                        
                        <div class="table-responsive">
                          <table class="table">
                            <thead>
                              <tr>
                                <th>Num.Doc.</th>
                                <th>Descrição         </th>
                                <th> Data Lançamento</th>
                                <th> Tipo</th>
                                <th> Valor</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php while ($row = mysqli_fetch_assoc($resultado)) { ?>
                            
                              <tr>
                                <td><?php echo $row['idExtrato']; ?></td>
                                <td><?php echo $row['descricao']; ?></td>
                                <td><?php echo $row['dia'].'/'.$row['mes'].'/'.$row['ano']; ?></td>
                                <?php if($row['tipo'] == 'Receita'){ ?>
    
                                  <td><i class="mdi mdi-arrow-up-drop-circle text-success"></i><?php echo ' '. $row['tipo']; ?></td>
                               <?php }else{ ?>
                                <td><i class="mdi mdi-arrow-down-drop-circle text-danger"></i><?php echo ' '. $row['tipo']; ?></td>
                               <?php } ?>
                                
                                <td><?php echo 'R$ '. number_format($row['valor']/1000,2,",",".");  ?></td>
                                                           
                              </tr>
                              <?php } ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                    <a type="button" class="btn btn-danger" href="../forms/relatorio1.php">Voltar</a>
                  </div>

                  

                               </body>
                      <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../../assets/vendors/chart.js/Chart.min.js"></script>
    <script src="../../assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="../../assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="../../assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="../../assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <script src="../../assets/js/settings.js"></script>
    <script src="../../assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="../../assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>

    <?php

    

}else{
    ?>
    <!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Reltorio 1</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../../assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="../../assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../../assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="../../assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../assets/images/favicon.png" />
  </head>
  <body>
        <div class="col-12 grid-margin">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">Não ha valores para os dados solicitados.Tente novamente</h4>
                        
                        </div>
                      </div>
                    </div>
                    <a type="button" class="btn btn-danger" href="../forms/relatorio1.php">Voltar</a>
                  </div>

                  

                               </body>
                      <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../../assets/vendors/chart.js/Chart.min.js"></script>
    <script src="../../assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="../../assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="../../assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="../../assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <script src="../../assets/js/settings.js"></script>
    <script src="../../assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="../../assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>
    <?php
}

?>