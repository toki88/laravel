<?php $__env->startSection('content'); ?>
    <div class="block-area" id="text-input">
        <h3 class="block-title">修改管理员</h3>
        <p>修改管理员</p>
        <div class="row">
            <form action='/admin/admin/<?php echo e($ob->id); ?>' method='post'>
                <?php echo e(csrf_field()); ?>

                <?php echo e(method_field('PUT')); ?>

                <div class="col-lg-4">
                    <input type="text" class="form-control m-b-10" placeholder="请输入用户名" name='name' value="<?php echo e($ob->name); ?>">
                </div>
                <div class="col-lg-4">
                    <input type="password" class="form-control m-b-10" placeholder="请输入新密码" name='password' value="<?php echo e($ob->password); ?>">
                </div>
                <div class="col-lg-4">
                    <select class="form-control m-b-10" name='gid'>
                        <option value='0' <?php if($ob->gid ==0): ?>selected <?php endif; ?>>普通管理员</option>
                        <option value='1' <?php if($ob->gid ==1): ?>selected <?php endif; ?>>高级管理员</option>
                        <option value='2' <?php if($ob->gid ==2): ?>selected <?php endif; ?>>超级管理员</option>
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