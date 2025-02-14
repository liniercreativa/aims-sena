<x-.layout>
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-xl mb-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">{{ $title }}</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('cluster.update', $cluster->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-6">
                                <label class="form-label" for="basic-default-fullname">Nama Cluster</label>
                                <input type="text" class="form-control @error('nama_cluster') is-invalid @enderror"
                                    placeholder="Silahkan Isi" name="nama_cluster"
                                    value="{{ old('nama_cluster', $cluster->nama_cluster) }}" />
                                @error('nama_cluster')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-6">
                                <label class="form-label" for="basic-default-fullname">Kode Cluster</label>
                                <input type="text" class="form-control @error('kode_cluster') is-invalid @enderror"
                                    placeholder="Silahkan Isi" name="kode_cluster"
                                    value="{{ old('kode_cluster', $cluster->kode_cluster) }}" />
                                @error('kode_cluster')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('cluster.index') }}" class="btn btn-label-secondary">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-.layout>
