<x-app-layout>
    <x-slot name="header">
        <div class="header-title">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </div>
    </x-slot>

    <div class="container mt-4 mb-4">
        <div class="description-section p-4">
            <img src="https://images.tokopedia.net/img/KRMmCm/2022/6/16/56b7b2bc-aeab-4fe9-bb3b-b97ce6ccef67.jpg" alt="Yogyakarta">
            <h3 class="description-title"><strong>Yogyakarta Kota Pelajar</strong></h3>
            <p class="description-text">
                Yogyakarta juga dikenal sebagai Kota Pelajar julukan ini diduga berasal dari banyaknya pusat-pusat pendidikan yang berdiri di Yogyakarta. Pusat-pusat pendidikan itu secara otomatis menarik minat para pelajar dari daerah lain untuk menuntut ilmu di kota ini. Universitas terkemuka yang terdapat di kota ini yaitu Universitas Gadjah Mada. Hal inilah yang membuat kota Yogyakarta memiliki jumlah pelajar yang besar, yang berasal tidak hanya dari area Jawa tetapi juga dari luar Jawa bahkan dari luar Indonesia. Yogyakarta juga menawarkan beragam tempat makan, kafe, dan pusat perbelanjaan yang cocok untuk gaya hidup mahasiswa. Harga yang terjangkau dan keanekaragaman kuliner membuat kota ini menarik bagi mahasiswa dari berbagai latar belakang.
            </p>
        </div>

        <div class="card shadow">
            <div class="card-header">
                <h3 class="card-title">Data</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <div class="alert alert-primary text-center" role="alert">
                            <h4><i class="fa-solid fa-location-dot"></i> Total Points</h4>
                            <p style="font-size: 32pt">{{ $total_points }}</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
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
                    </div>
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
        .header-title {
            background-color: #4a90e2;
            color: white;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
        }
        .description-section {
            background: white;
            border-radius: 10px;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .description-section img {
            max-width: 100%;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        .description-title {
            font-size: 2rem; /* Increase the size of the title */
            margin-bottom: 20px; /* Add space between the title and the description */
        }
        .description-text {
            margin-top: 20px;
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
</main>
<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
</x-app-layout>
