<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Portal')</title>

    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        jost: ['Jost', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    @stack('css')
</head>

<body class="font-jost antialiased bg-gradient-to-br from-[#667eea] to-[#764ba2] min-h-full flex items-center justify-center p-4">

    <main class="w-full max-w-md">
        @yield('content')
    </main>

    @stack('js')
</body>

</html>