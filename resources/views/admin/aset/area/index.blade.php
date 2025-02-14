<x-.layout>
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- DataTable with Buttons -->
        <div class="card">
            <div class="card-datatable table-responsive pt-0">

                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">{{ $title }}</h5>
                    <a href="{{ route('area.add') }}" class="float-end btn btn-primary new" tabindex="0"
                        aria-controls="DataTables_Table_0">
                        <span>
                            <i class="ti ti-plus me-sm-1"></i>
                            <span class="d-none d-sm-inline-block">Tambah Area
                            </span>
                        </span>
                    </a>
                </div>
                <table id="areaTable" class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Area</th>
                            <th>Kode Area</th>
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

    <!-- Di bagian bawah sebelum tutup body -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

    {{-- SweetAlert --}}
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js"></script>



    <script>
        $(document).ready(function() {
            $('#areaTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('area.semuaarea') }}", // Endpoint untuk mengambil data
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'nama_area',
                        name: 'nama_area'
                    },
                    {
                        data: 'kode_area',
                        name: 'kode_area'
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

        // Fungsi untuk konfirmasi delete
        function deleteArea(id) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data area akan dihapus permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Buat form untuk delete
                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action = '{{ route('area.destroy', '') }}/' + id;

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

                    // Submit form
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
    </script>
</x-.layout>
