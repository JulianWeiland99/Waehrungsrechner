<?php

$euro = 0;
$dollar = 0;

if (isset($_REQUEST['txtEuro']) === true) {
    $exchange_rates_parsed_xml_euro = new SimpleXMLElement(file_get_contents('https://www.ecb.europa.eu/stats/policy_and_exchange_rates/euro_reference_exchange_rates/html/usd.xml'));
    $last_array_index_euro = count($exchange_rates_parsed_xml_euro->DataSet->Series->Obs) - 1;
    $Euro_zu_Dollar = ((float)$exchange_rates_parsed_xml_euro->DataSet->Series->Obs[$last_array_index_euro]['OBS_VALUE']);
    $euro = (int)($_REQUEST['txtEuro'] ?? 0);
    $dollar = round($euro * $Euro_zu_Dollar);
}

if (isset($_REQUEST['txtDollar']) === true) {
    $exchange_rates_parsed_xml_dollar = new SimpleXMLElement(file_get_contents('https://www.ecb.europa.eu/stats/policy_and_exchange_rates/euro_reference_exchange_rates/html/usd.xml'));
    $last_array_index_dollar = count($exchange_rates_parsed_xml_dollar->DataSet->Series->Obs) - 1;
    $Dollar_zu_Euro = ((float)$exchange_rates_parsed_xml_dollar->DataSet->Series->Obs[$last_array_index_dollar]['OBS_VALUE']);
    $dollar = (int)($_REQUEST['txtDollar'] ?? 0);
    $euro = round($dollar * $Dollar_zu_Euro);
}
?>

<h1>Währungsrechner</h1>
<h2>Gewünschte Ausgangs-Währung</h2>
<button onclick='currencySwap()'>Swap</button>
<div class="Euro_Dollar">
    <form action=index.php method="post">
        <label>
            Euro-Betrag
            <input type="number" placeholder="€" name="txtEuro"
                   value="<?php echo $euro ?>"/>
        </label>
        <br>
        <label>
            Dollar-Betrag:
            <input type="number" placeholder="$" name="txtDollarAusgabe"
                   value="<?php echo $dollar ?>"/>
        </label>
        <br><br>
        <input type="submit" value="Berechnen">
    </form>
</div>
<div class="Dollar_Euro" style="display:none;">
    <form action=index.php method="post">
        <br>
        <label>
            Dollar-Betrag:
            <input type="number" placeholder="$" name="txtDollar"
                   value="<?php echo $euro ?>"/>
            <br>
        </label>
        <label>
            Euro-Betrag
            <input type="number" placeholder="€" name="txtEuroAusgabe"
                   value="<?php echo $dollar ?>"/>
            <br><br>
        </label>
        <br><br>
        <input type="submit" value="Berechnen">
    </form>
</div>
<!--<div>-->
<!--    <input type="submit" value="Berechnen">-->
<!--</div>-->


<script>
    function currencySwap() {
        let currencyDivEuroDollar = document.getElementsByClassName('Euro_Dollar');
        let currencyDivDollarEuro = document.getElementsByClassName('Dollar_Euro');
        if (currencyDivEuroDollar[0].style.display === 'none') {
            currencyDivEuroDollar[0].style.display = 'block';
            currencyDivDollarEuro[0].style.display = 'none';

        } else {
            currencyDivEuroDollar[0].style.display = 'none';
            currencyDivDollarEuro[0].style.display = 'block';
        }
    }

</script>



