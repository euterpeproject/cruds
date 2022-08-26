<?php 

include('../conexion/conexion.php');

  if (!isset($_POST['buscar'])){$_POST['buscar'] = '';}

?>

<html>

<head>

<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
<link rel="stylesheet" href="../css/bootstrap.css">
</head>

<body>

<div class="container">

<?php 

if(!empty($_POST)) {

        // resaltamos el resultado
        function resaltar_frase($string, $frase, $taga = '<b>', $tagb = '</b>'){
            return ($string !== '' && $frase !== '')
            ? preg_replace('/('.preg_quote($frase, '/').')/i'.('true' ? 'u' : ''), $taga.'\\1'.$tagb, $string)
            : $string;
             }
    
      $aKeyword = explode(" ", $_POST['buscar']);
      $filtro = "WHERE name LIKE LOWER('%".$aKeyword[0]."%') OR phone LIKE LOWER('%".$aKeyword[0]."%')
      OR email LIKE LOWER('%".$aKeyword[0]."%')";
      $query ="select * from contacto where name LIKE LOWER('%".$aKeyword[0]."%') OR phone LIKE LOWER('%".$aKeyword[0]."%')
      OR email LIKE LOWER('%".$aKeyword[0]."%')";
  

     for($i = 0; $i < count($aKeyword); $i++) {
        if(!empty($aKeyword[$i])) {
            $query .= " OR name LIKE '%" . $aKeyword[$i] . "%' OR phone LIKE '%" . $aKeyword[$i] . "%'
            OR email LIKE '%" . $aKeyword[$i] . "%'";
        }
      }

     $result = $mysql->query($query);
     $numero = mysqli_num_rows($result);

     if (!isset($_POST['buscar'])){
     echo "Has buscado la palabra:<b> ". $_POST['buscar']."</b>";
     }

     if (mysqli_num_rows($result) > 0 AND $_POST['buscar'] != '') {
        $row_count=0;
        echo "Resultados encontrados:<b> ".$numero."</b>"; 
     

    /* } else {
      echo "Resultados encontrados: 0";
    } */ 
        
    ?>

        <table class="table table-bordered table-striped table-hover">
          <thead>
          <tr>
              <th scope="col">Resultado</th>
              <th scope="col">Código</th>
              <th scope="col">Nombre</th>
              <th scope="col">Teléfono</th>
              <th scope="col">Fecha Nacimiento</th>
              <th scope="col">Edad</th>
              <th scope="col">Dirección</th>
              <th scope="col">Correo</th>
              <th scope="col">Acción</th>
          </tr>
          </thead>
          <tbody>
        
        <?php

        if ($_POST['buscar'] == '') {  
          echo "Resultados encontrados: 0";
        } else {

        $row_count=0;
        While ($row = $result->fetch_assoc()) {   
            $row_count++;  
    
        ?>    
          <tr>
            <td><?php echo $row_count ?></td>
            <td><?php echo $row['id'] ?></td>
            <td><?php echo resaltar_frase($row['name'] ,$_POST['buscar']) ?></td>
            <td><?php echo resaltar_frase($row['phone'] ,$_POST['buscar']) ?></td>
            <td><?php echo $row['date'] ?></td>
            <td><?php echo $row['age'] ?></td>
            <td><?php echo $row['address'] ?></td>
            <td><?php echo resaltar_frase($row['email'] ,$_POST['buscar']) ?></td>

            <form method="POST" action="#" class="col-8" id="buscar">

                <?php 
                  if ($_POST['buscar'] != $row['email']) {
                ?>
                <td>
                  <button type="submit" id="validar" class="btn btn-success" >Editar</button>
                  <input type="hidden" class="form-control" id="buscar" name="buscar" value="<?php echo $row['email'] ?>">
            
                <?php 
                  } else {
                ?>
              
               <td>
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalConsultar"> 
                    Modificar 
                  </button>
  
                  <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalEliminar">
                    Eliminar 
                  </button>
                </td>

                <?php
                  }
                ?>

            </form>

          </tr>

      <?php
          }
        } 
        } else {
          echo "Resultados encontrados:<b> ".$numero."</b>";
        }
      }
          $mysql->close();
          include('../templates/modal_consultar_contacto.php'); 
          include('../templates/modal_eliminar_consultar_contacto.php'); 
      ?>
      </tbody>
      </table>

      <center><h1>Listado de Contactos</h1></center>

</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" 
integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" 
integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>
</html>

   