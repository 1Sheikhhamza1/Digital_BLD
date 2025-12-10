
<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('content'); ?>
<div class="app-wrapper">
  <?php echo $__env->make('admin.layouts.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
  <main class="app-main">
    <div class="app-content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h3 class="mb-0">User Manual List</h3>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">
                User Manual List
              </li>
            </ol>
          </div>
          <div class="col-sm-6">
            <div class="float-sm-end">
              <a href="javascript:void()" onclick="permissions('user_manuals','1');" class="btn btn-success btn-sm"><i class="fa fa-check"></i> Approved</a>
              <a href="javascript:void()" onclick="permissions('user_manuals','0');" class="btn btn-warning btn-sm"><i class="fa fa-times"></i> Disapproved</a>
              <a href="javascript:void()" onclick="deletedata('masterdelete','user_manuals');" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Multiple Delete</a>
              <a href="<?php echo e(route('user_manual.create')); ?>" style="color:#fff; margin-right:20px" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Create New user_manual</a>
            </div>
          </div>

        </div>
      </div>
    </div>
    <div class="app-content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card mb-4">
              <div class="card-body">
                <form id="form_check">
                  <table id="responsive-datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th width="4%"><input name="checkbox" onclick='checkedAll();' type="checkbox" readonly="readonly" /></th>
                        <th width="25%">Topic</th>
                        <th width="25%">Question</th>
                        <th width="10%">Sequence</th>
                        <th width="10%">Status</th>
                        <th width="20%" align="right">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $__currentLoopData = $alluser_manual; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user_manual): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr id="tablerow<?php echo e($user_manual->id); ?>" class="tablerow">
                        <td><input type="checkbox" name="summe_code[]" id="summe_code<?php echo e($user_manual->id); ?>" value="<?php echo e($user_manual->id); ?>" /></td>
                        <td><?php echo e($user_manual->topic); ?></td>
                        <td><?php echo e($user_manual->question); ?></td>
                        <td><?php echo e($user_manual->sequence); ?></td>
                        <td>
                          <?php if($user_manual->status == 1): ?>
                          <span style="background:#006600; padding:3px 8px; border-radius:5px; color: white;"><i class="fa fa-check"></i></span>
                          <?php else: ?>
                          <span style="background:#D91021; padding:3px 8px; border-radius:5px; color: white;"><i class="fa fa-times"></i></span>
                          <?php endif; ?>
                        </td>
                        <td align="center">
                          <a href="<?php echo e(route('user_manual.edit', $user_manual->id)); ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                          <button type="button" class="btn btn-danger btn-sm"
                            onclick="deleteSingle('<?php echo $user_manual->id; ?>','masterdelete','user_manuals')"><i class="fa fa-trash"></i></button>
                      </td>
                      </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                  </table>

                </form>
              </div>
              <div class="card-footer clearfix">
                <?php echo e($alluser_manual->links()); ?>

              </div>
            </div>

          </div>

        </div>
      </div>
    </div>
  </main>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/bldlegalized/public_html/resources/views/admin/user_manual/index.blade.php ENDPATH**/ ?>