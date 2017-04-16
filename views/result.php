<html>
<head>
    <title>Traced route</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="views/style.css">
</head>
<body>
    <div>
        <h1>Your route's params</h1>
        <form method="post" action="/">
            <p>
                From
                <select name="x">
                    <?php foreach ($cities as $city => $pairs): ?>
                    <option value="<? echo $city; ?>" <? if ($data['x'] == $city) echo ' selected'; ?>><? echo $city; ?></option>
                    <?php endforeach; ?>
                </select>
                to
                <select name="y">
                    <? foreach ($cities as $city => $pairs): ?>
                    <option value="<? echo $city; ?>" <? if ($data['y'] == $city) echo ' selected'; ?>><? echo $city; ?></option>
                    <? endforeach; ?>
                </select>
            </p>
            <p>
                <input type="radio" name="type" value="cheap" id="cheap" <? if ($data['type'] == 'cheap') echo ' checked'; ?>> <label for="cheap">The cheapest</label><br>
                <input type="radio" name="type" id="comf" value="comfortable" <? if ($data['type'] == 'comfortable') echo ' checked'; ?>> <label for="comf">or the most comfortable way</label>
            </p>
            <p><input type="submit" value="Retrace route"></p>
        </form>
        <? if ($data['x'] == $data['y']): ?>
        <h3>You are already here</h3>
        <? else: ?>
        <table>
            <tr class="head">
                <td>Cities</td>
                <td>Vehicle</td>
                <td>Distance</td>
                <td>Type</td>
                <td class="sum">Ticket Price</td>
            </tr>
            <? foreach ($trip->getListOfTransport() as $vehicle): ?>
            <tr class="data">
                <td><? echo $vehicle->getPath()[0]; ?> &rarr; <? echo $vehicle->getPath()[1]; ?></td>
                <td><? echo get_class($vehicle); ?></td>
                <td><? echo $vehicle->getDistance(); ?></td>
                <td><? if ($vehicle->isInternational()) echo 'International'; else echo 'Inner'; ?></td>
                <td class="sum"><? echo $vehicle->payForTicket(); ?></td>
            </tr>
            <? endforeach; ?>
            <tr class="total">
                <td>Total</td>
                <td></td>
                <td></td>
                <td></td>
                <td class="sum"><b><? echo $trip->calcTotal(); ?></b></td>
            </tr>
        </table>
        <? endif; ?>
    </div>
</body>
</html>
