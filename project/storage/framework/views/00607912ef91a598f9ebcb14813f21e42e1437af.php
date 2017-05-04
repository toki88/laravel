<?php $__env->startSection('content'); ?>
    <div class="block-area" id="text-input">
        <h3 class="block-title">添加用户</h3>
        <p>填空添加用户</p>
        <div class="row">
            <form action='/admin/goods' method='post'>
                <?php echo e(csrf_field()); ?>


                <input type="hidden" name='cid' value='<?php echo e($id); ?>'>
                <input type="hidden" name='path' value='<?php echo e($path); ?>'>
                <div class="col-lg-8">
                    <input type="text" class="form-control m-b-10" placeholder="请输入商品名" name='gname'>
                </div>
                <div class="col-lg-8">  
                    <input type="text" class="form-control m-b-10" placeholder="请输入标题" name='title'>
                </div>
                <div class="col-lg-8">
                    <input type="text" class="form-control m-b-10" placeholder="请输入现价" name='price'>
                </div>
                <div class="col-lg-8">
                    <input type="text" class="form-control m-b-10" placeholder="请输入原价" name='oprice'>
                </div>
                <div class="col-lg-8">
                    <input type="text" class="form-control m-b-10" placeholder="请输入库存量" name='stock'>
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