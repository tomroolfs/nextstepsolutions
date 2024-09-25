<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="w-full max-w-md bg-white rounded-lg shadow-md p-8">
        <div class="flex justify-center mb-6">
            <img src="../images/image.png" alt="Logo" class="w-24 h-24">
        </div>

        <h2 class="text-2xl font-bold text-center mb-6">Login</h2>

        <!-- het formulier voor het inloggen. -->
        <form action="../php/login.php" method="POST" class="space-y-4">
            <div>

                <?php
                session_start(); // start sessie voor het displayen van error/success meldingen.

                // als er een success melding is met het inloggen, word die hier neer gezet in het groen.
                if (isset($_SESSION['success_melding'])) {
                    echo '<div class="alert alert-success" role="alert">' . $_SESSION['success_melding'] . '</div>';
                    $_SESSION['success_melding'] = null;
                }
                // als er een error melding is met het inloggen, word die hier neer gezet in het rood.
                if (isset($_SESSION['error_melding'])) {
                    echo '<div class="alert alert-danger" role="alert">' . $_SESSION['error_melding'] . '</div>';
                    $_SESSION['error_melding'] = null;
                }
                ?>

                <label for="username" class="block text-sm font-medium text-gray-700">Gebruikersnaam</label>

                <input type="text" id="username" name="username" required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Wachtwoord</label>
                <input type="password" id="password" name="password" required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <div class="flex items-center justify-between">
                <a style="color:orange;" href="forgotPassword.inc.php" class="text-sm hover:underline">Wachtwoord vergeten?</a>
            </div>
            <!-- de knop voor het inloggen. -->
            <div class="loginbtn">
                <button type="submit"
                    class="w-full text-white py-2 px-4 rounded-md focus:outline-none transition duration-150">
                    Login
                </button>
            </div>
        </form>
        <div class="mt-6 text-center">
            <p class="text-sm text-gray-600">Nog geen account?
                <!-- een nieuwe gebruiker kan hier klikken voor registreren. -->
                <a style="color:orange;" href="register.inc.php" class="hover:underline">Registreer</a>
            </p>
        </div>
    </div>
</body>

</html>