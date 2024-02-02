<?php
$question = $_POST['question'];
$conexion = require '../menu/db_connection.php';
// Aquí puedes agregar la lógica para generar respuestas del chatbot
// Por ejemplo, podrías usar un arreglo asociativo que mapee preguntas a respuestas
$answers = array(
    "Hola", "hola" => "¡Hola! ¿En qué puedo ayudarte? para comunicarte con secretaria responde Secretaria y para soportes responde Ayuda",
    "Necesito abrir un formulario","formularios" => "¡Si claro! ¿Que formulario deseas?",
    "¿Cómo estás?" => "Estoy bien, gracias por preguntar.",
    "¿Gracias?", "gracias" => "De nada, un placer.",
    "Adiós","adios" => "¡Hasta luego!",
    "que tal" => "¡todo bien!",
    "quien eres"=> "¡Soy tu asistentente virtual!",
    "Abreme un formulario" => "¡Que formulario deseas abrir!",
    "Rector", "rector" => "El Lic. Luis Ampam es el rector de la Unidad Educativa Intercultural Bilingüe ciudad de Macas.",

    "formulario de matriculas","matriculas" => "¡ingresa en el siguiente enlace <a href='http://localhost/SistemaAcademico/matricula/mostrar.php'>Matriculas</a>",
    "formulario de estudiantes","estudiantes" => "¡ingresa en el siguiente enlace <a href='http://localhost/SistemaAcademico/estudiante/mostrar.php'>Estudiantes</a>",  
    "formulario de docentes","docentes" ,"profesor" => "¡ingresa en el siguiente enlace <a href='http://localhost/SistemaAcademico/docente/mostrar.php'>Docentes</a>",
    "formulario de ciclo","ciclo" => "¡ingresa en el siguiente enlace <a href='http://localhost/SistemaAcademico/ciclo/mostrar.php'>Ciclo</a>",
    "formulario de asignaturas","asignaturas" => "¡ingresa en el siguiente enlace <a href='http://localhost/SistemaAcademico/asignatura/mostrar.php'>Asignaturas</a>",
    "formulario de usuarios","usuarios" => "¡ingresa en el siguiente enlace <a href='http://localhost/SistemaAcademico/usuario/mostrar.php'>Usuarios</a>",
    "formulario de tipo de usuario","tipo de usuario" => "¡ingresa en el siguiente enlace <a href='http://localhost/SistemaAcademico/tipousuario/mostrar.php'>Tipo de usuarios</a>",
    "formulario de inicio","inicio" => "¡ingresa en el siguiente enlace <a href='http://localhost/SistemaAcademico/menu/menu.php'>Inicio</a>",
    "formulario de niveles","niveles" => "¡ingresa en el siguiente enlace <a href='http://localhost/SistemaAcademico/grado/mostrar.php'>Niveles</a>",
    "formulario de año lectivo","año lectivo","Año lectivo" => "¡ingresa en el siguiente enlace <a href='http://localhost/SistemaAcademico/gradoDocente/mostrar.php'>Año lectivo</a>",
    "formulario de responsables","responsables" => "¡ingresa en el siguiente enlace <a href='http://localhost/SistemaAcademico/responsable/mostrar.php'>Responsables</a>",
    "Secretaria", "secretaria" => "¡Aqui para contactarte con secretaria mediante Whatsapp   <a href='https://wa.link/o431sq'>Secretaria</a>",
    "Ayuda","ayuda" => "¡ingresa en el siguiente enlace <a href='https://wa.link/8crpsn'>Soportes</a> o comunicate a nuestro correo electronico: jaramilloderek13@gmail.com",
    "Notas","notas" => "¡ingresa en el siguiente enlace <a href='http://localhost/SistemaAcademico/Estnotas/mostrar.php'>Notas</a>",
    
    "Notas", "estudiantes buenos" => obtenerNotasPorArribaDe7($conexion),
);

function obtenerNotasPorArribaDe7($conexion) {
    // Consulta SQL
    $sql = "SELECT nie, idasignatura, primerTrimestre FROM notas WHERE primerTrimestre > 7";
    $result = mysqli_query($conexion, $sql);

    // Construir la respuesta
    $response = "Notas por arriba de 7:<br>";

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $response .= "Estudiante ID: " . $row['nie'] . ", Materia: " . $row['idasignatura'] . ", Nota: " . $row['primerTrimestre'] . "<br>";
        }
    } else {
        $response .= "Error al obtener las notas: " . mysqli_error($conexion);
    }

    // Cerrar la conexión
    mysqli_close($conexion);

    return $response;
}

$response = isset($answers[$question]) ? $answers[$question] : "Lo siento, no entiendo esa pregunta.";
echo $response;
?>
