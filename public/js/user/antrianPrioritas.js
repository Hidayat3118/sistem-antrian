function showPrintPreview() {
    document.getElementById("print-preview").classList.remove("hidden");
}

function hidePrintPreview() {
    document.getElementById("print-preview").classList.add("hidden");
}

function printContent() {
    const printContent = document.getElementById("print-content").innerHTML;
    const originalContent = document.body.innerHTML;

    document.body.innerHTML = printContent;  // Setel body dengan konten pratinjau
    window.print();  // Cetak halaman
    document.body.innerHTML = originalContent;  // Kembalikan konten asli setelah cetak
}