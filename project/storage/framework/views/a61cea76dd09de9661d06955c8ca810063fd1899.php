<?php $__env->startSection('content'); ?>
    <div class="block-area" id="text-input">
        <h3 class="block-title">修改订单信息</h3>
         <?php if(session('msg')): ?>
            <div class="alert alert-success alert-icon">
            <?php echo e(session('msg')); ?>

            <i class="icon"></i>
            </div>
        <?php endif; ?>
        <?php if(session('error')): ?>
            <div class="alert alert-warning alert-icon">
            <?php echo e(session('error')); ?>

            <i class="icon"></i>
            </div>
        <?php endif; ?>
        <div class="row">
            <form action='/admin/book_lists/<?php echo e($ob->lid); ?>' method='post'>
                <?php echo e(csrf_field()); ?>

                <?php echo e(method_field('PUT')); ?>

                <div>
                    商品数量：
                    <input type="text" class="form-control m-b-10" placeholder="请填写商品数量" name='num' value="<?php echo e($ob->num); ?>" <?php if($ob->state == 2 || $ob->state == 1): ?> disabled <?php endif; ?>>
                </div>
               <div>
                    商品单价：
                    <input type="text" class="form-control m-b-10" placeholder="请填写商品单价" name='price' value="<?php echo e($ob->price); ?>" <?php if(($ob->state == 2) || ($ob->state ==1)): ?> disabled <?php endif; ?>>

                </div>
                    <input type='hidden' name='state' value='<?php echo e($ob->state); ?>'>
                <div class="col-lg-12">
                    <input type='submit' class="btn btn-block btn-alt" value='提交'>
                </div>
            </form>
        </div>
        <p></p>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin.base.parent', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>