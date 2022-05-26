
<?php
require_once('../controlador/controladorUsuario.php');
$controladorUsuario = new controladorUsuario();
$usuario = $controladorUsuario->buscarUsuario($_REQUEST['id_usuario']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table align="center" border="1">
        <thead>
            <tr>
                <th>Id</th>
                <th>Login</th>
                <th>Pass</th>
                <th>Nick</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <form action="../controlador/controladorUsuario.php" method="POST">
                <tr>
                    <th>
                        <input type="number" name="idUsuario" id="idUsuario" value = "<?php echo $usuario->getIdUsuario(); ?>" readonly />
                    </th>
                    <th>
                        <input type="text" name="loginUsuario" value = "<?php echo $usuario->getLoginUsuario(); ?>" />
                    </th>

                    <th>
                        <input type="text" name="pass" value = "<?php echo $usuario->getPassUsuario(); ?>" />
                    </th>

                    <th>
                        <input type="text" name="nick" value = "<?php echo $usuario->getNickUsuario(); ?>" />
                    </th>

                    <th>
                        <input type="text" name="email" value = "<?php echo $usuario->getEmailUsuario(); ?>" />
                    </th>

                    <th>
                    <button type="submit" name="modificar">Modificar</button>
                    </th>
                </tr>
            </form>
        </tbody>
    </table>
</body>
</html>