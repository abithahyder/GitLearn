<?php include('header.php')?>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-12  text-right">
          <a href="" class="btn btn-primary">Back</a>
        </div>

    </div>

</div>


<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-purple text-white">
                <div class="card-header-title">Add Membership</div>
            </div>
                <div class="card-body">
                <form name="create-form-3" id ="create-form-3" method="post">
                    
  <div class="mb-3">
    <label for="Name" class="form-label">Name</label>
    <input type="text" name="mname" class="form-control <?php echo (isset($validation) && $validation->hasError('mname'))? 'is-invalid':''?>" id="mname" placeholder="Name of Member" value="<?php echo set_value('mname');?>">
    <?php
   
    if(isset($validation) && $validation->hasError('mname')){

        echo '<p class="invalid-feedback">'.$validation->getError('mname').'</p>';
    }
 
    ?>
  </div>
  <div class="mb-3">
    <label for="midno" class="form-label">Member Id no</label>
    <input type="text" name="midno" class="form-control <?php echo (isset($validation) && $validation->hasError('midno'))? 'is-invalid':''?>" id="midno" value="<?php echo set_value('midno');?>" placeholder="Library id no" >
    <?php
   
   if(isset($validation) && $validation->hasError('midno')){

       echo '<p class="invalid-feedback">'.$validation->getError('midno').'</p>';
   }

   ?>
</div>
  <div class="mb-3">
    <label for="issno" class="form-label">Age:</label>
    <input type="text" name="mage" class="form-control <?php echo (isset($validation) && $validation->hasError('mage'))? 'is-invalid':''?>" value="<?php echo set_value('mage');?>"  id="mage" placeholder="Enter age" >
    <?php
   
   if(isset($validation) && $validation->hasError('mage')){

       echo '<p class="invalid-feedback">'.$validation->getError('mage').'</p>';
   }

   ?>
</div>
<div class="mb-3">
    <label for="issno" class="form-label">Address:</label>
    <textarea class="form-control <?php echo (isset($validation) && $validation->hasError('maddress'))? 'is-invalid':''?>" id="maddress" placeholder="Address" value="<?php echo set_value('maddress');?>"  name="maddress" placeholder="address"></textarea>
    <?php
   
   if(isset($validation) && $validation->hasError('maddress')){

       echo '<p class="invalid-feedback">'.$validation->getError('maddress').'</p>';
   }

   ?>
    
</div>
<div class="mb-3">
    <label for="issno" class="form-label">Phone number:</label>
    <input type="text" name="mphone" class="form-control <?php echo (isset($validation) && $validation->hasError('mphone'))? 'is-invalid':''?> " id="mphone" placeholder="Enter mobile" value="<?php echo set_value('mphone');?>">
    <?php
   
   if(isset($validation) && $validation->hasError('mphone')){

       echo '<p class="invalid-feedback">'.$validation->getError('mphone').'</p>';
   }

   ?>
</div>
 
  
  <button type="submit" class="btn btn-primary">Add</button>
</form>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>

<?php include('footer.php')?>