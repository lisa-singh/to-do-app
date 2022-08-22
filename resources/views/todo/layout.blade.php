

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    @livewireStyles
    <title>To do</title>
</head>
<body>
    <div class="text-center pt-10 flex justify-center">
        <div class="w-1/3 border-black rounded p-4">
            @yield('content')
        </div>
    </div>
    @livewireScripts
</body>
</html>

