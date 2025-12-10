<?php $__env->startSection('title', 'Assign Permissions to Role'); ?>

<?php $__env->startSection('content'); ?>
<div class="app-wrapper">
    <?php echo $__env->make('admin.layouts.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <h3 class="fw-bold">Assign Permissions to Role</h3>
            </div>
        </div>

        <div class="app-content">
            <div class="container-fluid">
                <?php if(session('success')): ?>
                    <div class="alert alert-success"><?php echo e(session('success')); ?></div>
                <?php endif; ?>

                <form method="POST" action="<?php echo e(route('roles.permissions.save')); ?>">
                    <?php echo csrf_field(); ?>

                    <!-- Role and Module Select -->
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label for="role_id" class="form-label fw-semibold">Select Role</label>
                            <select name="role_id" id="role_id" class="form-select shadow-sm" required>
                                <option value="">-- Choose Role --</option>
                                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($role->id); ?>"><?php echo e($role->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="module_id" class="form-label fw-semibold">Select Module</label>
                            <select name="module_id[]" id="module_id" class="form-select shadow-sm select2Data" multiple>
                                <option value="">-- Choose Module --</option>
                                <?php $__currentLoopData = $modules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($module->id); ?>"><?php echo e($module->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

                    <!-- Permission Display -->
                    <div class="card shadow-sm border-0 mb-4">
                        <div class="card-header bg-light d-flex justify-content-between align-items-center">
                            <h5 class="mb-0 fw-bold text-primary">Module Permissions</h5>
                            <div class="form-check mt-2">
                                <input class="form-check-input" type="checkbox" id="select-all">
                                <label class="form-check-label" for="select-all">Select All</label>
                            </div>
                        </div>

                        <div class="card-body">
                            <div id="permission-checkboxes" class="row gy-2"></div>
                        </div>
                    </div>

                    <!-- Submit -->
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary px-4 py-2">Assign Permissions</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <?php echo $__env->make('admin.layouts.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-script'); ?>
<script>
    $(document).ready(function () {
        let assignedPermissions = [];

        // Handle Role Change
        $('#role_id').on('change', function () {
            const roleId = $(this).val();
            const container = $('#permission-checkboxes');
            $('#select-all').prop('checked', false);
            container.html('');

            if (roleId) {
                fetch(`/admin/get-permissions-by-role/${roleId}`)
                    .then(res => res.json())
                    .then(data => {
                        assignedPermissions = data.assigned_permission_ids;
                        renderPermissions(data.permissions, assignedPermissions);
                    });
            }
        });

        // Handle Module Change
        $('#module_id').on('change', function () {
            
            const selectedModules = $(this).val();
            const container = $('#permission-checkboxes');
            $('#select-all').prop('checked', false);
            container.html('');

            if (selectedModules.length > 0) {
                const fetches = selectedModules.map(moduleId =>
                    fetch(`/admin/get-permissions-by-module/${moduleId}`).then(res => res.json())
                );

                Promise.all(fetches).then(results => {
                    const filteredPermissions = results.flat();
                    if (filteredPermissions.length > 0) {
                        renderPermissions(filteredPermissions, assignedPermissions);
                    } else {
                        container.html('<p class="text-danger">No permissions found for the selected modules.</p>');
                    }
                });
            } else {
                $('#role_id').trigger('change');
            }
        });

        // Handle Select All
        $('#select-all').on('change', function () {
            $('#permission-checkboxes input[type="checkbox"]').prop('checked', this.checked);
        });

        // Render Permission Checkboxes
        function renderPermissions(permissions, assigned) {
            const container = $('#permission-checkboxes');
            container.html('');
            const uniquePermissions = [];

            permissions.forEach(p => {
                if (!uniquePermissions.find(item => item.id === p.id)) {
                    uniquePermissions.push(p);
                }
            });

            uniquePermissions.forEach(permission => {
                const isChecked = assigned.includes(permission.id) ? 'checked' : '';
                const col = `
                    <div class="col-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="permissions[]" value="${permission.id}" id="perm-${permission.id}" ${isChecked}>
                            <label class="form-check-label" for="perm-${permission.id}">
                                ${permission.slug}
                            </label>
                        </div>
                    </div>`;
                container.append(col);
            });
        }
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/bldlegalized/public_html/resources/views/admin/roles_permission/assign.blade.php ENDPATH**/ ?>