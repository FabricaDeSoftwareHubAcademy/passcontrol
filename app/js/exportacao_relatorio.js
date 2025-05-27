function exportarExcel() {
    const wb = XLSX.utils.table_to_book(document.getElementById('tabelaRelatorio'), { sheet: "Relatório" });
    XLSX.writeFile(wb, 'relatorio.xlsx');
}

function exportarPDF() {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();
    doc.text("Relatório Diário", 14, 15);
    doc.autoTable({ html: '#tabelaRelatorio', startY: 20 });
    doc.save("relatorio.pdf");
}