<?php include '/../includes/header.php' ; ?>
<?php include '/../includes/top_header.php' ; ?>

<?php
$loggedInUser = $this->session->userdata('loggedInUser');

// change menu according to privillages

if($loggedInUser == 'admin'){
  include '/../includes/admin_menu.php';
} ?>

<body>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1>User information</h1>
      </div>
      <?php if($success_del != ''){ ?>
        <div class="alert alert-success">
          <p class="text-center">Successfully deleted.</p>
        </div>
      <?php }
      if($notdel != ''){ ?>
        <div class="alert alert-danger">
          <p class="text-center">Error! during deleting user! <br> kindly try again</p>
        </div>
      <?php } ?>
      <div class="col-lg-12">
        <div class="panel panel-default z-depth-1">
          <div class="panel-heading" style="background-color: darkseagreen;">
            Delete/Approve users
          </div>
          <!-- /.panel-heading -->
          <div class="panel-body">
            <div class="dataTable_wrapper">

              <?php if($success_approved != ''){ ?>
                <div class="alert alert-success">
                  <p class="text-center">Successfully Approved.</p>
                </div>
              <?php }
              if($not_approved != ''){ ?>
                <div class="alert alert-danger">
                  <p class="text-center">Error! during Approval!<br> kindly try again</p>
                </div>
              <?php } ?>
              <form action="<?php echo base_url(); ?>admin_panel/user" role="form" method="post">
                <table class="table table-striped table-bordered table-hover" id="unapprovetable">
                  <thead>
                  <tr>
                    <th>S.No</th>
                    <th>User name</th>
                    <th>Email address</th>
                    <th>Approve</th>
                    <th>Delete</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $i = 1;
                  foreach($allusers as $key => $value){
                    if($value['is_admin_approved'] == 0){
                    ?>
                    <tr class="gradeU">
                      <td class="text-center"><?php echo $i; ?></td>
                      <td><?php echo $value['username']; ?></td>
                      <td><?php echo $value['email']; ?></td>
                      <td class="text-center">
                        <input type="checkbox" name="app[]" value="<?php echo $value['uid']; ?>" />
                      </td>
                      <td class="text-center">
                        <input type="checkbox" name="del[]" value="<?php echo $value['uid']; ?>" />
                      </td>
                    </tr>
                  <?php $i++; } } ?>
                  </tbody>
                </table>
                <br />
                <div class="col-md-6 col-md-offset-5">
                  <input type="submit" value="Submit" class="btn btn-primary" />
                </div>

              </form>
            </div>
          </div>
          <!-- /.panel-body -->
        </div>
      </div>
      <!-- /.panel -->
    </div>




    <div class="row" style="margin-top: 3%;">
      <div class="col-md-6">
      <div class="col-md-12">
        <h1>Kafeel</h1>
      </div>
      <div class="col-md-12">

        <div class="panel panel-default">
          <div class="panel-heading" style="background-color: darkseagreen;" >
            View/Delete
          </div>
          <!-- /.panel-heading -->
          <div class="panel-body">
            <div class="dataTable_wrapper">
              <form action="<?php echo base_url(); ?>admin_panel/user" role="form" method="post">
                <table class="table table-striped table-bordered table-hover" id="kafeeltable">
                  <thead>
                  <tr>
                    <th>S.No</th>
                    <th>User name</th>
                    <th>Email address</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $i = 1;
                  foreach($allusers as $key => $value){
                    if($value['is_kafeel'] == 1){
                      ?>
                      <tr class="gradeU">
                        <td class="text-center"><?php echo $i; ?></td>
                        <td><a href="<?php echo $root.'admin_panel/update_user_profile/'.$value['uid']; ?>" data-toggle="tooltip" data-placement="top" title="Click to update user"><?php echo $value['username']; ?></a></td>
                        <td><?php echo $value['email']; ?></td>
                      </tr>
                      <?php $i++; } } ?>
                  </tbody>
                </table>
            </div>
          </div>
          <!-- /.panel-body -->
        </div>
      </div>
      </div>
      <!-- /.panel -->
      <div class="col-md-6">
      <div class="col-md-12">
        <h1>Local User</h1>
      </div>
      <div class="col-md-12">

        <div class="panel panel-default">
          <div class="panel-heading" style="background-color: darkseagreen;">
            View/Delete
          </div>
          <!-- /.panel-heading -->
          <div class="panel-body">
            <div class="dataTable_wrapper">
                <table class="table table-striped table-bordered table-hover" id="localtable">
                  <thead>
                  <tr>
                    <th>S.No</th>
                    <th>User name</th>
                    <th>Email address</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $i = 1;
                  foreach($allusers as $key => $value){
                    if($value['is_local_user'] == 1){
                      ?>
                      <tr class="gradeU">
                        <td class="text-center"><?php echo $i; ?></td>
                        <td><a href="<?php echo $root.'admin_panel/update_user_profile/'.$value['uid']; ?>" data-toggle="tooltip" data-placement="top" title="Click to update user"><?php echo $value['username']; ?></a></td>
                        <td><?php echo $value['email']; ?></td>
                      </tr>
                      <?php $i++; } } ?>
                  </tbody>
                </table>
            </div>
          </div>
          <!-- /.panel-body -->
        </div>
      </div>
      </div>
      <!-- /.panel -->
    </div>



    <div class="row" style="margin-top: 3%;">
      <div class="col-md-12">
        <h1>Set Privileges</h1>
      </div>
      <div class="col-lg-12">
        <div class="panel panel-default z-depth-4">
          <div class="panel-heading" style="background-color: firebrick;">
            Delete/Approve users
          </div>
          <!-- /.panel-heading -->
          <div class="panel-body">
            <div class="dataTable_wrapper">
              <form action="<?php echo base_url(); ?>admin_panel/user" role="form" method="post">
                <table class="table table-striped table-bordered table-hover" id="privilagetable">
                  <thead>
                  <tr>
                    <th>S.No</th>
                    <th>User name</th>
                    <th>Email address</th>
                    <th>privilege</th>
                    <th>Delete</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $i = 1;
                  foreach($allusers as $key => $value){
                    if($value['is_admin_approved'] == 1){
                      ?>
                      <tr class="gradeU">
                        <td class="text-center"><?php echo $i; ?></td>
                        <td><?php echo $value['username']; ?></td>
                        <td><?php echo $value['email']; ?></td>
                        <td class="text-center">
                          <?php
                          if($value['is_local_user'] == 1){ ?>
                            <a style="color: green;" href="#" class="privilege" data-type="select" data-source="[{value: 'is_local_user', text: 'local_user'},{value: 'is_kafeel', text: 'kafeel'}]" data-name="privilege" data-pk="<?php echo $value['uid']; ?>" data-value="is_local_user" data-original-title="Select Privilege">
                              Local User
                            </a>
                            <?php }elseif($value['is_kafeel'] == 1){ ?>
                            <a style="color: #006dcc;" href="#" class="privilege" data-type="select" data-source="[{value: 'is_local_user', text: 'local_user'},{value: 'is_kafeel', text: 'kafeel'}]" data-name="privilege" data-pk="<?php echo $value['uid']; ?>" data-value="is_kafeel" data-original-title="Select Privilege">
                              Kafeel
                            </a>
                        <?php }else{ ?>
                            <a href="#" class="privilege" data-type="select" data-source="[{value: 'is_local_user', text: 'local_user'},{value: 'is_kafeel', text: 'kafeel'}]" data-name="privilege" data-pk="<?php echo $value['uid']; ?>" data-value="not Set" data-original-title="Select Privilege">
                              Not Set
                            </a>
                          <?php } ?>

                        </td>
                        <td class="text-center">
                          <a href="#" class="delete" data-type="checklist" data-source="[{value: 'delete', text: 'Confirm'}]" data-name="delete_user" data-title="Delete user" data-pk="<?php echo $value['uid']; ?>">Delete</a>
                        </td>
                      </tr>
                      <?php $i++; } } ?>
                  </tbody>
                </table>
                <br />
                <div class="col-md-6 col-md-offset-5">
                  <input type="submit" value="Submit" class="btn btn-primary" />
                </div>

              </form>
            </div>
          </div>
          <!-- /.panel-body -->
        </div>
      </div>
      <!-- /.panel -->
    </div>

  </div>
<script>
  $(document).ready(function(){
    $('.privilege').editable({
      url: '<?php echo $root; ?>admin_panel/privileges',
      success: function(response, newValue){
        if(response.status == 'error') return response.msg;
      }
    });
    $('.delete').editable({
      url: '<?php echo $root; ?>admin_panel/privileges',
      success: function(response, newValue){
        if(response.status == 'error') return response.msg;
        else
          location.reload();
      }
    });
    $('[data-toggle="tooltip"]').tooltip();
  });
</script>
</body>
    <?php include '/../includes/footer.php'; ?>


