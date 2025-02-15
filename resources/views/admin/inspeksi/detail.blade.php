<x-layout>
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <!-- Customer-detail Sidebar -->
            <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
                <!-- Customer-detail Card -->
                <div class="card mb-6">
                    <div class="card-body pt-12">
                        <div class="customer-avatar-section">
                            <div class="d-flex align-items-center flex-column">
                                {{-- <img class="img-fluid rounded mb-4" src="../../assets/img/avatars/1.png" height="120"
                                    width="120" alt="User avatar" /> --}}
                                <div class="customer-info text-center mb-6">
                                    <h5 class="mb-0">{{ $inspeksi->aset->jenis_aset }}</h5>
                                    <span>Kode Aset #{{ $inspeksi->aset->kodeaset }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-around flex-wrap mb-6 gap-0 gap-md-3 gap-lg-4">
                            <div class="d-flex align-items-center gap-4 me-5">
                                <div class="avatar">
                                    <div class="avatar-initial rounded bg-label-primary">
                                        <i class="ti ti-calendar-stats ti-lg"></i>
                                    </div>
                                </div>
                                <div>
                                    <h5 class="mb-0">2025</h5>
                                    <span>Tahun Dibuat</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center gap-4">
                                <div class="avatar">
                                    <div class="avatar-initial rounded bg-label-primary">
                                        <i class="ti ti-calendar-heart ti-lg"></i>
                                    </div>
                                </div>
                                <div>
                                    <h5 class="mb-0">1</h5>
                                    <span>Umur</span>
                                </div>
                            </div>
                        </div>

                        <div class="info-container">
                            <h5 class="pb-4 border-bottom text-capitalize mt-6 mb-4">Details</h5>
                            <ul class="list-unstyled mb-6">
                                <li class="mb-2">
                                    <span class="h6 me-1">Kode Inspeksi:</span>
                                    <span>#{{ $inspeksi->kodeinspeksi }} </span>
                                </li>
                                <li class="mb-2">
                                    <span class="h6 me-1">Status Inspeksi:</span>
                                    @if ($inspeksi->status == 'terjadwal')
                                        <span class="badge bg-label-primary">{{ ucfirst($inspeksi->status) }}</span>
                                    @elseif ($inspeksi->status == 'selesai')
                                        <span class="badge bg-label-success">{{ ucfirst($inspeksi->status) }}</span>
                                    @elseif ($inspeksi->status == 'dibatalkan')
                                        <span class="badge bg-label-danger">{{ ucfirst($inspeksi->status) }}</span>
                                    @elseif ($inspeksi->status == 'dikerjakan')
                                        <span class="badge bg-label-warning">{{ ucfirst($inspeksi->status) }}</span>
                                    @endif
                                </li>
                                <li class="mb-2">
                                    <span class="h6 me-1">Area:</span>
                                    <span>{{ $inspeksi->aset->area->nama_area }} </span>
                                </li>
                                <li class="mb-2">
                                    <span class="h6 me-1">Cluster:</span>
                                    <span>{{ $inspeksi->aset->cluster->nama_cluster }}</span>
                                </li>
                                <li class="mb-2">
                                    <span class="h6 me-1">Lokasi Aset:</span>
                                    <span>{{ $inspeksi->aset->lokasi }}</span>
                                </li>
                                @if ($inspeksi->aset->jenis_aset == 'pipeline')
                                    <li class="mb-2">
                                        <span class="h6 me-1">Distik:</span>
                                        <span>{{ $inspeksi->aset->distrik }}</span>
                                    </li>
                                    <li class="mb-2">
                                        <span class="h6 me-1">Dimensi:</span>
                                        <span>{{ $inspeksi->aset->dimensi }}</span>
                                    </li>
                                    <li class="mb-2">
                                        <span class="h6 me-1">Lokasi Bentang:</span>
                                        <span>{{ $inspeksi->aset->lokasi_bentang }}</span>
                                    </li>
                                @else
                                    <li class="mb-2">
                                        <span class="h6 me-1">Jenis Peralatan:</span>
                                        <span>{{ $inspeksi->aset->jenis_peralatan }}</span>
                                    </li>
                                    <li class="mb-2">
                                        <span class="h6 me-1">Tag Number:</span>
                                        <span>{{ $inspeksi->aset->tag_number }}</span>
                                    </li>
                                    <li class="mb-2">
                                        <span class="h6 me-1">Serial Number:</span>
                                        <span>{{ $inspeksi->aset->serial_number }}</span>
                                    </li>
                                @endif




                            </ul>

                        </div>
                    </div>
                </div>
                <!-- /Customer-detail Card -->

                @if ($maintenance)
                    <div class="card mb-6">
                        <div class="card-body">
                            <div class="info-container">
                                <h5 class="pb-4 border-bottom text-capitalize mt-6 mb-4">Maintenance</h5>
                                <ul class="list-unstyled mb-6">

                                    <li class="mb-2">
                                        <span class="h6 me-1">Status Maintenance:</span>
                                        @if ($maintenance->status == 'dijadwalkan')
                                            <span
                                                class="badge bg-label-primary">{{ ucfirst($maintenance->status) }}</span>
                                        @elseif ($maintenance->status == 'selesai')
                                            <span
                                                class="badge bg-label-success">{{ ucfirst($maintenance->status) }}</span>
                                        @elseif ($maintenance->status == 'proses perbaikan')
                                            <span
                                                class="badge bg-label-warning">{{ ucfirst($maintenance->status) }}</span>
                                        @elseif ($maintenance->status == 'dibatalkan')
                                            <span
                                                class="badge bg-label-danger">{{ ucfirst($maintenance->status) }}</span>
                                        @endif
                                    </li>
                                    <li class="mb-2">
                                        <span class="h6 me-1">Tanggal Jadwal Perbaikan:</span>
                                        <span>{{ $maintenance->tanggal_jadwal_perbaikan }} </span>
                                    </li>
                                    <li class="mb-2">
                                        <span class="h6 me-1">Tanggal Selesai Perbaikan:</span>
                                        <span>{{ $maintenance->tanggal_selesai }} </span>
                                    </li>
                                </ul>
                                <div class="d-grid gap-2 col-lg-12 mx-auto">
                                    @if ($maintenance->status != 'selesai')
                                        <button onclick="selesaikanperbaikan({{ $maintenance->id }})"
                                            class="btn btn-success btn-md waves-effect waves-light"
                                            type="button">Selesaikan</button>
                                    @else
                                        <button onclick="selesaikanperbaikan({{ $maintenance->id }})"
                                            class="btn btn-success btn-md waves-effect waves-light" type="button"
                                            disabled>Selesaikan</button>
                                    @endif

                                </div>

                            </div>
                        </div>
                    </div>
                @endif




            </div>
            <!--/ Customer Sidebar -->

            <!-- Customer Content -->
            <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
                <!-- Customer Pills -->
                <div class="nav-align-top">
                    <ul class="nav nav-pills flex-column flex-md-row mb-6 row-gap-2">
                        <li class="nav-item">
                            <a class="nav-link active" href="javascript:void(0);"><i
                                    class="ti ti-user ti-sm me-1_5"></i>Overview</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('inspeksi.form', $inspeksi->id) }}"><i
                                    class="ti ti-file-diff"></i>Inspeksi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('inspeksi.fotoinspeksi', $inspeksi->id) }}"><i
                                    class="ti ti-camera-selfie ti-sm me-1_5"></i>Foto Inspeksi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('inspeksi.perbaikan', $inspeksi->id) }}"><i
                                    class="ti ti-tool ti-sm me-1_5"></i>Perbaikan</a>
                        </li>
                    </ul>
                </div>
                <!--/ Customer Pills -->

                <!-- / Customer cards -->
                <div class="row text-nowrap">
                    @if (empty($inspeksi->resiko))
                        <div class="col-md-12 mb-12">
                            <div class="alert alert-danger" role="alert">Data Belum Tersedia, Silahkan Melakukan
                                Inspeksi</div>
                        </div>
                    @else
                        <div class="col-xl mb-12">
                            @if (!empty($inspeksi->resiko))
                                <div class="card mb-4 bg-gradient-primary">
                                    <div class="card-body">
                                        <div class="row justify-content-between mb-4">
                                            <div
                                                class="col-md-12 col-lg-7 col-xl-12 col-xxl-7 text-center text-lg-start text-xl-center text-xxl-start order-1  order-lg-0 order-xl-1 order-xxl-0">
                                                <h5 class="card-title text-white text-nowrap mb-4">Butuh Perbaikan Aset
                                                    ?</h5>
                                                <p class="card-text text-white">Silahkan klik tombol dibawah untuk
                                                    melakukan
                                                    perbaikan aset</p>
                                            </div>
                                            <span
                                                class="col-md-12 col-lg-5 col-xl-12 col-xxl-5 text-center mx-auto mx-md-0 mb-2"><img
                                                    src="{{ URL::asset('') }}assets/img/illustrations/rocket.png"
                                                    class="w-px-75 m-2" alt="3dRocket"></span>
                                        </div>
                                        <button
                                            class="btn btn-white text-primary w-100 fw-medium shadow-xs waves-effect waves-light"
                                            onclick="showPerbaikanModal({{ $inspeksi->id }})">
                                            Jadwalkan Perbaikan
                                        </button>
                                    </div>
                                </div>
                            @endif
                            <div class="card">
                                {{-- <div class="card-header">
                                    <h5 class="card-title">Resiko</h5>
                                </div> --}}
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div class="card h-100">
                                                <div class="card-header">
                                                    <h5 class="card-title mb-0">Perhitungan Likelihood</h5>
                                                </div>
                                                <div class="card-body">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>Aspek</th>
                                                                <th>Level</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Ketebalan Pipa</td>
                                                                <td>3</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Kondisi Coating</td>
                                                                <td>3</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Kondisi Support</td>
                                                                <td>3</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Korosi External</td>
                                                                <td>3</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Korosi Internal</td>
                                                                <td>2</td>
                                                            </tr>
                                                            <tr class="table-primary">
                                                                <td><strong>Rata-rata Likelihood</strong></td>
                                                                <td><strong>2.8</strong></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-4">
                                            <div class="card h-100">
                                                <div class="card-header">
                                                    <h5 class="card-title mb-0">Perhitungan Consequence</h5>
                                                </div>
                                                <div class="card-body">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>Aspek</th>
                                                                <th>Level</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Tekanan Operasi</td>
                                                                <td>3</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Temperatur Operasi</td>
                                                                <td>2</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Lokasi Pipa</td>
                                                                <td>3</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Kondisi Lingkungan</td>
                                                                <td>3</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Usia Instalasi</td>
                                                                <td>3</td>
                                                            </tr>
                                                            <tr class="table-primary">
                                                                <td><strong>Rata-rata Consequence</strong></td>
                                                                <td><strong>2.8</strong></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="card">
                                                <div
                                                    class="card-header d-flex justify-content-between align-items-center">
                                                    <h5 class="card-title mb-0">Risk Matrix 5x5</h5>
                                                    <div class="badge bg-warning p-2">
                                                        Risk Level: 9
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered text-center">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center align-middle"
                                                                        style="width: 100px;">Likelihood</th>
                                                                    <th colspan="5" class="text-center">Consequence
                                                                    </th>
                                                                </tr>
                                                                <tr>
                                                                    <th></th>
                                                                    <th class="text-center" style="width: 100px;">1
                                                                    </th>
                                                                    <th class="text-center" style="width: 100px;">2
                                                                    </th>
                                                                    <th class="text-center" style="width: 100px;">3
                                                                    </th>
                                                                    <th class="text-center" style="width: 100px;">4
                                                                    </th>
                                                                    <th class="text-center" style="width: 100px;">5
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <th class="text-center">5</th>
                                                                    <td class="bg-success-subtle">5</td>
                                                                    <td class="bg-warning-subtle">10</td>
                                                                    <td class="bg-warning-subtle">15</td>
                                                                    <td class="bg-danger-subtle">20</td>
                                                                    <td class="bg-danger-subtle">25</td>
                                                                </tr>
                                                                <tr>
                                                                    <th class="text-center">4</th>
                                                                    <td class="bg-success-subtle">4</td>
                                                                    <td class="bg-warning-subtle">8</td>
                                                                    <td class="bg-warning-subtle">12</td>
                                                                    <td class="bg-danger-subtle">16</td>
                                                                    <td class="bg-danger-subtle">20</td>
                                                                </tr>
                                                                <tr>
                                                                    <th class="text-center">3</th>
                                                                    <td class="bg-success-subtle">3</td>
                                                                    <td class="bg-success-subtle">6</td>
                                                                    <td
                                                                        class="bg-warning-subtle border border-dark border-2">
                                                                        9</td>
                                                                    <td class="bg-warning-subtle">12</td>
                                                                    <td class="bg-warning-subtle">15</td>
                                                                </tr>
                                                                <tr>
                                                                    <th class="text-center">2</th>
                                                                    <td class="bg-success-subtle">2</td>
                                                                    <td class="bg-success-subtle">4</td>
                                                                    <td class="bg-success-subtle">6</td>
                                                                    <td class="bg-warning-subtle">8</td>
                                                                    <td class="bg-warning-subtle">10</td>
                                                                </tr>
                                                                <tr>
                                                                    <th class="text-center">1</th>
                                                                    <td class="bg-success-subtle">1</td>
                                                                    <td class="bg-success-subtle">2</td>
                                                                    <td class="bg-success-subtle">3</td>
                                                                    <td class="bg-success-subtle">4</td>
                                                                    <td class="bg-success-subtle">5</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>

                                                    <div class="mt-4">
                                                        <h6>Keterangan Risk Level:</h6>
                                                        <div class="d-flex gap-3">
                                                            <div class="d-flex align-items-center">
                                                                <div class="bg-success-subtle p-2 me-2"
                                                                    style="width: 20px; height: 20px;"></div>
                                                                <span>Low Risk (1-6)</span>
                                                            </div>
                                                            <div class="d-flex align-items-center">
                                                                <div class="bg-warning-subtle p-2 me-2"
                                                                    style="width: 20px; height: 20px;"></div>
                                                                <span>Medium Risk (7-15)</span>
                                                            </div>
                                                            <div class="d-flex align-items-center">
                                                                <div class="bg-danger-subtle p-2 me-2"
                                                                    style="width: 20px; height: 20px;"></div>
                                                                <span>High Risk (16-25)</span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="mt-4">
                                                        <h6>Rekomendasi:</h6>
                                                        <ul class="mb-0">
                                                            <li>Tingkatkan frekuensi inspeksi</li>
                                                            <li>Evaluasi dan perbaiki sistem proteksi</li>
                                                            <li>Rencanakan perbaikan dalam 3-6 bulan</li>
                                                            <li>Review prosedur operasional</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- / customer cards -->


            </div>
            <!--/ Customer Content -->
        </div>


    </div>




    <!-- Modal Form Jadwal Perbaikan -->
    <div class="modal fade" id="upgradePlanModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Jadwalkan Perbaikan Aset</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('perbaikan.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <!-- Hidden input untuk inspeksi_id -->
                        <input type="hidden" name="inspeksi_id" value="{{ $inspeksi->id }}">

                        <div class="mb-3">
                            <label class="form-label">Petugas Perbaikan</label>
                            <select name="user_id" class="form-control @error('user_id') is-invalid @enderror"
                                required>
                                <option value="">Pilih Petugas</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}"
                                        {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('user_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tanggal Jadwal Perbaikan</label>
                            <input type="date" name="tanggal_jadwal_perbaikan"
                                class="form-control @error('tanggal_jadwal_perbaikan') is-invalid @enderror"
                                value="{{ old('tanggal_jadwal_perbaikan') }}" required />
                            @error('tanggal_jadwal_perbaikan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>










    {{-- Ajax / Jquery --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

    {{-- SweetAlert --}}
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js"></script>
    <script>
        $(document).ready(function() {
            function showPerbaikanModal(inspeksi_id) {
                // Reset form
                $('#upgradePlanModal form')[0].reset();
                // Set inspeksi_id ke hidden input
                $('input[name="inspeksi_id"]').val(inspeksi_id);
                $('#upgradePlanModal').modal('show');
            }

            function savePerbaikan(e) {
                e.preventDefault();
                $('#upgradePlanModal').modal('hide');
                // Ambil data form
                let formData = new FormData($('#upgradePlanModal form')[0]);

                $.ajax({
                    url: '/dashboard/inspeksi/perbaikan',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        // Tutup modal dengan Bootstrap 5
                        const myModal = bootstrap.Modal.getInstance(document
                            .getElementById('upgradePlanModal'));
                        myModal.hide();

                        // Tampilkan pesan sukses
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil!',
                            text: response.message,
                            showConfirmButton: false,
                            timer: 1500
                        }).then(() => {
                            // Refresh halaman
                            window.location.reload();
                        });
                    },
                    error: function(xhr) {
                        let errorMessage = 'Terjadi kesalahan saat menyimpan data';
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            errorMessage = xhr.responseJSON.message;
                        }

                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: errorMessage,
                            showConfirmButton: true
                        });
                    }
                });
            }

            // Bind event submit form
            $(document).on('submit', '#upgradePlanModal form', savePerbaikan);

            // Expose showPerbaikanModal ke global scope
            window.showPerbaikanModal = showPerbaikanModal;
        });

        function selesaikanperbaikan(id) {
            Swal.fire({
                title: 'Konfirmasi',
                text: "Apakah Anda yakin ingin menyelesaikan perbaikan ini?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, selesaikan!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Kirim request ke server
                    $.ajax({
                        url: `/dashboard/maintenance/${id}/selesai`,
                        type: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil!',
                                text: 'Perbaikan telah diselesaikan',
                                showConfirmButton: false,
                                timer: 1500
                            }).then(() => {
                                window.location.reload();
                            });
                        },
                        error: function(xhr) {
                            let errorMessage = 'Terjadi kesalahan saat memperbarui status';
                            if (xhr.responseJSON && xhr.responseJSON.message) {
                                errorMessage = xhr.responseJSON.message;
                            }

                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: errorMessage,
                                showConfirmButton: true
                            });
                        }
                    });
                }
            });
        }








        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 1500
            });
        @endif
    </script>
</x-layout>
