<?php
$question = $_POST['question'];
$conexion = require '../menu/db_connection.php';

// Aquí puedes agregar la lógica para generar respuestas del chatbot
// Por ejemplo, podrías usar un arreglo asociativo que mapee preguntas a respuestas
$answers = array(
    // ... (código anterior)
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
    "formulario de docentes","docentes" => "¡ingresa en el siguiente enlace <a href='http://localhost/SistemaAcademico/docente/mostrar.php'>Docentes</a>",
    "formulario de ciclo","ciclo" => "¡ingresa en el siguiente enlace <a href='http://localhost/SistemaAcademico/ciclo/mostrar.php'>Ciclo</a>",
    "formulario de asignaturas","asignaturas" => "¡ingresa en el siguiente enlace <a href='http://localhost/SistemaAcademico/asignatura/mostrar.php'>Asignaturas</a>",
    "formulario de usuarios","usuarios" => "¡ingresa en el siguiente enlace <a href='http://localhost/SistemaAcademico/usuario/mostrar.php'>Usuarios</a>",
    "formulario de tipo de usuario","tipo de usuario" => "¡ingresa en el siguiente enlace <a href='http://localhost/SistemaAcademico/tipousuario/mostrar.php'>Tipo de usuarios</a>",
    "formulario de inicio","inicio" => "¡ingresa en el siguiente enlace <a href='http://localhost/SistemaAcademico/menu/menu.php'>Inicio</a>",
    "formulario de niveles","niveles" => "¡ingresa en el siguiente enlace <a href='http://localhost/SistemaAcademico/grado/mostrar.php'>Niveles</a>",
    "formulario de año lectivo","año lectivo" => "¡ingresa en el siguiente enlace <a href='http://localhost/SistemaAcademico/gradoDocente/mostrar.php'>Año lectivo</a>",
    "formulario de responsables","responsables" => "¡ingresa en el siguiente enlace <a href='http://localhost/SistemaAcademico/responsable/mostrar.php'>Responsables</a>",
    "Secretaria", "secretaria" => "¡Aqui para contactarte con secretaria mediante Whatsapp   <a href='https://wa.link/o431sq'>Secretaria</a>",
    "Ayuda","ayuda" => "¡ingresa en el siguiente enlace <a href='https://wa.link/8crpsn'>Soportes</a> o comunicate a nuestro correo electronico: jaramilloderek13@gmail.com",
    "Notas","notas" => "¡ingresa en el siguiente enlace <a href='http://localhost/SistemaAcademico/Estnotas/mostrar.php'>Notas</a>",
   
    "Notas", "estudiantes bajos en ciencias" => obtenerNotasPorDebajoDe7Ciencias($conexion),
    "Notas", "estudiantes buenos en ciencias" => obtenerNotasPorArribaDe7Ciencias($conexion),
    "Notas", "estudiantes bajos en ciencias sociales" => obtenerNotasPorDebajoDe7Cienciassociales($conexion),
    "Notas", "estudiantes buenos en ciencias sociales" => obtenerNotasPorArribaDe7Cienciassociales($conexion),
    "Notas", "estudiantes bajos en matematicas" => obtenerNotasPorDebajoDe7matematicas($conexion),
    "Notas", "estudiantes buenos en matematicas" => obtenerNotasPorArribaDe7matematicas($conexion),
    "Notas", "estudiantes bajos en lenguaje" => obtenerNotasPorDebajoDe7lenguaje($conexion),
    "Notas", "estudiantes buenos en lenguaje" => obtenerNotasPorArribaDe7lenguaje($conexion),
    "Notas", "estudiantes bajos en ingles" => obtenerNotasPorDebajoDe7ingles($conexion),
    "Notas", "estudiantes buenos en ingles" => obtenerNotasPorArribaDe7ingles($conexion),
    "Notas", "estudiantes bajos en informatica" => obtenerNotasPorDebajoDe7informatica($conexion),
    "Notas", "estudiantes buenos en informatica" => obtenerNotasPorArribaDe7informatica($conexion),
    "Notas", "estudiantes bajos en fe" => obtenerNotasPorDebajoDe7fe($conexion),
    "Notas", "estudiantes buenos en fe" => obtenerNotasPorArribaDe7fe($conexion),
);
function obtenerNotasPorDebajoDe7Cienciassociales($conexion) {
    // Consulta SQL para obtener las notas de los estudiantes con calificaciones por debajo de 7
    $sql = "SELECT nie, idasignatura, notaFinal FROM notas WHERE notaFinal < 7 AND idasignatura = 4";
    $result = mysqli_query($conexion, $sql);

    // Construir la respuesta
    $response = "Notas por debajo de 7 para la asignatura de ciencias sociales:<br>";

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $response .= "Estudiante ID: " . $row['nie'] . ", Materia: " . $row['idasignatura'] . ", Nota: " . $row['notaFinal'] . "<br>";
        }
    } else {
        $response .= "Error al obtener las notas: " . mysqli_error($conexion);
    }

    return $response;
}

