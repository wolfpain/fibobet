<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container d-flex  flex-column align-items-center justify-content-center">
        <div class="row my-5">
            <div class="col-auto">
                <h1>FiboBet Roulette Colonne/Righe</h1>
            </div>
        </div>

        {{-- MOSTRA PUNTATA --}}
        <div class="row text-center">
            @if ($count)
                <div class="col border border-2 border-dark p-5 mb-5">
                    <p>{{ $count }}</p>
                </div>
            @endif
        </div>



        {{-- FORM INSERIMENTO NUMERO --}}
        <div class="row mb-5">
            <div class="col text-center">
                @if ($errors->any())

                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="text-danger">{{ $error }}</li>
                        @endforeach
                    </ul>

                @endif
                <form action="/" method="POST">
                    @csrf
                    <div class="row g-3 align-items-center">
                        <div class="col-auto">
                            <label for="lastNumber" class="form-label">Ultimo numero uscito</label>
                        </div>
                        <div class="col-auto">
                            <input type="number" class="form-control" id="lastNumber" name="lastNumber"
                                aria-describedby="lastNumber">
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary">Inserisci</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        {{-- ELENCO NUMERI ESTRATTI --}}
        <div class="row">
            <div class="col-">
                <p>Numeri usciti:</p>
            </div>
        </div>
        <div class="row">
            @foreach ($numbers as $number)
                <div class="col-auto text-bg-primary p-3 m-1">
                    {{ $number->number }}
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col">
                <form action="/delete" method="GET">
                    @csrf
                    <button type="submit" class="btn btn-primary">Cancella ultimo numero</button>
                </form>
            </div>
        </div>
    </div>


    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
