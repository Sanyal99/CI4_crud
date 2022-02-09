<!DOCTYPE html>
<html>
<head>
    <title>CRUD Application</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css');?>">
</head>
<body>
    <div class="container-fluid bg-grey shadow-sm">
        <div class="container pb-2 pt-2">
            <div class="text-white h4">CRUD Application</div>
        </div>
    </div>
    <div class="bg-white shadow-sm">
        <div class="container">
            <div class="row">
                <nav class="nav nav-underline">
                    <div class="nav-link">Users / View</div>
                </nav>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12 text-right">
                <a href="<?php echo base_url('users/create')?>" class="btn btn-dark">ADD</a>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <div class="row">

            <div class="col-md-12">
                <?php 
                if(!empty($session->getFlashdata('success'))) {
                    ?>
                    <div class="alert alert-success">
                        <?php echo $session->getFlashdata('success');?>
                    </div>
                    <?php
                }
                ?>

                <?php 
                if(!empty($session->getFlashdata('error'))) {
                    ?>
                    <div class="alert alert-danger">
                        <?php echo $session->getFlashdata('error');?>
                    </div>
                    <?php
                }
                ?>
            </div>

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-grey text-white">
                        <div class="card-header-title">Users</div>                    
                    </div>

                    <div class="card-body">
                        <table class="table table-striped">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Contact_No</th>
                                <th width="150">Action</th>
                            </tr>

                            <?php if(!empty($user)) { 

                                foreach($user as $user) {
                            ?>

                            <tr>
                                <td><?php echo $user['id'];?></td>
                                <td><?php echo $user['name'];?></td>
                                <td><?php echo $user['email'];?></td>
                                <td><?php echo $user['contact_no'];?></td>
                                <td>
                                    <a href="<?php echo base_url('users/edit/'.$user['id']);?>" class="btn btn-secondary btn-sm">Edit</a>
                                    <a href="#" onclick="deleteConfirm(<?php echo $user['id']?>);" class="btn btn-dark btn-sm">Delete</a>
                                </td>
                            </tr>

                            <?php } 
                            } else {?>
                                <tr>
                                    <td colspan="5">Records not found</td>
                                </tr>
                            <?php } ?>

                            
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>

<script>
    function deleteConfirm(id){
        if (confirm("Are you sure you want to delete?")) {
            window.location.href='<?php echo base_url('users/delete/')?>/'+id;
        }
    }
</script>