function obtenerNotasPorArribaDe7Cienciassociales($conexion) {
    // Consulta SQL
    $sql = "SELECT nie, idasignatura, notaFinal FROM notas WHERE notaFinal >= 7 AND idasignatura = 4";
    $result = mysqli_query($conexion, $sql);

    // Construir la respuesta
    $response = "Notas por arriba de 7 para la asignatura de ciencias sociales:<br>";

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $response .= "Estudiante ID: " . $row['nie'] . ", Materia: " . $row['idasignatura'] . ", Nota: " . $row['notaFinal'] . "<br>";
        }
    } else {
        $response .= "Error al obtener las notas: " . mysqli_error($conexion);
    }

    return $response;
}
function obtenerNotasPorDebajoDe7matematicas($conexion) {
    // Consulta SQL para obtener las notas de los estudiantes con calificaciones por debajo de 7
    $sql = "SELECT nie, idasignatura, notaFinal FROM notas WHERE notaFinal < 7 AND idasignatura = 1";
    $result = mysqli_query($conexion, $sql);

    // Construir la respuesta
    $response = "Notas por debajo de 7 para la asignatura de matematicas:<br>";

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $response .= "Estudiante ID: " . $row['nie'] . ", Materia: " . $row['idasignatura'] . ", Nota: " . $row['notaFinal'] . "<br>";
        }
    } else {
        $response .= "Error al obtener las notas: " . mysqli_error($conexion);
    }

    return $response;
}

function obtenerNotasPorArribaDe7matematicas($conexion) {
    // Consulta SQL
    $sql = "SELECT nie, idasignatura, notaFinal FROM notas WHERE notaFinal >= 7 AND idasignatura = 1";
    $result = mysqli_query($conexion, $sql);

    // Construir la respuesta
    $response = "Notas por arriba de 7 para la asignatura de matematicas:<br>";

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $response .= "Estudiante ID: " . $row['nie'] . ", Materia: " . $row['idasignatura'] . ", Nota: " . $row['notaFinal'] . "<br>";
        }
    } else {
        $response .= "Error al obtener las notas: " . mysqli_error($conexion);
    }

    return $response;
}
function obtenerNotasPorDebajoDe7lenguaje($conexion) {
    // Consulta SQL para obtener las notas de los estudiantes con calificaciones por debajo de 7
    $sql = "SELECT nie, idasignatura, notaFinal FROM notas WHERE notaFinal < 7 AND idasignatura = 2";
    $result = mysqli_query($conexion, $sql);

    // Construir la respuesta
    $response = "Notas por debajo de 7 para la asignatura de lenguaje:<br>";

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $response .= "Estudiante ID: " . $row['nie'] . ", Materia: " . $row['idasignatura'] . ", Nota: " . $row['notaFinal'] . "<br>";
        }
    } else {
        $response .= "Error al obtener las notas: " . mysqli_error($conexion);
    }

    return $response;
}

function obtenerNotasPorArribaDe7lenguaje($conexion) {
    // Consulta SQL
    $sql = "SELECT nie, idasignatura, notaFinal FROM notas WHERE notaFinal >= 7 AND idasignatura = 2";
    $result = mysqli_query($conexion, $sql);

    // Construir la respuesta
    $response = "Notas por arriba de 7 para la asignatura de lenguaje:<br>";

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $response .= "Estudiante ID: " . $row['nie'] . ", Materia: " . $row['idasignatura'] . ", Nota: " . $row['notaFinal'] . "<br>";
        }
    } else {
        $response .= "Error al obtener las notas: " . mysqli_error($conexion);
    }

    return $response;
}
function obtenerNotasPorDebajoDe7informatica($conexion) {
    // Consulta SQL para obtener las notas de los estudiantes con calificaciones por debajo de 7
    $sql = "SELECT nie, idasignatura, notaFinal FROM notas WHERE notaFinal < 7 AND idasignatura = 5";
    $result = mysqli_query($conexion, $sql);

    // Construir la respuesta
    $response = "Notas por debajo de 7 para la asignatura de informatica:<br>";

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $response .= "Estudiante ID: " . $row['nie'] . ", Materia: " . $row['idasignatura'] . ", Nota: " . $row['notaFinal'] . "<br>";
        }
    } else {
        $response .= "Error al obtener las notas: " . mysqli_error($conexion);
    }

    return $response;
}

