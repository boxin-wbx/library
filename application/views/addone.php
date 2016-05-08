<div class="container" id="page-wrapper" style="padding-top: 30px">
    <form class="form" method="post">
        <div class="form-group col-md-3" style="margin-bottom: 15px">
            <label for="isbn">ISBN</label>
            <input type="number" name="isbn" class="form-control" id="isbn" placeholder="书号" required
            >
        </div>
        <div class="form-group col-md-3" style="margin-bottom: 15px">
            <label for="category">种类</label>
            <input type="text" name="category" class="form-control" id="category" placeholder="种类" required
            >
        </div>
        <div class="form-group col-md-3" style="margin-bottom: 15px">
            <label for="title">书名</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="书名" required
            >
        </div>
        <div class="form-group col-md-3" style="margin-bottom: 15px">
            <label for="publisher">出版社</label>
            <input type="text" name="publisher" class="form-control" id="publisher" placeholder="出版社" required>
        </div>
        <div class="form-group col-md-3" style="margin-bottom: 15px">
            <label for="author">作者</label>
            <input type="text" name="author" class="form-control" id="author" placeholder="作者" required
            >
        </div>
        <div class="form-group col-md-3">
            <label for="pubdate">出版日期</label>
            <input name="pubdate" type="date" class="form-control" id="pubdate" required>
        </div>
        <div class="form-group col-md-3">
            <label for="price">价格</label>
            <input name="price" type="text" class="form-control" id="price" required>
        </div>
        <div class="form-group col-md-3">
            <label for="stock">数量</label>
            <input name="stock" type="text" class="form-control" id="stock" required>
        </div>
        <div class="row">
            <div class="col-md-2 col-md-offset-5">
                <button type="submit" class="btn btn-success">提交</button>
            </div>
        </div>
    </form>
</div>
<?php
if (validation_errors() != '') echo "<script> alert('all elements cannot be empty!');</script>"
?>