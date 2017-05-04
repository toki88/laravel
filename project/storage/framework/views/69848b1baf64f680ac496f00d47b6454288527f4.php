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
            <form action='/admin/user' method='post'>
                <?php echo e(csrf_field()); ?>

                <div>
                    用户名：
                    <input type="text" class="form-control m-b-10" placeholder="请输入用户名" name='name'>
                </div>
                <div>
                    密码：
                    <input type="password" class="form-control m-b-10" placeholder="请输入用户密码" name='password'>
                </div>
                    请选择用户性别：
                <div> 
                    <div>
                         <input type="radio" name="sex"value="1">男
                    </div>
                    <div>
                         <input type="radio" name="sex"value="2">女
                    </div>
                </div>
                <div>
                    电话：
                    <input type="text" class="form-control m-b-10" placeholder="请输入用户电话" name='tel'>
                </div>
                
                <div>
                    邮箱：
                    <input type="text" class="form-control m-b-10" placeholder="请输入用户邮箱" name='email'>
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