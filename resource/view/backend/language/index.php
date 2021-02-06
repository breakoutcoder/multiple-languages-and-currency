<?php
use App\Config\DB\DB;
$languages = DB::table('languages')->get();
view('backend/component/top.php');
?>
<style>
    .onoffswitch {
        position: relative;
        width: 78px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
    }

    .onoffswitch-checkbox {
        position: absolute;
        opacity: 0;
        pointer-events: none;
    }

    .onoffswitch-label {
        display: block;
        overflow: hidden;
        cursor: pointer;
        border: 2px solid #FFFFFF;
        border-radius: 50px;
    }

    .onoffswitch-inner {
        display: block;
        width: 200%;
        margin-left: -100%;
        transition: margin 0.3s ease-in 0s;
    }

    .onoffswitch-inner:before, .onoffswitch-inner:after {
        display: block;
        float: left;
        width: 50%;
        height: 30px;
        padding: 0;
        line-height: 30px;
        font-size: 14px;
        color: white;
        font-family: Trebuchet, Arial, sans-serif;
        font-weight: bold;
        box-sizing: border-box;
    }

    .onoffswitch-inner:before {
        content: "<?php translate('ON');?>";
        padding-left: 10px;
        background-color: #04B76B;
        color: #FFFFFF;
    }

    .onoffswitch-inner:after {
        content: "<?php translate('OFF');?>";
        padding-right: 10px;
        background-color: #FF5E6D;
        color: #FFFFFF;
        text-align: right;
    }

    .onoffswitch-switch {
        display: block;
        width: 24px;
        margin: 5.5px;
        background: #FFFFFF;
        position: absolute;
        top: 0;
        bottom: 0;
        right: 42px;
        border: 2px solid #FFFFFF;
        border-radius: 50px;
        transition: all 0.3s ease-in 0s;
    }

    .onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-inner {
        margin-left: 0;
    }

    .onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-switch {
        right: 0px;
    }
</style>
<div class="row mt-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header"><?php translate('Language'); ?>
                <a href="/language/create"
                   class="btn btn-info float-right"><?php translate('Add New Language'); ?></a>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th><?php translate('Name'); ?></th>
                        <th><?php translate('Code'); ?></th>
                        <th><?php translate('Status'); ?></th>
                        <th><?php translate('RTL'); ?></th>
                        <th><?php translate('Action'); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($languages as $key => $language) { ?>
                        <tr>
                            <td><?php echo $key + 1 ?></td>
                            <td><?php translate($language->name) ?></td>
                            <td><?php echo $language->code ?></td>
                            <td>
                                <?php if ($language->code != 'en') {?>
                                <div class="onoffswitch">
                                    <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox"
                                           id="status<?php echo $key ?>"
                                           tabindex="0" <?php if ($language->status == 1) {
                                        echo 'checked';
                                    } ?> onchange="onOff(<?php echo $language->id ?>, 'status',this)">
                                    <label class="onoffswitch-label" for="status<?php echo $key ?>">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </label>
                                </div>
                                <?php }?>
                            </td>
                            <td>
                                <div class="onoffswitch">
                                    <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox"
                                           id="rtl<?php echo $key ?>" tabindex="0" <?php if ($language->rtl == 1) {
                                        echo 'checked';
                                    } ?> onchange="onOff(<?php echo $language->id ?>, 'rtl',this)">
                                    <label class="onoffswitch-label" for="rtl<?php echo $key ?>">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </label>
                                </div>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="/language/translate/<?php echo $language->id?>" class="btn btn-info btn-sm">
                                        <?php translate('Translate');?>
                                    </a>
                                    <?php if ($language->code != 'en') {?>
                                        <form action="/language/translate/delete" method="post" onsubmit="return langdelete('Are you sure delete <?php echo $language->name?>')">
                                            <input type="hidden" value="<?php echo $language->id?>" name="id">
                                            <input type="hidden" value="<?php echo $language->code?>" name="code">
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <?php translate('Delete');?>
                                            </button>
                                        </form>
                                    <?php }?>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php view('backend/component/bottom.php'); ?>
<script>
    $(document).ready(function () {
        $('.table').DataTable();
    });

    function onOff(id, key, e) {
        $.ajax
        ({
            url: '/language/status',
            data: {"id": id, "key": key, "value": e.checked},
            type: 'post',
            success: function (r) {
                if (r == 'status'){
                    location.reload();
                }
            }
        });
    }

    function langdelete(value){
        return confirm(value);
    }
</script>
</body>
</html>
