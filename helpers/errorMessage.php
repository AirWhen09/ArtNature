<?php if(count($errors) > 0){ ?>
    <div class="alert alert-danger alert-dismissible fade show">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <?php
            foreach($errors as $error){
                echo "<li> $error.</li>";
            }
        ?>
    </div>
<?php } ?>

