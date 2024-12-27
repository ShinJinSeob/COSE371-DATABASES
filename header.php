<!DOCTYPE html>
<html lang='ko'>
<head>
    <title>K-House</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<form action="product_list.php" method="post">
    <div class='navbar fixed'>
        <div class='container'>
            <a class='pull-left title' href="index.php">K-House</a>
            <ul class='pull-right'>
                <li>
                    <input type="text" name="search_keyword" placeholder="K-House 통합검색">
                </li>
                <li><a href='product_list.php'>매물 목록</a></li>
                <li><a href='product_form.php'>매물 등록</a></li>
                <li><a href='sign_list.php'>계약 목록</a></li>
                <li><a href='sign_form.php'>계약 등록</a></li>
            </ul>
        </div>
    </div>
</form>