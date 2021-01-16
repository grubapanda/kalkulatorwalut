$(document).ready(function () {

    $.ajax({
        url: "components/getWaluty.php",
        success: function (data) {
            var waluty = jQuery.parseJSON(data);

            for (var i = 0; i < waluty.pozycja.length; i++) {
                var obj = waluty.pozycja[i];
                $('#currency').append($('<option>', {
                    value: i,
                    text: obj.kod_waluty
                }));
            }
        }
    });

    var userPrice = 0;
    var exchangeRate = 0;

    $("#calculateUserPrice").click(function () {

        $("#userPriceCurrency").empty();
        $(".calculatedPriceWrap").hide();

        var selectedCurrency = $('#currency').val();

        if ($("#userPrice").val()) {

            $(".alertWrap").hide();

            if ($("#userPrice").val() > 0) {
                $.ajax({
                    url: "components/getWaluty.php",
                    success: function (data) {
                        var waluty = jQuery.parseJSON(data);
                        exchangeRate = waluty.pozycja[selectedCurrency].kurs_sredni;
                        exchangeRate = exchangeRate.replace(',', '.');
                        exchangeRate = parseFloat(exchangeRate).toFixed(2);
                        userPrice = $("#userPrice").val();

                        // przetwarzamy kurs z pobranego pliku (m.in. zamiana , i .)
                        userPrice = userPrice.replace(/\s+/g, '');
                        userPrice = userPrice.replace(/,/g, '.');
                        userPrice = parseFloat(userPrice).toFixed(2);
                        var userPriceConverted = userPrice / exchangeRate;

                        // formatowanie wyglądu ceny w obcej walucie
                        var formatter = new Intl.NumberFormat('en-US', {
                            style: 'currency',
                            currency: waluty.pozycja[selectedCurrency].kod_waluty,
                        });

                        // każda waluta ma swój przelicznik np. Yen ma "100", a EUR ma standardowo "1"
                        userPriceConverted = userPriceConverted * waluty.pozycja[selectedCurrency].przelicznik
                        userPriceConverted = formatter.format(userPriceConverted);
                        // cena jest sformatowana i gotowa do wyświetlenia
                        $("#userPriceCurrency").text(userPriceConverted);
                        $(".calculatedPriceWrap").fadeIn();
                    }
                });
            }
            else {
                $(".alertWrap").fadeIn();
                $("#alertError").html("<strong>Kwota mniejsza od zera</strong> - podaj kwotę wyższą od zera");
            }
        } else {
            // jeśli użytkownik nie wpisał żadnej kwoty wyświetlamy komunikat o błędzie i informacji jak go poprawić
            $(".alertWrap").fadeIn();
            $("#alertError").html("<strong>Brak podanej kwoty do przeliczenia</strong> - uzupełnij kwotę w pierwszym polu");
        }

    });

});