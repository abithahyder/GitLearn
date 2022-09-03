<div class="container mt-4">
    <div class="row" >
        <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-purple text-white">
                <div class="card-header-title">Issue Book</div>
            </div>
                <div class="card-body">
                <form name="create-form" id ="create-form" method="post">
                <div class="mb-3">
    <label for="Name" class="form-label">Member Id</label>

  
    <select name="mid" class="form-control">
        <option>Select member id</option>
        <?php if(!empty($memid)){
           foreach($memid as $a){?>

<option class="form-control" value="<?=$a['mid'];?>"><?= $a['Id_num'];?></option>


<?php }} ?>
       
     

    </select>
  <input type="hidden" value="in" name="mtype"/>
  </div>
  <div class="mb-3">
    <label for="Name" class="form-label">Select book</label>
    <select class="form-control" name="bid">
      <option value="">select book</option>
      <?php if(!empty($book)){
        foreach($book as $b){
        ?>
        <option value="<?= $b['id'];?>"><?php echo $b['title'].'('.$b['issue_no'].')';?></option>
<?php }}?>

    </select>
  
  </div>
  <button type="submit" class="btn btn-primary">Add</button>
  </form>
        </div>
    </div>
</div>