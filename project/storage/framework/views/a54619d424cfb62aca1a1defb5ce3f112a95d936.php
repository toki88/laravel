<?php $__env->startSection('content'); ?>
    <div class="block-area" id="text-input">
        <h3 class="block-title">修改用户</h3>
        <p>修改用户</p>
        <div class="row">
            <form action='/admin/announcement/<?php echo e($ob->aid); ?>' method='post' enctype='multipart/form-data'>
                <?php echo e(csrf_field()); ?>

                <?php echo e(method_field('PUT')); ?>

                <div>
                    公告标题：
                    <input type="text" class="form-control m-b-10" placeholder="请输入标题" name='content' value="<?php echo e($ob->content); ?>">
                </div>
                <div>
                    链接地址：
                    <input type="text" class="form-control m-b-10" placeholder="请输入链接地址" name='url' value="<?php echo e($ob->url); ?>">
                </div>

                 请选择标题类型(位置)：
                <div> 
                    <div class="col-lg-1">
                         <input type="radio" name="order" value="1" <?php echo e(($ob->order ==1)?'checked':''); ?>>上
                    </div>
                    <div>
                         <input type="radio" name="order" value="0" <?php echo e(($ob->order ==0)?'checked':''); ?>>下
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