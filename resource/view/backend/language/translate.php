<?php
use App\Config\DB\DB;

$language = DB::table('languages')->where('id', requestURI()->name2)->first();
$translations = DB::table('translations')->where('lang', env('DEFAULT_LANGUAGE'))->get();

?>
<?php view('backend/component/top.php'); ?>
<div class="row">
    <div class="col-md-12">
        <form action="/language/translate/update" method="post">
            <input type="hidden" name="id" value="<?php echo $language->id?>">
            <input type="hidden" name="code" value="<?php echo $language->code?>">
        <div class="card">
            <div class="card-header">
                <?php translate($language->name);?>
                <div class="btn-group float-right">
                    <button type="submit" class="btn btn-success btn-sm"><?php translate('Save');?></button>
                    <a href="javascript:void()" class="btn btn-info btn-sm" onclick="copyTranslation()"><?php translate('Copy Translations');?></a>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th><?php translate('Key'); ?></th>
                        <th><?php translate('Value'); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($translations as $key => $translation) { ?>
                        <tr>
                            <td><?php echo $key+1?></td>
                            <td class="key"><?php echo $translation->lang_key?></td>
                            <td>
                                <input type="text" class="form-control value" name="values[<?php echo $translation->lang_key ?>]" <?php if(($traslate_lang = DB::table('translations')->where('lang', $language->code)->where('lang_key', $translation->lang_key)->first()) != null){?> value="<?php echo $traslate_lang->lang_value;}?>" required/>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        </form>
    </div>
</div>
<?php view('backend/component/bottom.php'); ?>
<script>
    $(document).ready(function () {
        $('.table').DataTable();
    });

    function copyTranslation() {
        $('.table > tbody  > tr').each(function (index, tr) {
            $(tr).find('.value').val($(tr).find('.key').text());
        });
    }
    function sort_keys(el){
        $('#sort_keys').submit();
    }
</script>
</body>
</html>
