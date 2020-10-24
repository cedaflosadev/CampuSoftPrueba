<?php include("db.php") ?>

<?php include("header.php") ?>

    <div class="container p-4">
        <div class="row">
            <div class="col-md-4">
                <?php 
                if(isset($_SESSION['message'])){
                ?>
                <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['message']?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php session_unset(); } ?>

                <div class="card card-body">
                   <form action="saveTask.php" method="POST">
                        <div class="form-group">
                        <label for="nota_deberes">Nota de Deberes</label>
                            <input id="nota_deberes" type="number" step="0.01" name="notaDeberes" class="form-control" min="0" max="10" placeholder="Deberes" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required autofocus>
                            
                        </div>
                        <div class="form-group">
                        <label for="nota_examenes">Nota de Examen</label>
                        <input id="nota_examenes" type="number" step="0.01" name="notaExamenes" class="form-control" min="0" max="10" placeholder="Examen" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  required>
                        </div>

                        <div class="form-group">
                        <label for="exampleFormControlSelectMateriasave">Materia</label>
                        <select name="materiaSave"  class="form-control" id="exampleFormControlSelectMateriasave">
                        <?php
                            $query ="SELECT * FROM asignatura";
                            $resultEstudiante = mysqli_query($conn,$query);

                            while($row = mysqli_fetch_array($resultEstudiante)) {?>
                                <option value="<?= $row['id']?>" >
                                    <?php echo $row['Descripcion']?>
                                </option>

                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlAlumnosave">Alumno</label>
                        <select name="alumnoSave"  class="form-control" id="exampleFormControlAlumnosave">
                        <?php
                            $query ="SELECT * FROM estudiante";
                            $resultEstudiante = mysqli_query($conn,$query);

                            while($row = mysqli_fetch_array($resultEstudiante)) {?>
                                <option value="<?= $row['id']?>" >
                                    <?php echo $row['Nombre']?>
                                </option>

                            <?php } ?>
                      
                        </select>
                    </div>
                        <input type="submit" class="btn btn-success btn-block" name="saveTask" value="Registrar Notas">
                   </form>
                </div>
            </div>
            <div class="col-md-8">
                <div class="container">
                    <div class="row">
                        <div class="col-sm">
                                <div class="form-group">
                                <label for="materiaConsult">Búsqueda por materia</label>
                                <select  onchange="llenarTabla('',$(this).val())" class="form-control" id="materiaConsult">
                                <option value=0>-- Seleccione Materia --</option>
                                <?php
                                    $query ="SELECT * FROM asignatura";
                                    $resultEstudiante = mysqli_query($conn,$query);

                                    while($row = mysqli_fetch_array($resultEstudiante)) {?>
                                        <option value="<?= $row['id']?>" >
                                            <?php echo $row['Descripcion']?>
                                        </option>

                                    <?php } ?>
                                </select>
                                 </div>
                        </div>
                        <div class="col-sm">
                            <div class="form-group" >
                                <label for="estadoConsult">Búsqueda por estado</label>
                                <select onchange="llenarTabla($(this).val(),0)" class="form-control" id="estadoConsult">
                                <option value=''>-- Seleccione Estado --</option>
                                <option value="A">Aprobado</option>
                                <option value="R">Reprobado</option>
                                </select>
                            </div> 
                        </div>
                    </div>
                </div>
                
                <div id="tabladinamica"></div>
                   
            </div>
        </div>
    </div>

<?php include("footer.php") ?>
  