<!DOCTYPE html>
<html lang="ja">
<head>
    <meta http-equiv="content-language" content="ja">
    <meta charset="UTF-8">
    <title>title</title>
    <base href="{$baseLink}">
    <link  href="{"assets/css/app.min.css"|add_file_hash}" type="text/css" rel="stylesheet">
    <script src="{"assets/js/app.min.js"|add_file_hash}"   type="text/javascript"></script>
</head>
<body>

{include file="$contents" nocache}

<footer>
    <div class="container">
        <p class="text-center">Copyright (C) 2015-</p>
    </div>
</footer>
</body>
</html>