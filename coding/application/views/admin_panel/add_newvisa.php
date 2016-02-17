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
                <form  action="<?php echo $root; ?>admin_panel/add_visa" method="post">
                                                        
                   <div class="form-body">
                       <h2 class="form-section">Add New Visa</h2>
                                    <div class="row">
                                        <?php if ($success == ''){ ?>
                                        <div class="col-md-12">
                                        <div class="col-md-6">
                                            
                                           <div class="form-group <?php if($_POST){ if (form_error('date')) { ?> has-error <?php } } ?>" >
                                                <label class="control-label">Date:</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="glyphicon glyphicon-calendar"></i>
                                                    </span> 
                                                    <input type="text"  class="form-control date" name="date" value="<?php if ($_POST){ echo set_value('date'); }; ?>" />

                                                </div>
                                               <?php if($_POST){
                                                   if (form_error('date') != '') { ?>
                                                       <span class="help-block">
                                                            <?php echo form_error('date'); ?>
                                                        </span>
                                                   <?php } }?>
                                                
                                            </div>  
                                            
                                            
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group  <?php if($_POST){ if (form_error('kafeel_code') != '') { ?> has-error <?php } } ?> " >
                                                <label class="control-label">Kafeel Code:</label>
                                                <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-user"></i>
                                                </span>
                                                            <select name="kafeel_code" id="kafeel_code" class="form-control" ></select>
                                                        </div>
                                                        <?php
                                                        if($_POST){
                                                            if (form_error('kafeel_code') != '') { ?>
                                                                <span class="help-block">
                                                    <?php echo form_error('kafeel_code'); ?>
                                                </span>
                                                    <?php } } ?>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="col-md-12">
                                        <div class="col-md-6">
                                            
                                           <div class="form-group <?php if($_POST){ if (form_error('visa_profession')) { ?> has-error <?php } } ?>" >
                                                <label class="control-label">Visa profession:</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="glyphicon glyphicon-user"></i>
                                                    </span>
                                                    <select name="visa_profession" class="form-control get_profession"> </select>

                                                </div>
                                               <?php if($_POST){
                                                   if (form_error('visa_profession') != '') { ?>
                                                       <span class="help-block">
                                                            <?php echo form_error('visa_profession'); ?>
                                                        </span>
                                                   <?php } }?>
                                            </div>
                                        </div>

                                         <div class="col-md-6">
                                            
                                           <div class="form-group <?php if($_POST){ if (form_error('no_of_visas')) { ?> has-error <?php } } ?>" >
                                                <label class="control-label">Number of Visas:</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-list-ol"></i>
                                                    </span> 
                                                    <input type="number" class="form-control" name="no_of_visas" value="<?php if ($_POST){ echo set_value('no_of_visas'); }; ?>" />

                                                </div>
                                               <?php if($_POST){
                                                   if (form_error('no_of_visas') != '') { ?>
                                                       <span class="help-block">
                                                            <?php echo form_error('no_of_visas'); ?>
                                                        </span>
                                                   <?php } }?>
                                            </div>  
                                            
                                            
                                        </div>
                                            </div>
                                        <div class="col-md-12">
                                         <div class="col-md-6">
                                            
                                           <div class="form-group <?php if($_POST){ if (form_error('visa_price')) { ?> has-error <?php } } ?>" >
                                                <label class="control-label">Visa Price:</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-money"></i>
                                                    </span> 
                                                    <input type="text" class="form-control" name="visa_price" value="<?php if ($_POST){ echo set_value('visa_price'); }; ?>" />

                                                </div>
                                               <?php if($_POST){
                                                   if (form_error('visa_price') != '') { ?>
                                                       <span class="help-block">
                                                            <?php echo form_error('visa_price'); ?>
                                                        </span>
                                                   <?php } }?>
                                            </div>  
                                            
                                            
                                        </div>
                                           <div class="col-md-6">
                                            
                                           <div class="form-group <?php if($_POST){ if (form_error('visa_category')) { ?> has-error <?php } } ?>" >
                                                <label class="control-label">Visa Category:</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-chevron-right"></i>
                                                    </span> 
                                                    <select name="visa_category" class="form-control get_category"></select>

                                                </div>
                                               <?php if($_POST){
                                                   if (form_error('visa_category') != '') { ?>
                                                       <span class="help-block">
                                                            <?php echo form_error('visa_category'); ?>
                                                        </span>
                                                   <?php } }?>
                                            </div>  
                                            
                                            
                                        </div>
                                            </div>
                                        <div class="col-md-6 col-md-offset-3">
                                            
                                           <div class="form-group <?php if($_POST){ if (form_error('comment')) { ?> has-error <?php } } ?>" >
                                                <label class="control-label">Comments:</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-comment"></i>
                                                    </span> 
                                                    <textarea name="comment" class="form-control" rows="10" style="resize:none"><?php if ($_POST){ echo set_value('comment'); }; ?></textarea>

                                                </div>
                                               <?php if($_POST){
                                                   if (form_error('comment') != '') { ?>
                                                       <span class="help-block">
                                                            <?php echo form_error('comment'); ?>
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
                                   
                                   <?php }else{ ?>
                                        <div class="alert alert-success">
                                            Visa inserted Successfully <br>
                                            <a href="<?php echo $root; ?>admin_panel/add_visa">Click here to go back</a>
                                        </div>
                                        <?php } ?>
                       
                                    </div>
                      </div>
                </form>
    
            </div>
        </div>
          
     </div>
<script>
    $(document).ready(function () {
        $("#kafeel_code").select2({
            ajax: {
                url: "<?php echo $root; ?>search/kafeel_code",
                type: "POST",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        kafeel_code: params.term
                    };
                },
                processResults: function (data) {
                    return {
                        results: data
                    };
                },
                cache: true

            },
            escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
            minimumInputLength: 1, // omitted for brevity, see the source of this page
            placeholder: "Select a profession"
        });
        $(".get_profession").select2({
            ajax: {
                url: "<?php echo $root; ?>search/visa_profession",
                type: "POST",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        profession: params.term
                    };
                },
                processResults: function (data) {
                    return {
                        results: data
                    };
                },
                cache: true
            },
            escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
            minimumInputLength: 1, // omitted for brevity, see the source of this page
            placeholder: "Select a profession"
        });

    $(".get_category").select2({
        ajax: {
            url: "<?php echo $root; ?>search/visa_category",
            type: "POST",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    category: params.term
                };
            },
            processResults: function (data) {
                return {
                    results: data
                };
            },
            cache: true

        },
        escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
        minimumInputLength: 1, // omitted for brevity, see the source of this page
        placeholder: "Select a profession"
    });
    });
</script>
    <br /><br /><br /><br /></body>
   <?php include '/../includes/footer.php'; ?>
