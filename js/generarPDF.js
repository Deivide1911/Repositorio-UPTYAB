let downloadInProgress = false;
function generarPDF() {
    if (downloadInProgress) {
        console.error("Una descarga ya está en progreso. Por favor, espera a que termine.");
        return;
    }

    downloadInProgress = true;
    const element = document.getElementById('contenido');
    html2pdf().set({
        margin: 0.5, // Ajusta el margen para mejor visualización
        filename: 'reportes.pdf',
        image: { type: 'jpeg', quality: 0.98 },
        html2canvas: { 
            scale: 3, // Aumenta la escala para mejorar la calidad
            logging: true, // Habilita el registro para detectar posibles errores
            dpi: 300, // Ajusta los puntos por pulgada para mayor resolución
            letterRendering: true // Mejora el renderizado del texto
        },
        jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
    }).from(element).save().then(() => {
        downloadInProgress = false;
    }).catch((error) => {
        console.error("Error al generar PDF:", error);
        downloadInProgress = false;
    });
}
