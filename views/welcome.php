<html>
<head>
    <title>Build your route</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="views/style.css">
</head>
<body>
    <div>
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
                <input type="radio" name="type" value="cheap" id="cheap" checked> <label for="cheap">The cheapest</label><br>
                <input type="radio" name="type" id="comf" value="comfortable"> <label for="comf">or the most comfortable way</label>
            </p>
            <p><input type="submit" value="Traceroute"></p>
        </form>
    </div>
</body>
</html>
