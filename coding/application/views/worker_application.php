<?php include 'includes/header.php'; ?>
<?php include 'includes/top_header.php'; ?>

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

     <div class="container" >
        <div class="row" >  
            <div class="col-md-12">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Worker Application</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading" style="background-color: #e8e8e8;">
                                <h4 class="form-section">Add New Worker Application</h4>
                            </div>
                            <?php if ($success_add != ''){ ?>
                                <div class="alert alert-success">
                                    New Worker Application Added
                                </div>
                            <?php } ?>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <form  action="<?php echo $root; ?>worker_application" method="post">

                                    <div class="form-body">

                                        <div class="row">

                                            <div class="col-md-12">
                                                <div class="form-group <?php if (isset($_POST['application_code'])){ if(form_error('application_code') != '') { ?> has-error <?php } } ?>">
                                                    <label class="control-label">Worker CNIC:</label>
                                                    <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-chevron-right"></i>
                                                    </span>
                                                        <select id="cnic" name="application_code" class="form-control">
                                                            <?php foreach ($application as $key => $value){
                                                                if($value['status_id'] == '' || $value['status_id'] == null){
                                                                ?>
                                                                <option></option>
                                                                <option value="<?php echo $value['application_code']; ?>"><?php echo $value['application_code']; ?></option>
                                                           <?php } } ?>
                                                        </select>
                                                    </div>
                                                    <?php if(isset($_POST['application_code'])){
                                                        if (form_error('application_code') != '') { ?>
                                                            <span class="help-block">
                                                            <?php echo form_error('application_code'); ?>
                                                        </span>
                                                        <?php } }?>
                                                </div>
                                                  <div class="form-group <?php if (isset($_POST['application'])){ if(form_error('application') != '') { ?> has-error <?php } } ?>">
                                                    <label class="control-label">Worker Application Status:</label>
                                                    <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-chevron-right"></i>
                                                    </span>
                                                        <textarea class="form-control" name="application" ><?php if(isset($_POST['application'])){  echo $_POST['application']; } ?></textarea>

                                                    </div>
                                                      <?php if(isset($_POST['application'])){
                                                          if (form_error('application') != '') { ?>
                                                              <span class="help-block">
                                                            <?php echo form_error('application'); ?>
                                                        </span>
                                                          <?php } }?>
                                                </div>
                                            </div>


                                            <div class="col-md-2 col-md-offset-4">
                                                <div class="form-actions right">
                                                    <button type="reset" class="btn blue"><i class="fa fa-refresh"></i> Reset</button>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-md-offset-1">
                                                <div class="form-actions left">
                                                    <button type="submit" class="btn blue"><i class="fa fa-check"></i>Submit</button>
                                                </div>
                                            </div>



                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default" style="margin-top: 4%;">
                            <div class="panel-heading" style="background-color: #e8e8e8;">
                                <h4 class="form-section">Update/delete Worker Application</h4>
                            </div>
                            <?php if ($success_del != ''){ ?>
                                <div class="alert alert-success">
                                    Feature Deleted.
                                </div>
                            <?php } ?>
                            <?php if ($notdel != ''){ ?>
                                <div class="alert alert-danger">
                                    Error! while deleting features!
                                </div>
                            <?php } ?>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="dataTable_wrapper">

                                    <form action="<?php echo base_url(); ?>worker_application" role="form" method="post">
                                        <table class="table table-striped table-bordered table-hover" id="localtable">
                                            <thead>
                                            <tr>
                                                <th style="width: 9%;">S.No</th>
                                                <th>Worker Application</th>
                                                <th style="width: 9%;">Delete</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $i = 1;
                                            foreach($application as $key => $value){

                                            if($value['status_id'] != '' || $value['status_id'] != null){
                                                ?>
                                                <tr class="gradeU">
                                                    <td class="text-center"><?php echo $i; ?></td>
                                                    <td><a href="#" class="application" data-name="application" data-tital="Worker Application" data-pk="<?php echo $value['as_id']; ?>"><?php echo $value['as_status']; ?></a></td>
                                                    <td class="text-center">
                                                        <input type="checkbox" name="as_id[]" value="<?php echo $value['as_id']; ?>" />
                                                    </td>
                                                </tr>
                                                <?php $i++; } } ?>
                                            </tbody>
                                        </table>
                                        <input type="hidden" name="del" />
                                        <input type="submit" value="Delete" name="del" class="btn btn-danger btn-block" />
                                    </form>
                                </div>
                            </div>
                            <!-- /.panel-body -->
                        </div>
                    </div>
                    <!-- /.panel -->
                </div>


    
            </div>
        </div>
          
     </div>
     <script>
         $(document).ready(function(){
             $('#cnic').select2({
                 placeholder: "Select Worker CNIC",
                 minimumInputLength: 1,
                 allowClear: true
             });
             $('.application').editable({
                 type: 'text',
                 url: '<?php echo $root; ?>worker_application',
                 success: function(response, newValue){
                     if(response.status == 'error') return response.msg;
                 }
             });

         });
     </script>
    <br /><br /><br /><br /></body>
   <?php include 'includes/footer.php'; ?>
