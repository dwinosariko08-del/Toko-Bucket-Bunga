<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>FA.STORYBUCKET | Bucket Pati</title>

    <!-- FAVICON SVG -->
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <!-- Fallback (opsional tapi disarankan) -->
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,600;1,400&family=Montserrat:wght@200;400;600&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Custom Styles -->
    <style>
        html { scroll-behavior: smooth; }

        body { 
            font-family: 'Montserrat', sans-serif; 
            background-color: #fdfaf9; 
            color: #4a4238; 
            overflow-x: hidden;
        }

        .serif { font-family: 'Cormorant Garamond', serif; }

        /* Navigasi Transparan */
        .glass-nav {
            background: rgba(253, 250, 249, 0.8);
            backdrop-filter: blur(15px);
            border-bottom: 1px solid rgba(226, 169, 161, 0.2);
        }

        /* --- ANIMASI --- */
        @keyframes kenBurns {
            0% { transform: scale(1); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }

        @keyframes subtleFloat {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }

        /* Hero Frame */
        .hero-frame {
            width: 300px;
            height: 420px;
            border-radius: 150px 150px 20px 20px;
            overflow: hidden;
            position: relative;
            box-shadow: 0 25px 50px rgba(226, 169, 161, 0.3);
            animation: subtleFloat 6s ease-in-out infinite;
        }

        @media (min-width: 768px) {
            .hero-frame { width: 380px; height: 500px; }
        }

        .animate-ken-burns {
            animation: kenBurns 12s ease-in-out infinite;
        }

        .gold-gradient {
            background: linear-gradient(90deg, #bf953f, #aa771c);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .luxury-card {
            background: white;
            border-radius: 25px;
            transition: all 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
            border: 1px solid rgba(226, 169, 161, 0.1);
        }

        .luxury-card:hover {
            transform: translateY(-10px);
            border-color: #e2a9a1;
        }

        .btn-order {
            background: #4a4238;
            color: #fdfaf9;
            border-radius: 50px;
            font-size: 10px;
            letter-spacing: 3px;
            font-weight: 600;
            transition: all 0.4s;
        }

        .btn-order:hover {
            background: #e2a9a1;
            transform: scale(1.05);
        }

        .gallery-item {
            aspect-ratio: 1/1;
            overflow: hidden;
            border-radius: 15px;
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 1.5s;
        }

        .gallery-item:hover img {
            transform: scale(1.1);
        }

        ::-webkit-scrollbar { width: 4px; }
        ::-webkit-scrollbar-thumb { background: #e2a9a1; }

        /* Sembunyikan scrollbar (mobile) */
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
</head>
