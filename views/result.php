<html>
<head>
    <title>Traced route</title>
    <meta charset="utf-8">
    <style>
    td {padding: 6px 15px;}
    .data {font-size: 24px;}
    </style>
</head>
<body>
    <h2>Your route's params</h2>
    <form method="post" action="/">
        <p>
            From:
            <select name="x">
                <?php foreach ($cities as $city => $pairs): ?>
                <option value="<? echo $city; ?>" <? if ($data['x'] == $city) echo ' selected'; ?>><? echo $city; ?></option>
                <?php endforeach; ?>
            </select>
            To:
            <select name="y">
                <? foreach ($cities as $city => $pairs): ?>
                <option value="<? echo $city; ?>" <? if ($data['y'] == $city) echo ' selected'; ?>><? echo $city; ?></option>
                <? endforeach; ?>
            </select>
        </p>
        <p>
            Find the <input type="radio" name="type" value="cheap" id="cheap" <? if ($data['type'] == 'cheap') echo ' checked'; ?>> <label for="cheap">cheapest</label><br>
            or <input type="radio" name="type" id="comf" value="comfortable" <? if ($data['type'] == 'comfortable') echo ' checked'; ?>> <label for="comf">the most comfortable</label>
        </p>
        <p><input type="submit" value="Retrace route"></p>
    </form>
    <h3>Total price: <? echo $trip->calcTotal(); ?></h3>
    <table>
        <tr>
            <td>Cities</td>
            <td>Vehicle</td>
            <td>Distance</td>
            <td>Is international?</td>
            <td>Ticket Price</td>
        </tr>
        <? foreach ($trip->getListOfTransport() as $vehicle): ?>
        <tr class="data">
            <td><? echo $vehicle->getPath()[0]; ?> &rarr; <? echo $vehicle->getPath()[1]; ?></td>
            <td><? echo get_class($vehicle); ?></td>
            <td><? echo $vehicle->getDistance(); ?></td>
            <td><? if ($vehicle->isInternational()) echo 'Yes'; else echo 'No'; ?></td>
            <td><? echo $vehicle->payForTicket(); ?></td>
        </tr>
        <? endforeach; ?>
    </table>
</body>
</html>
