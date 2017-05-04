<?php $__env->startSection('content'); ?>
	<div class="block-area" id="tableHover">
        <h3 class="block-title">友情链接列表</h3>
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
        	<form action='/admin/flink' method='post' name='myform'>
        		<?php echo e(csrf_field()); ?>

        		<?php echo e(method_field('DELETE')); ?>

        	</form>

        	<form action='/admin/flink' method='get'>
        		<div class='medio-body'>
    				友情链接名称：<input type='text' class='form-control input-sm m-b-10' name='name'>
    			</div>
        		<!-- <div>
        			操作：<select name='sex' class='form-control input-sm m-b-10'>
        				<option value='1'>--开--</option>
        				<option value='2'>--关--</option>
        			</select>
        		</div> -->
        		<input type='submit' class='btn' value='搜索'>
        	</form>
            <table class="table table-bordered table-hover tile">
                <thead>
                    <tr>
                        <th>编号</th>
                        <th>名称</th>
                        <th>url</th>
                        <th>网站状态</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    	<tr>
	                        <td><?php echo e($v->id); ?></td>
	                        <td><?php echo e($v->name); ?></td>
                            <td><?php echo e($v->url); ?></td>
	                        <td>
                                <?php echo e(($v->display == 1)?'已打开':'已关闭'); ?>

                            </td>
	                        <td>
	                        	<a class="btn btn-sm btn-alt m-r-5" href='javascript:doDel(<?php echo e($v->id); ?>)'>删除</a>
	                        	<a class="btn btn-sm btn-alt m-r-5" href="/admin/flink/<?php echo e($v->id); ?>/edit">修改</a>
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
        		form.action = '/admin/flink/'+id;
        		form.submit();
        	}
        }

    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin.base.parent', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>