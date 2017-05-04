<?php $__env->startSection('content'); ?>
    <div class="block-area" id="text-input">
        <h3 class="block-title">修改用户</h3>
        <p>修改用户</p>
        <div class="row">
            <form action='/admin/user/<?php echo e($ob->uid); ?>' method='post' enctype='multipart/form-data'>
                <?php echo e(csrf_field()); ?>

                <?php echo e(method_field('PUT')); ?>

                <div>
                    用户名：
                    <input type="text" class="form-control m-b-10" placeholder="请输入用户名" name='name' value="<?php echo e($ob->name); ?>">
                </div>
                <div>
                    密码：
                    <input type="password" class="form-control m-b-10" placeholder="请输入密码" name='password' value="<?php echo e($ob->password); ?>">
                </div>
                <div class="col-lg-12">
                    更换头像：
                    <img src="/admin/upload/<?php echo e($ob->pic); ?>" width="30">
                    <br>
                    <input type="file" class="form-control m-b-8" placeholder="请输入头像" name='pic'>
                </div>
                <br>
                 请选择用户性别：
                <div> 
                    <div class="col-lg-1">
                         <input type="radio" name="sex"value="1" <?php echo e(($ob->sex ==1)?'checked':''); ?>>男
                    </div>
                    <div>
                         <input type="radio" name="sex"value="2" <?php echo e(($ob->sex ==2)?'checked':''); ?>>女
                    </div>
                </div>
                <br>
                <div class="col-lg-12">
                    <input type='submit' class="btn btn-block btn-alt" value='提交'>
                </div>
            </form>
        </div>
        <p></p>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin.base.parent', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>