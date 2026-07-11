@extends('master')
@section('title', 'Daftar')
@section('body')
<style>
    .auth-container { display: flex; justify-content: center; align-items: center; min-height: 70vh; padding: 2rem 0; }
    .auth-card { display: flex; flex-direction: row; width: 100%; max-width: 950px; border: none; box-shadow: var(--shadow-hover); overflow: hidden; border-radius: 20px; background: #fff; }
    .auth-left { flex: 1; display: none; background: url('/images/login_bg.png') center/cover no-repeat; position: relative; }
    .auth-left::after { content: ''; position: absolute; inset: 0; background: linear-gradient(135deg, rgba(0,135,81,0.2) 0%, rgba(15,23,42,0.8) 100%); }
    .auth-right { flex: 1.2; padding: 3.5rem 3rem; background: #fff; }
    .auth-input { width: 100%; padding: 0.85rem 1rem; border: 2px solid #e2e8f0; border-radius: 8px; font-size: 1rem; outline: none; transition: all 0.2s; box-sizing: border-box; }
    .auth-input:focus { border-color: var(--primary); box-shadow: 0 0 0 3px var(--primary-soft); }
    @media (min-width: 768px) { .auth-left { display: block; } }
</style>

<div class="auth-container">
    <div class="auth-card">
        
        <!-- Left Side: Form -->
        <div class="auth-right">
            <div style="text-align: center; margin-bottom: 2.5rem;">
                <h2 style="font-size: 2rem; font-weight: 800; color: var(--foreground); margin: 0 0 0.5rem;">Buat Akun Baru</h2>
                <p style="color: var(--muted); font-size: 0.95rem; margin: 0;">Bergabunglah dengan komunitas Pundit Bola</p>
            </div>

            @if ($errors->any())
                <div style="background: #fee2e2; border-left: 4px solid #ef4444; padding: 1rem; border-radius: 6px; margin-bottom: 1.5rem;">
                    <ul style="margin: 0; padding-left: 1.5rem; color: #b91c1c; font-size: 0.9rem;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ url('/register') }}" style="display: flex; flex-direction: column; gap: 1.25rem;">
                @csrf
                <div>
                    <label style="display: block; font-weight: 600; font-size: 0.9rem; margin-bottom: 0.5rem; color: #374151;">Nama Lengkap</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="auth-input" required autofocus placeholder="Masukkan nama kamu">
                </div>

                <div>
                    <label style="display: block; font-weight: 600; font-size: 0.9rem; margin-bottom: 0.5rem; color: #374151;">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="auth-input" required placeholder="Masukkan email aktif">
                </div>

                <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
                    <div style="flex: 1; min-width: 140px;">
                        <label style="display: block; font-weight: 600; font-size: 0.9rem; margin-bottom: 0.5rem; color: #374151;">Kata Sandi</label>
                        <div style="position: relative;">
                            <input type="password" name="password" id="reg-password" class="auth-input" style="padding-right: 2.5rem;" required placeholder="••••••••">
                            <button type="button" onclick="togglePassword('reg-password', 'eye-icon-1')" style="position: absolute; right: 0.75rem; top: 50%; transform: translateY(-50%); background: none; border: none; cursor: pointer; color: #9ca3af; padding: 0; display: flex; align-items: center; justify-content: center;">
                                <svg id="eye-icon-1" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                            </button>
                        </div>
                    </div>
                    <div style="flex: 1; min-width: 140px;">
                        <label style="display: block; font-weight: 600; font-size: 0.9rem; margin-bottom: 0.5rem; color: #374151;">Konfirmasi Sandi</label>
                        <div style="position: relative;">
                            <input type="password" name="password_confirmation" id="reg-password-confirm" class="auth-input" style="padding-right: 2.5rem;" required placeholder="••••••••">
                            <button type="button" onclick="togglePassword('reg-password-confirm', 'eye-icon-2')" style="position: absolute; right: 0.75rem; top: 50%; transform: translateY(-50%); background: none; border: none; cursor: pointer; color: #9ca3af; padding: 0; display: flex; align-items: center; justify-content: center;">
                                <svg id="eye-icon-2" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                            </button>
                        </div>
                    </div>
                </div>

                <button type="submit" class="nav-button" style="width: 100%; padding: 1rem; font-size: 1.05rem; margin-top: 1rem; text-align: center; border-radius: 8px;">Daftar Sekarang</button>
            </form>

            <p style="text-align: center; margin-top: 2rem; font-size: 0.9rem; color: var(--muted);">
                Sudah punya akun? <a href="{{ url('/login') }}" style="color: var(--primary); font-weight: 700;">Masuk di sini</a>
            </p>
        </div>

        <!-- Right Side: Image -->
        <div class="auth-left">
            <div style="position: absolute; bottom: 3rem; left: 3rem; right: 3rem; color: #fff; z-index: 10;">
                <h3 style="font-size: 1.8rem; font-weight: 800; line-height: 1.2; margin: 0 0 1rem;">Akses Fitur Premium.</h3>
                <p style="font-size: 0.95rem; opacity: 0.9; margin: 0; line-height: 1.6;">Dengan akun Pundit Bola, kamu bisa menyimpan artikel favorit, berkomentar, dan mendapatkan notifikasi berita tim kesayanganmu.</p>
            </div>
        </div>
    </div>
</div>
<script>
function togglePassword(inputId, iconId) {
    const input = document.getElementById(inputId);
    const icon = document.getElementById(iconId);
    if (input.type === 'password') {
        input.type = 'text';
        icon.innerHTML = '<path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path><line x1="1" y1="1" x2="23" y2="23"></line>';
    } else {
        input.type = 'password';
        icon.innerHTML = '<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle>';
    }
}
</script>
@stop