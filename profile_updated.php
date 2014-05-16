<?php
include 'core/init.php';
include 'includes/overall/header.php';
protect_page();
?>
<style>

.error-template {padding: 9px 3px;text-align: center;}
.error-actions {margin-top:5px;margin-bottom:15px;}
.error-actions .btn { margin-right:8px; }
.img-circle{
    height :200px;
    width: 200px;
}

</style>

<div class="container">
    <div class="row".
        <div class="col-md-12">
            <div class="error-template">
                <h1>
                    Success !</h1>
                <h2>
                    Your Profile has been updated</h2>
                <div class="error-details">
                    Please choose one of the options below!
                </div>
                <div class="error-actions">
             
                    <a href="<?php echo $user_data['username']?>" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-home"></span>
                        Back to my Profile </a><a href="inbox.php" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-envelope"></span> Inbox </a>
                </div>
            </div>
        </div>
    </div>
</div>
