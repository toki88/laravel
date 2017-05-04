<?php $__env->startSection('content'); ?>
    <div class="block-area" id="text-input">
        <h3 class="block-title">修改友情链接</h3>
        <p>修改友情链接</p>
        <div class="row">
            <form action='/admin/flink/<?php echo e($ob->id); ?>' method='post'>
                <?php echo e(csrf_field()); ?>

                <?php echo e(method_field('PUT')); ?>

                <div>
                    友情链接名：
                    <input type="text" class="form-control m-b-10" placeholder="请输入用户名" name='name' value="<?php echo e($ob->name); ?>">
                </div>
               <div>
                    url：
                    <input type="text" class="form-control m-b-10" placeholder="请输入url地址" name='url' value="<?php echo e($ob->url); ?>">
                </div>
                <div>
                    显示状态：
                <div> 
                    <div class="col-lg-1">
                         <input type="radio" name="display"value="1" <?php echo e(($ob->display == 1)?'checked' : ''); ?>>显示链接
                    </div>
                    <div>
                         <input type="radio" name="display"value="0" <?php echo e(($ob->display == 0)?'checked' : ''); ?>>屏蔽链接
                    </div>
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