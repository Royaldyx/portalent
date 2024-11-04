<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
        <li class="nav-item">
            <a href="<?php echo site_url('admin'); ?>" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                </p>
            </a>
        </li>
        <!-- <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-list-ul"></i>
                <p>Categories
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="<?php echo site_url('admin/newCategory'); ?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>New category</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo site_url('admin/allCategories'); ?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>All categories</p>
                    </a>
                </li>
            </ul>
        </li> -->
        <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-layer-group"></i>
                <p>Jobs
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="<?php echo site_url('admin/newProduct'); ?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>New Jobs</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo site_url('admin/allProducts'); ?>" class="nav-link active">
                        <i class="far fa-circle nav-icon"></i>
                        <p>All Jobs</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo site_url('admin/allJobsApply'); ?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>All Jobs Apply</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-layer-group"></i>
                <p>Model
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="<?php echo site_url('admin/newModel'); ?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>New Model</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo site_url('admin/allModels'); ?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>All Models</p>
                    </a>
                </li>
            </ul>
        </li>
        <!-- <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-layer-group"></i>
                <p>User
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="<?php echo site_url('admin/allUsers'); ?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>All users</p>
                    </a>
                </li>
            </ul>
        </li> -->
    </ul>
</nav>
<!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">All Jobs</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <?php if($this->session->flashdata('class')): ?>
                                <div class="alert <?php echo $this->session->flashdata('class') ?> alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <?php echo $this->session->flashdata('message'); ?>
                                </div>
                            <?php endif; ?>

                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama</th>
                                        <th>Kategori</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if($allProducts): ?>
                                        <?php foreach($allProducts as $product): ?>
                                            <tr>
                                                <td><?php echo $product->pId; ?></td>
                                                <td><?php echo $product->pName; ?></td>
                                                <td><?php echo $product->cName; ?></td>
                                                <td><?php echo ($product->pStatus == 1) ? 'Active' : 'Inactive'; ?></td>
                                                <td>
                                                    <a href="<?php echo site_url('admin/editProduct/'.$product->pId); ?>" class="btn btn-info btn-sm">Edit</a>
                                                    <a href="<?php echo site_url('admin/deleteProduct/'.$product->pId); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this product?');">Delete</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="5" class="text-center">No Products Found</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                            <div class="mt-3">
                                <?php echo $links; ?>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
