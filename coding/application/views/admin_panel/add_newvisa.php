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
                <form  action="<?php echo $root; ?>AddVisa" method="post">
                                                        
                   <div class="form-body">
                       <h2 class="form-section">Add New Visa</h2>
                                    <div class="row">
                                        <div class="col-md-6">
                                            
                                           <div class="form-group" > 
                                                <label class="control-label">Date:</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="glyphicon glyphicon-calendar"></i>
                                                    </span> 
                                                    <input type="date" class="form-control" name="date"  />
                                                          
                                                           
                                                </div> 
                                                
                                            </div>  
                                            
                                            
                                        </div>
                                        <div class="col-md-6">
                                            
                                           <div class="form-group" > 
                                                <label class="control-label">Kafeel Name:</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="glyphicon glyphicon-user"></i>
                                                    </span> 
                                                    <input type="text" class="form-control" name="kafeel_name" placeholder="Enter Name" />
                                                          
                                                           
                                                </div> 
                                                
                                            </div>  
                                            
                                            
                                        </div>
                                        <div class="col-md-6">
                                            
                                           <div class="form-group" > 
                                                <label class="control-label">Visa profession:</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="glyphicon glyphicon-user"></i>
                                                    </span> 
                                                    <select name="visa_profession" class="form-control js-data-example-ajax">
                                                        <option> labour </option>
                                                        <option> Doctor </option>
                                                    </select>
                                                          
                                                           
                                                </div> 
                                                
                                            </div>  
                                            
                                            
                                        </div>
                                         <div class="col-md-6">
                                            
                                           <div class="form-group" > 
                                                <label class="control-label">Number of Visas:</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-list-ol"></i>
                                                    </span> 
                                                    <input type="number" class="form-control" name="no_of_visas" />
                                                          
                                                           
                                                </div> 
                                                
                                            </div>  
                                            
                                            
                                        </div>
                                         <div class="col-md-6">
                                            
                                           <div class="form-group" > 
                                                <label class="control-label">Visa Price:</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-money"></i>
                                                    </span> 
                                                    <input type="text" class="form-control" name="visa_price" />
                                                          
                                                           
                                                </div> 
                                                
                                            </div>  
                                            
                                            
                                        </div>
                                           <div class="col-md-6">
                                            
                                           <div class="form-group" > 
                                                <label class="control-label">Visa Category:</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="glyphicon glyphicon-user"></i>
                                                    </span> 
                                                    <select name="visa_category" class="form-control">
                                                        <option> Monthly</option>
                                                        <option> Work with kafeel </option>
                                                    </select>
                                                          
                                                           
                                                </div> 
                                                
                                            </div>  
                                            
                                            
                                        </div>
                                        <div class="col-md-6 col-md-offset-3">
                                            
                                           <div class="form-group" > 
                                                <label class="control-label">Comments:</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-comment"></i>
                                                    </span> 
                                                    <textarea name="comment" class="form-control" rows="10" style="resize:none"></textarea>
                                                          
                                                           
                                                </div> 
                                                
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
<script>
    $(document).ready(function () {
        $(".js-data-example-ajax").select2({
            ajax: {
                url: "https://api.github.com/search/repositories",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        q: params.term, // search term
                        page: params.page
                    };
                },
                processResults: function (data, params) {
                    // parse the results into the format expected by Select2
                    // since we are using custom formatting functions we do not need to
                    // alter the remote JSON data, except to indicate that infinite
                    // scrolling can be used
                    params.page = params.page || 1;

                    return {
                        results: data.items,
                        pagination: {
                            more: (params.page * 30) < data.total_count
                        }
                    };
                },
                cache: true
            },
            escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
            minimumInputLength: 1,
            templateResult: formatRepo, // omitted for brevity, see the source of this page
            templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
        });
    })
</script>
    <br /><br /><br /><br /></body>
   <?php include '/../includes/footer.php'; ?>
