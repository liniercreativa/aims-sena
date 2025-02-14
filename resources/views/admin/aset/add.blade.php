<x-.layout>
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-xl mb-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Tambah Aset</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('aset.store') }}" method="POST">
                            @csrf

                            {{-- Data Umum --}}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-6">
                                        <label class="form-label">Jenis Aset</label>
                                        <select name="jenis_aset" id="jenis_aset"
                                            class="form-control @error('jenis_aset') is-invalid @enderror">
                                            <option value="">Pilih Jenis Aset</option>
                                            <option value="pipeline"
                                                {{ old('jenis_aset') == 'pipeline' ? 'selected' : '' }}>Pipeline
                                            </option>
                                            <option value="vessel"
                                                {{ old('jenis_aset') == 'vessel' ? 'selected' : '' }}>Vessel</option>
                                            <option value="tangki timbun"
                                                {{ old('jenis_aset') == 'tangki timbun' ? 'selected' : '' }}>Tangki
                                                Timbun</option>
                                        </select>
                                        @error('jenis_aset')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-6">
                                        <label class="form-label">Area</label>
                                        <select name="area_id"
                                            class="form-control @error('area_id') is-invalid @enderror">
                                            <option value="">Pilih Area</option>
                                            @foreach ($areas as $area)
                                                <option value="{{ $area->id }}"
                                                    {{ old('area_id') == $area->id ? 'selected' : '' }}>
                                                    {{ $area->nama_area }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('area_id')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-6">
                                        <label class="form-label">Cluster</label>
                                        <select name="cluster_id"
                                            class="form-control @error('cluster_id') is-invalid @enderror">
                                            <option value="">Pilih Cluster</option>
                                            @foreach ($clusters as $cluster)
                                                <option value="{{ $cluster->id }}"
                                                    {{ old('cluster_id') == $cluster->id ? 'selected' : '' }}>
                                                    {{ $cluster->nama_cluster }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('cluster_id')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">


                                    <div class="mb-6">
                                        <label class="form-label">Tahun Dibuat</label>
                                        <select name="tahun_dibuat"
                                            class="form-control @error('tahun_dibuat') is-invalid @enderror">
                                            <option value="">Pilih Tahun</option>
                                            @for ($year = date('Y'); $year >= 1991; $year--)
                                                <option value="{{ $year }}"
                                                    {{ old('tahun_dibuat') == $year ? 'selected' : '' }}>
                                                    {{ $year }}
                                                </option>
                                            @endfor
                                        </select>
                                        @error('tahun_dibuat')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-6">
                                        <label class="form-label">Status</label>
                                        <select name="status"
                                            class="form-control @error('status') is-invalid @enderror">
                                            <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>
                                                Aktif</option>
                                            <option value="tidak aktif"
                                                {{ old('status') == 'tidak aktif' ? 'selected' : '' }}>Tidak Aktif
                                            </option>
                                        </select>
                                        @error('status')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-6">
                                        <label class="form-label">Lokasi</label>
                                        <textarea name="lokasi" class="form-control @error('lokasi') is-invalid @enderror" placeholder="Silahkan Isi">{{ old('lokasi') }}</textarea>
                                        @error('lokasi')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                            </div>

                            {{-- Form khusus Pipeline --}}
                            <div id="pipeline-fields" style="display: none;">
                                <hr class="my-4">
                                <h6 class="mb-3">Data Pipeline</h6>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-6">
                                            <label class="form-label">Distrik</label>
                                            <input type="text" name="distrik"
                                                class="form-control @error('distrik') is-invalid @enderror"
                                                placeholder="Silahkan Isi" value="{{ old('distrik') }}" />
                                            @error('distrik')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-6">
                                            <label class="form-label">Dimensi</label>
                                            <input type="text" name="dimensi"
                                                class="form-control @error('dimensi') is-invalid @enderror"
                                                placeholder="Silahkan Isi" value="{{ old('dimensi') }}" />
                                            @error('dimensi')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-6">
                                            <label class="form-label">Lokasi Bentang</label>
                                            <input type="text" name="lokasi_bentang"
                                                class="form-control @error('lokasi_bentang') is-invalid @enderror"
                                                placeholder="Silahkan Isi" value="{{ old('lokasi_bentang') }}" />
                                            @error('lokasi_bentang')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Form untuk Vessel dan Tangki Timbun --}}
                            <div id="other-fields" style="display: none;">
                                <hr class="my-4">
                                <h6 class="mb-3">Data Peralatan</h6>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-6">
                                            <label class="form-label">Jenis Peralatan</label>
                                            <input type="text" name="jenis_peralatan"
                                                class="form-control @error('jenis_peralatan') is-invalid @enderror"
                                                placeholder="Silahkan Isi" value="{{ old('jenis_peralatan') }}" />
                                            @error('jenis_peralatan')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-6">
                                            <label class="form-label">Tag Number</label>
                                            <input type="text" name="tag_number"
                                                class="form-control @error('tag_number') is-invalid @enderror"
                                                placeholder="Silahkan Isi" value="{{ old('tag_number') }}" />
                                            @error('tag_number')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-6">
                                            <label class="form-label">Serial Number</label>
                                            <input type="text" name="serial_number"
                                                class="form-control @error('serial_number') is-invalid @enderror"
                                                placeholder="Silahkan Isi" value="{{ old('serial_number') }}" />
                                            @error('serial_number')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ route('aset.index') }}" class="btn btn-label-secondary">Cancel</a>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Script JavaScript tetap sama
        document.getElementById('jenis_aset').addEventListener('change', function() {
            const pipelineFields = document.getElementById('pipeline-fields');
            const otherFields = document.getElementById('other-fields');

            if (this.value === 'pipeline') {
                pipelineFields.style.display = 'block';
                otherFields.style.display = 'none';
            } else if (this.value === 'vessel' || this.value === 'tangki timbun') {
                pipelineFields.style.display = 'none';
                otherFields.style.display = 'block';
            } else {
                pipelineFields.style.display = 'none';
                otherFields.style.display = 'none';
            }
        });

        window.addEventListener('load', function() {
            const jenisAsetSelect = document.getElementById('jenis_aset');
            if (jenisAsetSelect.value) {
                jenisAsetSelect.dispatchEvent(new Event('change'));
            }
        });
    </script>
</x-.layout>
