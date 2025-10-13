<div class="nav-tabs-sticky-pi margin_bottom common-padding sticky-min-height3">


    <div role="tabpanel" id="liabilities_tab">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist" id="myTab">
           
            <li role="presentation" class="active" id="profileTab"><a href="#profile" role="tab" data-toggle="tab" title="">Add Employee</a>
            </li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
        <div class="form-cantainer">
        <br><br><br><br>
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <form action="<?php echo Yii::app()->baseUrl."/index.php/customers/employee";?>" method="post" id="employeeForm">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="<?php if(isset($name)) echo $name?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="email@example.com" value="<?php if(isset($email)) echo $email?>">
                    </div>
                    <div class="form-group">
                        <label for="designation">Designation</label>
                        <input type="text" name="designation" class="form-control" id="designation"  placeholder="Designation" value="<?php if(isset($desig)) echo $desig?>">
                    </div>
                    <div class="form-group">
                        <label for="tin">TIN</label>
                        <input type="text" name="tin" class="form-control" id="tin" placeholder="TAX IDENTIFICATION NUMBER" value="<?php if(isset($etin)) echo $etin?>">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success pull-right" type="submit" name="btnSubmit">Save</button>
                    </div>
                </form>
            </div>  
            <div class="col-md-2"></div>
        </div>            
        <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<script>
$('#employeeForm').submit(function(e){
    var name = $('#name').val();
    var email = $('#email').val();
    var designation = $('#designation').val();
    var tin = $('#tin').val();

    if (name == "") {
        alert("NAME must be filled out");
        e.preventDefault();
    }else if(email == "") {
        alert("EMAIL must be filled out");
        e.preventDefault();
    }else if(designation == "") {
        alert("DESIGNATION must be filled out");
        e.preventDefault();
    }else if(tin == "") {
        alert("TAX IDENTIFICATION NUMBER must be filled out");
        e.preventDefault();
    }

    // alert('azad');
    // e.preventDefault();
});
</script>