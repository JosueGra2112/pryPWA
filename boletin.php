<!DOCTYPE html>
<html lang="en">
<head>
    <title>SIGA - Boletín</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="IMG/SigaLogo.png">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
    <style>
        .boletin-entry {
            position: relative;
            cursor: pointer;
            padding: 10px;
            border: 1px solid #ddd;
            margin-bottom: 10px;
            background-color: #f8f9fa;
            transition: background-color 0.3s;
        }
        .boletin-entry:hover {
            background-color: #e9ecef;
        }
        .boletin-entry .details {
            display: none;
            position: relative;
            background: white;
            border-top: 1px solid #ddd;
            padding: 10px;
            width: 100%;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            margin-top: 10px;
            z-index: 1000;
        }
        .pagination {
            margin-top: 20px;
            margin-bottom: 40px; /* Añade espacio entre la paginación y el footer */
        }
    </style>
</head>
<body>
    <?php include 'HeaderB.php'; ?>

    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-center">Boletín</h1>
            <a href="bitacora.php" class="btn btn-primary">Revisar Bitácora</a>
        </div>
        <div id="boletin-container" class="mt-4">
            <!-- Los registros del boletín se cargarán aquí -->
        </div>
        <div id="pagination" class="pagination">
            <!-- Paginación se generará aquí -->
        </div>
    </div>

    <?php include 'FooterB.php'; ?>

    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const boletinContainer = document.getElementById('boletin-container');
            const paginationContainer = document.getElementById('pagination');
            let currentPage = 1;

            function fetchBoletines(page = 1) {
                fetch(`http://localhost/WebServiceSiga/boletin.php?page=${page}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.boletines.length === 0) {
                            boletinContainer.innerHTML = '<p>No se encontraron boletines.</p>';
                            paginationContainer.innerHTML = '';
                            return;
                        }

                        boletinContainer.innerHTML = '';
                        data.boletines.forEach(entry => {
                            const entryElement = document.createElement('div');
                            entryElement.className = 'boletin-entry';
                            entryElement.innerHTML = `
                                <strong>${entry.titulo}</strong>
                                <div class="details">
                                    <p><strong>Fecha:</strong> ${formatDate(entry.fecha)}</p>
                                    <p><strong>Hora:</strong> ${entry.thora}</p>
                                    <p><strong>Descripción:</strong> ${entry.descripcion}</p>
                                </div>
                            `;
                            entryElement.addEventListener('click', function() {
                                const details = this.querySelector('.details');
                                details.style.display = details.style.display === 'block' ? 'none' : 'block';
                            });
                            boletinContainer.appendChild(entryElement);
                        });

                        // Generar paginación
                        generatePagination(data.totalPages, page);
                    })
                    .catch(error => {
                        console.error('Error fetching boletin data:', error);
                        boletinContainer.innerHTML = `<div class="alert alert-danger">Error al obtener datos del boletín</div>`;
                    });
            }

            // Función para formatear la fecha y poner los meses en mayúsculas
            function formatDate(dateStr) {
                const date = new Date(dateStr);
                const options = { year: 'numeric', month: 'long', day: 'numeric' };
                return date.toLocaleDateString('es-MX', options).toUpperCase(); // Mostrar los meses en mayúsculas
            }

            function generatePagination(totalPages, currentPage) {
                paginationContainer.innerHTML = '';
                for (let page = 1; page <= totalPages; page++) {
                    const pageButton = document.createElement('button');
                    pageButton.textContent = page;
                    pageButton.className = 'btn btn-primary mx-1';
                    if (page === currentPage) {
                        pageButton.disabled = true;
                    }
                    pageButton.addEventListener('click', () => fetchBoletines(page));
                    paginationContainer.appendChild(pageButton);
                }
            }

            // Cargar boletines en la primera página
            fetchBoletines(currentPage);
        });
    </script>
</body>
</html>
