<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>IMDB Clone</title>
    {{-- Scripts --}}
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    {{-- Styles --}}
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    {{-- CSFR token for ajax script head --}}
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>
