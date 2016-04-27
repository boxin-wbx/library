<div class="container" style="padding-top: 20px;">
    <table class="table table-striped table-hover table-bordered">
        <thead>
        <tr>
            <th>ISBN</th>
            <th>类别</th>
            <th>书名</th>
            <th>出版社</th>
            <th>出版年份</th>
            <th>作者</th>
            <th>价格</th>
            <th>总藏书量</th>
            <th>库存</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($book as $item): ?>
            <tr>
                <td><?php echo $item['isbn']; ?> </td>
                <td><?php echo $item['category']; ?> </td>
                <td><?php echo $item['title']; ?> </td>
                <td><?php echo $item['publisher']; ?> </td>
                <td><?php echo $item['pubdate']; ?> </td>
                <td><?php echo $item['author']; ?> </td>
                <td><?php echo $item['price']; ?> </td>
                <td><?php echo $item['total']; ?> </td>
                <td><?php echo $item['stock']; ?> </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <ul class="pagination">
        <?php for ($i = 1; $i <= $num; $i++)
            if ($i != $page) {
                echo "<li><a href='/library/index.php/home/search/$i'>$i</a></li>";
            } else {
                echo "<li class='active'><a href='/library/index.php/home/search/'$i>$i</a></li>";
            }
        ?>
    </ul>
</div>
