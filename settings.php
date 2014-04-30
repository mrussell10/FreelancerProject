<?php
include 'core/init.php';
include 'includes/overall/header.php';
?>
<style>
    img {
        height: 100px;
        width: 100px;
    }
</style>

<?php
$slideshow = $_REQUEST['slideshow'];


if (empty($slideshow) === true) {
    
} else
    $sql = mysql_query("UPDATE users SET slideshow = '$slideshow' WHERE username = '$username'");


//declare in the order variable
?>
<div class="col-md-11">   
    <div class="widget stacked widget-table action-table">

        <div class="widget-header">
            <i class="icon-th-list"></i>
            <h3>Edit your profile</h3>
        </div> <!-- /widget-header -->

        <div class="widget-content">

            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Option</th>
                        <th>Current</th>
                        <th>Change</th>
                        <th class="td-actions"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Email</td>
                        <td><?php echo $user_data['email']; ?></td>
                        <td class="td-actions">
                            <button class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm">Change Email</button>

                            <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <form class="form-inline" role="form" method="post">
                                            <div class="form-group">
                                                <label class="sr-only" for="exampleInputEmail2">Email address</label>
                                                <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
                                            </div>
                                            <button type="submit" class="btn btn-default">Update</button>
                                        </form>
                                    </div>
                                </div>
                            </div>								


                            <a href="javascript:;" class="btn btn-small">
                                <i class="btn-icon-only icon-remove"></i>										
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>Profile Pic</td>
                        <td><?php echo '<img src = "', $user_data['profile_pic'], '" alt="">'; ?></td>
                        <td class="td-actions">
                            <button class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Change Profile Photo</button>

                            <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="form-group">
                                            <form class="form-inline" role="form"  enctype="multipart/form-data" method="post">
                                                <label for="exampleInputFile">File input</label>
                                                <input type="file" id="exampleInputFile" name="profile_pic">
                                                <p class="help-block">Example block-level help text here.</p>
                                        </div>

                                        <button type="submit" class="btn btn-default">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            </div>

                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>Overview</td>
                        <td></td>
                        <td class="td-actions">
                            <!-- Button trigger modal -->
                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
                                Change Overview
                            </button>
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Write your overview</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form class="form-inline" role="form" method="post">
                                                <div class="form-group">
                                                    <label class="sr-only" for="exampleInputEmail2">Overview</label>
                                                    <textarea type="text" class="form-control" name="overview" rows="10" cols="50"id="overview" placeholder=""></textarea>
                                                </div>
                                                <div>
                                                    <button type="submit" class="btn btn-primary">Update</button></div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                                        </div>
                                    </div>
                                </div>
                            </div>                            



                        </td>
                    </tr>
                    <tr>
                        <td>Trident</td>
                        <td>Internet
                            Explorer 5.5</td>
                        <td class="td-actions">
                            <a href="javascript:;" class="btn btn-small btn-primary">
                                <i class="btn-icon-only icon-ok"></i>										
                            </a>

                            <a href="javascript:;" class="btn btn-small">
                                <i class="btn-icon-only icon-remove"></i>										
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>Trident</td>
                        <td>Internet
                            Explorer 5.5</td>
                        <td class="td-actions">
                            <a href="javascript:;" class="btn btn-small btn-primary">
                                <i class="btn-icon-only icon-ok"></i>										
                            </a>

                            <a href="javascript:;" class="btn btn-small">
                                <i class="btn-icon-only icon-remove"></i>										
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>Trident</td>
                        <td>Internet
                            Explorer 5.5</td>
                        <td class="td-actions">
                            <a href="javascript:;" class="btn btn-small btn-primary">
                                <i class="btn-icon-only icon-ok"></i>										
                            </a>

                            <a href="javascript:;" class="btn btn-small">
                                <i class="btn-icon-only icon-remove"></i>										
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div> <!-- /widget-content -->

    </div> <!-- /widget -->



    <br>



    <?php
    $email = $_REQUEST['email'];
    if (empty($email) === true) {
        
    } else
        $sql = mysql_query("UPDATE users SET email = '$email' WHERE username = '$username'");

    $overview = $_REQUEST['overview'];
    if (empty($overview) === true) {
        
    } else
        $sql = mysql_query("UPDATE users SET overview = '$overview' WHERE username = '$username'");
    ?>


    <?php
    if (isset($_FILES['profile_pic']) === true) {
        if (empty($_FILES['profile_pic']['name']) === true) {
            echo "Please choose a file";
        } else {
            $allowed = array('jpg', 'jpeg', 'gif', 'png');

            $file_name = $_FILES['profile_pic']['name'];
            $file_extn = strtolower(end(explode('.', $file_name)));
            $file_temp = $_FILES['profile_pic']['tmp_name'];

            if (in_array($file_extn, $allowed) === true) {

                change_profile_image($session_user_id, $file_temp, $file_extn);
            } else {
                echo "Incorrect file type";
            }
        }
    }
    ?>


