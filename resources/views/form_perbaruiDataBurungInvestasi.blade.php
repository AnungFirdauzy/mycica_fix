@extends('layouts.main')

@section('konten')
    <div class="container-fluid bg-dark text-light p-5">

        @if(session()->has('gagal'))
        <div class="alert alert-danger alert-dismissible fade show mt-3 text-center" role="alert">
            {{ session('gagal') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="container">
            <div class="container p-5 shadow" style="width: 50%;">
                <h2><strong>Perbarui Data</strong></h2>
                <form action="/investasis/perbarui/{{ $burung['nama_burung'] }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nama_burung">Nama Burung</label>
                        <input type="text" id="nama_burung" name="nama_burung" class="form-control @error('nama_burung') is-invalid @enderror" placeholder="Nama Burung" value="{{ $burung['nama_burung'] }}">
                        @error('nama_burung')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <input type="hidden" name="id_peternak" class="form-control" value="{{ $burung['id_peternak'] }}">
                    </div>

                    <div class="mb-3">
                        <label for="tanggal_menetas">Tanggal Menetas</label>
                        <input type="date" id="tanggal_menetas" name="tanggal_menetas" class="form-control @error('tanggal_menetas') is-invalid @enderror" placeholder="Tanggal Menetas" value="{{ $burung['tanggal_menetas'] }}">
                        @error('tangal_menetas')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <input type="hidden" name="tanggal_max_investasi" value="">
                    </div>

                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select class="form-select mb-3" id="jenis_kelamin" name="jenis_kelamin" aria-label=".form-select-sm example">
                        <option selected>{{ $burung['jenis_kelamin'] }}</option>
                        @if ($burung['jenis_kelamin'] == 'Pejantan')
                            <option value="Betina">Betina</option>
                        @endif
                        @if ($burung['jenis_kelamin'] == 'Betina')
                            <option value="Pejantan">Pejantan</option>
                        @endif
                    </select>
                    @error('jenis_kelamin')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                    <label for="berat">Berat Burung</label>
                    <div class="input-group mb-3">
                        <input type="text" name="berat" class="form-control @error('berat') is-invalid @enderror" placeholder="Berat" aria-label="Recipient's username" aria-describedby="basic-addon2" value="{{ $burung['berat'] }}">
                        <span class="input-group-text" id="basic-addon2">gram</span>
                        @error('berat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <label for="riwayat_medis">Riwayat Medis</label>
                    <div class="mb-3">
                        <textarea class="form-control" name="riwayat_medis" aria-label="With textarea" placeholder="Riwayat Medis">{{ $burung['riwayat_medis'] }}</textarea>
                    @error('riwayat_medis')
                        <div class="invalid-feedback">
                                {{ $message }}
                        </div>
                    @enderror
                    </div>

                    <label for="berat">Biaya Tambahan</label>
                    <div class="input-group mb-3">
                        <input type="text" name="biaya_tambahan" class="form-control @error('biaya_tambahan') is-invalid @enderror" placeholder="Biaya Tambahan" aria-label="Recipient's username" aria-describedby="basic-addon2" value="{{ $burung['biaya_tambahan'] }}">
                        @error('biaya_tambahan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <label for="berat">Jadwal Perawatan</label>
                    <div class="input-group mb-3">
                        <input type="text" name="jadwal_perawatan" class="form-control @error('jadwal_perawatan') is-invalid @enderror" placeholder="Jadwal Perawatan" aria-label="Recipient's username" aria-describedby="basic-addon2" value="{{ $burung['jadwal_perawatan'] }}">
                        @error('jadwal_perawatan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="formFile" class="form-label">Tambahkan Gambar</label>
                        <input class="form-control" type="file" id="formFile">
                    </div>

                    <label for="status">Status Burung</label>
                    <select class="form-select mb-3" id="status" name="status" aria-label=".form-select-sm example">
                        <option selected>{{ $burung['status'] }}</option>
                        @if ($burung['status'] == 'tersedia')
                            <option value="tidak tersedia">tidak tersedia</option>
                        @endif
                        @if ($burung['status'] == 'tidak tersedia')
                            <option value="tersedia">tersedia</option>
                        @endif
                    </select>
                    @error('status')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror



                    <a href="/katalog/investasi/pet/detail/{{ $burung['id'] }}/{{ $peternak['email'] }}"><button type="button" class="btn btn-outline-secondary me-1" style="width: 80px">Batal</button></a>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        Simpan
                    </button>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body text-dark">
                                    <h5 class="modal-title" id="staticBackdropLabel">Data akan disimpan</h5>
                                    <small>Klik "OK" untuk melanjutkan</small>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">OK</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection



@section('script')
<script
src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
crossorigin="anonymous"
></script>
@endsection