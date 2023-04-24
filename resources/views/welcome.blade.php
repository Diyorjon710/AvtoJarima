<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        @vite('resources/css/app.css')

    </head>
    <body>
        <script src="https://api-maps.yandex.ru/2.1?apikey=290b07a7-a3b9-46ab-ac3a-568bda05ed05&load=package.full&lang=uz_UZ">
        </script>
        <div id="app"></div>
        @vite('resources/js/client/app.js')
    </body>

</html>
