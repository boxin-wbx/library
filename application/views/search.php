<div class="container" id="page-wrapper" style="padding-top: 30px">
    <form class="form-inline" method="get" action="/library/index.php/home/search_result">
        <div class="row">
            <div class="form-group col-md-3" style="margin-bottom: 15px">
                <label for="category">种类</label>
                <input type="text" name="category" class="form-control" id="category" placeholder="种类"
                       value="<?php if (isset($category)) echo $category; ?>"
                >
            </div>
            <div class="form-group col-md-3" style="margin-bottom: 15px">
                <label for="title">书名</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="书名"
                       value="<?php if (isset($title)) echo $title; ?>"
                >
            </div>
            <div class="form-group col-md-3" style="margin-bottom: 15px">
                <label for="publisher">出版社</label>
                <input type="text" name="publisher" class="form-control" id="publisher" placeholder="出版社"
                       value="<?php if (isset($publisher)) echo $publisher; ?>"
                >
            </div>
            <div class="form-group col-md-3" style="margin-bottom: 15px">
                <label for="author">作者</label>
                <input type="text" name="author" class="form-control" id="author" placeholder="作者"
                       value="<?php if (isset($author)) echo $author; ?>"
                >
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <div class="form-group">
                    <label for="date1">发布日期从</label>
                    <input name="date1" type="date" class="form-control" id="date1"
                           value="<?php if (isset($pubdate1)) echo $pubdate1; ?>">
                </div>
                <div class="form-group">
                    <label for="date2">到</label>
                    <input name="date2" type="date" class="form-control" id="date2"
                           value="<?php if (isset($pubdate2)) echo $pubdate2; ?>">
                </div>
            </div>
            <div class="col-md-5">
                <div class="form-group">
                    <label for="price1">价格从</label>
                    <input name="price1" type="number" class="form-control" id="price1"
                           value="<?php if (isset($price1)) echo $price1; ?>">
                </div>
                <div class="form-group" style="padding-right: 15px">
                    <label for="price2">到</label>
                    <input name="price2" type="number" class="form-control" id="price2"
                           value="<?php if (isset($price2)) echo $price2; ?>">
                </div>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary">搜索</button>
            </div>
    </form>
</div>