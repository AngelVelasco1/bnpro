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
$sentencia = $base_de_datos->query('SELECT a.id_dpto, a.nom_dpto, b.nom_pais FROM tab_dptos a,tab_paises b WHERE a.id_pais = b.id_pais ORDER BY 1');
$dptos = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
<!--Recordemos que podemos intercambiar HTML y PHP como queramos-->
<?php include_once "JD_enc_dptos.php" ?>
<div class="row">
<!-- Aquí pon las col-x necesarias, comienza tu contenido, etcétera -->
	<div class="col-12">
		<h1>Departamentos BNPRO</h1>
		<a href="//www.bnpro.com.co" target="_blank">BNPRO</a>
		<br>
		<div class="table-responsive">
			<table class="table table-bordered">
				<thead class="thead-dark">
					<tr>
						<th scope="col" colspan="1" style="text-align: center">ID</th>
						<th scope="col" colspan="1" style="text-align: center">Nombre</th>
						<th scope="col" colspan="1" style="text-align: center">Pais</th>
						<th scope="col" colspan="1" style="text-align: center">Editar</th>
						<th scope="col" colspan="1" style="text-align: center">Eliminar</th>
					</tr>
				</thead>
				<tbody>
					<!--
					Atención aquí, sólo esto cambiará. Pd: no ignorar las llaves de inicio y cierre {}
					-->
					<?php foreach($dptos as $dpto)
					{?>
					<tr>
						<td><?php echo $dpto->id_dpto ?></td>
						<td><?php echo $dpto->nom_dpto ?></td>
						<td><?php echo $dpto->nom_pais ?></td>
						<td><a class="btn btn-warning" href="JD_edit_dptos.php?id_dpto=<?php echo $dpto->id_dpto;?>&id_dpto=<?php echo $dpto->id_dpto;?>">Editar 📝</a></td> 
						<td><a class="btn btn-danger" href="JD_elim_dptos.php?id_dpto=<?php echo $dpto->id_dpto;?>&id_dpto=<?php echo $dpto->id_dpto;?>">Eliminar 🗑️</a></td> 
					</tr>
					<?php
					} ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php include_once "pie.php" ?>