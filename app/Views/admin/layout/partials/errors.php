<?php if(session()->has('error')){ ?>
    <?php if (is_array(session()->error)){ ?>
        <?php foreach (session()->error as $key => $value){ ?>

            <!-- danger Alert -->
            <div class="alert alert-danger" role="alert">
                <strong>  <?= $value; ?> </strong>
            </div>

        <?php } ?>
    <?php }else{ ?>

        <div class="alert alert-danger" role="alert">
            <strong>  <?= session()->error; ?> </strong>
        </div>
    <?php } ?>
<?php } ?>

<?php if(session()->has('success')){ ?>
    <?php if (is_array(session()->success)){ ?>
        <?php foreach (session()->success as $key => $value){ ?>
            <div class="alert alert-success" role="alert">
                <strong>  <?= $value; ?> </strong>
            </div>
        <?php } ?>
    <?php }else{ ?>
        <div class="alert alert-success" role="alert">
            <strong>  <?= session()->success; ?> </strong>
        </div>
    <?php } ?>
<?php } ?>
