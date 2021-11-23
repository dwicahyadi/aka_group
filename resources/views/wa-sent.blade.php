<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- ========== All CSS files linkup ========= -->
    <link rel="stylesheet" href="{{ asset('css/lineicons.css') }}"/>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<main>
    <div class="container text-center">
        <h1 class="mt-50"><i class="lni lni-whatsapp text-success"></i> <br>Pesan Whatsapp telah dikirim</h1>
        <div class="card-style mt-50">
            <div class="card-content">
                <h6 class="mb-25">{{ $reminderMsg->to ?? 'Tujuan' }}</h6>
                <p>{{ $reminderMsg->message ?? 'isi pesan' }}</p>
            </div>
        </div>

    </div>
</main>

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
