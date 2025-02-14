<x-.layout>
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-xl mb-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">{{ $title }}</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('area.update', $area->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-6">
                                <label class="form-label" for="basic-default-fullname">Nama Area</label>
                                <input type="text" class="form-control @error('nama_area') is-invalid @enderror"
                                    placeholder="Silahkan Isi" name="nama_area"
                                    value="{{ old('nama_area', $area->nama_area) }}" />
                                @error('nama_area')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-6">
                                <label class="form-label" for="basic-default-fullname">Kode Area</label>
                                <input type="text" class="form-control @error('kode_area') is-invalid @enderror"
                                    placeholder="Silahkan Isi" name="kode_area"
                                    value="{{ old('kode_area', $area->kode_area) }}" />
                                @error('kode_area')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('area.index') }}" class="btn btn-label-secondary">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-.layout>
