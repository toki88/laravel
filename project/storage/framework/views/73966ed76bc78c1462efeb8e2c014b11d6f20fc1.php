<?php $__env->startSection('content'); ?>
    <div class="block-area" id="text-input">
        <h3 class="block-title">添加用户</h3>
        <p>请填写用户信息</p>
        <?php if(count($errors) > 0): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>
        <div class="row">
            <form action='/admin/announcement' method='post'>
                <?php echo e(csrf_field()); ?>

                <div>
                    公告标题：
                    <input type="text" class="form-control m-b-10" placeholder="请输入标题" name='content'>
                </div>
                <div>
                    链接地址：
                    <input type="text" class="form-control m-b-10" placeholder="请输入链接地址" name='url'>
                </div>
                    请选择标题类型(位置)：
                <div> 
                    <div>
                         <input type="radio" name="order"value="1">上
                    </div>
                    <div>
                         <input type="radio" name="order"value="2">下
                    </div>
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