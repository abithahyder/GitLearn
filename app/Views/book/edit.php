<!Doctype html>
<html>
<head>
<title>CURD Application in Codelginiter</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.css');?>">
<link rel="stylesheet"type="text/css" href="<?php echo base_url('assets/css/style.css');?>">
</head>
<body>
    <div class="container-fluid bg-purple">
        <div class="container pb-2 pt-2">
            <div class="text-white h4"> CURD Operation Books </div>
        </div>
    </div>
<div class="bg-white shadow-sm">
    <div class="container">
        <div class="row">
            <nav class="nav nav-underline">
               <div class="nav-link">Books/Edit</div>
            </nav>
        </div>
    </div>
</div>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-12  text-right">
          <a href="<?= base_url('books');?>" class="btn btn-primary">Back</a>
        </div>

    </div>

</div>


<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-purple text-white">
                <div class="card-header-title">Edit Book</div>
            </div>
                <div class="card-body">
                <form name="create-form" id ="create-form" method="post" action="<?= base_url('books/edit/'.$book['id']) ?>">
                    
  <div class="mb-3">
    <label for="Name" class="form-label">Name</label>
    <input type="text" name="bname" class="form-control <?php echo (isset($validation) && $validation->hasError('bname'))? 'is-invalid':''?>" id="bname" placeholder="Name of Book" value="<?php echo set_value('bname',$book['title']);?>">
    <?php
   
    if(isset($validation) && $validation->hasError('bname')){

        echo '<p class="invalid-feedback">'.$validation->getError('bname').'</p>';
    }
 
    ?>
  </div>
  <div class="mb-3">
    <label for="author" class="form-label">Author</label>
    <input type="text" name="bauthor" class="form-control <?php echo (isset($validation) && $validation->hasError('bauthor'))? 'is-invalid':''?>" id="bauthor" placeholder="Writtten By" value="<?php echo set_value('bauthor',$book['author']);?>">
    <?php

   if(isset($validation) && $validation->hasError('bauthor')){
       echo '<p class="invalid-feedback">'.$validation->getError('bauthor'). '</p>';
   }

   ?>
</div>
  <div class="mb-3">
    <label for="issno" class="form-label">ISBN No:</label>
    <input type="text" name="bissno" class="form-control <?php echo (isset($validation) && $validation->hasError('bissno'))? 'is-invalid':''?> " id="bissno" placeholder="Enter issue No" value="<?php echo set_value('bissno',$book['issue_no']);?>">
    <?php
   
   if(isset($validation) && $validation->hasError('bissno')){
       echo '<p class="invalid-feedback">'.$validation->getError('bissno').'</p>';
   }

   ?>
</div>
 
  <div class="mb-3">
    <label for="bno" class="form-label">No of Books:</label>
    <input type="text" name="bno" class="form-control <?php echo (isset($validation) && $validation->hasError('bno'))? 'is-invalid':''?>" id="bno" placeholder="Enter No of Books" value="<?php echo set_value('bno',$book['book_stock']);?>">
    <?php
   
   if(isset($validation) && $validation->hasError('bno')){
       echo '<p class="invalid-feedback">'.$validation->getError('bno').'</p>';
   }

   ?>
</div>
  
  <button type="submit" class="btn btn-primary">Edit</button>
</form>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>

</body>
    </html>