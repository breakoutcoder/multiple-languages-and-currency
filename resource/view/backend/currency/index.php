<?php

use App\Config\DB\DB;

$curr = DB::table('currencies')->get()

?>
<?php view('backend/component/top.php'); ?>
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
        right: 0;
    }
</style>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <a href="/currency/create" class="btn btn-info float-right"><?php translate('Add New Currency'); ?></a>
                <?php translate('currencies'); ?>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th><?php translate('Currency name'); ?></th>
                        <th><?php translate('Currency symbol'); ?></th>
                        <th><?php translate('Currency code'); ?></th>
                        <th><?php translate('Exchange Rate(1 USD = ?)'); ?></th>
                        <th><?php translate('Status'); ?></th>
                        <th><?php translate('Action'); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($curr as $key => $value) { ?>
                        <tr>
                            <td><?php echo $key+1?></td>
                            <td><?php echo $value->name ?></td>
                            <td><?php echo $value->symbol ?></td>
                            <td><?php echo $value->code ?></td>
                            <td><?php echo $value->exchange_rate.$value->symbol ?></td>
                            <td>
                                <?php if($value->code != 'USD') {?>
                                    <div class="onoffswitch">
                                        <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox"
                                               id="status<?php echo $key ?>" tabindex="0" <?php if ($value->status == 1) {
                                            echo 'checked';
                                        } ?> onchange="onOff(<?php echo $value->id ?>, this)"/>
                                        <label class="onoffswitch-label" for="status<?php echo $key ?>">
                                            <span class="onoffswitch-inner"></span>
                                            <span class="onoffswitch-switch"></span>
                                        </label>
                                    </div>
                                <?php }?>
                            </td>
                            <td><a href="/currency/edit/<?php echo $value->id?>" class="btn btn-sm btn-warning"><?php translate('Edit');?></a></td>
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
    function onOff(id , e) {
        $.ajax
        ({
            url: '/currency/status',
            data: {"id": id, "value": e.checked},
            type: 'post',
            success: function () {
                    location.reload();
            }
        });
    }

    function langdelete(value){
        return confirm(value);
    }
</script>
</body>
</html>
