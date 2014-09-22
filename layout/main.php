<html>
<head>
    <title>Forum</title>
</head>
<body>
<div style="text-align: center;
    width: 800px;
    display: block;
    margin-left: auto;
    margin-right: auto;">
<table style="width:800px;border-collapse: collapse;">
    <tr><th style="text-align:center;border:1px solid black;border-bottom:0px;"><?php echo $category['name']; ?></th></tr>
    <table style="width:800px;border-collapse: collapse;" border="1">
    <tr><th style="text-align:center;">Boards</th><th style="text-align:center;">Topics</th><th style="text-align:center;">Posts</th></tr>
    <tr><td><?php echo $board['name']; ?> <br />
            <?php echo $board['description']; ?></td>
        <td><?php echo $postCount['topics']; ?></td>
        <td><?php echo $postCount['total']; ?></td>
    </tr>
        </table>
</table>
</div>
</body>
</html>
