<?php
/*
CRUD con PostgreSQL y PHP
@Equipo BNPRO (Alvaro, Jose, Esteban, CEP)
@2023-05-08
=========================================================================================
Este archivo lista todos los datos de la tabla, obteniendo a los mismos como un arreglo
=========================================================================================
*/
?>
<?php
include_once "base_de_datos.php";
/*echo "Entro a Listar para saber si está entrando o no....";*/
$sentencia = $base_de_datos->query('SELECT id_pais, nom_pais, ind_estado FROM tab_paises ORDER BY 1');
$paises = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
<!--Recordemos que podemos intercambiar HTML y PHP como queramos-->
<?php include_once "encab_paises.php" ?>
<div class="row">
<!-- Aquí pon las col-x necesarias, comienza tu contenido, etcétera -->
	<div class="col-12">
		<h1>Paises BNPRO</h1>
		<a href="//www.bnpro.com.co" target="_blank">BNPRO</a>
		<br>
		<div class="table-responsive">
			<table class="table table-bordered">
				<thead class="thead-dark">
					<tr>
					<th scope="col" colspan="1" style="text-align: center">ID</th>
					<th scope="col" colspan="1" style="text-align: center">Paises</th>
					<th scope="col" colspan="1" style="text-align: center">Estado</th>
					<th scope="col" colspan="1" style="text-align: center">Editar</th>
					<th scope="col" colspan="1" style="text-align: center">Declarae Estado</th>
					</tr>
				</thead>
				<tbody>
					<!--
					Atención aquí, sólo esto cambiará
					Pd: no ignores las llaves de inicio y cierre {}
					-->
					<?php foreach($paises as $pais)
					{
						?>
						<tr>
							<td><?php echo $pais->id_pais ?></td>
							<td><?php echo $pais->nom_pais ?></td>
							<td><?php if ($pais->ind_estado==False) {
							echo "Inactivo";
						}else{
							echo"Activo";
						}
						?></td>
							<td><a class="btn btn-warning" href="<?php echo "edit_paises.php?id_pais=" . $pais->id_pais?>">Editar 📝</a></td>
							<td><?php if($pais->ind_estado==TRUE){
							echo "<a class='btn btn-success' href='desactivar_paises.php?id_pais=$pais->id_pais'>Activo 😁</a>";} else{
								echo "<a class='btn btn-danger' href='desactivar_paises.php?id_pais=$pais->id_pais'>Desactivo ☹️</a>";} ?></td>
						</tr>
					<?php
					} ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php include_once "pie.php" ?>