<x-layout>
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-datatable table-responsive pt-0">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">{{ $title }}</h5>
                </div>
                <table id="inspeksiTable" class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Jadwal Inspeksi</th>
                            <th>Tanggal Inspeksi</th>
                            <th>Aset</th>
                            <th>Tahun Dibuat</th>
                            <th>Inspektor</th>
                            <th>Resiko</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
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
            $('#inspeksiTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('inspeksi.getAll') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'tanggal_jadwal_inspeksi',
                        name: 'tanggal_jadwal_inspeksi'
                    },
                    {
                        data: 'tanggal_inspeksi',
                        name: 'tanggal_inspeksi'
                    },
                    {
                        data: 'jenis_aset', // Diubah dari aset.nama
                        name: 'jenis_aset'
                    },
                    {
                        data: 'tahun_dibuat', // Diubah dari aset.nama
                        name: 'tahun_dibuat'
                    },
                    {
                        data: 'nama_inspektor', // Diubah dari user.name
                        name: 'nama_inspektor'
                    },
                    {
                        data: 'resiko',
                        name: 'resiko',
                        render: function(data) {
                            let badge = '';
                            switch (data) {
                                case 'insignificant':
                                    badge = '<span class="badge bg-success">Insignificant</span>';
                                    break;
                                case 'minor':
                                    badge = '<span class="badge bg-info">Minor</span>';
                                    break;
                                case 'moderate':
                                    badge = '<span class="badge bg-warning">Moderate</span>';
                                    break;
                                case 'significant':
                                    badge = '<span class="badge bg-danger">Significant</span>';
                                    break;
                                case 'catastrophic':
                                    badge = '<span class="badge bg-dark">Catastrophic</span>';
                                    break;
                            }
                            return badge;
                        }
                    },
                    {
                        data: 'status',
                        name: 'status',
                        render: function(data) {
                            let badge = '';
                            switch (data) {
                                case 'terjadwal':
                                    badge = '<span class="badge bg-primary">Terjadwal</span>';
                                    break;
                                case 'selesai':
                                    badge = '<span class="badge bg-success">Selesai</span>';
                                    break;
                                case 'dibatalkan':
                                    badge = '<span class="badge bg-danger">Dibatalkan</span>';
                                    break;
                                case 'dikerjakan':
                                    badge = '<span class="badge bg-warning">Dikerjakan</span>';
                                    break;
                            }
                            return badge;
                        }
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ],
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.10.24/i18n/Indonesian.json'
                }
            });
        });



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
    </script>
</x-layout>
