<div class="container" id="page-wrapper" style="padding-top: 30px">
    <form class="form-inline" method="post">
        <div class="form-group col-md-3" style="margin-bottom: 15px">
            <label for="id">卡号</label>
            <input type="number" name="id" class="form-control" id="id" placeholder="卡号"
                   value="<?php if (isset($id)) echo $id; ?>">
        </div>
        <div class="col-md-4">
            <button type="submit" name="idsub" id="idsub" value="idsub" class="btn btn-primary">查询已借书目</button>
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
            <th>还书</th>
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
                <td><a class="btn btn-default btn-danger" href="/library/index.php/admin/return_book/<?php echo $item['isbn'].'/'.$id;?>">还书</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>