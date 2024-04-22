<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form to Send Data to API</title>
    <link rel="stylesheet" href="style.css" />  
</head>
<body>
    <form action="inAPi.php" method="post">
        <!-- <label for="ID">ID:</label>
        <input type="text" name="ID" value="123"> -->

        <label for="ID_RQ">ID_RQ:</label>
        <input type="text" name="ID_RQ" value="456">

        <label for="Cuscode_id">Cuscode_id:</label>
        <input type="text" name="Cuscode_id" value="789">

        <label for="Date_app">Date_app:</label>
        <input type="datetime-local" name="Date_app" value="<?=date("Y-m-d");?>">

        <label for="Sum_sn">Sum_sn:</label>
        <input type="text" name="Sum_sn" value="1">

        <label for="Store">Store:</label>
        <input type="text" name="Store" value="StoreName">

        <label for="Acknowledge">Acknowledge:</label>
        <input type="text" name="Acknowledge" value="Yes">

        <button type="submit">บันทึก</button>
    </form>
</body>
</html>
