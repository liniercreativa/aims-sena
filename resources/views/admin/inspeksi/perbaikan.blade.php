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
                                    <h5 class="mb-0">Pipeline</h5>
                                    <span>Kode Aset #123456</span>
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
                                    <span class="h6 me-1">Status:</span>
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
            </div>
            <!--/ Customer Sidebar -->

            <!-- Customer Content -->
            <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
                <!-- Customer Pills -->
                <div class="nav-align-top">
                    <ul class="nav nav-pills flex-column flex-md-row mb-6 row-gap-2">
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('inspeksi.detail', $inspeksi->id) }}"><i
                                    class="ti ti-user ti-sm me-1_5"></i>Overview</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('inspeksi.form', $inspeksi->id) }}"><i
                                    class="ti ti-file-diff"></i>Inspeksi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('inspeksi.fotoinspeksi', $inspeksi->id) }}"><i
                                    class="ti ti-camera-selfie ti-sm me-1_5"></i>Foto Inspeksi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('inspeksi.perbaikan', $inspeksi->id) }}"><i
                                    class="ti ti-tool ti-sm me-1_5"></i>Perbaikan</a>
                        </li>
                    </ul>
                </div>
                <!--/ Customer Pills -->

                <!-- / Customer cards -->
                <div class="row text-nowrap">

                    <div class="col-xl mb-12">

                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Hasil Perbaikan</h5>
                            </div>
                            <div class="card-body">

                                <form action="{{ route('inspeksi.update', $inspeksi->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')


                                    {{-- Data Umum --}}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-6">
                                                <label class="form-label">Nama</label>
                                                <input disabled type="date" name="tanggal_inspeksi"
                                                    class="form-control @error('tanggal_inspeksi') is-invalid @enderror"
                                                    value="{{ old('tanggal_inspeksi') }}" />
                                                @error('tanggal_inspeksi')
                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-6">
                                                <label class="form-label">Nilai</label>
                                                <input disabled type="text" name="tanggal_inspeksi"
                                                    class="form-control @error('tanggal_inspeksi') is-invalid @enderror"
                                                    value="{{ old('tanggal_inspeksi') }}" />
                                                @error('tanggal_inspeksi')
                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-6">
                                                <label class="form-label">Foto (Optional)</label>
                                                <input disabled type="file" name="foto"
                                                    class="form-control @error('foto') is-invalid @enderror"
                                                    value="{{ old('foto') }}" />
                                            </div>
                                            <div class="mb-6">
                                                <label class="form-label">Keterangan</label>
                                                <textarea disabled name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" rows="3">{{ old('keterangan', $inspeksi->keterangan) }}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-4 text-end">
                                        <button disabled type="submit" class="btn btn-primary">Tambah
                                            Parameter</button>
                                    </div>

                                </form>


                            </div>
                        </div>
                        <!--/ Customer Content -->
                    </div>


                </div>

                <div class="row text-nowrap">
                    <div class="col-xl mb-12">
                        <div class="card">
                            <table id="inspeksiTable" class="table">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Nilai</th>
                                        <th>Foto</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td> </td>
                                        <td>

                                        </td>
                                        <td>

                                        </td>
                                        <td>

                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>



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
