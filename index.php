<?php
$exchange_rates_parsed_xml_euro = new SimpleXMLElement(file_get_contents('https://www.ecb.europa.eu/stats/policy_and_exchange_rates/euro_reference_exchange_rates/html/usd.xml'));
$last_array_index_euro = count($exchange_rates_parsed_xml_euro->DataSet->Series->Obs) - 1;
$Euro_zu_Dollar = ((string)$exchange_rates_parsed_xml_euro->DataSet->Series->Obs[$last_array_index_euro]['OBS_VALUE']);
$exchange_rates_parsed_xml_dollar = new SimpleXMLElement(file_get_contents('https://www.ecb.europa.eu/stats/policy_and_exchange_rates/euro_reference_exchange_rates/html/usd.xml'));
$last_array_index_dollar = count($exchange_rates_parsed_xml_dollar->DataSet->Series->Obs) - 1;
$Dollar_zu_Euro = ((string)$exchange_rates_parsed_xml_euro->DataSet->Series->Obs[$last_array_index_euro]['OBS_VALUE']);
//If {$_REQUEST['switch'] >0 ;
//}
?>
<h1>Währungsrechner</h1>
<h2>Gewünschte Ausgangs-Währung</h2>
<P>
    <button onclick='currencySwap()'>Swapp</button>
</P>
<div class="Euro_Dollar">
    <form action=index.php method="post">
        <br>
        <label>
            Euro-Betrag
            <input type="number" placeholder="120€" name="txtEuro_eingabe"
                   value="<?PHP echo $_REQUEST['txtEuro_eingabe'] ?? '' ?>"/>
            <br>
            Dollar-Betrag:
            <input type="number" name="txtDollar"
                   value="<?php echo (round($_REQUEST['txtEuro_eingabe'] * $Euro_zu_Dollar)) ?? '' ?>"/>
            <br><br>
            <input type="submit" value="Berechnen">
        </label>
    </form>
</div>
<div class="Dollar_Euro" style="display:none;">
    <form action=index.php method="post">
        <br>
        <label>
            Dollar-Betrag:
            <input type="number" name="txtDollar"
                   value="<?php echo (round($_REQUEST['txtEuro_eingabe'] * $Euro_zu_Dollar)) ?? '' ?>"/>
            <br>
            Euro-Betrag
            <input type="number" placeholder="120€" name="txtEuro_eingabe"
                   value="<?PHP echo $_REQUEST['txtEuro_eingabe'] ?? '' ?>"/>
            <br><br>
            <input type="submit" value="Berechnen">
        </label>
    </form>
</div>
<div>
    <input type="submit" value="Berechnen">
</div>


<script>
    function currencySwap() {
        var currencyDivEuroDollar = document.getElementsByClassName('Euro_Dollar');
        var currencyDivDollarEuro = document.getElementsByClassName('Dollar_Euro');
        if (currencyDivEuroDollar[0].style.display === 'none') {
            currencyDivEuroDollar[0].style.display = 'block';
            currencyDivDollarEuro[0].style.display = 'none';

        } else {
            currencyDivEuroDollar[0].style.display = 'none';
            currencyDivDollarEuro[0].style.display = 'block';
        }
    }

</script>




<!--<form action=index.php method="post">-->
<!--    <label>-->
<!--        Dollar-Betrag:-->
<!--        <input type="number" name="txtDollar_eingabe" value="--><?php //echo $_REQUEST['txtDollar_eingabe'] ?? '' ?><!--"/>-->
<!--        <br>-->
<!--        Euro-Betrag-->
<!--        <input type="number" placeholder="120€" name="txtEuro" value="--><?PHP //echo($_REQUEST['txtDollar_eingabe']*$Dollar_zu_Euro) ?><!--"/>-->
<!--        <br>-->
<!---->
<!--        <br><br>-->
<!--        <input type="submit" value="Berechnen">-->
<!---->
<!---->
<!--    </label>-->

<!--</form>-->


<?php
$Euro = $_REQUEST['txtEuro'] ?? '';
//$exchange_rates_xml = file_get_contents('https://www.ecb.europa.eu/stats/policy_and_exchange_rates/euro_reference_exchange_rates/html/usd.xml');
//var_dump ($exchange_rates_xml);
//$exchange_rates_parsed_xml = new SimpleXMLElement(file_get_contents('https://www.ecb.europa.eu/stats/policy_and_exchange_rates/euro_reference_exchange_rates/html/usd.xml'));
//$last_array_index = count($exchange_rates_parsed_xml->DataSet->Series->Obs) - 1;
//var_dump ((string)$exchange_rates_parsed_xml->DataSet->Series->Obs[$last_array_index]['OBS_VALUE']);
?>
