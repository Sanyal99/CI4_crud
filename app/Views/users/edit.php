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
                    <div class="nav-link">Users / Edit</div>
                </nav>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12 text-right">
                <a href="<?php echo base_url('users')?>" class="btn btn-dark">Back</a>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-grey text-white">
                        <div class="card-header-title">Edit User</div>                    
                    </div>

                    <div class="card-body">
                        
                        <form name="createForm" id="createForm" method="post" action="<?php echo base_url('users/edit/'.$user['id'])?>">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" placeholder="Name" name="name" id="name" class="form-control <?php echo (isset($validation) && $validation->hasError('name')) ? 'is-invalid' : '';?>" value="<?php echo set_value('name', $user['name']);?>" >
                            <?php
                                if (isset($validation) && $validation->hasError('name')) {
                                    echo '<p class="invalid-feedback">'.$validation->getError('name').'</p>';
                                }
                            ?>
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" placeholder="Email" name="email" id="email" class="form-control <?php echo (isset($validation) && $validation->hasError('email')) ? 'is-invalid' : '';?>" value="<?php echo set_value('email', $user['email']);?>">

                            <?php
                                if (isset($validation) && $validation->hasError('email')) {
                                    echo '<p class="invalid-feedback">'.$validation->getError('email').'</p>';
                                }
                            ?>
                        </div>

                        <div class="form-group">
                            <label>Contact_No</label>
                            <input type="text" placeholder="Contact_No" name="contact_no" id="contact_no" class="form-control <?php echo (isset($validation) && $validation->hasError('contact_no')) ? 'is-invalid' : '';?>" value="<?php echo set_value('contact_no', $user['contact_no']);?>">

                            <?php
                                if (isset($validation) && $validation->hasError('contact_no')) {
                                    echo '<p class="invalid-feedback">'.$validation->getError('contact_no').'</p>';
                                }
                            ?>
                        </div>
                        <button type="submit" class="btn btn-dark">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>