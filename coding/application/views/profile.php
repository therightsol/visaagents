<?php include 'includes/header.php' ; ?>
<?php include 'includes/top_header.php' ; ?>

<?php
$loggedInUser = $this->session->userdata('loggedInUser');

// change menu according to privillages

if($loggedInUser == 'admin'){
    include 'includes/admin_menu.php';
}else if($loggedInUser == 'local_user'){
    include 'includes/local_user_menu.php';
}else if($loggedInUser == 'kafeel'){
    include 'includes/kafeel_menu.php';
} else {
    include 'includes/anonymous_menu.php';
} ?>

<body>
<div class="container">
    <div class="row">
        <?php if($loggedInUser == 'local_user'){ ?>
        <div class="col-md-5  toppad  pull-right col-md-offset-3 ">
            <A href="#" >Edit Profile</A>

            <br>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >



            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo $profile_record[0]['username'] ?><span class="text-info pull-right" >May 05,2014,03:00 pm </span></h3>

                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3 col-lg-3 " align="center" id="img_div">
                            <img alt="User Pic" src="
                                    <?php
                            if($profile_record[0]['profile_pic'] == ''){
                                echo $root.'upload_imgs/no-image.jpg';
                            }else{
                                echo $root.$profile_record[0]['profile_pic'];
                            } ?>
                                    " class="img-circle img-responsive">
                            <button id="change_btn" type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#myModal">Change</button>
                        </div>


                        <div class=" col-md-9 col-lg-9 ">
                            <table class="table table-user-information">
                                <tbody>
                                <tr>
                                    <td>First Name:</td>
                                    <td><?php echo $profile_record[0]['fname'] ?></td>
                                </tr>
                                <tr>
                                    <td>Last Name:</td>
                                    <td><?php echo $profile_record[0]['lname'] ?></td>
                                </tr>
                                <tr>
                                    <td>Email Address:</td>
                                    <td><?php echo $profile_record[0]['email'] ?></td>
                                </tr>
                                <tr>
                                    <td>Phone No</td>
                                    <td>
                                        <a href="#" class="edit-text" data-type="text" data-name="phone_no" data-title="Phone No" data-pk="<?php echo $profile_record[0]['uid'] ?>"><?php echo $profile_record[0]['cell_no'] ?></a>
                                        <a href="#" class="edit" data-original-title="Edit this user" data-toggle="tooltip"><i class="glyphicon glyphicon-pencil"></i></a>
                                    </td>

                                </tr>

                                <tr>
                                <tr>
                                    <td>Address</td>
                                    <td>
                                        <a href="#" class="edit-text" data-type="textarea" data-name="address" data-title="Address" data-pk="<?php echo $profile_record[0]['uid'] ?>"><?php echo $profile_record[0]['address'] ?></a>
                                        <a href="#" class="edit" data-original-title="Edit this user" data-toggle="tooltip"><i class="glyphicon glyphicon-pencil"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>CNIC</td>
                                    <td><?php echo $profile_record[0]['cnic'] ?></td>
                                </tr>
                                <tr>
                                    <td>Experience</td>
                                    <td><?php echo $profile_record[0]['experience'] ?></td>
                                </tr>
                                <tr>
                                    <td>Salary</td>
                                    <td><?php echo $profile_record[0]['salary'] ?></td>

                                </tr>
                                <tr>
                                    <td>Experience</td>
                                    <td><?php echo $profile_record[0]['experience'] ?></td>
                                </tr>
                                <tr>
                                    <td>Education</td>
                                    <td><?php echo $profile_record[0]['education'] ?></td>
                                </tr>
                                <tr>
                                    <td>Reference by</td>
                                    <td><?php echo $profile_record[0]['reference_by'] ?></td>
                                </tr>
                                <tr>
                                    <td>Joining Date</td>
                                    <td><?php echo date('d M Y', $profile_record[0]['date_join']) ?></td>
                                </tr>


                                </tbody>
                            </table>

                            <a href="#" class="btn btn-primary">My Sales Performance</a>
                            <a href="#" class="btn btn-primary">Team Sales Performance</a>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
                        <span class="pull-right">
                            <a href="#" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                            <a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                        </span>
                </div>

            </div>
        </div>
        <?php }elseif($loggedInUser == 'kafeel'){ ?>

            <div class="col-md-5  toppad  pull-right col-md-offset-3 ">
                <A href="#" >Edit Profile</A>

                <br>

            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >



                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?php echo $profile_record[0]['username'] ?><span class="text-info pull-right" >May 05,2014,03:00 pm </span></h3>

                    </div>




                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-3 col-lg-3 " align="center" style="min-height: 372px;">
                                <div class="col-md-12 img_div" align="center" id="img_div" >
                                    <img alt="User Pic" src="
                                    <?php
                                    if($profile_record[0]['profile_pic'] == ''){
                                        echo $root.'upload_imgs/no-image.jpg';
                                    }else{
                                        echo $root.$profile_record[0]['profile_pic'];
                                    } ?>
                                    " class="img-circle img-responsive">
                                    <button id="change_btn" type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#myModal">Change</button>
                                </div>
                                <div class="col-md-12">
                                    <ul class="nav nav-pills nav-stacked">
                                        <li class="active"><a data-toggle="pill"  href="#profile">Profile</a></li>
                                        <li><a data-toggle="pill"  href="#history">History</a></li>
                                        <li><a href="#">Menu 2</a></li>
                                        <li><a href="#">Menu 3</a></li>
                                    </ul>
                                </div>

                            </div>
                            <div class=" col-md-9 col-lg-9 ">
                                <div class="tab-content">
                                    <div id="profile" class="tab-pane fade in active">
                                        <table id="profile" class="table table-user-information">
                                            <tbody>
                                            <tr>
                                                <td>First Name:</td>
                                                <td><?php echo $profile_record[0]['fname'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Last Name:</td>
                                                <td><?php echo $profile_record[0]['lname'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Email Address:</td>
                                                <td><?php echo $profile_record[0]['email'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Phone No</td>
                                                <td>
                                                    <a href="#" class="edit-text" data-type="text" data-name="phone_no" data-title="Phone No" data-pk="<?php echo $profile_record[0]['uid'] ?>"><?php echo $profile_record[0]['cell_number'] ?></a>
                                                    <a href="#" class="edit" data-original-title="Edit this user" data-toggle="tooltip"><i class="glyphicon glyphicon-pencil"></i></a>
                                                </td>

                                            </tr>

                                            <tr>
                                                <td>Office No</td>
                                                <td>
                                                    <a href="#" class="edit-text" data-type="text" data-name="office_no" data-title="Phone No" data-pk="<?php echo $profile_record[0]['uid'] ?>"><?php echo $profile_record[0]['office_number'] ?></a>
                                                    <a href="#" class="edit" data-original-title="Edit this user" data-toggle="tooltip"><i class="glyphicon glyphicon-pencil"></i></a>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td>Address</td>
                                                <td>
                                                    <a href="#" class="edit-text" data-type="textarea" data-name="address" data-title="Address" data-pk="<?php echo $profile_record[0]['uid'] ?>"><?php echo $profile_record[0]['address'] ?></a>
                                                    <a href="#" class="edit" data-original-title="Edit this user" data-toggle="tooltip"><i class="glyphicon glyphicon-pencil"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>City</td>
                                                <td><?php echo $profile_record[0]['city'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Website</td>
                                                <td><?php echo $profile_record[0]['website'] ?></td>
                                            </tr>


                                            </tbody>
                                        </table>

                                    </div>
                                    <div id="history" class="tab-pane fade">
                                        <h3>Menu 1</h3>
                                        <p>Some content in menu 1.</p>
                                    </div>
                                    <div id="menu2" class="tab-pane fade">
                                        <h3>Menu 2</h3>
                                        <p>Some content in menu 2.</p>
                                    </div>
                                </div>

                                    </div>
                                <a href="#" class="btn btn-primary">My Sales Performance</a>
                                <a href="#" class="btn btn-primary">Team Sales Performance</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
                        <span class="pull-right">
                            <a href="edit.html" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                            <a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                        </span>
                    </div>

                </div>
            </div>
        <?php } ?>
    <div id="myModal" class="modal fade in" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Upload Image</h4>
                    <div class="modal-body">
                        <div class="row">
                            <form id="upload" action="<?php echo $root; ?>upload_pic/do_upload" method="post">
                                <p>Chose image</p>
                                <div class="col-md-12">
                                    <input type="file" name="userfile" id="image">
                                </div>
                                <div class="col-md-6 col-md-offset-5">
                                    <input type="submit" name="submit" value="upload" class="btn btn-default">
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script>
        function updateClock ( )
        {
            var currentTime = new Date ( );
            var currentHours = currentTime.getHours ( );
            var currentMinutes = currentTime.getMinutes ( );
            var currentSeconds = currentTime.getSeconds ( );

            // Pad the minutes and seconds with leading zeros, if required
            currentMinutes = ( currentMinutes < 10 ? "0" : "" ) + currentMinutes;
            currentSeconds = ( currentSeconds < 10 ? "0" : "" ) + currentSeconds;

            // Choose either "AM" or "PM" as appropriate
            var timeOfDay = ( currentHours < 12 ) ? "AM" : "PM";

            // Convert the hours component to 12-hour format if needed
            currentHours = ( currentHours > 12 ) ? currentHours - 12 : currentHours;

            // Convert an hours component of "0" to "12"
            currentHours = ( currentHours == 0 ) ? 12 : currentHours;

            // Compose the string for display
            var currentTimeString = currentHours + ":" + currentMinutes + ":" + currentSeconds + " " + timeOfDay;


            $(".text-info").html(currentTimeString);

        }
        $(document).ready(function() {
            var panels = $('.user-infos');
            var panelsButton = $('.dropdown-user');
            panels.hide();

            $('tr').hover(function(){
                $(this).find('.edit').show();
            },function() {
                $(this).find('.edit').hide();
            });

            $('.edit').click(function(){
                $(this).parent().find('.edit-text').editable({
                    url: '<?php echo $root; ?>editable_kafeel/update',
                    success: function(response, newValue){
                        if(response.status == 'error') return response.msg;
                    }
                });
            });

            $('#image').picEdit();

            $('[data-toggle="tooltip"]').tooltip();

            $('#myModal').on('hidden.bs.modal', function () {

                $.ajax({
                    url: "<?php echo $root.'upload_pic/get_img_name'; ?>",
                    success: function(e){
                        $('.img-circle').attr('src', e);
                    }

                });


            });
            $('#change_btn').hide();
            $('#img_div').hover(function(){
                $('#change_btn').show();
            },function(){
                $('#change_btn').hide();
            });
            setInterval('updateClock()', 1000);


        });
    </script>
    <br /><br /><br /><br />
</body>
   <?php include 'includes/footer.php'; ?>
