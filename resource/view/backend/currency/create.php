<?php view('backend/component/top.php'); ?>
<div class="row">
    <div class="col-6 mx-auto">
        <div class="card">
            <div class="card-header"><?php translate('Add New Currency'); ?></div>
            <div class="card-body">
                <form action="/currency" method="post">
                    <div class="form-group row">
                        <label class="col-2 col-from-label" for="name"><?php translate('Name'); ?></label>
                        <div class="col-10">
                            <input type="text" placeholder="<?php translate('Name'); ?>" id="name" name="name"
                                   class="form-control" required="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-from-label" for="symbol"><?php translate('Symbol'); ?></label>
                        <div class="col-10">
                            <input type="text" placeholder="<?php translate('Symbol'); ?>" id="symbol" name="symbol"
                                   class="form-control" required="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-from-label" for="code"><?php translate('Code'); ?></label>
                        <div class="col-10">
                            <input type="text" placeholder="<?php translate('Code'); ?>" id="code" name="code"
                                   class="form-control" required="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-from-label"
                               for="exchange_rate"><?php translate('Exchange Rate'); ?></label>
                        <div class="col-10">
                            <input type="number" step="0.01" min="0" placeholder="<?php translate('Exchange Rate'); ?>"
                                   id="exchange_rate" name="exchange_rate" class="form-control" required="">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-info btn-sm"><?php translate('Save'); ?></button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php view('backend/component/bottom.php'); ?>
</body>
</html>
