<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Jacinto's Flowershop</title>
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

    <nav class=" p-4">
    <ul class="flex space-x-4">
        <li>
        <a href="javascript:void(0)" 
                               class="text-gray-300 hover:text-blue-500" 
                               onclick="toggleConfirmation()">Logout</a>

                            <!-- Confirmation Dialog -->
                            <div id="confirmation-box" class="hidden absolute bg-white shadow-lg rounded-lg p-4 right-0 top-8">
                                <p class="text-gray-700 mb-4">Are you sure you want to logout?</p>
                                <div class="flex justify-between space-x-2">
                                    <a href="{{ route('Login.page') }}" 
                                       class="bg-pink-600 text-white px-4 py-2 rounded  hover:text-pink-800">
                                        Yes, Logout
                                    </a>
                                    <button onclick="toggleConfirmation()" 
                                            class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400">
                                        Cancel
                                    </button>
                                </div>
                            </div>
                        </li>
    </ul>
</nav>


        
    
            </div>
        </header>

        <!-- Main Content -->
        <main class="flex-grow">

        <div class="container mx-auto px-6 mt-8">
                <!-- Admin Dashboard Title -->
                <h1 class="text-3xl  text-pink-600 font-bold text-center mb-8">
    Jacinto's FlowerShop<br>Admin Dashboard
</h1>
                
            <div class="container mx-auto px-6 mt-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Manage Products -->
                <div class="bg-blue-500 text-white p-6 rounded-lg shadow-lg">
                    <h3 class="text-xl font-bold mb-2">Manage Products</h3>
                    <p>View and edit the products in your store.</p>
                </div>

                <!-- View Orders -->
                <div class="bg-green-500 text-white p-6 rounded-lg shadow-lg">
                    <h3 class="text-xl font-bold mb-2">View Orders</h3>
                    <p>Check and manage the customer orders.</p>
                </div>

                <!-- Manage Users -->
                <div class="bg-red-500 text-white p-6 rounded-lg shadow-lg">
                    <h3 class="text-xl font-bold mb-2">Manage Users</h3>
                    <p>Manage admin users and permissions.</p>
                </div>
            </div>
        </main>


        <!-- Footer -->
        <footer class="bg-gray-300 py-4">
            <div class="container mx-auto px-4 text-center">
                <p class="text-pink-500">&copy; 2024 Jacinto's Flowershop. All rights reserved.</p>
            </div>
        </footer>
    </div>

    <!-- JavaScript Function -->
    <script>
        function toggleConfirmation() {
            const confirmationBox = document.getElementById('confirmation-box');
            if (confirmationBox.classList.contains('hidden')) {
                confirmationBox.classList.remove('hidden');
            } else {
                confirmationBox.classList.add('hidden');
            }
        }
    </script>
</body>


</html>
