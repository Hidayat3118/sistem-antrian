
function updateDateTime() {
    const now = new Date();

    // Format tanggal dalam Bahasa Indonesia
    const days = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
    const months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
    const dayName = days[now.getDay()];
    const day = now.getDate();
    const month = months[now.getMonth()];
    const year = now.getFullYear();

    // Format waktu
    let hours = now.getHours();
    let minutes = now.getMinutes();
    hours = hours < 10 ? '0' + hours : hours;
    minutes = minutes < 10 ? '0' + minutes : minutes;

    // Set teks tanggal dan waktu ke elemen HTML
    document.getElementById("current-date").innerText = `${dayName}, ${day} ${month} ${year}`;
    document.getElementById("current-time").innerText = `${hours}:${minutes}`;
}

// Panggil fungsi saat halaman dimuat dan perbarui setiap detik
updateDateTime();
setInterval(updateDateTime, 1000);
