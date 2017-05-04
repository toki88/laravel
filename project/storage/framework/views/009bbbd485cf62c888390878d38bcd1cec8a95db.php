<?php $__env->startSection('content'); ?>
	<div class="block-area" id="tableHover">
        <h3 class="block-title">网站配置管理</h3>
        <?php if(session('msg')): ?>
        	<div class="alert alert-success alert-icon">
			<?php echo e(session('msg')); ?>

			<i class="icon"></i>
			</div>
        <?php endif; ?>
        <?php if(session('error')): ?>
        	<div class="alert alert-warning alert-icon">
			<?php echo e(session('error')); ?>

			<i class="icon"></i>
			</div>
		<?php endif; ?>
        <div class="table-responsive overflow">
        	<form action='user' method='post' name='myform'>
        		<?php echo e(csrf_field()); ?>

        		<?php echo e(method_field('DELETE')); ?>

        	</form>
        	<form action='config' method='get'>

        		<div>
        			网站标题：<input type='text' class='form-control input-sm m-b-10' name='name'>
        		</div>
        		<input type='submit' class='btn' value='搜索'>
        	</form>
            <table class="table table-bordered table-hover tile">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>网站标题</th>
                        <th>网站关键字</th>
                        <th>描述</th>
                        <th>网站状态</th>
                        <th>网站名称</th>
                        <th>网站LOGO</th>
                        <th>网站版权</th>
                        <th>开启配置</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    	<tr>
	                        <td><?php echo e($v->id); ?></td>
	                        <td><?php echo e($v->title); ?></td>
	                        <td><?php echo e($v->key); ?></td>
                            <td><?php echo e($v->desn); ?></td>
	                        <td><?php echo e(($v->state == 0)?'维护':'开放'); ?></td>
                            <td><?php echo e($v->name); ?></td>
                            <td><img src="/admin/upload/<?php echo e($v->logo); ?>" style='width:50px;'></td>
                            <td><?php echo e($v->copyright); ?></td>
                            <td><?php echo e(($v->display == 1)?'开启':'关闭'); ?></td>
	                        <td>
	                        	<a class="btn btn-sm btn-alt m-r-5" href='javascript:doDel(<?php echo e($v->id); ?>)'>删除</a>
	                        	<a class="btn btn-sm btn-alt m-r-5" href='config/<?php echo e($v->id); ?>/edit'>修改</a>
	                        </td>
	                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <?php echo e($list->appends($where)->links()); ?>

        </div>
    </div>
    <script type="text/javascript">
        function doDel(id){
        		var form = document.myform;
        		form.action = 'config/'+id;
        		form.submit();
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin.base.parent', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>