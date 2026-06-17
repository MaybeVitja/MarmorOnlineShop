<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MarmorArt – Handgefertigte Marmorstücke</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;1,400;1,600&family=Inter:wght@300;400;500&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        :root {
            --bronze:    #8B7355;
            --bronze-lt: #A8936D;
            --warmstone: #C4B9A8;
            --obsidian:  #2D2926;
            --charcoal:  #6B6259;
            --dust:      #9E9186;
        }

        *, *::before, *::after { box-sizing: border-box; }

        body {
            font-family: 'Inter', sans-serif;
            font-weight: 300;
            -webkit-font-smoothing: antialiased;
        }

        /* Marmor-Hintergrund */
        .marble-bg {
            min-height: 100vh;
            position: relative;
            background-color: #F5F2EE;
            background-image:
                radial-gradient(ellipse 60% 50% at  8% 30%, rgba(196,185,168,0.50) 0%, transparent 60%),
                radial-gradient(ellipse 55% 45% at 92% 12%, rgba(210,203,193,0.40) 0%, transparent 55%),
                radial-gradient(ellipse 70% 40% at 50% 95%, rgba(188,178,166,0.45) 0%, transparent 60%),
                radial-gradient(ellipse 45% 55% at 78% 58%, rgba(218,213,204,0.28) 0%, transparent 50%),
                radial-gradient(ellipse 40% 30% at 25% 70%, rgba(200,192,182,0.32) 0%, transparent 48%);
        }

        .marble-bg::before {
            content: '';
            position: absolute;
            inset: 0;
            pointer-events: none;
            background-image:
                linear-gradient(108deg, transparent 28%, rgba(168,158,148,0.09) 33%, transparent 39%),
                linear-gradient(222deg, transparent 42%, rgba(155,145,135,0.07) 47%, transparent 54%),
                linear-gradient( 72deg, transparent 58%, rgba(165,158,148,0.08) 63%, transparent 70%);
        }

        /* Frosted-Glass Karte */
        .glass-card {
            background: rgba(255,255,255,0.62);
            backdrop-filter: blur(24px) saturate(140%);
            -webkit-backdrop-filter: blur(24px) saturate(140%);
            border: 1px solid rgba(196,185,168,0.35);
            box-shadow: 0 2px 4px rgba(0,0,0,0.04),
                        0 8px 24px rgba(0,0,0,0.06),
                        0 24px 60px rgba(0,0,0,0.05);
        }

        /* Logo-Ring */
        .logo-ring {
            padding: 3px;
            border-radius: 50%;
            background: linear-gradient(145deg, var(--warmstone), var(--bronze), var(--warmstone));
            margin-bottom: 1.25rem;
        }
        .logo-inner {
            width: 96px;
            height: 96px;
            border-radius: 50%;
            overflow: hidden;
            background: #EDEAE4;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .logo-inner img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Trennlinie */
        .divider {
            height: 1px;
            background: linear-gradient(90deg, transparent, var(--warmstone) 40%, var(--warmstone) 60%, transparent);
            opacity: 0.6;
        }

        /* Shop-Button */
        .btn-shop {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            width: 100%;
            padding: 1.05rem 1.5rem;
            border-radius: 1.125rem;
            font-family: 'Inter', sans-serif;
            font-weight: 500;
            font-size: 0.9375rem;
            letter-spacing: 0.04em;
            color: #fff;
            text-decoration: none;
            background: linear-gradient(120deg, #7A6345 0%, var(--bronze-lt) 45%, var(--bronze) 55%, #7A6345 100%);
            background-size: 250% 100%;
            background-position: left center;
            box-shadow: 0 4px 18px rgba(139,115,85,0.38), 0 1px 4px rgba(139,115,85,0.20);
            transition: background-position 0.55s ease, box-shadow 0.3s ease, transform 0.25s ease;
        }
        .btn-shop:hover {
            background-position: right center;
            box-shadow: 0 6px 26px rgba(139,115,85,0.52);
            transform: translateY(-2px);
        }
        .btn-shop:active { transform: translateY(0); }

        /* Social-Buttons */
        .btn-social {
            display: flex;
            align-items: center;
            gap: 1rem;
            width: 100%;
            padding: 0.875rem 1.25rem;
            border-radius: 1rem;
            text-decoration: none;
            color: var(--obsidian);
            background: rgba(255,255,255,0.65);
            border: 1px solid rgba(196,185,168,0.45);
            transition: background 0.25s ease, border-color 0.25s ease,
                        transform 0.2s ease, box-shadow 0.25s ease;
        }
        .btn-social:hover {
            background: rgba(255,255,255,0.92);
            border-color: rgba(139,115,85,0.45);
            transform: translateY(-1px);
            box-shadow: 0 4px 16px rgba(0,0,0,0.07);
        }
        .btn-social:active { transform: translateY(0); }
        .btn-social .icon { width: 1.75rem; text-align: center; flex-shrink: 0; }
        .btn-social .lbl  { font-size: 0.875rem; flex: 1; }
        .btn-social .arr  { font-size: 0.65rem; color: var(--dust); margin-left: auto; transition: transform 0.2s, color 0.2s; }
        .btn-social:hover .arr { transform: translateX(2px) translateY(-1px); color: var(--bronze); }

        /* Neu-Badge */
        .badge {
            font-size: 0.6rem;
            font-weight: 500;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            background: rgba(255,255,255,0.22);
            border: 1px solid rgba(255,255,255,0.35);
            padding: 0.15em 0.55em;
            border-radius: 999px;
        }
    </style>
</head>

<body class="marble-bg flex items-center justify-center py-14 px-4">

    <main class="relative z-10 w-full max-w-sm">
        <div class="glass-card rounded-3xl px-8 py-10">

            {{-- ══════════════════════════════════════ --}}
            {{-- LOGO & PROFIL                          --}}
            {{-- ══════════════════════════════════════ --}}
            <header style="display:flex;flex-direction:column;align-items:center;text-align:center;margin-bottom:2rem;">

                <div class="logo-ring">
                    <div class="logo-inner">

                        {{-- ── LOGO EINFÜGEN ─────────────────────────
                             Schritt 1: Lege deine Logo-Datei hier ab:
                                        public/images/logo.png
                             Schritt 2: Lösche die Zeile mit dem "M"
                             Schritt 3: Entferne die Kommentar-Tags
                                        (die geschwungenen Klammern mit --) --}}

                        <img src="{{ asset('images/logo.webp') }}" alt="MarmorArt Logo">


                    </div>
                </div>

                <h1 style="font-family:'Playfair Display',serif;font-size:1.85rem;font-style:italic;font-weight:600;color:#2D2926;line-height:1.2;margin:0 0 0.3rem;">
                    MarmorArt
                </h1>

                <p style="font-size:0.63rem;letter-spacing:0.25em;text-transform:uppercase;color:#9E9186;margin:0 0 1.25rem;">
                    Handgefertigte Marmorstücke
                </p>

                <div class="divider" style="width:3rem;margin-bottom:1.1rem;"></div>

                <p style="font-size:0.8rem;color:#6B6259;line-height:1.65;max-width:210px;margin:0;">
                    Lampen, Spiegel &amp; Dekoration —<br>jedes Stück ein Unikat aus Marmor.
                </p>

            </header>

            {{-- ══════════════════════════════════════ --}}
            {{-- BUTTONS                                --}}
            {{-- ══════════════════════════════════════ --}}
            <nav style="display:flex;flex-direction:column;gap:0.65rem;">

                {{-- ① Zum Online-Shop (Hauptbutton) --}}
                <a href="{{ route('shop') }}" class="btn-shop">
                    <i class="fa-solid fa-bag-shopping" style="font-size:1.1rem;" aria-hidden="true"></i>
                    <span>Zum Online-Shop</span>
                    <span class="badge">Neu</span>
                </a>

                <div class="divider" style="margin:0.15rem 0;"></div>

                {{-- ② Instagram --}}
                {{-- HIER: 'DEIN-INSTAGRAM-NAME' durch deinen echten Namen ersetzen --}}
                <a href="https://www.instagram.com/DEIN-INSTAGRAM-NAME"
                   target="_blank" rel="noopener noreferrer"
                   class="btn-social">
                    <span class="icon">
                        <i class="fa-brands fa-instagram" style="font-size:1.25rem;color:#E1306C;" aria-hidden="true"></i>
                    </span>
                    <span class="lbl">Instagram</span>
                    <i class="fa-solid fa-arrow-up-right-from-square arr" aria-hidden="true"></i>
                </a>

                {{-- ③ TikTok --}}
                {{-- HIER: 'DEIN-TIKTOK-NAME' durch deinen echten Namen ersetzen --}}
                <a href="https://www.tiktok.com/@denis_rii"
                   target="_blank" rel="noopener noreferrer"
                   class="btn-social">
                    <span class="icon">
                        <i class="fa-brands fa-tiktok" style="font-size:1.25rem;color:#010101;" aria-hidden="true"></i>
                    </span>
                    <span class="lbl">TikTok</span>
                    <i class="fa-solid fa-arrow-up-right-from-square arr" aria-hidden="true"></i>
                </a>

                {{-- ④ YouTube --}}
                {{-- HIER: 'DEIN-YOUTUBE-NAME' durch deinen echten Namen ersetzen --}}
                <a href="https://www.youtube.com/@blocktocreative"
                   target="_blank" rel="noopener noreferrer"
                   class="btn-social">
                    <span class="icon">
                        <i class="fa-brands fa-youtube" style="font-size:1.25rem;color:#FF0000;" aria-hidden="true"></i>
                    </span>
                    <span class="lbl">YouTube</span>
                    <i class="fa-solid fa-arrow-up-right-from-square arr" aria-hidden="true"></i>
                </a>

            </nav>

            {{-- ══════════════════════════════════════ --}}
            {{-- FOOTER                                 --}}
            {{-- ══════════════════════════════════════ --}}
            <footer style="margin-top:2rem;text-align:center;">
                <p style="font-size:0.63rem;color:#9E9186;letter-spacing:0.04em;margin:0;">
                    &copy; {{ date('Y') }} MarmorArt &nbsp;&middot;&nbsp; Handwerk aus Leidenschaft
                </p>
            </footer>

        </div>
    </main>

</body>
</html>
