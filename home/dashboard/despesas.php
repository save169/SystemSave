<?php

require '../../inc/conn.php';
$mesAtual = date('m');

$extrato = "SELECT *,SUM(valor) AS total FROM `extrato` WHERE `tipo` = 'DESPESA' AND `mes` = $mesAtual";
$resultado = mysqli_query($connection, $extrato);
while ($row = mysqli_fetch_assoc($resultado)) {
$total = $row['total'];

};

?>

<div class="col-sm-4 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h5>Despesas</h5>
                    <div class="row">
                      <div class="col-8 col-sm-12 col-xl-8 my-auto">
                        <div class="d-flex d-sm-block d-md-flex align-items-center">
                          <h2 class="mb-0"><?php echo 'R$ '. number_format($total/1000,2,",",".");  ?></h2>
                        </div>
                        <h6 class="text-muted font-weight-normal">11.38% Since last month</h6>
                      </div>
                      <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                        <i class="icon-lg mdi mdi-package-down text-danger ml-auto"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>