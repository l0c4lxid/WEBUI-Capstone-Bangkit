<style>
    .clock-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        height: 150px;
        font-size: 3rem;
        font-weight: bold;
        color: #333;
    }
</style>

<div class="col-md-12">
    <div class="card-body text-center">
        <!-- Bagian pukul di sebelah kanan -->
        <div class='row col-md-12'>
            <div class="col-md-6">
                <h1 class='text-bold bg-gray-dark color-palette'>Pukul :<br><span id="clock"></span></h1>
            </div>
            <!-- Bagian tanggal di sebelah kiri -->
            <div class="col-md-6">
                <h1 class='text-bold bg-gray-dark color-palette'> Hari / Tanggal :<br><span id="date"></span></h1>
            </div>
            <!-- ./col -->
        </div>
    </div>
</div>

<!-- Tambahkan script JavaScript -->
<script>
    // Fungsi untuk memperbarui jam, hari, dan tanggal secara real-time
    function updateClock() {
        const clockElement = document.getElementById('clock');
        const dateElement = document.getElementById('date');
        const currentTime = new Date();
        const hours = currentTime.getHours().toString().padStart(2, '0');
        const minutes = currentTime.getMinutes().toString().padStart(2, '0');
        const seconds = currentTime.getSeconds().toString().padStart(2, '0');
        const day = currentTime.getDate().toString().padStart(2, '0');

        // Array untuk nama bulan dalam Bahasa Indonesia
        const monthNames = [
            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli',
            'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];

        // Array untuk nama hari dalam Bahasa Indonesia
        const dayNames = [
            'Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'
        ];

        const dayName = dayNames[currentTime.getDay()]; // Mendapatkan nama hari dari tanggal saat ini
        const month = monthNames[currentTime.getMonth()];
        const year = currentTime.getFullYear();

        const clockString = `${hours}:${minutes}:${seconds}`;
        clockElement.innerText = clockString;

        const dateString = `${dayName}, ${day} ${month} ${year}`; // Menyusun format tanggal dan nama hari
        dateElement.innerText = dateString;
    }

    // Memperbarui jam setiap 1 detik
    setInterval(updateClock, 1000);

    // Memanggil fungsi updateClock() untuk pertama kali
    updateClock();
</script>