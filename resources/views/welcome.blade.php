<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CodeGuard</title>
        <style>
            body {
                font-family: 'Nunito', sans-serif;
                background-image: url('welcome.webp');
                background-repeat: no-repeat;
                background-size: cover;
            }

            h1 {
                color: white;
                text-shadow:
                    -1px -1px 0 #000,
                    1px -1px 0 #000,
                    -1px 1px 0 #000,
                    1px 1px 0 #000;
            }
        </style>
        @vite('resources/css/app.css')
    </head>
    <body class="w-full h-screen font-sans antialiased dark:bg-black dark:text-white/50 flex flex-col">

        <div class="w-full h-auto flex flex-row">
            <h1 class="font-mono text-white text-xl mx-2 my-2">
                CodeGuard
            </h1>
        </div>


        <div class="flex flex-col items-center justify-center h-[100%]">
            <h1 class="text-4xl font-bold text-white outline-4 drop-shadow-[0_1.2px_1.2px_rgba(0,0,0,0.8)]">Welcome to CodeGuard</h1>
            <h1 class="text-white
            text-center">CodeGuard is a simple and easy to use code editor that allows you to write, compile and run code in various programming languages.</h1>
            <a href="{{ route('dashboard') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4">Get Started</a>
        </div>


    </body>
</html>
