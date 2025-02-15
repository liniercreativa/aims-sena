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
                            <a class="nav-link active" href="{{ route('inspeksi.form', $inspeksi->id) }}"><i
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

                    <div class="col-xl mb-12">
                        @if (!empty($inspeksi->resiko))
                            <div class="card mb-4 bg-gradient-primary">
                                <div class="card-body">
                                    <div class="row justify-content-between mb-4">
                                        <div
                                            class="col-md-12 col-lg-7 col-xl-12 col-xxl-7 text-center text-lg-start text-xl-center text-xxl-start order-1  order-lg-0 order-xl-1 order-xxl-0">
                                            <h5 class="card-title text-white text-nowrap mb-4">Butuh Perbaikan Aset
                                                ?</h5>
                                            <p class="card-text text-white">Silahkan klik tombol dibawah untuk melakukan
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
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Submit Inspeksi</h5>
                            </div>
                            <div class="card-body">

                                <form action="{{ route('inspeksi.update', $inspeksi->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')


                                    {{-- Data Umum --}}
                                    <div class="row">
                                        <div class="col-md-6">


                                            <div class="mb-6">
                                                <label class="form-label">Tanggal Inspeksi</label>
                                                <input type="date" name="tanggal_inspeksi"
                                                    class="form-control @error('tanggal_inspeksi') is-invalid @enderror"
                                                    value="{{ old('tanggal_inspeksi', $inspeksi->tanggal_inspeksi) }}" />
                                                @error('tanggal_inspeksi')
                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                @enderror
                                            </div>

                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-6">
                                                <label class="form-label">Resiko</label>
                                                <select name="resiko"
                                                    class="form-control @error('resiko') is-invalid @enderror">
                                                    <option value="">Pilih Resiko</option>
                                                    <option value="insignificant"
                                                        {{ old('resiko', $inspeksi->resiko) == 'insignificant' ? 'selected' : '' }}>
                                                        Insignificant
                                                    </option>
                                                    <option value="minor"
                                                        {{ old('resiko', $inspeksi->resiko) == 'minor' ? 'selected' : '' }}>
                                                        Minor
                                                    </option>
                                                    <option value="moderate"
                                                        {{ old('resiko', $inspeksi->resiko) == 'moderate' ? 'selected' : '' }}>
                                                        Moderate
                                                    </option>
                                                    <option value="significant"
                                                        {{ old('resiko', $inspeksi->resiko) == 'significant' ? 'selected' : '' }}>
                                                        Significant
                                                    </option>
                                                    <option value="catastrophic"
                                                        {{ old('resiko', $inspeksi->resiko) == 'catastrophic' ? 'selected' : '' }}>
                                                        Catastrophic
                                                    </option>
                                                </select>
                                                @error('resiko')
                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                @enderror
                                            </div>







                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-6">
                                                <label class="form-label">Rekomendasi</label>
                                                <textarea name="rekomendasi" class="form-control @error('rekomendasi') is-invalid @enderror"
                                                    placeholder="Silahkan Isi">{{ old('rekomendasi', $inspeksi->rekomendasi) }}</textarea>
                                                @error('rekomendasi')
                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    @if ($inspeksi->aset->jenis_aset == 'pipeline')
                                        <div id="pims-fields">
                                            <hr class="my-4">
                                            <h6 class="mb-3">Data PIMS</h6>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-6">
                                                        <label class="form-label">Ketebalan Pipa</label>
                                                        <select name="ketebalan_pipa"
                                                            class="form-control @error('ketebalan_pipa') is-invalid @enderror">
                                                            <option value="">Pilih Ketebalan Pipa</option>
                                                            <option value="1"
                                                                {{ old('ketebalan_pipa') == '1' ? 'selected' : '' }}>
                                                                Level 1
                                                            </option>
                                                            <option value="2"
                                                                {{ old('ketebalan_pipa') == '2' ? 'selected' : '' }}>
                                                                Level 2
                                                            </option>
                                                            <option value="3"
                                                                {{ old('ketebalan_pipa') == '3' ? 'selected' : '' }}>
                                                                Level 3
                                                            </option>
                                                            <option value="4"
                                                                {{ old('ketebalan_pipa') == '4' ? 'selected' : '' }}>
                                                                Level 4
                                                            </option>
                                                            <option value="5"
                                                                {{ old('ketebalan_pipa') == '5' ? 'selected' : '' }}>
                                                                Level 5
                                                            </option>
                                                        </select>
                                                    </div>

                                                    <div class="mb-6">
                                                        <label class="form-label">Kondisi Coating</label>
                                                        <input disabled type="number" name="kondisi_coating"
                                                            class="form-control @error('kondisi_coating') is-invalid @enderror"
                                                            value="{{ old('kondisi_coating') }}" />
                                                        @error('kondisi_coating')
                                                            <div class="invalid-feedback d-block">{{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>

                                                    <div class="mb-6">
                                                        <label class="form-label">Kondisi Penyangga</label>
                                                        <input disabled type="number" name="kondisi_penyangga"
                                                            class="form-control @error('kondisi_penyangga') is-invalid @enderror"
                                                            value="{{ old('kondisi_penyangga') }}" />
                                                        @error('kondisi_penyangga')
                                                            <div class="invalid-feedback d-block">{{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>

                                                    <div class="mb-6">
                                                        <label class="form-label">Korosi External</label>
                                                        <input disabled type="number" name="korosi_external"
                                                            class="form-control @error('korosi_external') is-invalid @enderror"
                                                            value="{{ old('korosi_external') }}" />
                                                        @error('korosi_external')
                                                            <div class="invalid-feedback d-block">{{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>

                                                    <div class="mb-6">
                                                        <label class="form-label">Korosi Internal</label>
                                                        <input disabled type="number" name="korosi_internal"
                                                            class="form-control @error('korosi_internal') is-invalid @enderror"
                                                            value="{{ old('korosi_internal') }}" />
                                                        @error('korosi_internal')
                                                            <div class="invalid-feedback d-block">{{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>

                                                    <div class="mb-6">
                                                        <label class="form-label">Tekanan Operasi</label>
                                                        <input disabled type="number" name="tekanan_operasi"
                                                            class="form-control @error('tekanan_operasi') is-invalid @enderror"
                                                            value="{{ old('tekanan_operasi') }}" />
                                                        @error('tekanan_operasi')
                                                            <div class="invalid-feedback d-block">{{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="mb-6">
                                                        <label class="form-label">Temperatur Operasi</label>
                                                        <input disabled type="number" name="temperatur_operasi"
                                                            class="form-control @error('temperatur_operasi') is-invalid @enderror"
                                                            value="{{ old('temperatur_operasi') }}" />
                                                        @error('temperatur_operasi')
                                                            <div class="invalid-feedback d-block">{{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>

                                                    <div class="mb-6">
                                                        <label class="form-label">Lokasi Pipa</label>
                                                        <input disabled type="number" name="lokasi_pipa"
                                                            class="form-control @error('lokasi_pipa') is-invalid @enderror"
                                                            value="{{ old('lokasi_pipa') }}" />
                                                        @error('lokasi_pipa')
                                                            <div class="invalid-feedback d-block">{{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>

                                                    <div class="mb-6">
                                                        <label class="form-label">Kondisi Lingkungan</label>
                                                        <input disabled type="number" name="kondisi_lingkungan"
                                                            class="form-control @error('kondisi_lingkungan') is-invalid @enderror"
                                                            value="{{ old('kondisi_lingkungan') }}" />
                                                        @error('kondisi_lingkungan')
                                                            <div class="invalid-feedback d-block">{{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>

                                                    <div class="mb-6">
                                                        <label class="form-label">History Perbaikan</label>
                                                        <input disabled type="number" name="history_perbaikan"
                                                            class="form-control @error('history_perbaikan') is-invalid @enderror"
                                                            value="{{ old('history_perbaikan') }}" />
                                                        @error('history_perbaikan')
                                                            <div class="invalid-feedback d-block">{{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>

                                                    <div class="mb-6">
                                                        <label class="form-label">Usia Instalasi</label>
                                                        <input disabled type="number" name="usia_instalasi"
                                                            class="form-control @error('usia_instalasi') is-invalid @enderror"
                                                            value="{{ old('usia_instalasi') }}" />
                                                        @error('usia_instalasi')
                                                            <div class="invalid-feedback d-block">{{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div id="rbi-fields">
                                            <hr class="my-4">
                                            <h6 class="mb-3">Data RBI</h6>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-6">
                                                        <label class="form-label">Laju Korosi</label>
                                                        <select name="usia_peralatan"
                                                            class="form-control @error('usia_peralatan') is-invalid @enderror">
                                                            <option value="">Pilih Laju Korosi</option>
                                                            <option value="1"
                                                                {{ old('usia_peralatan') == '1' ? 'selected' : '' }}>
                                                                Level 1
                                                            </option>
                                                            <option value="2"
                                                                {{ old('usia_peralatan') == '2' ? 'selected' : '' }}>
                                                                Level 2
                                                            </option>
                                                            <option value="3"
                                                                {{ old('usia_peralatan') == '3' ? 'selected' : '' }}>
                                                                Level 3
                                                            </option>
                                                            <option value="4"
                                                                {{ old('usia_peralatan') == '4' ? 'selected' : '' }}>
                                                                Level 4
                                                            </option>
                                                            <option value="5"
                                                                {{ old('usia_peralatan') == '5' ? 'selected' : '' }}>
                                                                Level 5
                                                            </option>
                                                        </select>
                                                    </div>

                                                    <div class="mb-6">
                                                        <label class="form-label">Laju Korosi</label>
                                                        <input disabled type="number" name="laju_korosi"
                                                            class="form-control @error('laju_korosi') is-invalid @enderror"
                                                            value="{{ old('laju_korosi') }}" />
                                                        @error('laju_korosi')
                                                            <div class="invalid-feedback d-block">{{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>

                                                    <div class="mb-6">
                                                        <label class="form-label">Kondisi Coating</label>
                                                        <input disabled type="number" name="kondisi_coating_rbi"
                                                            class="form-control @error('kondisi_coating_rbi') is-invalid @enderror"
                                                            value="{{ old('kondisi_coating_rbi') }}" />
                                                        @error('kondisi_coating_rbi')
                                                            <div class="invalid-feedback d-block">{{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>

                                                    <div class="mb-6">
                                                        <label class="form-label">Korosi Bagian Dasar</label>
                                                        <input disabled type="number" name="korosi_bagian_dasar"
                                                            class="form-control @error('korosi_bagian_dasar') is-invalid @enderror"
                                                            value="{{ old('korosi_bagian_dasar') }}" />
                                                        @error('korosi_bagian_dasar')
                                                            <div class="invalid-feedback d-block">{{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>

                                                    <div class="mb-6">
                                                        <label class="form-label">Kondisi Lingkungan</label>
                                                        <input disabled type="number" name="kondisi_lingkungan_rbi"
                                                            class="form-control @error('kondisi_lingkungan_rbi') is-invalid @enderror"
                                                            value="{{ old('kondisi_lingkungan_rbi') }}" />
                                                        @error('kondisi_lingkungan_rbi')
                                                            <div class="invalid-feedback d-block">{{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="mb-6">
                                                        <label class="form-label">Volume Tangki</label>
                                                        <input disabled type="number" name="volume_tangki"
                                                            class="form-control @error('volume_tangki') is-invalid @enderror"
                                                            value="{{ old('volume_tangki') }}" />
                                                        @error('volume_tangki')
                                                            <div class="invalid-feedback d-block">{{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>

                                                    <div class="mb-6">
                                                        <label class="form-label">Jenis Produk</label>
                                                        <input disabled type="number" name="jenis_produk"
                                                            class="form-control @error('jenis_produk') is-invalid @enderror"
                                                            value="{{ old('jenis_produk') }}" />
                                                        @error('jenis_produk')
                                                            <div class="invalid-feedback d-block">{{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>

                                                    <div class="mb-6">
                                                        <label class="form-label">Dampak Lingkungan</label>
                                                        <input disabled type="number" name="dampak_lingkungan"
                                                            class="form-control @error('dampak_lingkungan') is-invalid @enderror"
                                                            value="{{ old('dampak_lingkungan') }}" />
                                                        @error('dampak_lingkungan')
                                                            <div class="invalid-feedback d-block">{{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>

                                                    <div class="mb-6">
                                                        <label class="form-label">Dampak Bisnis</label>
                                                        <input disabled type="number" name="dampak_bisnis"
                                                            class="form-control @error('dampak_bisnis') is-invalid @enderror"
                                                            value="{{ old('dampak_bisnis') }}" />
                                                        @error('dampak_bisnis')
                                                            <div class="invalid-feedback d-block">{{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="mt-4 text-end">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a href="{{ route('inspeksi.index') }}"
                                            class="btn btn-label-secondary">Cancel</a>
                                    </div>

                                </form>


                            </div>
                        </div>
                        <!--/ Customer Content -->
                    </div>


                </div>
            </div>

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
