
<div class="container" id="page-wrapper" style="padding-top: 30px">
    <form class="form-inline" method="post">
        <div class="form-group col-md-3" style="margin-bottom: 15px">
            <label for="isbn">书号</label>
            <input type="number" name="isbn" class="form-control" id="isbn" placeholder="书号"
                   value="<?php if (isset($isbn)) echo $isbn; ?>">
        </div>
        <div class="col-md-2">
            <button type="submit" name="isbnsub" id="isbnsub" value="isbnsub" class="btn btn-primary">搜索</button>
        </div>
    </form>
</div>
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
            <th>借书</th>
        </tr>
        </thead>
        <tbody>
        <?php if (!isset($book)) {
            $book = array();
            $page = 1;
            $num = 0;
        }
        foreach ($book as $item): ?>
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
                <td><a class="btn btn-default btn-success" href="/library/index.php/admin/borrow/<?php echo $item['isbn'].'/'.$id;?>">借书</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
