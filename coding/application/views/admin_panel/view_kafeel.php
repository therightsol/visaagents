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
        <div class="panel panel-default">
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
  });
</script>
</body>
    <?php include '/../includes/footer.php'; ?>


