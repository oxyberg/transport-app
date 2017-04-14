<html>
<head>
    <title>Build your route</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="views/style.css">
</head>
<body>
    <h1>Build your route</h1>
    <form method="post" action="">
        <p>
            From
            <select name="x">
                <?php foreach ($cities as $city => $pairs): ?>
                <option value="<? echo $city; ?>"><? echo $city; ?></option>
                <?php endforeach; ?>
            </select>
            to
            <select name="y">
                <?php foreach ($cities as $city => $pairs): ?>
                <option value="<? echo $city; ?>"><? echo $city; ?></option>
                <?php endforeach; ?>
            </select>
        </p>
        <p>
            Find the <input type="radio" name="type" value="cheap" id="cheap" checked> <label for="cheap">cheapest</label><br>
            or <input type="radio" name="type" id="comf" value="comfortable"> <label for="comf">the most comfortable</label>
        </p>
        <p><input type="submit" value="Traceroute"></p>
    </form>
</body>
</html>
