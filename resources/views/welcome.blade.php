<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <title>Tailwind Test</title>
    @vite('resources/css/app.css')
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body>
    <!-- Navbar -->
    <div class="navbar bg-black text-white w-full">
        <div class="ps-4">
            <a class="text-lg font-bold">Teater Titik</a>
        </div>
        <div class="flex grow justify-end px-2">
            <div class="flex items-stretch">
                <a class="btn btn-ghost rounded-field">Button</a>
                <div class="dropdown dropdown-end">
                    <div tabindex="0" role="button" class="btn btn-ghost rounded-field">
                        {{ Auth::user()->name ?? 'User' }}
                    </div>

                    <ul tabindex="0"
                        class="menu dropdown-content text-black bg-base-200 rounded-box z-1 mt-4 w-75 p-2 shadow-sm">
                        @auth
                            {{-- Jika pengguna sudah login --}}
                            <li>
                                <a href="{{ route('profile.edit') }}" class="text-black hover:bg-blue-500 hover:text-white">
                                    Profile
                                </a>
                            </li>
                            <li class="hover:bg-red-500 rounded hover:text-white transition-colors duration-200">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit"
                                            class="w-full text-left">
                                        Logout
                                    </button>
                                </form>
                            </li>
                        @else
                            {{-- Jika pengguna belum login --}}
                            <li>
                                <a href="{{ route('login') }}" class="text-black hover:bg-blue-500 hover:text-white">
                                    Login
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('register') }}" class="text-black hover:bg-green-500 hover:text-white">
                                    Daftar
                                </a>
                            </li>
                        @endauth

                    </ul>

                </div>
            </div>
        </div>
    </div>

    <!-- Hero Section -->
    <div class="hero min-h-screen"
        style="background-image: url(https://img.daisyui.com/images/stock/photo-1507358522600-9f71e620c44e.webp);">
        <div class="hero-overlay"></div>
        <div class="hero-content text-neutral-content text-center">
            <div class="max-w-md">
                <h1 class="mb-5 text-5xl font-bold">Hello there</h1>
                <p class="mb-5">`
                    Provident cupiditate voluptatem et in. Quaerat fugiat ut assumenda excepturi exercitationem
                    quasi. In deleniti eaque aut repudiandae et a id nisi.
                </p>
                <button class="btn btn-primary">Get Started</button>
            </div>
        </div>
    </div>


</body>

</html>