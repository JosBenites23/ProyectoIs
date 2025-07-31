document.getElementById('registro-form').addEventListener('submit', function(e) {
  e.preventDefault(); // Evita el envío normal del formulario

  const form = e.target;
  const formData = new FormData(form);

  fetch('guardar.php', {
    method: 'POST',
    body: formData
  })
  .then(res => res.text())
  .then(data => {
    const mensaje = document.getElementById('mensaje-registro');
    mensaje.textContent = data;
    mensaje.style.display = 'block';
    mensaje.style.color = data.includes('exitoso') ? 'green' : 'red';
    form.reset(); // Opcional: limpia el formulario
  })
  .catch(err => {
    console.error('Error:', err);
    const mensaje = document.getElementById('mensaje-registro');
    mensaje.textContent = 'Error al registrar. Intenta de nuevo.';
    mensaje.style.display = 'block';
    mensaje.style.color = 'red';
  });
});
