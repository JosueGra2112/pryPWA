<!DOCTYPE html>
<html lang="en">
<head>
    <title>SIGA - Registro</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="IMG/SigaLogo.png">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
    <?php include 'HeaderB.php'; ?>

    <div class="container mt-5">
        <div class="card mx-auto" style="max-width: 900px;">
            <div class="card-header text-center">
                <h2>CREAR UNA CUENTA</h2>
                <center><img src="IMG/userv.png" alt="Loginim" width="10%" height="10%"></center>
            </div>
            <div class="card-body">
                <form id="registerForm">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" id="nombre" class="form-control" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="apellidoPaterno" class="form-label">Apellido Paterno</label>
                            <input type="text" id="apellidoPaterno" class="form-control" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="apellidoMaterno" class="form-label">Apellido Materno</label>
                            <input type="text" id="apellidoMaterno" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="correo" class="form-label">Correo Electrónico</label>
                            <input type="email" id="correo" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="telefono" class="form-label">Teléfono</label>
                            <input type="tel" id="telefono" class="form-control" required maxlength="10">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="cargo" class="form-label">Cargo</label>
                            <select id="cargo" class="form-select" required>
                                <option value="">Seleccione su cargo</option>
                                <!-- Opciones cargadas dinámicamente -->
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="usuario" class="form-label">Crear Usuario</label>
                            <div class="input-group">
                                <input type="text" id="usuario" class="form-control" required>
                                <button type="button" class="btn btn-outline-secondary" onclick="generateUsername()">Generar</button>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="contrasena" class="form-label">Contraseña</label>
                            <input type="password" id="contrasena" class="form-control" required minlength="8" maxlength="16">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="confirmarContrasena" class="form-label">Confirmar Contraseña</label>
                            <div class="input-group">
                                <input type="password" id="confirmarContrasena" class="form-control" required minlength="8" maxlength="16">
                                <button type="button" class="btn btn-outline-secondary" onclick="togglePassword()">Mostrar</button>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="preguntaSecreta" class="form-label">DATO PERSONAL</label>
                            <select id="preguntaSecreta" class="form-select" required>
                                <option value="">Seleccione una opcion</option>
                                <!-- Opciones cargadas dinámicamente -->
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="respuestaSecreta" class="form-label">DATOS</label>
                            <input type="text" placeholder="EJEMPLO: GRHGBJ04321356723456" id="respuestaSecreta" class="form-control" required>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Registrarse</button>
                    </div>
                </form>
                <div class="mt-3 text-center">
                    <p>¿Ya tienes cuenta? <a href="Login.php" class="nav-link d-inline p-0">Inicia Sesión</a></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Alerts -->
    <div class="modal fade" id="alertModal" tabindex="-1" aria-labelledby="alertModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="alertModalLabel">Alerta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="alertMessage">
                    <!-- Mensaje de alerta -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Loading -->
    <div class="modal fade" id="loadingModal" tabindex="-1" aria-labelledby="loadingModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <p class="mt-3">Validando datos...</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Success -->
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <div class="text-success">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 7.146a.5.5 0 1 0-.708.708L7 10.207l4.646-4.647a.5.5 0 0 0-.708-.708L7 8.793 5.354 7.146z"/>
                        </svg>
                    </div>
                    <p class="mt-3">Registro exitoso</p>
                </div>
            </div>
        </div>
    </div>

    <?php include 'FooterB.php'; ?>

    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>
    <script>
        function togglePassword() {
            var passwordInput = document.getElementById("contrasena");
            var confirmPasswordInput = document.getElementById("confirmarContrasena");
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                confirmPasswordInput.type = "text";
            } else {
                passwordInput.type = "password";
                confirmPasswordInput.type = "password";
            }
        }

        function generateUsername() {
            var nombre = document.getElementById("nombre").value;
            var apellidoPaterno = document.getElementById("apellidoPaterno").value;
            var telefono = document.getElementById("telefono").value;
            var correo = document.getElementById("correo").value;

            if (nombre && apellidoPaterno && telefono && correo) {
                var usuario = nombre.charAt(0).toLowerCase() + apellidoPaterno.toLowerCase() + telefono.slice(-4);
                document.getElementById("usuario").value = usuario;
            } else {
                showAlert("Por favor complete los campos de Nombre, Apellido Paterno, Teléfono y Correo Electrónico para generar el usuario.");
            }
        }

        function showAlert(message) {
            document.getElementById("alertMessage").textContent = message;
            var alertModal = new bootstrap.Modal(document.getElementById('alertModal'), {});
            alertModal.show();
        }

        function showLoading() {
            var loadingModal = new bootstrap.Modal(document.getElementById('loadingModal'), {});
            loadingModal.show();
        }

        function hideLoading() {
            var loadingModalEl = document.getElementById('loadingModal');
            var modal = bootstrap.Modal.getInstance(loadingModalEl);
            modal.hide();
        }

        function showSuccess() {
            var successModal = new bootstrap.Modal(document.getElementById('successModal'), {});
            successModal.show();
        }

        function validateName(input) {
            var regex = /^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/;
            if (!regex.test(input.value)) {
                input.setCustomValidity("Por favor ingrese solo letras y acentos.");
            } else {
                input.setCustomValidity("");
            }
        }

        function validatePhone(input) {
            var regex = /^[0-9]{10}$/;
            if (!regex.test(input.value)) {
                input.setCustomValidity("Por favor ingrese un número de teléfono válido de 10 dígitos.");
            } else {
                input.setCustomValidity("");
            }
        }

        function validatePassword(input) {
            var regex = /^(?=.*[A-Z])(?=.*\d).{8,16}$/;
            if (!regex.test(input.value)) {
                input.setCustomValidity("La contraseña debe tener entre 8 y 16 caracteres, incluir al menos una mayúscula y un número.");
            } else {
                input.setCustomValidity("");
            }
        }

        document.getElementById("nombre").addEventListener("input", function() {
            validateName(this);
        });

        document.getElementById("apellidoPaterno").addEventListener("input", function() {
            validateName(this);
        });

        document.getElementById("apellidoMaterno").addEventListener("input", function() {
            validateName(this);
        });

        document.getElementById("telefono").addEventListener("input", function() {
            validatePhone(this);
        });

        document.getElementById("contrasena").addEventListener("input", function() {
            validatePassword(this);
        });

        document.getElementById("respuestaSecreta").addEventListener("input", function() {
            var regex = /^[a-zA-Z0-9]+$/;
            if (!regex.test(this.value)) {
                this.setCustomValidity("Por favor ingrese solo letras y números.");
            } else {
                this.setCustomValidity("");
            }
        });

        document.addEventListener("DOMContentLoaded", function() {
            // Cargar preguntas secretas
            fetch('http://localhost/WebServiceSiga/preguntas.php')
                .then(response => response.json())
                .then(data => {
                    const preguntaSecretaSelect = document.getElementById("preguntaSecreta");
                    data.preguntas.forEach(pregunta => {
                        const option = document.createElement("option");
                        option.value = pregunta.idpregunta;
                        option.textContent = pregunta.pregunta;
                        preguntaSecretaSelect.appendChild(option);
                    });
                })
                .catch(error => console.error('Error al obtener preguntas secretas:', error));

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

        document.getElementById("registerForm").addEventListener("submit", function(event) {
            var password = document.getElementById("contrasena").value;
            var confirmPassword = document.getElementById("confirmarContrasena").value;

            if (password !== confirmPassword) {
                showAlert("Las contraseñas no coinciden.");
                event.preventDefault();
            } else {
                // Mostrar modal de carga
                showLoading();

                // Crear objeto de datos del usuario
                var userData = {
                    nombre: document.getElementById("nombre").value,
                    apellidoPaterno: document.getElementById("apellidoPaterno").value,
                    apellidoMaterno: document.getElementById("apellidoMaterno").value,
                    correo: document.getElementById("correo").value,
                    contrasena: password,
                    preguntaSecreta: document.getElementById("preguntaSecreta").value,
                    respuestaSecreta: document.getElementById("respuestaSecreta").value,
                    cargo: document.getElementById("cargo").value,
                    telefono: document.getElementById("telefono").value,
                    user: document.getElementById("usuario").value
                };

                // Enviar datos al backend
                fetch('http://localhost/WebServiceSiga/Registro.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(userData)
                })
                .then(response => response.json())
                .then(data => {
                    setTimeout(function() {
                        hideLoading();
                        if (data.success) {
                            showSuccess();
                            setTimeout(function() {
                                window.location.href = "Login.php";
                            }, 2000);
                        } else {
                            showAlert(data.message);
                        }
                    }, 3000);
                })
                .catch(error => {
                    hideLoading();
                    console.error('Error:', error);
                });

                event.preventDefault(); // Prevenir el comportamiento de envío predeterminado
            }
        });
    </script>
</body>
</html>
