<?php include '/../includes/header.php'; ?>
<?php include '/../includes/top_header.php'; ?>

<?php
$loggedInUser = $this->session->userdata('loggedInUser');

// change menu according to privillages

if($loggedInUser == 'admin'){
    include '/../includes/admin_menu.php';
}else if($loggedInUser == 'local_user'){
    include '/../includes/local_user_menu.php';
}else if($loggedInUser == 'kafeel'){
    include '/../includes/kafeel_menu.php';
} else {
    include '/../includes/anonymous_menu.php';
} ?>

<body>

     <div class="container" >
        <div class="row" >  
            <div class="col-md-12">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Visa Professions</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading" style="background-color: #e8e8e8;">
                                <h4 class="form-section">Add New Profession</h4>
                            </div>
                            <?php if ($success_add != ''){ ?>
                                <div class="alert alert-success">
                                    New Visa Profession Added
                                </div>
                            <?php } ?>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <form  action="<?php echo $root; ?>admin_panel/visa_profession" method="post">

                                    <div class="form-body">

                                        <div class="row">

                                            <div class="col-md-12">

                                                  <div class="form-group <?php if (isset($_POST['visa_profession'])){ if(form_error('visa_profession') != '') { ?> has-error <?php } } ?>">
                                                    <label class="control-label">Visa Profession:</label>
                                                    <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="glyphicon glyphicon-user"></i>
                                                    </span>
                                                        <input type="text" class="form-control" name="visa_profession" placeholder="Enter Profession" />


                                                    </div>
                                                      <?php if(isset($_POST['visa_profession'])){
                                                          if (form_error('visa_profession') != '') { ?>
                                                              <span class="help-block">
                                                            <?php echo form_error('visa_profession'); ?>
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
                                <h4 class="form-section">Update/delete Visa Profession</h4>
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

                                    <form action="<?php echo base_url(); ?>admin_panel/visa_profession" role="form" method="post">
                                        <table class="table table-striped table-bordered table-hover" id="localtable">
                                            <thead>
                                            <tr>
                                                <th style="width: 9%;">S.No</th>
                                                <th>Visa Professions</th>
                                                <th style="width: 9%;">Delete</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $i = 1;
                                            foreach($visa_professions as $key => $value){ ?>
                                                <tr class="gradeU">
                                                    <td class="text-center"><?php echo $i; ?></td>
                                                    <td><a href="#" class="profession" data-name="profession" data-tital="Visa Profession" data-pk="<?php echo $value['vp_id']; ?>"><?php echo $value['vp_profession']; ?></a></td>
                                                    <td class="text-center">
                                                        <input type="checkbox" name="vp_id[]" value="<?php echo $value['vp_id']; ?>" />
                                                    </td>
                                                </tr>
                                                <?php $i++; } ?>
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
             $('.profession').editable({
                 type: 'text',
                 url: '<?php echo $root; ?>admin_panel/visa_profession',
                 success: function(response, newValue){
                     if(response.status == 'error') return response.msg;
                 }
             });

         });
     </script>
    <br /><br /><br /><br /></body>
   <?php include '/../includes/footer.php'; ?>
