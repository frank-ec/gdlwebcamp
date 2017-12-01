<?php include_once "includes/templates/header.php" ;?>
         <section class="seccion contenedor">
             <h2>Calendario de Eventos</h2> 
             <?php
                try{
                  require_once('includes/funciones/bd_conexion.php');
                  $sql = "SELECT `evento_id`, `nombre_evento`, `fecha_evento`, `hora_evento`, `cat_evento`, `nombre_invitado`, `apellido_invitado` " ;
                  $sql .= "FROM `eventos` " ;
                  $sql .= "INNER JOIN `categoria_evento` " ;
                  $sql .= "ON eventos.id_cat_evento=categoria_evento.id_categoria ";
                  $sql .= "INNER JOIN `invitados` " ;
                  $sql .= "ON eventos.id_inv=invitados.invitado_id ";
                  $sql .= "ORDER BY `evento_id`";

                  $resultado = $conn->query($sql);
                  }catch (Exception $e){
                  $error = $e->getMessage();  
                  }
             ?>

        <div class="calendario">
          
           <?php while($eventos = $resultado->fetch_assoc()){?>
                       
                       <?php $dias = array(); ?>

                      <?php $dias[] = $eventos['fecha_evento'];?>
                      <?php $dias = array_values(array_unique($dias)); ?>

                        <pre>
                          <?php var_dump($dias); ?>
                        </pre>

                       <div class="dia"> 
                             <p class="titulo"><?php echo utf8_encode($eventos['nombre_evento']); ?></p>
                             <p class="hora"><i class="fa fa-clock-o" aria-hidden="true"></i><?php echo $eventos['fecha_evento']. " ".$eventos['hora_evento']. " hrs" ; ?></p>
                             <p> 
                                  <?php $categoria_evento = $eventos['cat_evento'];?> 
                                  <?php
                                        switch ($categoria_evento) {
                                          case 'Talleres':
                                            echo '<i class="fa fa-code" aria-hidden="true"></i>Taller';
                                            break;
                                          case 'Conferencias':
                                            echo '<i class="fa fa-comment" aria-hidden="true"></i>Conferencia';
                                            break;
                                          case 'Seminario':
                                            echo '<i class="fa fa-university" aria-hidden="true"></i>Seminario';
                                            break;      
                                          default:
                                            echo "";
                                            break;
                                        }
                                  ?>
                             </p>
                             <p><i class="fa fa-user" aria-hidden="true"></i>
                                <?php echo $eventos['nombre_invitado']. " ".$eventos['apellido_invitado']; ?>      
                             </p>
                       </div>
                       <?php } ?>
         </div>   <!-- Fin de calenario -->

              <pre>
                <?php var_dump($eventos);?>
              </pre>

            
         
         </section>              

<?php include_once "includes/templates/footer.php" ;?>
