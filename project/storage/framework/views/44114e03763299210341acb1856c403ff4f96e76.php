<?php $__env->startSection('content'); ?>
    <div class="block-area" id="text-input">
        <h3 class="block-title">修改网站配置</h3>
        <p>修改网站配置</p>
        <div class="row">
            <form action='/admin/config/<?php echo e($ob->id); ?>' method='post' enctype='multipart/form-data'>
                <?php echo e(csrf_field()); ?>

                <?php echo e(method_field('PUT')); ?>

                <div class="col-lg-4">
               <input type="text" class="form-control m-b-10" placeholder="请输入标题" name='title' value="<?php echo e($ob->title); ?>">
               <input type="text" class="form-control m-b-10" placeholder="请输入关键字" name='key' value="<?php echo e($ob->key); ?>">
               <input type="text" class="form-control m-b-10" placeholder="请输入描述" name='desn' value="<?php echo e($ob->desn); ?>">
               <select class="form-control m-b-10" name='state' style='width:540px;'>
                   <option>--请选择--</option>
                   <option value='1' <?php if($ob->state ==1): ?>selected <?php endif; ?>>开放</option>
                   <option value='0' <?php if($ob->state ==0): ?>selected <?php endif; ?>>维护</option>
               </select>
               <input type="text" class="form-control m-b-10" placeholder="请输入网站名称" name='name' value="<?php echo e($ob->name); ?>"><br>
               LOGO：<input type='file' name='logo'>
               <span><br></span>
               <input type="text" class="form-control m-b-10" placeholder="请输入网站版权" name='copyright' value="<?php echo e($ob->copyright); ?>">
               <span>1为开启，0为关闭</span>
               <!-- <input type="text" class="form-control m-b-10" placeholder="是否开启？" name='display' value="<?php echo e($ob->display); ?>"> -->
               <select class="form-control m-b-10" name='display' style='width:540px;'>
                   <option>--请选择--</option>
                   <option value='1' <?php if($ob->state ==1): ?>selected <?php endif; ?>>开启</option>
                   <option value='0' <?php if($ob->state ==0): ?>selected <?php endif; ?>>关闭</option>
               <input type='submit' class="btn btn-block btn-alt" value='提交'>
           </div>
            </form>
        </div>
        <p></p>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin.base.parent', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>