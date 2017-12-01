<?php include_once 'includes/templates/header.php'; ?>
              <section class="seccion contenedor">
                  <h2>Calendario de Eventos</h2>
                  
                  <?php 
                      try {
                        require_once('includes/funciones/bd_conexion.php');
                        $sql = "SELECT `evento_id`, `nombre_evento`, `fecha_evento`, `hora_evento`, `cat_evento`, `nombre_invitado`, `apellido_invitado` ";
                        $sql .= "FROM `eventos` ";
                        $sql .= "INNER JOIN `categoria_evento` ";
                        $sql .= "ON eventos.id_cat_evento=categoria_evento.id_categoria ";
                        $sql .= "INNER JOIN `invitados` ";
                        $sql .= "ON eventos.id_inv=invitados.invitado_id ";
                        $sql .= "ORDER BY `evento_id` ";
                        $resultado = $conn->query($sql);
                      } catch (Exception $e) {
                        $error = $e->getMessage();
                      }
                   ?>
                   <div class="calendario">
                     
                       <?php $calendario = array();
                             while($eventos = $resultado->fetch_assoc() ) { 
                                    $fecha = $eventos['fecha_evento']; 
                                    $categoria = $eventos['cat_evento'];
                                    switch ($categoria) {
                                           case 'Talleres':
                                                 $contenido_cat = ' Taller';
                                                 break;
                                           case 'Conferencias':
                                                  $contenido_cat = ' Conferencias';
                                                 break;
                                           case 'Seminario':
                                                  $contenido_cat = ' Seminarios';
                                                 break;
                                           default:
                                                   echo "";
                                                   break;
                                    }
                                    $evento = array(
                                        'titulo' => $eventos['nombre_evento'],
                                        'fecha' => $eventos['fecha_evento'],
                                        'hora' => $eventos['hora_evento'],
                                        'categoria' =>  $contenido_cat,
                                        'invitado' => $eventos['nombre_invitado'] . " " . $eventos['apellido_invitado']
                                    );
                                    
                                    $calendario[$fecha][] = $evento;
                              } 
                              
                              foreach($calendario as $dia => $lista_eventos) { ?>
                                  <h3>
                                        
                                        <?php echo date("F j, Y", strtotime($dia) );  ?>
                                  </h3>
                                  <?php foreach($lista_eventos as $evento): ?>
                                      <div class="dia">
                                          <p class="titulo"><?php echo $evento['titulo']; ?></p>
                                          <p class="hora"> <?php echo $evento['fecha'] . " " . $eventos['hora'] . " hrs"; ?>
                                          <p><?php echo $evento['categoria']; ?></p>
                                          <p>  <?php echo $evento['invitado']; ?> </p>
                                     </div>
                                  <?php endforeach; ?>
                              <?php } ?>
                    
                    <?php 
                        $conn->close();
                    ?>
                  
          
            </section>
            
            
        <?php include_once 'includes/templates/footer.php'; ?>