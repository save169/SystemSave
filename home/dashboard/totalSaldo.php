<?php

require '../../inc/conn.php';
$mesAtual = date('m');

$receita = "SELECT *,SUM(valor) AS total FROM `extrato`WHERE `tipo` = 'Receita'";
$resultado0 = mysqli_query($connection, $receita);


$despesa = "SELECT *,SUM(valor) AS total FROM `extrato` WHERE `tipo` = 'Despesa'";
$resultado1 = mysqli_query($connection, $despesa);



while ($row = mysqli_fetch_assoc($resultado0)) {
  while ($r = mysqli_fetch_assoc($resultado1)) {
    $GANHO = $row['total'];
    $PERDA = $r['total'];

    $SALDO = $GANHO - $PERDA;
    
    };
};

?>

<div class="col-sm-4 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h5>Total Saldo</h5>
                    <div class="row">
                      <div class="col-8 col-sm-12 col-xl-8 my-auto">
                        <div class="d-flex d-sm-block d-md-flex align-items-center">
                          <h2 class="mb-0"><?php echo 'R$ '. number_format($SALDO/1000,2,",",".");  ?></h2>
                        </div>
                        <h6 class="text-muted font-weight-normal">2.27% no mês atual</h6>
                      </div>
                      <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                        <i class="icon-lg mdi mdi-cash-multiple text-success ml-auto"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>