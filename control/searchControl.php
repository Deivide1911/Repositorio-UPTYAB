<?php
if(isset($_POST['control'])){
    $control = $_POST['control'];
    if($control == '0'){
        if(isset($_POST['buscar'])){
            if($_POST['buscar'] >= 1 ){
                $buscar = $_POST['buscar'];
                $consulta = $conexion->query("SELECT *
                    FROM informatica
                    WHERE estado LIKE 'Habilitado'
                        AND (
                        trayecto LIKE '%$buscar%'
                        OR titulo LIKE '%$buscar%'
                        OR tipoproyecto LIKE '%$buscar%'
                        OR archivo LIKE '%$buscar%'
                        OR etiquetas LIKE '%$buscar%'
                        OR autores LIKE '%$buscar%'
                            )
                        UNION
                        SELECT * FROM enfermeria WHERE estado LIKE 'Habilitado' 
                        AND (
                        trayecto LIKE '%$buscar%'
                        OR titulo LIKE '%$buscar%'
                        OR tipoproyecto LIKE '%$buscar%'
                        OR archivo LIKE '%$buscar%'
                        OR etiquetas LIKE '%$buscar%'
                        OR autores LIKE '%$buscar%'
                        )
                        UNION
                        SELECT * FROM avanzada WHERE estado LIKE 'Habilitado' 
                        AND (
                        trayecto LIKE '%$buscar%'
                        OR titulo LIKE '%$buscar%'
                        OR tipoproyecto LIKE '%$buscar%'
                        OR archivo LIKE '%$buscar%'
                        OR etiquetas LIKE '%$buscar%'
                        OR autores LIKE '%$buscar%'
                        )
                        UNION
                        SELECT * FROM administracion WHERE estado LIKE 'Habilitado' 
                        AND (
                        trayecto LIKE '%$buscar%'
                        OR titulo LIKE '%$buscar%'
                        OR tipoproyecto LIKE '%$buscar%'
                        OR archivo LIKE '%$buscar%'
                        OR etiquetas LIKE '%$buscar%'
                        OR autores LIKE '%$buscar%'
                        )
                        UNION
                        SELECT * FROM higiene_laboral WHERE estado LIKE 'Habilitado' 
                        AND (
                        trayecto LIKE '%$buscar%'
                        OR titulo LIKE '%$buscar%'
                        OR tipoproyecto LIKE '%$buscar%'
                        OR archivo LIKE '%$buscar%'
                        OR etiquetas LIKE '%$buscar%'
                        OR autores LIKE '%$buscar%'
                        )
                        UNION
                        SELECT * FROM agroalimentacion WHERE estado LIKE 'Habilitado' 
                        AND (
                        trayecto LIKE '%$buscar%'
                        OR titulo LIKE '%$buscar%'
                        OR tipoproyecto LIKE '%$buscar%'
                        OR archivo LIKE '%$buscar%'
                        OR etiquetas LIKE '%$buscar%'
                        OR autores LIKE '%$buscar%'
                        )
                        ORDER BY trayecto ASC;
                ");
            }
            else{
                $consulta = $conexion->query("SELECT * FROM (
                    SELECT * FROM informatica WHERE estado LIKE 'Habilitado'
                    UNION
                    SELECT * FROM enfermeria WHERE estado LIKE 'Habilitado'
                    UNION
                    SELECT * FROM avanzada WHERE estado LIKE 'Habilitado'
                    UNION
                    SELECT * FROM administracion WHERE estado LIKE 'Habilitado'
                    UNION
                    SELECT * FROM higiene_laboral WHERE estado LIKE 'Habilitado'
                    UNION
                    SELECT * FROM agroalimentacion WHERE estado LIKE 'Habilitado'
                ) AS union_resultado
                JOIN fecha f ON union_resultado.id = f.id AND union_resultado.idpnf = f.idpnf
               ORDER BY DATE(f.hora_fecha) DESC, TIME(f.hora_fecha) DESC
            ");
            }
            }
            else{
                echo "No se ha podido realizar la búsqueda correctamente";
            }
          
    }
    else if($control == '1'){
        if (isset($_POST['pnf']) && isset($_POST['trayecto']) && isset($_POST['tproyecto'])){
            $pnf = $_POST['pnf'];
            $trayecto = $_POST['trayecto'];
            $tproyecto = $_POST['tproyecto'];
            if($pnf == 'a' && $trayecto == 'a' && $tproyecto == 'a'){
                $consulta = $conexion->query("SELECT * FROM (
                    SELECT * FROM informatica WHERE estado LIKE 'Habilitado'
                    UNION
                    SELECT * FROM enfermeria WHERE estado LIKE 'Habilitado'
                    UNION
                    SELECT * FROM avanzada WHERE estado LIKE 'Habilitado'
                    UNION
                    SELECT * FROM administracion WHERE estado LIKE 'Habilitado'
                    UNION
                    SELECT * FROM higiene_laboral WHERE estado LIKE 'Habilitado'
                    UNION
                    SELECT * FROM agroalimentacion WHERE estado LIKE 'Habilitado'
                ) AS union_resultado
                JOIN fecha f ON union_resultado.id = f.id AND union_resultado.idpnf = f.idpnf
               ORDER BY DATE(f.hora_fecha) DESC, TIME(f.hora_fecha) DESC
            ");
            }
            else if($pnf != 'a' && $trayecto != 'a' &&  $tproyecto != 'a' ) {
            $consulta = $conexion->query("SELECT * FROM $pnf WHERE estado LIKE 'Habilitado' AND trayecto LIKE '$trayecto' AND tipoproyecto LIKE '$tproyecto'");
            }
            else if($pnf != 'a' && $trayecto == 'a' &&  $tproyecto == 'a'){
                $consulta = $conexion->query("SELECT * FROM $pnf WHERE estado LIKE 'Habilitado'");
            }
            else if($pnf == 'a' && $trayecto == 'a' && $tproyecto != 'a') {
                $consulta = $conexion->query("SELECT * FROM (
                    SELECT * FROM informatica WHERE estado LIKE 'Habilitado' AND tipoproyecto LIKE '$tproyecto'
                    UNION
                    SELECT * FROM enfermeria WHERE estado LIKE 'Habilitado' AND tipoproyecto LIKE '$tproyecto'
                    UNION
                    SELECT * FROM avanzada WHERE estado LIKE 'Habilitado' AND tipoproyecto LIKE '$tproyecto'
                    UNION
                    SELECT * FROM administracion WHERE estado LIKE 'Habilitado' AND tipoproyecto LIKE '$tproyecto'
                    UNION
                    SELECT * FROM higiene_laboral WHERE estado LIKE 'Habilitado' AND tipoproyecto LIKE '$tproyecto'
                    UNION
                    SELECT * FROM agroalimentacion WHERE estado LIKE 'Habilitado' AND tipoproyecto LIKE '$tproyecto'
                ) AS union_resultado
                JOIN fecha f ON union_resultado.id = f.id AND union_resultado.idpnf = f.idpnf
               ORDER BY DATE(f.hora_fecha) DESC, TIME(f.hora_fecha) DESC
            ");
            }
            else if($pnf == 'a' && $trayecto != 'a' && $tproyecto == 'a') {
                $consulta = $conexion->query("SELECT * FROM (
                    SELECT * FROM informatica WHERE estado LIKE 'Habilitado' AND trayecto LIKE '$trayecto'
                    UNION
                    SELECT * FROM enfermeria WHERE estado LIKE 'Habilitado' AND trayecto LIKE '$trayecto'
                    UNION
                    SELECT * FROM avanzada WHERE estado LIKE 'Habilitado' AND trayecto LIKE '$trayecto'
                    UNION
                    SELECT * FROM administracion WHERE estado LIKE 'Habilitado' AND trayecto LIKE '$trayecto'
                    UNION
                    SELECT * FROM higiene_laboral WHERE estado LIKE 'Habilitado' AND trayecto LIKE '$trayecto'
                    UNION
                    SELECT * FROM agroalimentacion WHERE estado LIKE 'Habilitado' AND trayecto LIKE '$trayecto'
                ) AS union_resultado
                JOIN fecha f ON union_resultado.id = f.id AND union_resultado.idpnf = f.idpnf
               ORDER BY DATE(f.hora_fecha) DESC, TIME(f.hora_fecha) DESC
            ");
            }
            else if($pnf == 'a' && $trayecto != 'a' && strlen($tproyecto) >= 1){
                $consulta = $conexion->query("SELECT * FROM (
                    SELECT * FROM informatica WHERE estado LIKE 'Habilitado' AND tipoproyecto LIKE '$tproyecto' AND trayecto LIKE '$trayecto'
                    UNION
                    SELECT * FROM enfermeria WHERE estado LIKE 'Habilitado' AND tipoproyecto LIKE '$tproyecto' AND trayecto LIKE '$trayecto'
                    UNION
                    SELECT * FROM avanzada WHERE estado LIKE 'Habilitado' AND tipoproyecto LIKE '$tproyecto' AND trayecto LIKE '$trayecto'
                    UNION
                    SELECT * FROM administracion WHERE estado LIKE 'Habilitado' AND tipoproyecto LIKE '$tproyecto' AND trayecto LIKE '$trayecto'
                    UNION
                    SELECT * FROM higiene_laboral WHERE estado LIKE 'Habilitado' AND tipoproyecto LIKE '$tproyecto' AND trayecto LIKE '$trayecto'
                    UNION
                    SELECT * FROM agroalimentacion WHERE estado LIKE 'Habilitado' AND tipoproyecto LIKE '$tproyecto' AND trayecto LIKE '$trayecto'
                ) AS union_resultado
                JOIN fecha f ON union_resultado.id = f.id AND union_resultado.idpnf = f.idpnf
               ORDER BY DATE(f.hora_fecha) DESC, TIME(f.hora_fecha) DESC
            ");
            }
            else if($pnf != 'a' && $trayecto != 'a' && $tproyecto == 'a'){
                $consulta = $conexion->query("SELECT * FROM $pnf WHERE estado LIKE 'Habilitado' AND trayecto LIKE '$trayecto'");
            }
            else if ($pnf != 'a' && $trayecto == 'a' && $tproyecto != 'a' ){
                $consulta = $conexion->query("SELECT * FROM $pnf WHERE estado LIKE 'Habilitado' AND tipoproyecto LIKE '$tproyecto'");
            }
            }
            else{
                $consulta = $conexion->query("SELECT * FROM (
                    SELECT * FROM informatica WHERE estado LIKE 'Habilitado'
                    UNION
                    SELECT * FROM enfermeria WHERE estado LIKE 'Habilitado'
                    UNION
                    SELECT * FROM avanzada WHERE estado LIKE 'Habilitado'
                    UNION
                    SELECT * FROM administracion WHERE estado LIKE 'Habilitado'
                    UNION
                    SELECT * FROM higiene_laboral WHERE estado LIKE 'Habilitado'
                    UNION
                    SELECT * FROM agroalimentacion WHERE estado LIKE 'Habilitado'
                ) AS union_resultado
                JOIN fecha f ON union_resultado.id = f.id AND union_resultado.idpnf = f.idpnf
               ORDER BY DATE(f.hora_fecha) DESC, TIME(f.hora_fecha) DESC
            ");
                echo "<p class='errorbusq'>Ocurrió algún error al realizar la búsqueda!<p>";
            }
        }
        else{
            echo "No se ha podido realizar la búsqueda correctamente";
        }
    }

else{
    $consulta = $conexion->query("SELECT * FROM (
        SELECT * FROM informatica WHERE estado LIKE 'Habilitado'
        UNION
        SELECT * FROM enfermeria WHERE estado LIKE 'Habilitado'
        UNION
        SELECT * FROM avanzada WHERE estado LIKE 'Habilitado'
        UNION
        SELECT * FROM administracion WHERE estado LIKE 'Habilitado'
        UNION
        SELECT * FROM higiene_laboral WHERE estado LIKE 'Habilitado'
        UNION
        SELECT * FROM agroalimentacion WHERE estado LIKE 'Habilitado'
    ) AS union_resultado
    JOIN fecha f ON union_resultado.id = f.id AND union_resultado.idpnf = f.idpnf
   ORDER BY DATE(f.hora_fecha) DESC, TIME(f.hora_fecha) DESC
");
$control = 0;
}
?>