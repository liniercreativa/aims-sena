<x-.layout>
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-xl mb-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">{{ $title }}</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('user.store') }}" method="POST">
                            @csrf
                            <div class="mb-6">
                                <label class="form-label" for="basic-default-fullname">Nama</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    placeholder="Silahkan Isi" name="name" value="{{ old('name') }}" />
                                @error('name')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-6">
                                <label class="form-label" for="basic-default-email">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    placeholder="Silahkan Isi" name="email" value="{{ old('email') }}" />
                                @error('email')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-6">
                                <label class="form-label" for="basic-default-password">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    placeholder="Silahkan Isi" name="password" />
                                @error('password')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-6">
                                <label class="form-label" for="basic-default-role">Role</label>
                                <select name="role" class="form-control @error('role') is-invalid @enderror">
                                    <option value="">Pilih Role</option>
                                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="engineer" {{ old('role') == 'engineer' ? 'selected' : '' }}>Engineer
                                    </option>
                                    <option value="surveyor" {{ old('role') == 'surveyor' ? 'selected' : '' }}>Surveyor
                                    </option>
                                </select>
                                @error('role')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-6">
                                <label class="form-label" for="basic-default-nip">NIP</label>
                                <input type="text" class="form-control @error('nip') is-invalid @enderror"
                                    placeholder="Silahkan Isi" name="nip" value="{{ old('nip') }}" />
                                @error('nip')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('user.index') }}" class="btn btn-label-secondary">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-.layout>
