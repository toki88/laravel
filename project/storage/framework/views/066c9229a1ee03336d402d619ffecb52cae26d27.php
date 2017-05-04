<?php $__env->startSection('content'); ?>
    <div class="block-area" id="text-input">
        <h3 class="block-title">修改分类</h3>
        <p>修改分类</p>
        <div class="row">
            <form action='/admin/column/<?php echo e($ob->cid); ?>' method='post'>
                <?php echo e(csrf_field()); ?>

                <?php echo e(method_field('PUT')); ?>

                <div class="col-lg-4">
                    <input type="text" class="form-control m-b-10" placeholder="请输入类名" name='name' value="<?php echo e($ob->name); ?>">
                </div>
                <br><br><br>
                <div class="col-lg-4">
                    是否在主页推荐
                    <select class="form-control m-b-10" name='display'>
                        <option value='0' <?php if($ob->display ==0): ?>selected <?php endif; ?>>否</option>
                        <option value='1' <?php if($ob->display ==1): ?>selected <?php endif; ?>>是</option>
                    </select>
                </div>
                <div class="col-lg-12">
                    <input type='submit' class="btn btn-block btn-alt" value='提交'>
                </div>
            </form>
        </div>
        <p></p>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('Admin.base.parent', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>