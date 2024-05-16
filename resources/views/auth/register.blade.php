<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CodeGuard - Register</title>
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-image: url('welcome.webp');
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
    @vite('resources/css/app.css')
</head>
<body class="bg-wood-pattern flex flex-col space-y-2 items-center justify-center min-h-screen">

<div class="w-full max-w-lg p-8 backdrop-blur bg-white rounded-lg shadow-lg border border-wood-brown">
    <div class="flex flex-row w-full max-w-lg items-center space-x-2 pb-5">
        <img src="logo.webp" class="h-20 w-20">
        <h1 class="font-thin text-xl">
            License System
        </h1>
    </div>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <!-- CSRF Token -->
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <!-- Name Field -->
        <div class="mb-6">
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
            <input type="text" id="name" name="name" required autofocus
                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Name">
        </div>

        <!-- Email Address -->
        <div class="mb-6">
            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
            <input type="email" id="email" name="email" required
                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Deine Email...">
        </div>

        <!-- Password Field -->
        <div class="mb-6">
            <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
            <input type="password" id="password" name="password" required
                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" placeholder="Dein Passwort...">
        </div>

        <!-- Confirm Password Field -->
        <div class="mb-6">
            <label for="password_confirmation" class="block text-gray-700 text-sm font-bold mb-2">Confirm Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required
                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Dein Passwort bestätigen..">
        </div>

        <!-- Submit Button -->
        <div class="flex  w-full items-center justify-between">
            <div class="flex w-full justify-center items-center flex-col space-y-1">
                <button type="submit" class="container inline-block bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition-colors">
                  Registrieren
                </button>
                <a href="{{route('login')}}" class="text-blue-500 hover:text-blue-700">Bereits ein Konto?</a>
            </div>
        </div>
    </form>
</div>
</body>
</html>
