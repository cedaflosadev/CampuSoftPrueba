<?php include("db.php") ?>
<table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Materia</th>
                                <th>Deberes</th>
                                <th>Examen</th>
                                <th>Promedio</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                             if(isset($_POST['sql']))
                             { 
                                 
                               $query= $_POST['sql'];
                               $resultCalificaciones = mysqli_query($conn,$query);

                            while($row = mysqli_fetch_array($resultCalificaciones)) {?>
                                <tr >
                                    <td><?php echo $row['Nombre']?></td>
                                    <td><?php echo $row['Descripcion']?></td>
                                    <td><?php echo $row['deb']?></td>
                                    <td><?php echo $row['exa']?></td>
                                    <td><?php echo $row['promedio']?></td>
                                    <td><?php echo $row['estado']?></td>
                                </tr>

                            <?php }
                                    } ?>
                        </tbody>
                    </table>
  