<?php $__env->startSection('content'); ?>
	<div class="block-area" id="tableHover">
        <h3 class="block-title">用户信息列表</h3>
        <?php if(session('msg')): ?>
        	<div class="alert alert-success alert-icon">
			<?php echo e(session('msg')); ?>

			<i class="icon"></i>
			</div>
        <?php endif; ?>
        <?php if(session('error')): ?>
        	<div class="alert alert-warning alert-icon">
			<?php echo e(session('error')); ?>

			<i class="icon"></i>
			</div>
		<?php endif; ?>
        <div class="table-responsive overflow">
        	<form action='/admin/user' method="post" name='myform'>
        		<?php echo e(csrf_field()); ?>

        		<?php echo e(method_field('DELETE')); ?>

        	</form>

        	<form action='/admin/user' method='get'>
        		<div class='medio-body'>
    				姓名：<input type='text' class='form-control input-sm m-b-10' name='name'>
    			</div>
        		<div>
        			性别：<select name='sex' class='form-control input-sm m-b-10'>
        				<option value=''>--请选择--</option>
        				<option value='1'>--男--</option>
        				<option value='2'>--女--</option>
        			</select>
        		</div>
        		<input type='submit' class='btn' value='搜索'>
        	</form>
            <table class="table table-bordered table-hover tile">
                <thead>
                    <tr>
                        <th>用户编号</th>
                        <th>用户名</th>
                        <th>性别</th>
                        <th>ip</th>
                        <th>电话</th>
                        <th>邮箱</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    	<tr>
	                        <td><?php echo e($v->uid); ?></td>
	                        <td><?php echo e($v->name); ?></td>
	                        <td><?php echo e(($v->sex == 1)?'男':'女'); ?></td>
	                        <td><?php echo e(($_SERVER['REMOTE_ADDR'] == '::1')?$_SERVER['REMOTE_ADDR']='127.0.0.1':$_SERVER['REMOTE_ADDR']); ?></td>
	                        <td><?php echo e($v->tel); ?></td>
	                        <td><?php echo e($v->email); ?></td>
	                        <td>
	                        	<a class="btn btn-sm btn-alt m-r-5" href='javascript:doDel(<?php echo e($v->uid); ?>)'>删除</a>
	                        	<a class="btn btn-sm btn-alt m-r-5" href="/admin/user/<?php echo e($v->uid); ?>/edit">修改</a>
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
        	if(confirm('确定删除吗？')){
        		var form = document.myform;
        		form.action = '/admin/user/'+id;
        		form.submit();
        	}
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin.base.parent', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>