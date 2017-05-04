<?php $__env->startSection('content'); ?>
	<div class="block-area" id="tableHover">
        <h3 class="block-title">管理员信息列表</h3>
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
        	<form action='admin' method='post' name='myform'>
        		<?php echo e(csrf_field()); ?>

        		<?php echo e(method_field('DELETE')); ?>

        	</form>
        	<form action='admin' method='get'>
        		<div class='medio-body'>
    				姓名：<input type='text' class='form-control input-sm m-b-10' name='name'>
    			</div>
        		<div>
        			权限：<select name='gid' class='form-control input-sm m-b-10'>
        				<option value=''>--请选择--</option>
        				<option value='0'>普通管理员</option>
                        <option value='1'>高级管理员</option>
                        <option value='2'>超级管理员</option>
        			</select>
        		</div>
        		<input type='submit' class='btn' value='搜索'>
        	</form>
            <table class="table table-bordered table-hover tile">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>姓名</th>
                        <th>访问时间</th>
                        <th>访问次数</th>
                        <th>权限</th>

                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    	<tr>
	                        <td><?php echo e($v->id); ?></td>
	                        <td><?php echo e($v->name); ?></td>
	                        <td><?php echo e(date('Y-m-d H:i:s',$v->time)); ?></td>
                            <td><?php echo e($v->num); ?></td>
                            <td><?php if($v->gid == 0): ?> <?php echo e('普通管理员'); ?><?php elseif($v->gid == 1): ?><?php echo e('高级管理员'); ?> <?php else: ?><?php echo e('超级管理员'); ?><?php endif; ?></td>
	                     
	                        <td>
	                        	<a class="btn btn-sm btn-alt m-r-5" href='javascript:doDel(<?php echo e($v->id); ?>)'>删除</a>
	                        	<a class="btn btn-sm btn-alt m-r-5" href='admin/<?php echo e($v->id); ?>/edit'>修改</a>
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
        		form.action = 'admin/'+id;
        		form.submit();
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin.base.parent', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>