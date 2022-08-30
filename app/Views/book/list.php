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
               <div class="nav-link">Books/View</div>
            </nav>
        </div>
    </div>
</div>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-12  text-right">
          <a href="<?php echo base_url('books/create');?>" class="btn btn-primary">ADD</a>
        </div>

    </div>

</div>


<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <?php
            if(!empty($session->getFlashdata('success'))){
                ?>
                <div class="alert alert-success">
                    <?php echo $session->getFlashdata('success'); ?>
                </div>
                <?php
            }
            ?>
        </div>
        <div class="col-md-12">
            <?php
            if(!empty($session->getFlashdata('error'))){
                ?>
                <div class="alert alert-danger">
                    <?php echo $session->getFlashdata('error'); ?>
                </div>
                <?php
            }
            ?>
        </div>
        <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-purple text-white">
                <div class="card-header-title">Books</div>
            </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>ISBN No</th>
                            <th>Author</th>
                            <th>Stocks</th>
                             <th width="100">Action</th>
                        </tr>
                        <?php if(!empty($books)) {
                            $i=0;
                            foreach($books as $book):
                                $i++;
                            ?>
                        <tr>
                            <td> <?= $i;?></td>
                            <td><?= $book['title'];?></td>
                            <td><?= $book['issue_no'];?></td>
                            <td><?= $book['author']?></td>
                            <td><?= $book['book_stock'];?></td>
                        
                            <td>
                                <a href="<?= base_url('books/edit/'.$book['id']);?>" class="btn btn-primary">Edit</a>
                                <a href="#" onclick="deleteConfirm(<?= $book['id'];?>)" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                            
                        <?php 
                            endforeach;                  
                    } else{?>
                            <tr>
                                <td colspan="5">Record Not found</td>

                            </tr>
                           
                            <?php  var_dump($books);}?>
                    </table>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>

</body>
    </html>
    <script>
        function deleteConfirm(id){
            if(confirm("Are you sure you want to delete")){
                window.location.href='<?php echo base_url('books/delete')?>'+"/"+id;
            }
        }

    </script>