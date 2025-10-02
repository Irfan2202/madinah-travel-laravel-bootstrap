@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <h2 class="fw-bold mb-4">Form Pemesanan</h2>

        <form action="{{ route('orders.store') }}" method="POST">
            @csrf

            {{-- Data Pemesan Utama --}}
            <div class="card mb-4 p-4">
                <h4 class="fw-bold mb-3">Data Pemesan</h4>
                <div class="mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" name="customer_name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="customer_email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">No. HP</label>
                    <input type="text" name="customer_phone" class="form-control" required>
                </div>
            </div>

            {{-- Data Jamaah --}}
            <div class="card mb-4 p-4">
                <h4 class="fw-bold mb-3">Data Jamaah</h4>

                <div id="jamaah-wrapper">
                    <div class="jamaah-item border rounded p-3 mb-3">
                        <div class="mb-2">
                            <label class="form-label">Nama Jamaah</label>
                            <input type="text" name="jamaah[0][name]" class="form-control" required>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">No. Paspor / KTP</label>
                            <input type="text" name="jamaah[0][identity]" class="form-control" required>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Tanggal Lahir</label>
                            <input type="date" name="jamaah[0][birthdate]" class="form-control" required>
                        </div>
                    </div>
                </div>

                <button type="button" id="add-jamaah" class="btn btn-outline-primary btn-sm">
                    + Tambah Jamaah
                </button>
            </div>

            {{-- Hidden input untuk schedule_id & package_id --}}
            <input type="hidden" name="schedule_id" value="{{ request('schedule') }}">
            <input type="hidden" name="package_id" value="{{ $package->id }}">

            {{-- Tombol Submit --}}
            <div class="text-end">
                <button type="submit" class="btn btn-success btn-lg">Lanjut ke Invoice</button>
            </div>
        </form>
    </div>

    <script>
        let jamaahIndex = 1;
        document.getElementById('add-jamaah').addEventListener('click', function() {
            let wrapper = document.getElementById('jamaah-wrapper');
            let newItem = document.createElement('div');
            newItem.classList.add('jamaah-item', 'border', 'rounded', 'p-3', 'mb-3');
            newItem.innerHTML = `
            <div class="mb-2">
                <label class="form-label">Nama Jamaah</label>
                <input type="text" name="jamaah[${jamaahIndex}][name]" class="form-control" required>
            </div>
            <div class="mb-2">
                <label class="form-label">No. Paspor / KTP</label>
                <input type="text" name="jamaah[${jamaahIndex}][identity]" class="form-control" required>
            </div>
            <div class="mb-2">
                <label class="form-label">Tanggal Lahir</label>
                <input type="date" name="jamaah[${jamaahIndex}][birthdate]" class="form-control" required>
            </div>
            <button type="button" class="btn btn-danger btn-sm remove-jamaah">Hapus</button>
        `;
            wrapper.appendChild(newItem);

            // tombol hapus jamaah
            newItem.querySelector('.remove-jamaah').addEventListener('click', function() {
                newItem.remove();
            });

            jamaahIndex++;
        });
    </script>
@endsection
