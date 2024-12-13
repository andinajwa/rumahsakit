<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Healthcare Clone</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-100">
    <!-- Navbar -->
    <nav class="bg-white shadow-md">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <a class="text-2xl font-bold text-blue-500" href="#">Healthcare</a>
            <ul class="flex space-x-6 mr-3">
                <li><a class="text-gray-700 hover:text-blue-500" href="#home">Get Started</a></li>
                <li><a class="text-gray-700 hover:text-blue-500" href="#services">Layanan</a></li>
                <li><a class="text-gray-700 hover:text-blue-500" href="#contact">Contact</a></li>
            </ul>

        </div>
    </nav>

    <!-- Hero Section -->
    <div class="relative"
        style="background-image: url('assets/dist/img/bg.jpg'); background-size:cover; background-repeat:no-repeat;background-position:center">
        <div class="absolute top-0 left-0 w-full h-full z-10 bg-black opacity-40 absolute"></div>
        <section class="bg-blend-color-burn text-white relative py-20 z-50" id="home">

            <div class="container mx-auto px-4 text-center ">
                <h1 class="text-4xl text-white font-bold mb-4">Your Health, Our Priority</h1>
                <p class="text-lg mb-8">Consult with the best doctors from the comfort of your home.</p>
                <a class="bg-white text-blue-500 px-6 py-3 rounded-full font-semibold" href="home.php">Get Started</a>
            </div>
        </section>

    </div>


    <!-- Services Section -->
    <section class="py-20" id="services">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">Layanan Kami</h2>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="bg-white card-users p-6 rounded-lg shadow-md text-center">
                    <i class="fas fa-user-injured text-blue-500 text-4xl mb-4"></i>
                    <h3 class="text-xl font-semibold mb-2">Layanan Pasien</h3>
                    <p>Perawatan menyeluruh untuk semua pasien.</p>
                </div>
                <div class="bg-white card-users p-6 rounded-lg shadow-md text-center">
                    <i class="fas fa-user-md text-blue-500 text-4xl mb-4"></i>
                    <h3 class="text-xl font-semibold mb-2">Layanan Dokter</h3>
                    <p>Alat dan dukungan untuk tenaga medis.</p>
                </div>
                <div class="bg-white card-users p-6 rounded-lg shadow-md text-center">
                    <i class="fas fa-calendar-check text-blue-500 text-4xl mb-4"></i>
                    <h3 class="text-xl font-semibold mb-2">Manajemen Janji Temu</h3>
                    <p>Jadwalkan dan kelola janji temu Anda dengan mudah.</p>
                </div>
                <div class="bg-white card-users p-6 rounded-lg shadow-md text-center">
                    <i class="fas fa-file-medical text-blue-500 text-4xl mb-4"></i>
                    <h3 class="text-xl font-semibold mb-2">Rekam Medis</h3>
                    <p>Akses dan kelola rekam medis Anda secara aman.</p>
                </div>
            </div>
        </div>
    </section>


    <!-- Contact Section -->
    <section class="bg-gray-100 py-20" id="contact">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">Contact Us</h2>
            <div class="max-w-lg mx-auto bg-white p-8 rounded-lg shadow-md">
                <form action="pages/hubungiKami/index.php" method="post">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Name</label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="name" placeholder="Your Name" type="text" name="name" />
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email</label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="email" placeholder="Your Email" type="email" name="email" />
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="message">Message</label>
                        <textarea
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="message" placeholder="Your Message" rows="4" name="message"></textarea>
                    </div>
                    <div class="text-center">
                        <button
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                            type="submit">Send Message</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center">
                <a class="text-2xl font-bold text-blue-500" href="#">Healthcare</a>
                <ul class="flex space-x-6">
                    <li><a class="hover:text-blue-500" href="#">Privacy Policy</a></li>
                    <li><a class="hover:text-blue-500" href="#">Terms of Service</a></li>
                    <li><a class="hover:text-blue-500" href="#contact">Contact Us</a></li>
                </ul>
            </div>
            <div class="text-center mt-4">
                <p>© 2024 Healthcare. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>

</html>

<?php

?>