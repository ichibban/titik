@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto mt-10 bg-white p-8 rounded-xl shadow-md">
        <h1 class="text-2xl font-bold mb-6 text-center text-gray-800">Tambah Anggota Baru</h1>
        @if(session('success'))
            <div class="alert alert-success mb-4">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('anggota.store') }}" method="POST" class="space-y-4">
            @csrf

            <!-- Nama -->
            <div>
                <label class="label">
                    <span class="label-text font-semibold">Nama Lengkap</span>
                </label>
                <input type="text" name="name" class="input input-bordered w-full" required>
            </div>

            <!-- Email -->
            <div>
                <label class="label">
                    <span class="label-text font-semibold">Email</span>
                </label>
                <input type="email" name="email" class="input input-bordered w-full" required>
            </div>

            <!-- Password -->
            <div>
                <label class="label">
                    <span class="label-text font-semibold">Password</span>
                </label>
                <input type="password" name="password" class="input input-bordered w-full" required>
            </div>

            <!-- Role -->
            <div>
                <label class="label">
                    <span class="label-text font-semibold">Role</span>
                </label>
                <select name="role" class="select select-bordered w-full" required>
                    <option disabled selected>Pilih role</option>
                    <option value="anggota">Anggota</option>
                    <option value="bajang">Bajang</option>
                    <option value="jabang">Jabang</option>
                </select>
            </div>

            <!-- Submit -->
            <div class="text-right">
                <button type="submit" class="btn btn-primary">
                    Tambah Anggota
                </button>
            </div>
        </form>
    </div>
    <br>
    <br>
@endsection