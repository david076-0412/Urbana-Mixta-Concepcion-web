
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
                

       

                const usuario_admin = formData.get('usuario_admin');



                Swal.fire({
                    
                    icon: 'success',
                    title: '<span style="white-space: pre-line">Registro&nbsp;exitoso</span>',
                    text: 'Se realizo el registro de la solicitud satisfactoriamente.',
                    showConfirmButton: true, // Mostrar el botón de confirmación
                    allowOutsideClick: false, // Evitar que el usuario cierre la alerta haciendo clic fuera de ella

                }).then((result) => {
                    if (result.isConfirmed) {
                        // Redirigir a otra página después del registro
                        window.location.href = '../administrador/admin-docente.php?usuario=' + usuario_admin;
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