<!DOCTYPE html>
<html lang="en">
<head>
    <title>SIGA - Inicio de sesión</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="IMG/SigaLogo.png">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/css/login.css">
    <style>
        .alert-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }
        .alert-container {
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 90%;
            width: 400px;
            text-align: center;
            position: relative;
        }
        .close-button {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
            font-size: 18px;
            background: none;
            border: none;
            font-weight: bold;
            color: #000;
        }
    </style>
</head>
<body>
    <?php include 'HeaderB.php'; ?>

    <div class="container-fluid login-container">
        <div class="login-box">
            <center><img src="IMG/userv.png" alt="Loginim" width="30%" height="30%"></center>
            <h2 class="text-center">Iniciar Sesión</h2>
            <form>
                <div class="mb-3">
                    <label for="cargo" class="form-label">Seleccionar Cargo</label>
                    <select id="cargo" class="form-select">
                        <option value="">Seleccionar...</option>
                        <!-- Opciones cargadas dinámicamente -->
                    </select>
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Usuario</label>
                    <input type="text" id="username" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <div class="input-group">
                        <input type="password" id="password" class="form-control">
                        <button type="button" class="btn btn-outline-secondary" onclick="togglePassword()">Mostrar</button>
                    </div>
                </div>
                <button type="button" class="btn btn-primary w-100" onclick="handleLogin()">Acceder</button>
            </form>
            <div class="mt-3 text-center">
                <p class="mb-1">¿No tienes cuenta? <a href="Registro.php" class="nav-link d-inline p-0">Crear una cuenta</a></p>
                <p class="mb-1">¿Olvidaste tu contraseña? <a href="Restauracion.php" class="nav-link d-inline p-0">Restaurar por Pregunta secreta</a></p>
                <p class="mb-0"><a href="RestaurarPassEmail.php" class="nav-link d-inline p-0">Restaurar por correo electrónico</a></p>
            </div>
        </div>
    </div>
    <div id="alert" class="alert-overlay" style="display: none;">
        <div class="alert-container">
            <button class="close-button" onclick="closeAlert()">&times;</button>
            <p id="alertMessage"></p>
        </div>
    </div>

    <?php include 'FooterB.php'; ?>

    <!-- jQuery and Bootstrap JS -->
    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>
    <script>
        function togglePassword() {
            var passwordInput = document.getElementById("password");
            var showPasswordButton = document.querySelector(".input-group button");
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                showPasswordButton.textContent = "Ocultar";
            } else {
                passwordInput.type = "password";
                showPasswordButton.textContent = "Mostrar";
            }
        }

        function handleLogin() {
            var cargo = document.getElementById("cargo").value;
            var username = document.getElementById("username").value;
            var password = document.getElementById("password").value;

            if (!cargo || !username || !password) {
                showAlert("Todos los campos deben estar llenos.");
                return;
            }

            var data = {
                cargo: cargo,
                username: username,
                password: password
            };

            fetch('http://localhost/WebServiceSiga/logeo.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(data),
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    localStorage.setItem('user', JSON.stringify(data));
                    localStorage.setItem('username', username);

                    if (cargo == '1') {
                        window.location.href = './CARGOS/ADMIN/IndexAdmin.php';
                    } else if (cargo == '2') {
                        window.location.href = './CARGOS/DIRECTIVO/IndexDic.php';
                    } else if (cargo == '3') {
                        window.location.href = './CARGOS/ADMINISTRATIVO/IndexAdt.php';
                    } else if (cargo == '4') {
                        window.location.href = './CARGOS/DOCENTE/IndexDoc.php';
                    } else if (cargo == '5') {
                        window.location.href = './CARGOS/SECRETARIO/IndexSec.php';
                    } else {
                        showAlert('Autenticación exitosa');
                    }
                } else {
                    showAlert(data.message);
                }
            })
            .catch(error => {
                console.error('Error al realizar la solicitud de autenticación:', error);
                showAlert('Error al realizar la solicitud de autenticación.');
            });
        }

        function showAlert(message) {
            document.getElementById("alertMessage").textContent = message;
            document.getElementById("alert").style.display = "flex";
        }

        function closeAlert() {
            document.getElementById("alert").style.display = "none";
        }

        document.addEventListener("DOMContentLoaded", function() {
            // Cargar cargos
            fetch('http://localhost/WebServiceSiga/cargos.php')
                .then(response => response.json())
                .then(data => {
                    const cargoSelect = document.getElementById("cargo");
                    data.forEach(cargo => {
                        const option = document.createElement("option");
                        option.value = cargo.id_cargo;
                        option.textContent = cargo.cargo;
                        cargoSelect.appendChild(option);
                    });
                })
                .catch(error => console.error('Error al obtener cargos:', error));
        });
    </script>
</body>
</html>