function obtenerNotasPorArribaDe7informatica($conexion) {
    // Consulta SQL
    $sql = "SELECT nie, idasignatura, notaFinal FROM notas WHERE notaFinal >= 7 AND idasignatura = 5";
    $result = mysqli_query($conexion, $sql);

    // Construir la respuesta
    $response = "Notas por arriba de 7 para la asignatura de informatica:<br>";

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $response .= "Estudiante ID: " . $row['nie'] . ", Materia: " . $row['idasignatura'] . ", Nota: " . $row['notaFinal'] . "<br>";
        }
    } else {
        $response .= "Error al obtener las notas: " . mysqli_error($conexion);
    }

    return $response;
}
function obtenerNotasPorDebajoDe7fe($conexion) {
    // Consulta SQL para obtener las notas de los estudiantes con calificaciones por debajo de 7
    $sql = "SELECT nie, idasignatura, notaFinal FROM notas WHERE notaFinal < 7 AND idasignatura = 6";
    $result = mysqli_query($conexion, $sql);

    // Construir la respuesta
    $response = "Notas por debajo de 7 para la asignatura de fe:<br>";

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $response .= "Estudiante ID: " . $row['nie'] . ", Materia: " . $row['idasignatura'] . ", Nota: " . $row['notaFinal'] . "<br>";
        }
    } else {
        $response .= "Error al obtener las notas: " . mysqli_error($conexion);
    }

    return $response;
}

function obtenerNotasPorArribaDe7fe($conexion) {
    // Consulta SQL
    $sql = "SELECT nie, idasignatura, notaFinal FROM notas WHERE notaFinal >= 7 AND idasignatura = 6";
    $result = mysqli_query($conexion, $sql);

    // Construir la respuesta
    $response = "Notas por arriba de 7 para la asignatura de fe:<br>";

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $response .= "Estudiante ID: " . $row['nie'] . ", Materia: " . $row['idasignatura'] . ", Nota: " . $row['notaFinal'] . "<br>";
        }
    } else {
        $response .= "Error al obtener las notas: " . mysqli_error($conexion);
    }

    return $response;
}
function obtenerNotasPorDebajoDe7ingles($conexion) {
    // Consulta SQL para obtener las notas de los estudiantes con calificaciones por debajo de 7
    $sql = "SELECT nie, idasignatura, notaFinal FROM notas WHERE notaFinal < 7 AND idasignatura = 7";
    $result = mysqli_query($conexion, $sql);

    // Construir la respuesta
    $response = "Notas por debajo de 7 para la asignatura de ingles:<br>";

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $response .= "Estudiante ID: " . $row['nie'] . ", Materia: " . $row['idasignatura'] . ", Nota: " . $row['notaFinal'] . "<br>";
        }
    } else {
        $response .= "Error al obtener las notas: " . mysqli_error($conexion);
    }

    return $response;
}

function obtenerNotasPorArribaDe7ingles($conexion) {
    // Consulta SQL
    $sql = "SELECT nie, idasignatura, notaFinal FROM notas WHERE notaFinal >= 7 AND idasignatura = 7";
    $result = mysqli_query($conexion, $sql);

    // Construir la respuesta
    $response = "Notas por arriba de 7 para la asignatura de ingles:<br>";

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $response .= "Estudiante ID: " . $row['nie'] . ", Materia: " . $row['idasignatura'] . ", Nota: " . $row['notaFinal'] . "<br>";
        }
    } else {
        $response .= "Error al obtener las notas: " . mysqli_error($conexion);
    }

    return $response;
}
function obtenerNotasPorDebajoDe7Ciencias($conexion) {
    // Consulta SQL para obtener las notas de los estudiantes con calificaciones por debajo de 7
    $sql = "SELECT nie, idasignatura, notaFinal FROM notas WHERE notaFinal < 7 AND idasignatura = 3";
    $result = mysqli_query($conexion, $sql);

    // Construir la respuesta
    $response = "Notas por debajo de 7 para la asignatura de ciencias:<br>";

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $response .= "Estudiante ID: " . $row['nie'] . ", Materia: " . $row['idasignatura'] . ", Nota: " . $row['notaFinal'] . "<br>";
        }
    } else {
        $response .= "Error al obtener las notas: " . mysqli_error($conexion);
    }

    return $response;
}


function obtenerNotasPorArribaDe7Ciencias($conexion) {
    // Consulta SQL
    $sql = "SELECT nie, idasignatura, notaFinal FROM notas WHERE notaFinal >= 7 AND idasignatura = 3";
    $result = mysqli_query($conexion, $sql);

    // Construir la respuesta
    $response = "Notas por arriba de 7 para la asignatura de ciencias:<br>";

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $response .= "Estudiante ID: " . $row['nie'] . ", Materia: " . $row['idasignatura'] . ", Nota: " . $row['notaFinal'] . "<br>";
        }
    } else {
        $response .= "Error al obtener las notas: " . mysqli_error($conexion);
    }

    return $response;
}

$response = isset($answers[$question]) ? $answers[$question] : "Lo siento, no entiendo esa pregunta.";
echo $response;

// Cerrar la conexión después de usarla
mysqli_close($conexion);
?>
