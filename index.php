<?php include_once "includes/templates/header.php" ;?>
        <section class="seccion contenedor">
            <h2>Hospital de referencia de Especialidades Básicas</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor, quae aspernatur explicabo voluptatem iusto inventore amet, illum quas nisi vitae repudiandae! Exercitationem id, odio tempore iure provident aspernatur, voluptate reiciendis. Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
        </section> <!-- seccion contenedor -->

        <section class="programa">
            <div class="contenedor-video">
                <video autoplay loop poster="img/bg-talleres.jpg"> 
                <source src="video/video.mp4" type="video/mp4">
                <source src="video/video.webm" type="video/webm">
                <source src="video/video.ogv" type="video/ogv">
                </video>
            </div> <!-- contenedor video -->

            <div class="contenido-programa">
                <div class="contenedor">
                    <div class="programa-evento">
                        <h2>Programa del Evento</h2>
                         <?php
                            try{
                              require_once('includes/funciones/bd_conexion.php');
                              $sql = "SELECT * FROM `categoria_evento` " ;
                              $resultado = $conn->query($sql);
                              }catch (Exception $e){
                              $error = $e->getMessage();  
                              }
                         ?>

                        <nav class="menu-programa">
                           <?php while ($cat = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
                                <?php $categoria = $cat['cat_evento']; ?>   
                            <a href="#<?php echo strtolower($categoria);?> ">
                                <i class="fa  <?php echo $cat['icono'] ?> " aria-hidden="true"></i> <?php echo $categoria ?>
                            </a>
                           <?php } ?> 
                        </nav>
                            <?php
                                try{
                                  require_once('includes/funciones/bd_conexion.php');
                                  $sql = "SELECT `evento_id`, `nombre_evento`, `fecha_evento`, `hora_evento`, `cat_evento`, `nombre_invitado`, `apellido_invitado` " ;
                                  $sql .= "FROM `eventos` " ;
                                  $sql .= "INNER JOIN `categoria_evento` " ;
                                  $sql .= "ON eventos.id_cat_evento=categoria_evento.id_categoria ";
                                  $sql .= "INNER JOIN `invitados` " ;
                                  $sql .= "ON eventos.id_inv=invitados.invitado_id ";
                                  $sql .= "AND eventos.id_categoria = 1";
                                  $sql .= "ORDER BY `evento_id` LIMIT 2";
                                  $sql = "SELECT `evento_id`, `nombre_evento`, `fecha_evento`, `hora_evento`, `cat_evento`, `nombre_invitado`, `apellido_invitado` " ;
                                  $sql .= "FROM `eventos` " ;
                                  $sql .= "INNER JOIN `categoria_evento` " ;
                                  $sql .= "ON eventos.id_cat_evento=categoria_evento.id_categoria ";
                                  $sql .= "INNER JOIN `invitados` " ;
                                  $sql .= "ON eventos.id_inv=invitados.invitado_id ";
                                  $sql .= "AND eventos.id_categoria = 2";
                                  $sql .= "ORDER BY `evento_id` LIMIT 2";
                                  $sql = "SELECT `evento_id`, `nombre_evento`, `fecha_evento`, `hora_evento`, `cat_evento`, `nombre_invitado`, `apellido_invitado` " ;
                                  $sql .= "FROM `eventos` " ;
                                  $sql .= "INNER JOIN `categoria_evento` " ;
                                  $sql .= "ON eventos.id_cat_evento=categoria_evento.id_categoria ";
                                  $sql .= "INNER JOIN `invitados` " ;
                                  $sql .= "ON eventos.id_inv=invitados.invitado_id ";
                                  $sql .= "AND eventos.id_categoria = 3";
                                  $sql .= "ORDER BY `evento_id` LIMIT 2";

                                  $resultado = $conn->query($sql);
                                  }catch (Exception $e){
                                  $error = $e->getMessage();  
                                  }
                             ?> 
                        <div id="talleres" class="info-curso ocultar clearfix">
                            <div class="detalle-evento">
                                <h3> HTML5, CSS 3 y Javascript </h3>
                                <p><i class="fa fa-clock-o" aria-hidden="true"></i>16:00</p>
                                <p><i class="fa fa-calendar" aria-hidden="true"></i>10 de Dic</p>
                                <p><i class="fa fa-user" aria-hidden="true"></i>Cristian Terán</p>
                            </div>
                            <div class="detalle-evento">
                                <h3> Responsive Web Design </h3>
                                <p><i class="fa fa-clock-o" aria-hidden="true"></i>20:00</p>
                                <p><i class="fa fa-calendar" aria-hidden="true"></i>10 de Dic</p>
                                <p><i class="fa fa-user" aria-hidden="true"></i>Cristian Terán</p>
                            </div>
                            <a href="#" class="button float-rigth" >Ver todos</a>
                        </div> <!-- Talleres -->

                          <div id="conferencias" class="info-curso ocultar clearfix">
                            <div class="detalle-evento">
                                <h3> Como ser freelancer </h3>
                                <p><i class="fa fa-clock-o" aria-hidden="true"></i>10:00</p>
                                <p><i class="fa fa-calendar" aria-hidden="true"></i>10 de Dic</p>
                                <p><i class="fa fa-user" aria-hidden="true"></i>Gregorio Sánchez</p>
                            </div>
                            <div class="detalle-evento">
                                <h3> Tecnologías del futuro </h3>
                                <p><i class="fa fa-clock-o" aria-hidden="true"></i>17:00</p>
                                <p><i class="fa fa-calendar" aria-hidden="true"></i>10 de Dic</p>
                                <p><i class="fa fa-user" aria-hidden="true"></i>Susan Sánchez</p>
                            </div>
                            <a href="#" class="button float-rigth" >Ver todos</a>
                        </div> <!-- Conferencias -->

                          <div id="seminarios" class="info-curso ocultar clearfix">
                            <div class="detalle-evento">
                                <h3> Diseño VI/UX para móviles </h3>
                                <p><i class="fa fa-clock-o" aria-hidden="true"></i>17:00</p>
                                <p><i class="fa fa-calendar" aria-hidden="true"></i>11 de Dic</p>
                                <p><i class="fa fa-user" aria-hidden="true"></i>Harold García</p>
                            </div>
                            <div class="detalle-evento">
                                <h3> Aprende a programar en una mañana </h3>
                                <p><i class="fa fa-clock-o" aria-hidden="true"></i>10:00</p>
                                <p><i class="fa fa-calendar" aria-hidden="true"></i>11 de Dic</p>
                                <p><i class="fa fa-user" aria-hidden="true"></i>Susana Rivera</p>
                            </div>
                            <a href="#" class="button float-rigth" >Ver todos</a>
                        </div> <!-- Seminarios -->

                    </div> <!-- programa-evento -->
                </div> <!-- contenedor  -->
            </div> <!-- contenido-programa  -->
        </section> <!-- seccion programa -->

 <?php include_once "includes/templates/invitados.php" ;?> 

        <div class="contador parallax">
            <div class="contenedor">
                <ul class="resumen-evento clearfix">
                    <li> <p class="numero">0</p>Invitados</li>
                    <li> <p class="numero">0</p>Talleres</li>
                    <li> <p class="numero">0</p>Días</li>
                    <li> <p class="numero">0</p>Conferencias</li>
                </ul>
            </div>
        </div>
        <section class="precios seccion">
            <h2>Precios</h2>
            <div class="contenedor">
                <ul class="lista-precios clearfix">
                    <li>
                        <div class="tabla-precio">
                            <h3>Pase por día </h3>
                            <p class="numero">$30</p>
                            <ul>
                                <li>Servicio Alimentación</li>
                                <li>Todas las conferencias</li>
                                <li>Todas los talleres</li>
                            </ul>
                            <a href="#" class="button hollow">Comprar</a>
                        </div>
                            
                    </li>

                     <li>
                        <div class="tabla-precio">
                            <h3>Todos los días  </h3>
                            <p class="numero">$50</p>
                            <ul>
                                <li>Servicio Alimentación</li>
                                <li>Todas las conferencias</li>
                                <li>Todas los talleres</li>
                            </ul>
                            <a href="#" class="button">Comprar</a>
                        </div>
                            
                    </li>

                     <li>
                        <div class="tabla-precio">
                            <h3>Pase por 2 días </h3>
                            <p class="numero">$45</p>
                            <ul>
                                <li>Servicio Alimentación</li>
                                <li>Todas las conferencias</li>
                                <li>Todas los talleres</li>
                            </ul>
                            <a href="#" class="button hollow">Comprar</a>
                        </div>
                            
                    </li>
                    
                </ul>
            </div>
        </section>
        <div id="mapa" class="mapa">  
        </div>
        <section class="seccion">
            <h2>Testimoniales</h2>
            <div class="testimoniales contenedor clearfix">
            <div class="testimonial">
                <blockquote>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo laborum dolore nihil numquam quod dicta perferendis minima voluptatum recusandae fugiat necessitatibus sed, veniam maiores consequuntur pariatur autem natus laudantium, cupiditate.
                    </p>
                    <footer class="info-testimonial clearfix">
                        <img src="img/testimonial.jpg" alt="image testimonial">
                        <cite>Oswaldo Palma Palma <span>Diseñador @prisma</span></cite>
                    </footer>
                </blockquote>
            </div> <!-- Fin Testimonial -->
            <div class="testimonial">
                <blockquote>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo laborum dolore nihil numquam quod dicta perferendis minima voluptatum recusandae fugiat necessitatibus sed, veniam maiores consequuntur pariatur autem natus laudantium, cupiditate.
                    </p>
                    <footer class="info-testimonial clearfix">
                        <img src="img/testimonial.jpg" alt="image testimonial">
                        <cite>Oswaldo Palma <span>Diseñador @prisma</span></cite>
                    </footer>
                </blockquote>
            </div> <!-- Fin Testimonial -->
            <div class="testimonial">
                <blockquote>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo laborum dolore nihil numquam quod dicta perferendis minima voluptatum recusandae fugiat necessitatibus sed, veniam maiores consequuntur pariatur autem natus laudantium, cupiditate.
                    </p>
                    <footer class="info-testimonial clearfix">
                        <img src="img/testimonial.jpg" alt="image testimonial">
                        <cite>Oswaldo Palma <span>Diseñador @prisma</span></cite>
                    </footer>
                </blockquote>
            </div> <!-- Fin Testimonial -->
            </div> <!-- Fin testimoniales -->
        </section>

        <div class="newsletter parallax">
            <div class="contenido contenedor">
                    <p>resgistrate en el newsletter</p>
                    <h3>gdlwebcamp</h3>
                    <a href="#" class="button transparente">Registro</a>
            </div> <!-- Contenido -->
        </div> <!-- Newsletter -->

         <section class="seccion">
                <h2>Faltan</h2>
                <div class="cuenta-regresiva contenedor">
                    <ul class="clearfix">
                        <li><p id="dias" class="numero"></p>días</li>
                        <li><p id="horas" class="numero"></p>horas</li>
                        <li><p id="minutos" class="numero"></p>minutos</li>
                        <li><p id="segundos" class="numero"></p>segundos</li>
                    </ul>
                </div>
            </section>
<?php include_once "includes/templates/footer.php" ;?>