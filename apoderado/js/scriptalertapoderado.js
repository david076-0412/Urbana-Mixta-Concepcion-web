document.addEventListener("DOMContentLoaded", function () {


    const form = document.querySelector("form");


    form.addEventListener("submit", function (event) {
        event.preventDefault();

        // Enviar el formulario mediante AJAX
        const formData = new FormData(form);


        fetch(form.action, {
            method: form.method,
            body: formData
        })
            .then(response => response.text())
            .then(data => {
                // Manejar la respuesta del servidor
                if (data === "success") {


                    const tipo_documento = formData.get('tipo_documento');

                    const dni = formData.get('dni');

                    const apellido_paterno = formData.get('apellido_paterno');


                    const apellido_materno = formData.get('apellido_materno');


                    const nombres = formData.get('nombres');

                    const usuario = formData.get('usuario');

                    const password = formData.get('password');

                    const correo = formData.get('correo');


                    Swal.fire({

                        icon: 'success',
                        title: '<span style="white-spacRegistro exitoso</span>',
                        html: '<strong style="text-transform: none;">Se realizó el registro de la solicitud satisfactoriamente.<br>' +
                            tipo_documento + ': ' + dni + '<br>' +
                            'Nombres y Apellidos: ' + nombres + ' ' + apellido_paterno + ' ' + apellido_materno + '<br>' +
                            'Usuario: ' + usuario + '<br>' +
                            'Contraseña: ' + password + '<br>' +
                            'Correo: ' + correo + "</strong>",
                        showConfirmButton: true, // Mostrar el botón de confirmación
                        allowOutsideClick: false, // Evitar que el usuario cierre la alerta haciendo clic fuera de ella

                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Redirigir a otra página después del registro
                            window.location.href = '../apoderado/formularioapoderado.php';
                        }
                    });
                    // Puedes redirigir a otra página después del registro si es necesario
                    //window.location.href = '../apoderado/apoderado-matricula.php?usuario='+usuario_apoderado;
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error en el registro',
                        text: 'Hubo un problema al registrar los datos.'
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    });
});