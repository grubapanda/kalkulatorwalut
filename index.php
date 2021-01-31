<!DOCTYPE HTML>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="robots" content="noindex,nofollow" />
    <title>Kalkulator Walut</title>
    <meta name="description" content="Sprawdź nasz kalkulator walutowy.">
</head>
<body>
    <div class="jumbotron">
        <div class="container">
            <h1>Kalkulator walutowy</h1>
            <p>Podaj kwotę w PLN oraz wybierz obcą walutę do której chcesz przeliczyć daną kwotę.</p>
        </div>
    </div>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <label for="userPrice">Kwota w PLN</label>
                    <input type="number" id="userPrice" class="form-control user-price">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="currency">Wybierz walutę docelową</label>
                    <select name="currency" id="currency" class="form-control input-mb2"></select>
                </div>
            </div>
            <div style="display:none" class="alertWrap">
                <div class="alert alert-danger" id="alertError"></div>
            </div>
            <div style="display:none" class="calculatedPriceWrap">
                <p><b>Przeliczona kwota</b></p>
                <span class="userPriceCurrency" id="userPriceCurrency"></span>
            </div>
            <button type="button" class="btn btn-primary calculateUserPrice" id="calculateUserPrice">Przelicz</button>
        </div>
    </section>

    <footer class="mainFooter">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p>Autorzy: Kamila Nowak, Krzysztof Nicek, Piotr Staciwa</p>
                </div>
            </div>
        </div>
    </footer>
    <link href="https://ajax.aspnetcdn.com/ajax/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/ourstylesv1.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700&amp;subset=latin-ext" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.11.2.min.js"
        integrity="sha256-Ls0pXSlb7AYs7evhd+VLnWsZ/AqEHcXBeMZUycz/CcA=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/bootstrap/3.3.7/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
</body>
</html>