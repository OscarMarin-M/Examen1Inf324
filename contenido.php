<?php
include "cabecera.php";
session_start(); 
if (isset($_SESSION['usuario']))
{
	$nom=$_SESSION['usuario'];
	?>
	<?php 
	include 'conexion.php';
	$sql="SELECT usuario,color FROM usuario WHERE usuario like '$nom';";
	$result=mysqli_query($conn,$sql);
	$fila=mysqli_fetch_array($result);
	$color=$fila[1];
		// echo "aca".$fila[1];
	if (isset($_GET["color"])) {
		$color=$_GET["color"];
		$sql="UPDATE usuario SET color = '$color' WHERE usuario.usuario ='$nom';";
		$result=mysqli_query($conn,$sql);
	}
	
	?>

	<body  class="cuerpo">
		<header style="background-color: <?php echo $color?> ">
			<div class="perfil">
				<?php echo '<h2>usuario: '.$nom.'</h2>'?>
				<div style="margin-right: 5px;"><a href="cerrarsesion.php"><b style="color: #ffffff">Cerrar Sesion</b></a></div>
			</div>
		</header>
		<!-- <?php $color?> -->
		<div class="Contenido" style="background-color: <?php echo $color?> ">
			<h1>Selección de colores</h1>
			<p>Puedes escoger el color de tu portada</p>
			<form action="contenido.php" action="_GET">
				<select name="color" class="selec">
					<option disabled="">Selecciona un color</option>
					<option value="#c70039">Rojo</option>
					<option value="#ffc305">Amarillo</option>
					<option value="#8b4513">Cafe</option>
				</select>
				<input type="submit" name="Enviar Color">
			</form>
		</div>

		<div> 

			<p style="text-align: left; color: white;padding-left: 100px; padding-right: 100px">Adicione una tabla de notas por materia y cuente la cantidad de aprobados por departamento de manera que solo obtenga una sola fila de resultados con SQL (Dos posibles formas, una mediante el conteo y otra mediante función de la BD o SGBD).</p>
			<?php 
			$sql="SELECT count(a.lugar) cantidad,(a.lugar),(case 
			when a.lugar like '01' then 'Chuquisaca'
			when a.lugar like '02' then 'La Paz'
			when a.lugar like '03' then 'Cochabamba'
			when a.lugar like '04' then 'Oruro'
			when a.lugar like '05' then 'Potosi'
			when a.lugar like '06' then 'Tarija'
			when a.lugar like '07' then 'Santa Cruz'
			when a.lugar like '08' then 'Beni'
			when a.lugar like '09' then 'Pando'
			end) Departamento
			FROM (SELECT ci,lugar
			FROM identificador) as a, notas as n
			where a.ci like n.ci
			and n.nota > 50
			GROUP by a.lugar;";
			echo'<div  class="tablas">';
			
			echo '<table>';
			
			$result=mysqli_query($conn,$sql);
			while($fila=mysqli_fetch_row($result))
			{
				echo "<tr>";
				echo "<td>".$fila[0]."</td>";
				echo "<td>".$fila[1]."</td>";
				echo "<td>".$fila[2]."</td>";
				echo "</tr>";
				echo "<tr>";
			}
			echo "</table>";

			$result=mysqli_query($conn,$sql);

			
			echo '<table>';
			
			echo "<tr>";
			echo "<th>Departamento</th>";
			while($fila=mysqli_fetch_row($result))
			{
				echo "<td>".$fila[2]."</td>";
			}
			echo "</tr>";
			echo "<tr>";
			echo "<th>Nro Aprobados</th>";
			$result=mysqli_query($conn,$sql);
			while($fila=mysqli_fetch_row($result))
			{
				echo "<td>".$fila[0]."</td>";
			}
			echo "</tr>";
			echo "</table>";
			$sql="SELECT count(case when i.lugar like '01' then n.nota end) 'Chuquisaca',
	count(case when i.lugar like '02' then n.nota end) 'La Paz',
 	count(case when i.lugar like '03' then n.nota end) 'Cochabamba',
 	count(case when i.lugar like '04' then n.nota end) 'Oruro',
 	count(case when i.lugar like '05' then n.nota  end) 'Potosi',
 	count(case when i.lugar like '06' then n.nota  end) 'Tarija',
 	count(case when i.lugar like '07' then n.nota  end) 'Santa Cruz',
 	count(case when i.lugar like '08' then n.nota  end) 'Beni',
 	count(case when i.lugar like '09' then n.nota  end) 'Pando'
	FROM identificador as i, notas as n
	where i.ci like n.ci
	and n.nota > 50";
			$result=mysqli_query($conn,$sql);
			
			echo '<table>';
			
			echo "<tr>";
			echo "<td>Chuquisaca</td><td>La Paz</td><td>Cochabamba</td><td>Oruro</td><td>Potosi</td><td>Tarija</td><td>Santa Cruz</td><td>Beni</td><td>Pando";
			echo "</tr>";
			echo "<tr>";
			while($fila=mysqli_fetch_array($result))
			{
				echo '<td>'.$fila["Chuquisaca"].'</td><td>'.$fila["La Paz"].'</td><td>'.$fila["Cochabamba"].'</td><td>'.$fila["Oruro"].'</td><td>'.$fila["Potosi"].'</td><td>'.$fila["Tarija"].'</td><td>'.$fila["Santa Cruz"].'</td><td>'.$fila["Beni"].'</td><td>'.$fila["Pando"].'</td>';
			}
			echo "</tr>";
			echo '</table>';
			echo"</div>";
			?>
		</div>

	</body>
	</html>
<?php 
}else
{header('Location: principal.php');} ?>
</body>
</html>