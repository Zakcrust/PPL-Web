<link href="<?php echo base_url('assets/css/sb-admin-2.min.css') ?>" rel="stylesheet">
<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-lg-7">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">

                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4"><strong>Login</strong></h1>
                                </div>
                                <form action="<?php echo base_url('Admin/Login') ?>" class="user" method="POST">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="user" name="user" placeholder="Masukkan Username">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="pass" name="pass" placeholder="Password">
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                                    <!-- <a href="<?php echo base_url('Admin/Login') ?>" class="btn btn-primary btn-user btn-block">
                                        Login
                                    </a> -->
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
<script src="<?php echo base_url('assets/js/sb-admin-2.min.js') ?>"></script>