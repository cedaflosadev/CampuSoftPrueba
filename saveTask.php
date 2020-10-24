<?php
include("db.php");

if(isset($_POST['saveTask'])){
    $notaDeberes = $_POST['notaDeberes'];
    $notaExamen = $_POST['notaExamenes'];
    $promedio = ($notaDeberes + $notaExamen) / 2;

    if($promedio>=7 && $promedio <=10){
        $estado = 'A';
    }
    else{
        $estado ='R';
    }
    
    $id_asignatura =$_POST['materiaSave'];
    $id_estudiante =$_POST['alumnoSave'];

    $query ="SELECT * FROM `calificaciones` WHERE id_asignatura=".$id_asignatura." and id_estudiante=".$id_estudiante."";

    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_array($result);
    
    if(empty($row)){
       
        $query ="INSERT INTO calificaciones(deb,exa,promedio,estado,id_asignatura,id_estudiante) values ($notaDeberes,$notaExamen,$promedio,'$estado',$id_asignatura,$id_estudiante)";

        $result = mysqli_query($conn,$query);

        if(!$result){
            die("Erro");
        }

        $_SESSION['message']='Nota registrada correctamente';
        $_SESSION['message_type']='success';

    header("Location:index.php");
        
    }
    else{
        
        $_SESSION['message']='Ya existe registro';
        $_SESSION['message_type']='danger';
        header("Location:index.php");

    }
}



?>