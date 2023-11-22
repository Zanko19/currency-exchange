<?php
$apiKey = '7ec3115638d87587d5f0bbdd';
$req_url = "https://v6.exchangerate-api.com/v6/{$apiKey}/latest/EUR";
$response_json = file_get_contents($req_url);

if (false !== $response_json) {
    try {
        $response = json_decode($response_json);
        if ('success' === $response->result) {
            $currencies = array_keys((array)$response->conversion_rates);
        }
    } catch (Exception $e) {
    }
}

$currencySymbols = array(
    'USD' => '$',
    'EUR' => '€',
    'GBP' => '£',
    'AED' => 'د.إ',
    'AFN' => '؋',
    'ALL' => 'Lek',
    'AMD' => '֏',
    'ANG' => 'ƒ',
    'AOA' => 'Kz',
    'ARS' => '$',
    'AUD' => '$',
    'AWG' => 'ƒ',
    'AZN' => '₼',
    'BAM' => 'KM',
    'BBD' => '$',
    'BDT' => '৳',
    'BGN' => 'лв',
    'BHD' => '.د.ب',
    'BIF' => 'FBu',
    'BMD' => '$',
    'BND' => '$',
    'BOB' => '$b',
    'BRL' => 'R$',
    'BSD' => '$',
    'BTN' => 'Nu.',
    'BWP' => 'P',
    'BYN' => 'Br',
    'BZD' => 'BZ$',
    'CAD' => '$',
    'CDF' => 'FC',
    'CHF' => 'CHF',
    'CLP' => '$',
    'CNY' => '¥',
    'COP' => '$',
    'CRC' => '₡',
    'CUP' => '₱',
    'CVE' => '$',
    'CZK' => 'Kč',
    'DJF' => 'Fdj',
    'DKK' => 'kr',
    'DOP' => 'RD$',
    'DZD' => 'دج',
    'EGP' => '£',
    'ERN' => 'Nfk',
    'ETB' => 'Br',
    'FJD' => '$',
    'FKP' => '£',
    'FOK' => 'kr',
    'GEL' => '₾',
    'GGP' => '£',
    'GHS' => '₵',
    'GIP' => '£',
    'GMD' => 'D',
    'GNF' => 'FG',
    'GTQ' => 'Q',
    'GYD' => '$',
    'HKD' => '$',
    'HNL' => 'L',
    'HRK' => 'kn',
    'HTG' => 'G',
    'HUF' => 'Ft',
    'IDR' => 'Rp',
    'ILS' => '₪',
    'IMP' => '£',
    'INR' => '₹',
    'IQD' => 'ع.د',
    'IRR' => '﷼',
    'ISK' => 'kr',
    'JEP' => '£',
    'JMD' => 'J$',
    'JOD' => 'JD',
    'JPY' => '¥',
    'KES' => 'KSh',
    'KGS' => 'лв',
    'KHR' => '៛',
    'KID' => '$',
    'KIN' => '₭',
    'KRW' => '₩',
    'KWD' => 'KD',
    'KYD' => '$',
    'KZT' => '₸',
    'LAK' => '₭',
    'LBP' => '£',
    'LKR' => '₨',
    'LRD' => '$',
    'LSL' => 'L',
    'LYD' => 'ل.د',
    'MAD' => 'د.م.',
    'MDL' => 'L',
    'MGA' => 'Ar',
    'MKD' => 'ден',
    'MMK' => 'K',
    'MNT' => '₮',
    'MOP' => 'P',
    'MRU' => 'UM',
    'MRW' => '$',
    'MUR' => '₨',
    'MVR' => 'Rf',
    'MWK' => 'MK',
    'MXN' => '$',
    'MYR' => 'RM',
    'MZN' => 'MT',
    'NAD' => '$',
    'NGN' => '₦',
    'NIO' => 'C$',
    'NOK' => 'kr',
    'NPR' => '₨',
    'NZD' => '$',
    'OMR' => '﷼',
    'PAB' => 'B/.',
    'PEN' => 'S/.',
    'PGK' => 'K',
    'PHP' => '₱',
    'PKR' => '₨',
    'PLN' => 'zł',
    'PYG' => '₲',
    'QAR' => '﷼',
    'RON' => 'lei',
    'RSD' => 'Дин.',
    'RUB' => '₽',
    'RWF' => 'R₣',
    'SAR' => '﷼',
    'SBD' => '$',
    'SCR' => '₨',
    'SDG' => '£',
    'SEK' => 'kr',
    'SGD' => '$',
    'SHP' => '£',
    'SLL' => 'Le',
    'SOS' => 'Sh',
    'SRD' => '$',
    'SSP' => '£',
    'STN' => 'Db',
    'SYP' => '£',
    'SZL' => 'L',
    'THB' => '฿',
    'TJS' => 'SM',
    'TMT' => 'T',
    'TND' => 'د.ت',
    'TOP' => 'T$',
    'TRY' => '₺',
    'TTD' => 'TT$',
    'TVD' => '$',
    'TWD' => 'NT$',
    'TZS' => 'TSh',
    'UAH' => '₴',
    'UGX' => 'USh',
    'UYU' => '$U',
    'UZS' => 'лв',
    'VES' => 'Bs.',
    'VND' => '₫',
    'VUV' => 'VT',
    'WST' => 'WS$',
    'XAF' => 'FCFA',
    'XCD' => '$',
);


