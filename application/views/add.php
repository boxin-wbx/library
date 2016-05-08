<div class="col-md-12 container" style="padding-top: 20px">
    <form class="form-inline pull-right" method="get" id="searchbox" action="/libarary/index.php/admin/add">
        <lable>选择模式:</lable>
        <div class="btn-group" data-toggle="buttons" id="navigator-group">
            <label>
                <input type="radio" name="options" id="one" autocomplete="off"
                       onclick="window.location.href='/library/index.php/admin/add'"
                       <?php if ($add == 0 ) echo "checked"; ?>>
                添加一条记录
            </label>
            <label>
                <input type="radio" name="options" id="more" autocomplete="off"
                        onclick="window.location.href='/library/index.php/admin/addmore';"
                    <?php if ($add == 1 ) echo "checked"; ?>>
                添加多条记录
            </label>
        </div>
    </form>
</div>