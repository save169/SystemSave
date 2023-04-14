<?php

require '../../inc/conn.php';

$extrato = "SELECT * FROM `extrato` ";
$resultado = mysqli_query($connection, $extrato);

?>

<div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Extrato de Lançamentos</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>
                              <div class="form-check form-check-muted m-0">
                                <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input">
                                </label>
                              </div>
                            </th>
                            <th>Num.Doc.</th>
                            <th>Descrição         </th>
                            <th> Data Lançamento</th>
                            <th> Tipo</th>
                            <th> Valor</th>
                            <th> Ações</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php while ($row = mysqli_fetch_assoc($resultado)) { ?>
                          <tr>
                            <td>
                              <div class="form-check form-check-muted m-0">
                                <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input">
                                </label>
                              </div>
                            </td>
                            <td><?php echo $row['idExtrato']; ?></td>
                            <td><?php echo $row['descricao']; ?></td>
                            <td><?php echo $row['dia'].'/'.$row['mes'].'/'.$row['ano']; ?></td>
                            <?php if($row['tipo'] == 'Receita'){ ?>

                              <td><i class="mdi mdi-arrow-up-drop-circle text-success"></i><?php echo ' '. $row['tipo']; ?></td>
                           <?php }else{ ?>
                            <td><i class="mdi mdi-arrow-down-drop-circle text-danger"></i><?php echo ' '. $row['tipo']; ?></td>
                           <?php } ?>
                            
                            <td><?php echo 'R$ '. number_format($row['valor']/1000,2,",",".");  ?></td>
                            <td><a type="button" href="../forms/delete.php?id=<?php echo $row['idExtrato'];?>"><i class="mdi mdi mdi-delete text-danger"></i></a></td>                            
                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>