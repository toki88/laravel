<?php $__env->startSection('content'); ?>
    <div class="block-area" id="text-input">
        <h3 class="block-title">修改活动</h3>
        <p>修改活动</p>
        <div class="row">
            <form action='/admin/recom/<?php echo e($ob->id); ?>' method='post' enctype='multipart/form-data'>
                <?php echo e(csrf_field()); ?>

                <?php echo e(method_field('PUT')); ?>

                上传活动图：<input type='file' name='image'>
                <span><br></span>
                <div class="col-lg-4">
                    <input type="text" class="form-control m-b-10" placeholder="请输入左上三角内商品说明文字" name='t_words' value="<?php echo e($ob->t_words); ?>">
                </div>
                <div class="col-lg-4">
                    <input type="text" class="form-control m-b-10" placeholder="请输入底部商品说明文字" name='f_words' value="<?php echo e($ob->f_words); ?>">
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