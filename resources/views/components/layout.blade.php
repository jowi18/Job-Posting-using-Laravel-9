<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" href="{{ asset('images/r.png') }}" />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
    
        <title>RonrickJobposting | Find Jobs & Projects</title>
        @vite('resources/css/app.css')
        <script src="//unpkg.com/alpinejs" defer></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            laravel: "#4338ca",
                        },
                    },
                },
            };
        </script>
    </head>
    <x-flash-message />
    <body class="mb-48">
        <nav class="flex justify-between items-center mb-4">
            <a href="/"
                ><img class="w-24 mx-1" src="{{asset('images/logo2.png')}}" alt="" class="logo"
            /></a>
            <ul class="flex space-x-6 mr-6 text-lg">
                @auth
                    
               

                <li>
                 <span class="font-bold uppercase ">Welcome {{ auth()->user()->name }}
                </li>
                <li>
                    <a href="/joblist/manage/{{ auth()->user()->id }}" class="hover:text-laravel"
                        ><i class="fa-solid fa-gear"></i>
                        Manage Jobs</a
                    >
                </li>

                <li>
                    <form action="/user/logout" method="POST">
                        @csrf
                    <button href="login.html" class="hover:text-laravel"
                        ><i class="fa-solid fa-sign-out"></i>
                       Logout
                    </button>
                    </form>
                </li>
               
                @else

                <li>
                    <a href="/user/create" class="hover:text-laravel"
                        ><i class="fa-solid fa-user-plus"></i> Register</a
                    >
                </li>
                <li>
                    <a href="/user/login" class="hover:text-laravel"
                        ><i class="fa-solid fa-arrow-right-to-bracket"></i>
                        Login</a
                    >
                </li>
                 @endauth
            </ul>
        </nav>
<main>
    {{ $slot }}
</main>
    <footer
            class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-laravel text-white h-24 mt-24 opacity-90 md:justify-center"
        >
            <p class="ml-2">Copyright &copy; 2022, All Rights reserved</p>

            <a
                href="/joblist/create"
                class="absolute top-1/3 right-10 bg-black text-white py-2 px-5"
                >Post Job</a>
            
        </footer>
    </body>
</html>