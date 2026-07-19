<!DOCTYPE html>
<html>

<head>
    <title>Global Supply Chain Risk Monitoring</title>
</head>

<body>

    <h1>Dashboard GSCRMS</h1>

    <hr>

    <h3>Total Data</h3>

    <ul>
        <li>Total Shipment : {{ $shipmentCount }}</li>
        <li>Total Country : {{ $countryCount }}</li>
        <li>Total Port : {{ $portCount }}</li>
        <li>Total Article : {{ $articleCount }}</li>
    </ul>

    <hr>

    <h3>Risk Summary</h3>

    <ul>
        <li>Low : {{ $riskSummary['low'] }}</li>
        <li>Medium : {{ $riskSummary['medium'] }}</li>
        <li>High : {{ $riskSummary['high'] }}</li>
        <li>Critical : {{ $riskSummary['critical'] }}</li>
    </ul>

</body>

</html>