<?php

if (isset($_SESSION['success_melding'])) {
    echo '<div class="alert alert-success" role="alert">' . $_SESSION['success_melding'] . '</div>';
    $_SESSION['success_melding'] = null;
}
if (isset($_SESSION['error_melding'])) {
    echo '<div class="alert alert-danger" role="alert">' . $_SESSION['error_melding'] . '</div>';
    $_SESSION['error_melding'] = null;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registreer</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="w-full max-w-md bg-white rounded-lg shadow-md p-8">
        <div class="flex justify-center mb-6">
            <img src="../image.png" alt="Logo" class="w-24 h-24">
        </div>
        
        <h2 class="text-2xl font-bold text-center mb-6">Registreer</h2>
        
        <form action="../php/register.php" method="POST" class="space-y-4">
            <div>
                <label for="username" class="block text-sm font-medium text-gray-700">Gebruikersnaam</label>
                <input type="text" id="username" name="username" required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Wachtwoord</label>
                <input type="password" id="password" name="password" required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email Adres</label>
                <input type="text" id="email" name="email" required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <div>
                <label for="phone" class="block text-sm font-medium text-gray-700">Telefoonnummer</label>
                <input type="phone" id="phone" name="phone" required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <div>
                <label for="dateofbirth" class="block text-sm font-medium text-gray-700">Geboortedatum</label>
                <input type="date" id="dateofbirth" name="dateofbirth" required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <button type="submit"
                class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:bg-indigo-700 transition duration-150">
                Registreer
            </button>
        </form>
        <div class="mt-6 text-center">
            <p class="text-sm text-gray-600">Al een account?
                <a href="login.inc.php" class="text-indigo-600 hover:underline">Login</a>
            </p>
        </div>
    </div>
</body>
</html>
