<?php $__env->startSection('content'); ?>
	<div class="block-area" id="tableHover">
        <h3 class="block-title">评价列表</h3>
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

            <table class="table table-bordered table-hover tile">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>商品名称</th>
                        <th>用户ID</th>
                        <th>评价时间</th>
                        <th>商品ID</th>
                        <th>评价</th>
                        <th>评价类型</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    	<tr>
	                        <td><?php echo e($v->id); ?></td>
	                        <td><?php echo e($v->name); ?></td>
	                        <td><?php echo e($v->uid); ?></td>
                            <td><?php echo e(date('Y-m-d H:i:s',$v->time)); ?></td>
                            <td><?php echo e($v->gid); ?></td>
                            <td><?php echo e($v->content); ?></td>
                            <td><?php echo e($v->type); ?></td>

	                        <td>
	                        	<a class="btn btn-sm btn-alt m-r-5" href='javascript:doDel(<?php echo e($v->id); ?>)'>删除</a>
	                        	<a class="btn btn-sm btn-alt m-r-5" href='comments/<?php echo e($v->id); ?>/edit'>修改</a>
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
        		form.action = 'comments/'+id;
        		form.submit();
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin.base.parent', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>