@extends('layouts.admin')

@section('title', 'Profile - Dashboard Admin')
@section('page-title', 'Profile')
@section('page-subtitle', 'Kelola informasi profile dan keamanan akun Anda')

@section('content')
<div class="grid gap-6">
    <!-- Profile Information -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 bg-gradient-to-r from-primary/5 to-transparent">
            <h3 class="text-lg font-semibold text-gray-900">Informasi Profile</h3>
            <p class="text-sm text-gray-600 mt-1">Update informasi profile dan alamat email Anda.</p>
        </div>
        <div class="p-6">
            @include('profile.partials.update-profile-information-form')
        </div>
    </div>

    <!-- Update Password -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 bg-gradient-to-r from-primary/5 to-transparent">
            <h3 class="text-lg font-semibold text-gray-900">Update Password</h3>
            <p class="text-sm text-gray-600 mt-1">Pastikan akun Anda menggunakan password yang kuat dan aman.</p>
        </div>
        <div class="p-6">
            @include('profile.partials.update-password-form')
        </div>
    </div>

    <!-- Delete Account -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 bg-gradient-to-r from-red-50 to-transparent">
            <h3 class="text-lg font-semibold text-red-900">Hapus Akun</h3>
            <p class="text-sm text-red-600 mt-1">Hapus akun Anda secara permanen. Tindakan ini tidak dapat dibatalkan.</p>
        </div>
        <div class="p-6">
            @include('profile.partials.delete-user-form')
        </div>
    </div>
</div>
@endsection
