<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Jacinto's Flowershop Admin</title>
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
                <!-- Title -->
                <h2 class="text-pink-600 text-3xl font-bold text-center mb-6">Register</h2>

                <!-- Registration Form -->
                <form action="{{ route('register.admin') }}" method="post">
                    @csrf
                    <!-- Username -->
                    <div class="mb-4">
                        <label for="username" class="block text-gray-700 font-semibold mb-2">Username:</label>
                        <input type="text" name="username" id="username" placeholder="Enter Username" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-600 focus:border-transparent">
                    </div>

                    <!-- Firstname -->
                    <div class="mb-4">
                        <label for="firstname" class="block text-gray-700 font-semibold mb-2">Firstname:</label>
                        <input type="text" name="firstname" id="firstname" placeholder="Enter Firstname" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-600 focus:border-transparent">
                    </div>

                    <!-- Lastname -->
                    <div class="mb-4">
                        <label for="lastname" class="block text-gray-700 font-semibold mb-2">Lastname:</label>
                        <input type="text" name="lastname" id="lastname" placeholder="Enter Lastname" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-600 focus:border-transparent">
                    </div>

                    <!-- Password -->
                    <div class="mb-4">
                        <label for="password" class="block text-gray-700 font-semibold mb-2">Password:</label>
                        <input type="password" name="password" id="password" placeholder="Enter Password" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-600 focus:border-transparent">
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-6">
                        <label for="confirmation_password" class="block text-gray-700 font-semibold mb-2">Confirm Password:</label>
                        <input type="password" name="confirmation_password" id="confirmation_password" placeholder="Confirm Password" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-600 focus:border-transparent">
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-center mb-6">
                        <button type="submit" class="w-full bg-pink-600 text-white py-2 rounded-lg hover:bg-pink-700 transition duration-300">Register</button>
                    </div>

                    <!-- Sign In Link -->
                    <p class="text-center text-gray-600">Already have an account? 
                        <a href="{{ route('Login.page') }}" class="text-pink-600 hover:text-pink-800">Sign in</a>
                    </p>
                </form>
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