<!DOCTYPE html>
<html lang="en">
<head>
    <title>Stock Info</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style>
    .data:hover{
        background-color:yellow;
    }
    a{
        color:blue;
    }
</style>
<body>
<div class="container mt-5">
    <table class="table">
        <thead>
        <tr>
            <th colspan="4" scope="col"> Tata Chaitanya Most Popular Stock listing </th>
        </tr>
        <tr>
            <th scope="col">Stock Name</th>
            <th scope="col">Open Price</th>
            <th scope="col">Close Price</th>
            <th scope="col">Volume</th>
        </tr>
        </thead>
        <tbody>
        <tr class="data">
            <td>Nvidia</td>
            <td>841.30</td>
            <td>852.37</td>
            <td>61,250,300</td>
        </tr>
        <tr class="data">
            <td>Microsoft</td>
            <td>413.44</td>
            <td>414.92</td>
            <td>17,577,800</td>
        </tr>
        <tr class="data">
            <td>Apple</td>
            <td>176.75</td>
            <td>175.10</td>
            <td>81,406,300</td>
        </tr>
        </tbody>
    </table>
</div>
<div class="container mt-5">
    <a href="index.php?logout=1">Logout</a>
</div>
</body>
</html>