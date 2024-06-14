<x-app-layout>
    <x-slot name="header">
        <div class="header-title text-center bg-primary text-white py-4 rounded">
            <h2 class="font-semibold text-xl">{{ __('Dashboard') }}</h2>
        </div>
    </x-slot>

    <div class="container mt-4 mb-4">
        <!-- Deskripsi Fasilitas Kesehatan -->
        <div class="row">
            <div class="col-md-6 description-section p-4">
                <h3 class="description-title"><strong>Fasilitas Kesehatan</strong></h3>
                <p class="description-text">
                    Fasilitas kesehatan mencakup berbagai jenis tempat yang menyediakan perawatan medis kepada masyarakat, termasuk rumah sakit yang menawarkan layanan medis lengkap dengan rawat inap dan bedah, klinik yang memberikan perawatan kesehatan dasar, serta puskesmas yang berfungsi sebagai pusat pelayanan kesehatan masyarakat. Fasilitas ini juga mencakup apotek untuk penjualan obat-obatan, laboratorium medis untuk tes diagnostik, dan fasilitas rehabilitasi untuk pemulihan pasien. Panti jompo dan perawatan lanjut usia menyediakan perawatan khusus bagi lansia. Semua fasilitas ini bekerja bersama dalam sistem perawatan kesehatan untuk mendukung kesehatan dan kesejahteraan masyarakat.
                </p>
            </div>

            <div class="col-md-6 description-section p-4">
                <img src="https://storage.googleapis.com/seo-cms/assets/rsup_dr_sardjito_9dcd9ec13b/rsup_dr_sardjito_9dcd9ec13b.jpg" alt="Fasilitas Kesehatan" class="img-fluid rounded">
            </div>
        </div>

        <!-- Gambar Menjaga Kesehatan -->
        <div class="row mt-4">
            <div class="col-md-6 description-section p-4">
                <h3 class="description-title"><strong>Menjaga Kesehatan dan Kebersihan</strong></h3>
                <p class="description-text">
                    Menjaga kesehatan dan kebersihan sangat penting untuk mencegah penyakit dan menjaga kualitas hidup. Gaya hidup sehat, kebersihan yang baik, dan aktivitas fisik yang teratur adalah kunci untuk hidup yang panjang dan sehat.
                </p>
            </div>

            <div class="col-md-6 description-section p-4">
                <img src="https://kratonpusk.jogjakota.go.id/assets/instansi/kratonpusk/gallery/20201112095928_WhatsApp_Image_2020-11-12_at_09.54_.30_.jpeg"
                     alt="Menjaga Kesehatan"
                     class="img-fluid rounded img-thumbnail"
                     style="max-width: 50%; height: auto;">
            </div>
        <!-- Data Fasilitas Kesehatan -->
        <div class="card shadow mt-4">
            <div class="card-header bg-primary text-white">
                <h3 class="card-title">Data</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <div class="alert alert-primary text-center" role="alert">
                            <h4><i class="fa-solid fa-location-dot"></i> Jumlah Sebaran Rumah Sakit</h4>
                            <p style="font-size: 32pt">{{ $total_points }}</p>
                        </div>
                    </div>
                    {{-- <div class="col-md-4 mb-4">
                        <div class="alert alert-primary text-center" role="alert">
                            <h4><i class="fa-solid fa-route"></i> Total Polylines</h4>
                            <p style="font-size: 32pt">{{ $total_polylines }}</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="alert alert-primary text-center" role="alert">
                            <h4><i class="fa-solid fa-draw-polygon"></i> Total Polygons</h4>
                            <p style="font-size: 32pt">{{ $total_polygons }}</p>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

    <style>
        body {
            background: #f8fafc;
        }
        .container {
            margin-top: 50px;
        }
        .card {
            border: none;
            border-radius: 10px;
        }
        .card-header {
            background-color: #4a90e2;
            color: white;
            border-radius: 10px 10px 0 0;
        }
        .card-title {
            margin: 0;
            font-size: 1.5rem;
        }
        .alert {
            border-radius: 10px;
            padding: 20px;
        }
        h4 {
            margin-bottom: 10px;
        }
        p {
            margin: 0;
        }
        .description-section {
            background: white;
            border-radius: 10px;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .img-fluid {
            max-width: 100%;
            height: auto;
        }
        .header-title {
            background-color: #4a90e2;
            color: white;
            padding: 20px;
            border-radius: 10px;
        }
    </style>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <!-- FOOTER -->
    <footer class="container">
        <p class="float-end"><a href="#">Back to top</a></p>
        <p>&copy; Enjellia Barce_22/498941/SV/21277. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
    </footer>
</x-app-layout>
