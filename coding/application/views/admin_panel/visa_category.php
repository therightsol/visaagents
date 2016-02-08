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
                        <h1 class="page-header">Visa Categories</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading" style="background-color: #e8e8e8;">
                                <h4 class="form-section">Add New category</h4>
                            </div>
                            <?php if ($success_add != ''){ ?>
                                <div class="alert alert-success">
                                    New Visa category Added
                                </div>
                            <?php } ?>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <form  action="<?php echo $root; ?>admin_panel/visa_category" method="post">

                                    <div class="form-body">

                                        <div class="row">

                                            <div class="col-md-12">

                                                  <div class="form-group <?php if (isset($_POST['visa_category'])){ if(form_error('visa_category') != '') { ?> has-error <?php } } ?>">
                                                    <label class="control-label">Visa Category:</label>
                                                    <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="glyphicon glyphicon-user"></i>
                                                    </span>
                                                        <input type="text" class="form-control" name="visa_category" placeholder="Enter visa category" />


                                                    </div>
                                                      <?php if(isset($_POST['visa_category'])){
                                                          if (form_error('visa_category') != '') { ?>
                                                              <span class="help-block">
                                                            <?php echo form_error('visa_category'); ?>
                                                        </span>
                                                          <?php } }?>
                                                </div>
                                            </div>
                                            <div class="col-md-12">

                                                <div class="form-group <?php if (isset($_POST['description'])){ if(form_error('description') != '') { ?> has-error <?php } } ?>">
                                                    <label class="control-label">Visa Description:</label>
                                                    <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="glyphicon glyphicon-user"></i>
                                                    </span>
                                                        <input type="text" class="form-control" name="description" placeholder="Enter visa description" />


                                                    </div>
                                                    <?php if(isset($_POST['description'])){
                                                        if (form_error('description') != '') { ?>
                                                            <span class="help-block">
                                                            <?php echo form_error('description'); ?>
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
                                <h4 class="form-section">Update/delete Visa Category</h4>
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

                                    <form action="<?php echo base_url(); ?>admin_panel/visa_category" role="form" method="post">
                                        <table class="table table-striped table-bordered table-hover" id="localtable">
                                            <thead>
                                            <tr>
                                                <th style="width: 9%;">S.No</th>
                                                <th width="30%">Visa Category titles</th>
                                                <th>Category description</th>
                                                <th style="width: 9%;">Delete</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $i = 1;
                                            foreach($visa_categories as $key => $value){ ?>
                                                <tr class="gradeU">
                                                    <td class="text-center"><?php echo $i; ?></td>
                                                    <td><a href="#" class="category" data-name="update_title" data-tital="Visa Category" data-pk="<?php echo $value['vc_id']; ?>"><?php echo $value['vc_title']; ?></a></td>
                                                    <td><a href="#" class="category" data-name="update_description" data-tital="Category Description" data-pk="<?php echo $value['vc_id']; ?>"><?php echo $value['category_description']; ?></a></td>
                                                    <td class="text-center">
                                                        <input type="checkbox" name="del_id[]" value="<?php echo $value['vc_id']; ?>" />
                                                    </td>
                                                </tr>
                                                <?php $i++; } ?>
                                            </tbody>
                                        </table>
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
             $('.category').editable({
                 type: 'text',
                 url: '<?php echo $root; ?>admin_panel/visa_category',
                 success: function(response, newValue){
                     if(response.status == 'error') return response.msg;
                 }
             });

         });
     </script>
    <br /><br /><br /><br /></body>
   <?php include '/../includes/footer.php'; ?>