$convertedAmount = null;
$toCurrencySymbol = '';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['currency']) && isset($_GET['old_currency']) && isset($_GET['new_currency'])) {
        $amount = $_GET['currency'];
        $fromCurrency = $_GET['old_currency'];
        $toCurrency = $_GET['new_currency'];

        $toCurrencySymbol = isset($currencySymbols[$toCurrency]) ? $currencySymbols[$toCurrency] : '';

        $conversionUrl = "https://v6.exchangerate-api.com/v6/{$apiKey}/pair/{$fromCurrency}/{$toCurrency}/{$amount}";

        $conversion_json = file_get_contents($conversionUrl);

        if ($conversion_json !== false) {
            $conversion_data = json_decode($conversion_json);

            if ($conversion_data && $conversion_data->result === 'success') {
                $convertedAmount = $conversion_data->conversion_result;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currency converter</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="bigtext">
        <p> Taux de change en temps réel </p>
    </div>
    <form action="" method="get">
        <input type="text" name="currency" id="currency" required placeholder="Entrez votre montant € £ $ ¥ ">
        
        <div class="select">
    <select id="old_currency" name="old_currency" class="selectCurrency">
        <?php
        
        if (isset($currencies)) {
            foreach ($currencies as $currencyCode) {
                $selected = ($currencyCode == 'EUR') ? 'selected' : '';
                $symbol = isset($currencySymbols[$currencyCode]) ? $currencySymbols[$currencyCode] : '';
                echo "<option value=\"$currencyCode\" $selected data-symbol=\"$symbol\">{$currencyCode}</option>";
            }
        }
        ?>
    </select>
    <i class="fas fa-exchange-alt" onclick="swapCurrencies()"></i>
    <select id="new_currency" name="new_currency" class="selectCurrency">
        <?php
     
        if (isset($currencies)) {
            foreach ($currencies as $currencyCode) {
                $selected = ($currencyCode == 'USD') ? 'selected' : '';
                $symbol = isset($currencySymbols[$currencyCode]) ? $currencySymbols[$currencyCode] : '';
                echo "<option value=\"$currencyCode\" $selected data-symbol=\"$symbol\">{$currencyCode}</option>";
            }
        }
        ?>
    </select>
</div>


        <input type="submit" value="Convertir" class="convert">
        <?php
        
        if ($convertedAmount !== null) {
            echo "<h5 class=\"finalAmount\"> $convertedAmount $toCurrencySymbol $toCurrency</h5>";
        }
        ?>
    </form>
    <script>
        function swapCurrencies() {
            var oldCurrencySelect = document.getElementById('old_currency');
            var newCurrencySelect = document.getElementById('new_currency');
            var tempCurrency = oldCurrencySelect.value;
            oldCurrencySelect.value = newCurrencySelect.value;
            newCurrencySelect.value = tempCurrency;

            document.getElementById('exchangeFlag').value = 1;
        }
    </script>
</body>

</html>
