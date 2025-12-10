<?php $__env->startSection('title', 'Edit My Judgment Note'); ?>

<?php $__env->startSection('content'); ?>
<style>
  /* Custom card with gradient and smooth shadow */
  .custom-card {
    background: linear-gradient(135deg, #c5d6ea 0%, #a1c7eb 100%);
    color: #fff;
    border-radius: 12px;
    box-shadow: 0 10px 25px rgba(53, 122, 189, 0.4);
  }

  .custom-card label {
    font-weight: 600;
    font-size: 1.1rem;
    color: #003092;
  }

  .custom-textarea {
    border-radius: 8px;
    border: none;
    padding: 1rem;
    font-size: 1.05rem;
    min-height: 300px;
    resize: vertical;
    box-shadow: inset 0 2px 8px rgba(0,0,0,0.15);
  }

  .custom-textarea:focus {
    outline: none;
    box-shadow: 0 0 8px 3px rgba(255, 255, 255, 0.7);
    background-color: rgba(255, 255, 255, 0.1);
    color: #fff;
  }

  .btn-cancel {
    background: transparent;
    border: 2px solid #003092;
    color: #003092;
    transition: all 0.3s ease;
  }

  .btn-cancel:hover {
    background: #003092;
    color: #FFF;
  }

  .btn-save {
    background: #ffce00;
    border: none;
    color: #222;
    font-weight: 600;
    box-shadow: 0 5px 15px rgba(255, 206, 0, 0.6);
    transition: all 0.3s ease;
  }

  .btn-save:hover {
    background: #e6b800;
    box-shadow: 0 8px 20px rgba(230, 184, 0, 0.8);
    color: #111;
  }
</style>

<div class="container mt-5 mb-5">
  <div class="row justify-content-center">
    <div class="col-lg-8 col-md-10">
      <div class="card custom-card p-4">
        <h3 class="mb-4 fw-bold text-center">Edit My Annotated Judgment</h3>
        <form action="<?php echo e(route('subscriber.myDecision.updateNote', $myNotes->id)); ?>" method="POST">
          <?php echo csrf_field(); ?>
          <div class="mb-4">
            <label for="editor" class="form-label">Your Annotated Judgment</label>
            <textarea
              name="notes"
              id="editor"
              class="form-control custom-textarea"
              placeholder="Write your notes here..."
              ><?php echo old('notes', $myNotes->notes); ?></textarea>
          </div>

          <input type="hidden" name="decision_id" value="<?php echo e($myNotes->decision_id); ?>">
          <input type="hidden" name="folderId" value="<?php echo e($folderId); ?>">

          <div class="d-flex justify-content-between">
            <a href="<?php echo e(route('subscriber.myDecision', Crypt::encrypt($myNotes->id))); ?>" class="btn btn-cancel px-4 py-2">
              Cancel
            </a>
            <button type="submit" class="btn btn-save px-4 py-2">
              <i class="bi bi-pencil-square me-2"></i> Save My Note
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
 
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<!-- <script src="https://cdn.ckeditor.com/4.22.1/full/ckeditor.js"></script> -->
<script>
    CKEDITOR.replace('editor', {
        extraPlugins: 'font', // now 'font' is included in full build
        height: 500
    });
</script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('auth.subscribers.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/bldlegalized/public_html/resources/views/auth/subscribers/profile/edit_decision_note.blade.php ENDPATH**/ ?>