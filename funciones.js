function llenarTabla(estado,materia)
{   
    estado = document.getElementById('estadoConsult').value;
    materia = document.getElementById('materiaConsult').value;
    
    switch(true){
        case (estado=='' && materia ==0):
            var cadena ="SELECT estudiante.Nombre,asignatura.Descripcion,deb,exa,promedio,estado FROM calificaciones INNER JOIN estudiante ON calificaciones.id_estudiante = estudiante.id INNER JOIN asignatura ON calificaciones.id_asignatura = asignatura.id";
        break;
        
        case (estado!='' && materia ==0):
            var cadena ="SELECT estudiante.Nombre,asignatura.Descripcion,deb,exa,promedio,estado FROM calificaciones INNER JOIN estudiante ON calificaciones.id_estudiante = estudiante.id INNER JOIN asignatura ON calificaciones.id_asignatura = asignatura.id WHERE estado='"+estado+"'";
        break;
        
        case (estado=='' && materia !=0):
            var cadena ="SELECT estudiante.Nombre,asignatura.Descripcion,deb,exa,promedio,estado FROM calificaciones INNER JOIN estudiante ON calificaciones.id_estudiante = estudiante.id INNER JOIN asignatura ON calificaciones.id_asignatura = asignatura.id WHERE asignatura.id = "+materia+"";
        break;

        case (estado!='' && materia !=0):
            var cadena ="SELECT estudiante.Nombre,asignatura.Descripcion,deb,exa,promedio,estado FROM calificaciones INNER JOIN estudiante ON calificaciones.id_estudiante = estudiante.id INNER JOIN asignatura ON calificaciones.id_asignatura = asignatura.id WHERE asignatura.id = "+materia+" AND estado='"+estado+"'";
        break;
        
        default:
            var cadena ="SELECT estudiante.Nombre,asignatura.Descripcion,deb,exa,promedio,estado FROM calificaciones INNER JOIN estudiante ON calificaciones.id_estudiante = estudiante.id INNER JOIN asignatura ON calificaciones.id_asignatura = asignatura.id";
        break;
    }
    
    $.ajax({
        type:"post",
        url:"tablaResumen.php",
        data:{sql: cadena},
        success:function(r){
            
            r.includes('td')?$('#tabladinamica').html(r): $('#tabladinamica').html('<h4 style="color:#f57971;margin:20px;text-align:center;">No existe registro</h4>');
        },
        error:function(r) {
            alert("error"+  r);
        }
    });

}