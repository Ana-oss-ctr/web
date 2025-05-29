// Obtiene todos los testimonios
const testimonials = document.querySelectorAll('.testimonial');
let currentIndex = 0;

// Función para mostrar el testimonio actual
function showTestimonial(index) {
    testimonials.forEach((testimonial, i) => {
        testimonial.classList.toggle('active', i === index);
    });
}

// Botón de siguiente
document.querySelector('.next').addEventListener('click', () => {
    currentIndex = (currentIndex + 1) % testimonials.length;
    showTestimonial(currentIndex);
});

// Botón de anterior
document.querySelector('.prev').addEventListener('click', () => {
    currentIndex = (currentIndex - 1 + testimonials.length) % testimonials.length;
    showTestimonial(currentIndex);
});

/*
Este código JavaScript maneja el cambio de los testimonios:
- Da click en "siguiente" o "anterior"
- Cambia la reseña activa (solo muestra una a la vez)
- Se repite cuando llega al final o al inicio.
*/