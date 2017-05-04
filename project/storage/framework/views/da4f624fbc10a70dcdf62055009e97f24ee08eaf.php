<?php $__env->startSection('content'); ?>
    <div class="block-area" id="text-input">
        <h3 class="block-title">修改退换货信息</h3>
        <div class="row">
            <form action='/admin/refund/<?php echo e($ob->lid); ?>' method='post' enctype='multipart/form-data'>
                <?php echo e(csrf_field()); ?>

                <?php echo e(method_field('PUT')); ?>

                <div>
                    换货/退款编号名：
                    <input type="text" class="form-control m-b-10" placeholder="请输入用户名" name='lid' value="<?php echo e($ob->lid); ?>">
                </div>
               <div>
                    商品名称：
                    <input type="text" class="form-control m-b-10" placeholder="商品名称" name='name' value="<?php echo e($ob->name); ?>">
                </div>
                 <div class="col-lg-12">
                    退换货图片：
                    <img src="/admin/upload/<?php echo e($ob->refund_pic); ?>" width="200">
                    <br>
                    <input type="file" class="form-control m-b-8" placeholder="请输入头像" name='refund_pic'>
                </div>
                    <br>
                 退货/退款：
                <div> 
                    <div class="col-lg-1">
                         <input type="radio" name="refund_type"value="0" <?php echo e(($ob->refund_type == 1)?'checked':''); ?>>退款
                    </div>
                    <div>
                         <input type="radio" name="refund_type"value="1" <?php echo e(($ob->refund_type ==1)?'checked':''); ?>>退货
                    </div>
                </div>
                 <div>
                    退款金额：
                    <input type="text" class="form-control m-b-10" placeholder="<?php echo e($ob->price); ?>" name='refund_price' value="<?php echo e($ob->refund_price); ?>">
                </div>
                <div>
                    换货/退款原因：
                    <input type="text" class="form-control m-b-10" placeholder="换货/退款原因" name='refund_reason' value="<?php echo e($ob->refund_reason); ?>">
                </div>
                <div>
                    换货/退款说明：
                    <input type="text" class="form-control m-b-10" placeholder="换货/退款说明" name='refund_other_reason' value="<?php echo e($ob->refund_other_reason); ?>">
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