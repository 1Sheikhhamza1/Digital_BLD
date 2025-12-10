<?php $__env->startSection('seodetails'); ?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title', Auth::guard('subscriber')->user()->name.' | My Reminder'); ?>

<?php $__env->startSection('content'); ?>
<div class="container py-4">
    <style>
        .reminder-list-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
        }

        .reminder-list-header h5 {
            font-size: 1.2rem;
            font-weight: 600;
            color: #343a40;
            margin-bottom: 0.5rem;
        }

        .reminder-list-item {
            background-color: white;
            border-radius: 0.75rem;
            padding: 1rem 1.25rem;
            margin-bottom: 0.75rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.05);
            transition: all 0.2s ease-in-out;
        }

        .reminder-list-item:hover {
            transform: translateY(-2px);
            box-shadow: 0 0.25rem 0.5rem rgba(0, 0, 0, 0.1);
        }

        .reminder-list-item .time {
            font-size: 1.1rem;
            font-weight: 600;
            color: #0d6efd;
            flex-shrink: 0;
            margin-right: 1rem;
        }

        .reminder-list-item .details {
            flex-grow: 1;
        }

        .reminder-list-item .details p {
            font-size: 0.9rem;
            color: #495057;
            margin-bottom: 0;
            line-height: 1.4;
        }

        .reminder-list-item .actions button {
            background: none;
            border: none;
            color: #6c757d;
            font-size: 1.1rem;
            margin-left: 0.5rem;
            transition: color 0.2s ease;
        }

        .reminder-list-item .actions button:hover {
            color: #0d6efd;
        }

        .reminder-list-item .actions button.delete-btn:hover {
            color: #dc3545;
        }

        /* Add New Reminder Form Styling */
        .form-label {
            font-weight: 500;
            color: #495057;
            margin-bottom: 0.5rem;
        }

        .form-control custom-form-control,
        .form-select {
            border-radius: 0.75rem;
            padding: 0.75rem 1rem;
            border: 1px solid #ced4da;
        }

        .form-control custom-form-control:focus,
        .form-select:focus {
            border-color: #86b7fe;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
        }

        .input-group-text {
            background-color: #e9ecef;
            border-color: #ced4da;
            border-top-left-radius: 0.75rem;
            border-bottom-left-radius: 0.75rem;
        }

        .input-group .form-control custom-form-control:last-child {
            border-top-right-radius: 0.75rem;
            border-bottom-right-radius: 0.75rem;
        }
    </style>

    <div class="container mt-5">
        <div class="row g-4">
            <!-- Left Column: All Reminders List -->
            <div class="col-lg-6">
                <div class="search-summary">
                    <div class="d-flex flex-wrap align-items-center">
                        <span class="search-query">
                            My Reminder
                        </span>
                    </div>
                    <!-- <div class="dropdown dropdown-sort">
                        <button class="btn dropdown-toggle" type="button" id="dropdownSortBy" data-bs-toggle="dropdown" aria-expanded="false">
                            By date
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownSortBy">
                            <li><a class="dropdown-item" href="#">By relevance</a></li>
                            <li><a class="dropdown-item" href="#">By name</a></li>
                        </ul>
                    </div> -->
                </div>

                <div class="search-results-list">
                    <!-- Reminder Item 1 -->
                    <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="reminder-list-item d-flex align-items-start justify-content-between border rounded p-3 mb-2 shadow-sm" style="border-left: 4px solid <?php echo e($event->color ?? '#0d6efd'); ?>;">
                        <div class="flex-grow-1">
                            <h6 class="mb-1 fw-bold"><?php echo e($event->title); ?></h6>
                            <div class="text-muted small mb-1">
                                <i class="bi bi-calendar-event"></i>
                                <?php echo e(\Carbon\Carbon::parse($event->start_date)->format('M d, Y')); ?>

                                <?php if($event->end_date && $event->end_date !== $event->start_date): ?>
                                → <?php echo e(\Carbon\Carbon::parse($event->end_date)->format('M d, Y')); ?>

                                <?php endif; ?>
                            </div>
                            <div class="text-muted small mb-1">
                                <i class="bi bi-clock"></i>
                                <?php if($event->start_time && $event->end_time): ?>
                                <?php echo e(\Carbon\Carbon::parse($event->start_time)->format('h:i A')); ?> → <?php echo e(\Carbon\Carbon::parse($event->end_time)->format('h:i A')); ?>

                                <?php elseif($event->start_time): ?>
                                <?php echo e(\Carbon\Carbon::parse($event->start_time)->format('h:i A')); ?>

                                <?php else: ?>
                                No time
                                <?php endif; ?>
                            </div>
                            <p class="mb-0"><?php echo e($event->description ?? 'No description'); ?></p>
                        </div>
                        <div class="ms-3 d-flex flex-column align-items-center">
                            <button type="button"
                                class="btn btn-sm btn-outline-primary mb-1"
                                data-bs-toggle="modal"
                                data-bs-target="#editEventModal"
                                data-id="<?php echo e($event->id); ?>"
                                data-title="<?php echo e($event->title); ?>"
                                data-start_date="<?php echo e($event->start_date); ?>"
                                data-end_date="<?php echo e($event->end_date); ?>"
                                data-start_time="<?php echo e($event->start_time); ?>"
                                data-end_time="<?php echo e($event->end_time); ?>"
                                data-color="<?php echo e($event->color); ?>"
                                data-description="<?php echo e($event->description); ?>">
                                <i class="bi bi-pencil-square"></i>
                            </button>

                            <form action="<?php echo e(route('subscriber.events.destroy', $event->id)); ?>" method="POST" onsubmit="return confirm('Are you sure you want to delete?');">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




                </div>
            </div>

            <!-- Right Column: Add New Reminders Form -->
            <div class="col-lg-6 add-reminder-form-section">
                <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
                <?php endif; ?>

                <?php if(session('success')): ?>
                <div class="alert alert-success">
                    <?php echo e(session('success')); ?>

                </div>
                <?php endif; ?>
                <div class="card p-4">
                    <h5 class="mb-4">Add New Reminder</h5>
                    <form method="POST" action="<?php echo e(route('subscriber.events.store')); ?>">
                        <?php echo csrf_field(); ?>

                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label for="startDate" class="form-label">Date</label>
                                <div class="input-group">
                                    <input type="date" class="form-control custom-form-control" id="startDate" name="start_date" required>
                                </div>
                            </div>
                            <!-- <div class="col-md-6">
                                <label for="endDate" class="form-label">End Date</label>
                                <div class="input-group">
                                    <input type="date" class="form-control custom-form-control" id="endDate" name="end_date">
                                    <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                                </div>
                            </div> -->
                            <div class="col-md-6">
                                <label for="startTime" class="form-label">Time</label>
                                <div class="input-group">
                                    <input type="time" class="form-control custom-form-control" id="startTime" name="start_time">
                                </div>
                            </div>
                            <!-- <div class="col-md-6">
                                <label for="endTime" class="form-label">End Time</label>
                                <div class="input-group">
                                    <input type="time" class="form-control custom-form-control" id="endTime" name="end_time">
                                    <span class="input-group-text"><i class="bi bi-clock"></i></span>
                                </div>
                            </div> -->
                        </div>

                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control custom-form-control" id="title" name="title" placeholder="Meeting with..." required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control custom-form-control" id="description" name="description" rows="4"></textarea>
                        </div>

                        <!-- <div class="mb-3">
                            <label for="color" class="form-label">Color</label>
                            <input type="color" class="form-control custom-form-control form-control custom-form-control-color" id="color" name="color" value="#0d6efd" title="Choose color">
                        </div> -->

                        <div class="d-grid">
                            <input type="hidden" id="from" name="from" value="page">
                            <button type="submit" class="book-now-btn">Add Reminder</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="editEventModal" tabindex="-1" aria-labelledby="editEventModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST" id="editEventForm">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editEventModalLabel">Edit Event</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="editTitle" class="form-label">Title</label>
                            <input type="text" class="form-control custom-form-control" id="editTitle" name="title" required>
                        </div>

                        <div class="mb-3">
                            <label for="editStartDate" class="form-label">Date</label>
                            <input type="date" class="form-control custom-form-control" id="editStartDate" name="start_date" required>
                        </div>

                        <!-- <div class="mb-3">
                            <label for="editEndDate" class="form-label">End Date</label>
                            <input type="date" class="form-control custom-form-control" id="editEndDate" name="end_date">
                        </div> -->

                        <div class="mb-3">
                            <label for="editStartTime" class="form-label">Time</label>
                            <input type="time" class="form-control custom-form-control" id="editStartTime" name="start_time">
                        </div>

                        <!-- <div class="mb-3">
                            <label for="editEndTime" class="form-label">End Time</label>
                            <input type="time" class="form-control custom-form-control" id="editEndTime" name="end_time">
                        </div> -->

                        <!-- <div class="mb-3">
                            <label for="editColor" class="form-label">Color</label>
                            <input type="color" class="form-control custom-form-control form-control custom-form-control-color" id="editColor" name="color">
                        </div> -->

                        <div class="mb-3">
                            <label for="editDescription" class="form-label">Description</label>
                            <textarea class="form-control custom-form-control" id="editDescription" name="description" rows="3"></textarea>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update Event</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
    <?php $__env->stopSection(); ?>

    <?php $__env->startPush('scripts'); ?>
    <script>
        document.getElementById('editEventModal').addEventListener('show.bs.modal', function(event) {
            let button = event.relatedTarget;

            let id = button.getAttribute('data-id');
            let title = button.getAttribute('data-title');
            let startDate = button.getAttribute('data-start_date');
            // let endDate = button.getAttribute('data-end_date');
            let startTime = button.getAttribute('data-start_time');
            // let endTime = button.getAttribute('data-end_time');
            // let color = button.getAttribute('data-color');
            let description = button.getAttribute('data-description');

            let form = document.getElementById('editEventForm');
            form.action = `/subscriber/events/${id}`;

            document.getElementById('editTitle').value = title;
            document.getElementById('editStartDate').value = startDate;
            // document.getElementById('editEndDate').value = endDate;
            document.getElementById('editStartTime').value = startTime;
            // document.getElementById('editEndTime').value = endTime;
            // document.getElementById('editColor').value = color;
            document.getElementById('editDescription').value = description;
        });
    </script>


    <?php $__env->stopPush(); ?>
<?php echo $__env->make('auth.subscribers.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/bldlegalized/public_html/resources/views/auth/subscribers/profile/my_events.blade.php ENDPATH**/ ?>