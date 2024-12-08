// sidebar.js
document.addEventListener("DOMContentLoaded", function () {
    const sidebarHTML = `
        <div class="sidebar">
            <div class="logo">
                <img src="/images/logo.png" alt="Logo JTI">
                <h2>Tata Tertib JTI</h2>
            </div>
            <ul class="menu">
                <li class="active"><span class="material-icons">home</span> Halaman Awal</li>
                <li><span class="material-icons">list</span> Pelanggaran Tata Tertib</li>
                <li><span class="material-icons">description</span> Pengajuan Surat Izin</li>
                <li><span class="material-icons">assignment</span> Pengajuan Kompensasi</li>
                <li><span class="material-icons">notifications</span> Notifikasi</li>
                <li><span class="material-icons">history</span> Histori Pelanggaran</li>
                <li><span class="material-icons">contact_support</span> Kontak</li>
                <li><span class="material-icons">help</span> Panduan Tata Tertib</li>
            </ul>
            <div class="copyright">
                <h6>2024 Jurusan Teknologi Informasi <br>
                Politeknik Negeri Malang</h6>
            </div>
        </div>
    `;

    // Masukkan sidebar ke dalam kontainer dengan ID 'sidebar-container'
    document.getElementById("sidebar-container").innerHTML = sidebarHTML;
});
