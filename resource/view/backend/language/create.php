<?php view('backend/component/top.php'); ?>
    <style>
        .btn-light{
            background-color: inherit !important;
        }
    </style>
<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card">
            <div class="card-header"><?php translate('Language Information');?></div>
            <div class="card-body">
                <form method="POST" action="/language">
                    <div class="form-group row">
                        <div class="col-lg-3">
                            <label class="col-from-label"><?php translate('Name');?></label>
                        </div>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" name="name" placeholder="<?php translate('Name');?>" required="" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-3">
                            <label class="col-from-label"><?php translate('Code');?></label>
                        </div>
                        <div class="col-lg-9">
                            <select class="form-control mb-2 mb-md-0 selectpicker" name="code"
                                    data-live-search="true" required>
                                <?php foreach (new DirectoryIterator(basePath('/public/flag')) as $fileInfo) {?>
                                <?php if($fileInfo->isDot()) continue; $name = 'flag/'.$fileInfo->getFilename(); $fileInfos = explode('.', $fileInfo);?>
                                <option value="<?php echo $fileInfos[0]?>" data-content="<div class=''><img src='<?php asset($name)?>' class='mr-2'><span><?php echo strtoupper($fileInfos[0])?></span></div>"></option>
                                <?php }?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group mb-0 text-right">
                        <button type="submit" class="btn btn-sm btn-info"><?php translate('Submit');?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php view('backend/component/bottom.php'); ?>
</body>
</html>