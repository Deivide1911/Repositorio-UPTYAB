function generarPDF() {
    const element = document.getElementById('contenido');
    html2pdf().set({
        margin: 0,
        filename: 'reportes.pdf',
        image: { type: 'jpeg', quality: 0.98 },
        html2canvas: { scale: 2 },
        jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
    }).from(element).save();
}