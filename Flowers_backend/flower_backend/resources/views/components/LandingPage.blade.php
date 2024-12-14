<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home | Jacinto's Flowershop</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-r from-green-100 to-blue-100 min-h-screen">
    <div class="flex flex-col min-h-screen">
        <!-- Header -->
        <header class="bg-rose-900 shadow-md">
            <div class="container mx-auto py-4 px-6 flex justify-between items-center">
            <img src="{{ asset('images/png.png') }}" 
    alt="Jacinto's Flowershop Logo" 
    width="150" 
    height="50" 
    class="h-14" />

            </div>
        </header>

        <!-- Main Content -->
        <main class="container mx-auto py-16 px-6 flex-grow">
            <div class="bg-white rounded-lg shadow-lg p-8 max-w-md mx-auto">
            <h2 class="text-pink-600 text-3xl font-bold  text-center mb-4">
    Welcome Back To <br>
    <span class="text-pink-600 text-3xl font-bold ">
        Jacinto's Flowershop!
    </span>
</h2>
    
                <p class="text-gray-500 text-center mb-6">Sign in to manage Jacinto's Flowershop</p>

                <a href="{{ route('Dashboard.page') }}" 
                    class="w-full block text-center bg-pink-600 hover:bg-pink-700 text-white font-bold py-2 px-4 rounded">
                    Sign In
                </a>
            </div>
        </main>

        <!-- Footer -->
        <footer class="bg-gray-300 py-4 mt-auto">
            <div class="container mx-auto px-4 text-center">
                <p class="text-pink-500">&copy; 2024 Jacinto's Flowershop. All rights reserved.</p>
            </div>
        </footer>
    </div>
</body>

</html>
