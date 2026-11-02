<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;1,700&family=Inter:wght@400;600&display=swap" rel="stylesheet">

<style>
    .fa-navbar {
        background: rgba(255, 255, 255, 0.8) !important;
        backdrop-filter: blur(15px);
        -webkit-backdrop-filter: blur(15px);
        border-bottom: 1px solid rgba(197, 160, 89, 0.2);
        padding: 15px 0;
        transition: all 0.3s ease;
    }

    .fa-brand {
        font-family: 'Playfair Display', serif;
        font-weight: 700;
        letter-spacing: 1px;
        color: #1a1a1a !important;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .fa-brand span {
        color: #c5a059; /* Gold accent */
        font-size: 0.8rem;
        font-family: 'Inter', sans-serif;
        text-transform: uppercase;
        letter-spacing: 3px;
        font-weight: 600;
    }

    /* Tombol Logout Luxury */
    .btn-logout-lux {
        background: #1a1a1a;
        color: #ffffff;
        border: none;
        border-radius: 8px;
        padding: 8px 20px;
        font-family: 'Inter', sans-serif;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .btn-logout-lux:hover {
        background: #c5a059;
        color: white;
        box-shadow: 0 5px 15px rgba(197, 160, 89, 0.3);
        transform: translateY(-2px);
    }

    .nav-status {
        font-size: 0.7rem;
        color: #888;
        font-weight: 600;
        margin-right: 20px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }
</style>

<nav class="navbar navbar-expand-lg fa-navbar sticky-top">
    <div class="container">
        <a class="navbar-brand fa-brand" href="{{ route('admin.dashboard') }}">
            FA.STORYBUCKET 
        </a>

        <div class="d-flex align-items-center ms-auto">
            <div class="nav-status d-none d-md-block">
                <i class="fa-solid fa-circle text-success me-1" style="font-size: 0.5rem;"></i> 
                System: Secured
            </div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn-logout-lux">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i> Logout
                </button>
            </form>
        </div>
    </div>
</nav>