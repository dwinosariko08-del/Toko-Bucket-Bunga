@extends('layouts.auth.app')

@section('content')
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;1,700&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

<style>
    /* Reset & Base */
    * { box-sizing: border-box; } /* Kunci agar field tidak keluar card */
    
    body, html {
        height: 100%;
        margin: 0;
        font-family: 'Poppins', sans-serif;
        background-color: #1a1816;
        overflow: hidden;
    }

    /* --- BACKGROUND --- */
    .bg-wrapper {
        position: fixed;
        inset: 0;
        z-index: -1;
    }

    .bg-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        animation: kenBurns 30s infinite alternate ease-in-out;
        filter: brightness(0.6);
    }

    .bg-overlay {
        position: absolute;
        inset: 0;
        background: radial-gradient(circle, rgba(26, 24, 22, 0.2) 0%, rgba(26, 24, 22, 0.9) 100%);
        z-index: 1;
    }

    @keyframes kenBurns {
        0% { transform: scale(1); }
        100% { transform: scale(1.1); }
    }

    /* --- LOGIN CARD --- */
    .master-container {
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px;
    }

    .login-card {
        width: 100%;
        max-width: 420px;
        background: rgba(26, 24, 22, 0.85);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border: 1px solid rgba(197, 160, 89, 0.3);
        border-radius: 24px;
        padding: 50px 40px;
        box-shadow: 0 25px 50px rgba(0,0,0,0.6);
        text-align: center;
    }

    /* Logo Ornamen */
    .brand-ornament {
        width: 60px;
        height: 60px;
        margin: 0 auto 15px;
        display: block;
    }

    .brand-name {
        font-family: 'Playfair Display', serif;
        font-size: 28px;
        font-style: italic;
        color: #fff;
        letter-spacing: 2px;
        margin-bottom: 5px;
        display: block;
    }

    .brand-sub {
        color: #c5a059;
        font-size: 10px;
        letter-spacing: 5px;
        text-transform: uppercase;
        margin-bottom: 35px;
        display: block;
    }

    /* --- FORM FIELDS --- */
    .form-group { 
        margin-bottom: 20px; 
        text-align: left;
        width: 100%; 
    }

    .form-control {
        width: 100%; /* Tetap di dalam card karena box-sizing: border-box */
        background: rgba(255, 255, 255, 0.05) !important;
        border: 1px solid rgba(255, 255, 255, 0.1) !important;
        border-radius: 12px !important;
        height: 52px;
        color: #fff !important;
        padding: 0 15px;
        font-size: 14px;
        transition: 0.3s;
    }

    .form-control:focus {
        border-color: #c5a059 !important;
        background: rgba(255, 255, 255, 0.08) !important;
        outline: none;
        box-shadow: 0 0 10px rgba(197, 160, 89, 0.2);
    }

    /* --- BUTTON --- */
    .btn-submit {
        width: 100%;
        height: 52px;
        background: #c5a059;
        color: #1a1816;
        border: none;
        border-radius: 12px;
        font-weight: 600;
        font-size: 15px;
        letter-spacing: 1px;
        margin-top: 10px;
        cursor: pointer;
        transition: 0.3s;
    }

    .btn-submit:hover {
        background: #d4b477;
        transform: translateY(-2px);
    }

    .footer-text {
        margin-top: 30px;
        color: rgba(255,255,255,0.5);
        font-size: 13px;
        border-top: 1px solid rgba(255,255,255,0.1);
        padding-top: 20px;
    }

    .footer-text a { color: #c5a059; text-decoration: none; font-weight: 600; }

    @media (max-width: 480px) {
        .login-card { padding: 40px 25px; }
    }
</style>

<div class="bg-wrapper">
    <div class="bg-overlay"></div>
    <img src="{{ asset('img/hero.JPG') }}" class="bg-image" alt="FA.STORYBUCKET Hero">
</div>

<div class="master-container">
    <div class="login-card">
        <div class="brand-ornament">
            <svg viewBox="0 0 512 512" fill="#c5a059" xmlns="http://www.w3.org/2000/svg">
                <g>
                    <path d="M420.319,75.774l-9.439-0.841c-0.395-0.035-7.941-0.691-19.3-0.772c3.792-18.43,3.951-33.663,3.956-34.406l0.062-8.97 l-8.848,1.479c-0.956,0.16-21.698,3.693-43.742,12.43C331.897,23.747,318.4,7.607,317.776,6.866L312.001,0l-5.77,6.869 c-0.478,0.568-10.238,12.268-19.304,28.755c-8.695-7.301-14.87-11.701-15.192-11.93l-7.729-5.48l-3.607,8.76 c-0.363,0.881-3.722,9.162-7.087,21.383c-3.366-12.221-6.725-20.501-7.087-21.383l-3.608-8.76l-7.729,5.48 c-0.323,0.229-6.496,4.628-15.192,11.929c-9.067-16.488-18.826-28.186-19.304-28.755L194.619,0l-5.775,6.864 c-0.625,0.742-14.121,16.883-25.233,37.829c-22.044-8.737-42.785-12.27-43.742-12.43l-8.848-1.479l0.062,8.97 c0.005,0.743,0.164,15.978,3.955,34.407c-11.358,0.082-18.905,0.736-19.3,0.771L86.3,75.773l2.937,9.01 c0.585,1.795,12.54,37.85,36.167,64.373h-20.324l105.648,225.671L186.381,512h133.858l-24.347-137.171L401.54,149.158h-20.323 c23.627-26.524,35.581-62.578,36.166-64.373L420.319,75.774z"/>
                    </g>
            </svg>
        </div>

        <span class="brand-name">FA.STORYBUCKET</span>
        <span class="brand-sub">Florist Studio</span>

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Email Address" required>
            </div>

            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>

            <button type="submit" class="btn-submit">Sign In</button>
            
            <div style="margin-top: 15px; font-size: 13px;">
                <a href="{{ route('password.request') }}" style="color: rgba(255,255,255,0.4); text-decoration: none;">Forgot Password?</a>
            </div>
        </form>

        <div class="footer-text">
            New to FA.STORYBUCKET? <br>
            <a href="{{ route('register') }}" class="mt-2 d-inline-block">Sign up now</a>
        </div>
    </div>
</div>
@endsection