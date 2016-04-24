<div class="container" id="page-wrapper" style="padding-top: 30px">
    <form class="form-inline">
        <div class="row">
            <div class="form-group col-md-3" style="margin-bottom: 15px">
                <label for="category">种类</label>
                <input type="text" class="form-control" id="category" placeholder="种类">
            </div>
            <div class="form-group col-md-3" style="margin-bottom: 15px">
                <label for="title">书名</label>
                <input type="text" class="form-control" id="title" placeholder="书名">
            </div>
            <div class="form-group col-md-3" style="margin-bottom: 15px">
                <label for="publisher">出版社</label>
                <input type="text" class="form-control" id="publisher" placeholder="出版社">
            </div>
            <div class="form-group col-md-3" style="margin-bottom: 15px">
                <label for="author">作者</label>
                <input type="text" class="form-control" id="author" placeholder=作者>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <div class="form-group">
                    <label for="date1">发布日期从</label>
                    <input type="date" class="form-control" id="date1">
                </div>
                <div class="form-group">
                    <label for="date2">到</label>
                    <input type="date" class="form-control" id="date2">
                </div>
            </div>
            <div class="col-md-5">
                <div class="form-group">
                    <label for="price1">价格从</label>
                    <input type="number" class="form-control" id="price1">
                </div>
                <div class="form-group" style="padding-right: 15px">
                    <label for="price2">到</label>
                    <input type="number" class="form-control" id="price2">
                </div>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary">搜索</button>
            </div>
    </form>
</div>