<x-.layout>
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- DataTable with Buttons -->
        <div class="card">
            <div class="card-datatable table-responsive pt-0">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">{{ $title }}</h5>
                    <a href="{{ route('aset.add') }}" class="float-end btn btn-primary new" tabindex="0">
                        <span>
                            <i class="ti ti-plus me-sm-1"></i>
                            <span class="d-none d-sm-inline-block">Tambah Aset</span>
                        </span>
                    </a>
                </div>
                <table id="asetTable" class="table ">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Area</th>
                            <th>Cluster</th>
                            <th>Jenis Aset</th>
                            <th>Lokasi</th>
                            <th>Tahun Dibuat</th>
                            <th>Umur</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Detail Aset -->
    <div class="modal fade" id="detailModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Aset</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="fw-bold">Area</label>
                                <p id="detail-area"></p>
                            </div>
                            <div class="mb-3">
                                <label class="fw-bold">Cluster</label>
                                <p id="detail-cluster"></p>
                            </div>
                            <div class="mb-3">
                                <label class="fw-bold">Jenis Aset</label>
                                <p id="detail-jenis-aset"></p>
                            </div>
                            <div class="mb-3">
                                <label class="fw-bold">Status</label>
                                <p id="detail-status"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="fw-bold">Lokasi</label>
                                <p id="detail-lokasi"></p>
                            </div>
                            <div class="mb-3">
                                <label class="fw-bold">Tahun Dibuat</label>
                                <p id="detail-tahun"></p>
                            </div>
                            <div class="mb-3">
                                <label class="fw-bold">Umur</label>
                                <p id="detail-umur"></p>
                            </div>
                        </div>

                        <!-- Data Pipeline -->
                        <div class="col-12 pipeline-data" style="display: none;">
                            <hr>
                            <h6 class="mb-3">Data Pipeline</h6>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="fw-bold">Distrik</label>
                                        <p id="detail-distrik"></p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="fw-bold">Dimensi</label>
                                        <p id="detail-dimensi"></p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="fw-bold">Lokasi Bentang</label>
                                        <p id="detail-lokasi-bentang"></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Data Peralatan -->
                        <div class="col-12 other-data" style="display: none;">
                            <hr>
                            <h6 class="mb-3">Data Peralatan</h6>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="fw-bold">Jenis Peralatan</label>
                                        <p id="detail-jenis-peralatan"></p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="fw-bold">Tag Number</label>
                                        <p id="detail-tag-number"></p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="fw-bold">Serial Number</label>
                                        <p id="detail-serial-number"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>





    <!-- Modal Jadwal Inspeksi -->
    <div class="modal fade" id="jadwalModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Jadwal Inspeksi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="jadwalForm">
                        <input type="hidden" id="aset_id" name="aset_id">
                        <div class="mb-3">
                            <label class="form-label">Tanggal Inspeksi</label>
                            <input type="date" id="tanggal_jadwal" name="tanggal_jadwal" class="form-control"
                                required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Petugas</label>
                            <select id="user_id" name="user_id" class="form-control" required>
                                <option value="">Pilih Petugas</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary" onclick="saveJadwal()">Simpan</button>
                </div>
            </div>
        </div>
    </div>




    {{-- Ajax / Jquery --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap5.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/responsive.bootstrap5.min.js"></script>

    {{-- SweetAlert --}}
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#asetTable').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: "{{ route('aset.getAll') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'area.nama_area',
                        name: 'area.nama_area'
                    },
                    {
                        data: 'cluster.nama_cluster',
                        name: 'cluster.nama_cluster'
                    },
                    {
                        data: 'jenis_aset_badge',
                        name: 'jenis_aset'
                    },
                    {
                        data: 'lokasi',
                        name: 'lokasi'
                    },
                    {
                        data: 'tahun_dibuat',
                        name: 'tahun_dibuat'
                    },
                    {
                        data: 'umur',
                        name: 'umur'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ],
                columnDefs: [{
                        responsivePriority: 1,
                        targets: [0, 3, 7]
                    },
                    {
                        responsivePriority: 2,
                        targets: [1, 2]
                    },
                    {
                        responsivePriority: 3,
                        targets: [5, 6]
                    },
                    {
                        responsivePriority: 4,
                        targets: 4
                    }
                ],
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.10.24/i18n/Indonesian.json'
                }
            });
        });

        function showDetail(id) {
            $.ajax({
                url: "{{ route('aset.show', '') }}/" + id,
                type: 'GET',
                success: function(response) {
                    // Isi data umum
                    $('#detail-area').text(response.area.nama_area);
                    $('#detail-cluster').text(response.cluster.nama_cluster);
                    $('#detail-jenis-aset').html(response.jenis_aset_badge);
                    $('#detail-status').html(response.status_badge);
                    $('#detail-lokasi').text(response.lokasi || '-');
                    $('#detail-tahun').text(response.tahun_dibuat);
                    $('#detail-umur').text((new Date().getFullYear() - response.tahun_dibuat) + ' Tahun');

                    // Tampilkan/sembunyikan data khusus
                    if (response.jenis_aset === 'pipeline') {
                        $('.pipeline-data').show();
                        $('.other-data').hide();
                        $('#detail-distrik').text(response.distrik || '-');
                        $('#detail-dimensi').text(response.dimensi || '-');
                        $('#detail-lokasi-bentang').text(response.lokasi_bentang || '-');
                    } else {
                        $('.pipeline-data').hide();
                        $('.other-data').show();
                        $('#detail-jenis-peralatan').text(response.jenis_peralatan || '-');
                        $('#detail-tag-number').text(response.tag_number || '-');
                        $('#detail-serial-number').text(response.serial_number || '-');
                    }

                    // Tampilkan modal
                    $('#detailModal').modal('show');
                }
            });
        }

        function deleteAset(id) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data aset akan dihapus permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action = '{{ route('aset.destroy', '') }}/' + id;

                    const csrfToken = document.createElement('input');
                    csrfToken.type = 'hidden';
                    csrfToken.name = '_token';
                    csrfToken.value = '{{ csrf_token() }}';

                    const methodField = document.createElement('input');
                    methodField.type = 'hidden';
                    methodField.name = '_method';
                    methodField.value = 'DELETE';

                    form.appendChild(csrfToken);
                    form.appendChild(methodField);
                    document.body.appendChild(form);

                    form.submit();
                }
            });
        }

        // Tampilkan SweetAlert untuk pesan sukses
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 1500
            });
        @endif






        // Tampilkan modal jadwal inspeksi
        function showJadwalModal(id) {
            // Reset form
            $('#jadwalForm')[0].reset();
            $('#aset_id').val(id);

            // Cek status jadwal terlebih dahulu
            $.ajax({
                url: `/dashboard/aset/check-jadwal/${id}`, // URL yang benar
                type: 'GET',
                success: function(response) {
                    if (response.isScheduled) {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Perhatian!',
                            text: 'Aset sudah terjadwal',
                            showConfirmButton: true
                        });
                    } else {
                        $('#jadwalModal').modal('show');
                    }
                }
            });
        }

        function saveJadwal() {
            const asetId = $('#aset_id').val();
            const formData = {
                tanggal_jadwal: $('#tanggal_jadwal').val(),
                user_id: $('#user_id').val(),
                _token: '{{ csrf_token() }}'
            };

            $.ajax({
                url: `/dashboard/aset/create-jadwal/${asetId}`, // URL yang benar
                type: 'POST',
                data: formData,
                success: function(response) {
                    if (response.success) {
                        $('#jadwalModal').modal('hide');
                        // Refresh DataTable
                        $('#asetTable').DataTable().ajax.reload();
                        // Tampilkan pesan sukses
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil!',
                            text: response.message,
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Perhatian!',
                            text: xhr.responseJSON.message,
                            showConfirmButton: true
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Terjadi kesalahan!',
                        });
                    }
                }
            });
        }
    </script>


</x-.layout>
