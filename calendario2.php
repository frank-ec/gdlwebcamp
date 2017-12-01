<?php include_once 'includes/templates/header.php'; ?>

<?php
$dias = array();
?>
<section class="seccion contenedor">

<h2>Calendario de Eventos</h2>

<?php
try {
require_once('includes/funciones/bd_conexion.php');
$sql = "SELECT `evento_id`, `nombre_evento`, `fecha_evento`, `hora_evento`, `cat_evento`, `nombre_invitado`, `apeliido_invitado` ";
$sql .= "FROM `eventos` ";
$sql .= "INNER JOIN `categoria_evento` ";
$sql .= "ON (eventos.id_cat_evento=categoria_evento.id_categoria) ";
$sql .= "INNER JOIN `invitados` ";
$sql .= "ON eventos.id_inv=invitados.invitado_id ";
$sql .= "ORDER BY `evento_id` ";
$resultado = $conn->query($sql);
} catch (Exception $e) {
$error = $e->getMessage();
}
?>

<div class="fathercategorias">
<div class="calendario">

<?php

while($eventos = $resultado->fetch_assoc()){

array_push($dias,$eventos['fecha_evento']);


?>
<?php if($dia_actual == $dias[$contador]): ?>
<h3>
<i class="fa fa-calendar" aria-hidden="true"></i>
<?php echo $eventos['fecha_evento']; ?>
</h3>
<?php $contador++; ?>
<?php if($contador==9): ?>
<?php $contador =0; ?>
<?php endif; ?>
<?php endif; ?>


<!-- <?php echo($dias)?> -->

<div class="dia">

<p class="titulo"><?php echo utf8_encode($eventos['nombre_evento']); ?></p>
<p class="hora"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $eventos['fecha_evento'] . " " . $eventos['hora_evento'] . "hrs"; ?>

<p>
<?php $categoria_evento = $eventos['cat_evento']; ?>
<?php
switch ($categoria_evento) {
case 'Talleres':
echo '<i class="fa fa-code" aria-hidden="true"></i> Taller';
break;
case 'Conferencias':
echo '<i class="fa fa-comment" aria-hidden="true"></i> Conferencias';
break;
case 'Seminario':
echo '<i class="fa fa_university" aria-hidden="true"></i> Seminarios';
break;
default:
echo "";
break;
}

?>
</p>
<p><i class="fa fa-user" aria-hidden="true"></i>
<?php echo $eventos['nombre_invitado'] . " " . $eventos['apeliido_invitado']; ?>
</p>
</div>


<!-- <pre>
<?php var_dump($eventos); ?>
</pre> -->

<?php } ?>

</div>
</div>
<?php
$conn->close();
?>

</section>

<?php
echo "<pre>";
print_r($dias);
echo "</pre>";
?>

<?php include_once 'includes/templates/footer.php'; ?>