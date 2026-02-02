<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Bakso Bunderan Ciomas</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100 text-gray-900">
    <nav class="bg-white shadow-sm border-b">
        <div class="max-w-7xl mx-auto px-6 py-4">
            <h1 class="text-2xl font-bold">Bakso Bunderan Ciomas - Admin</h1>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto p-6">
        @yield('content')
    </main>

    <footer class="text-center text-sm text-gray-500 py-6 mt-12">
        © {{ date('Y') }} Bakso Bunderan Ciomas. All rights reserved.
    </footer>
</body>
</html>
