<?php $__env->startSection('content'); ?>
    <div class="block-area" id="text-input">
        <h3 class="block-title">添加网站配置</h3>
        <p>添加网站配置</p>
        <div class="row">
            <form action='/admin/config' method='post' enctype='multipart/form-data'>
                <?php echo e(csrf_field()); ?>

                <div class="col-lg-4">
                    <input type="text" class="form-control m-b-10" placeholder="请输入标题" name='title'>
                    <input type="text" class="form-control m-b-10" placeholder="请输入关键字" name='key'>
                    <input type="text" class="form-control m-b-10" placeholder="请输入描述" name='desn'>
                    <select class="form-control m-b-10" name='state' style='width:540px;'>
                        <option>--请选择--</option>
                        <option value='1'>开放</option>
                        <option value='0'>维护</option>
                    </select>
                    LOGO：<input type='file' name='logo'>
                    <span><br></span>
                    <input type="text" class="form-control m-b-10" placeholder="请输入网站版权" name='copyright'>
                    <input type="text" class="form-control m-b-10" placeholder="请输入网站名称" name='name'><br>
                    <input type='submit' class="btn btn-block btn-alt" value='提交'>
                </div>
            </form>
        </div>
        <p></p>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin.base.parent', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>