<html>
<head>
    <title>Traced route</title>
    <meta charset="utf-8">
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
                <?php foreach ($cities as $city => $pairs): ?>
                <option value="<? echo $city; ?>" <? if ($data['y'] == $city) echo ' selected'; ?>><? echo $city; ?></option>
                <?php endforeach; ?>
            </select>
        </p>
        <p>
            Find the <input type="radio" name="type" value="cheap" id="cheap" <? if ($data['type'] == 'cheap') echo ' checked'; ?>> <label for="cheap">cheapest</label><br>
            or <input type="radio" name="type" id="comf" value="comfortable" <? if ($data['type'] == 'comfortable') echo ' checked'; ?>> <label for="comf">the most comfortable</label>
        </p>
        <p><input type="submit" value="Retrace route"></p>
    </form>
    <pre>
        <?php
        $trip = new Trip;
        $route = $trip->buildRoute($data['x'], $data['y']);
        $transport = $trip->assignTransport($route);
        print_r($transport);
        ?>
    </pre>
</body>
</html>
