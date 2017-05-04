<?php $__env->startSection('content'); ?>
	<div class="block-area" id="tableHover">
        <h3 class="block-title">分类信息列表</h3>
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
        	<form action='column' method='post' name='myform'>
        		<?php echo e(csrf_field()); ?>

        		<?php echo e(method_field('DELETE')); ?>

        	</form>
        	<form action='column' method='get'>
        		<div class='medio-body'>
    				分类名称：<input type='text' class='form-control input-sm m-b-10' name='name'>
    			</div>
        		<div>
        			
        		</div>
        		<input type='submit' class='btn' value='搜索'>
        	</form>
            <table class="table table-bordered table-hover tile">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>分类名称</th>
                        <th>路径</th>
                        <th>上级ID</th>
                        <th>是否在主页推荐</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    	<tr>
	                        <td><?php echo e($v->cid); ?></td>
	                        <td><?php echo e($v->name); ?></td>
	                        <td><?php echo e($v->path); ?></td>
	                        <td><?php echo e($v->upid); ?></td>
                            <td><?php if($v->display==1): ?>是<?php endif; ?> <?php if($v->display==0): ?>否<?php endif; ?></td>
	                        <td>
	                        	<a class="btn btn-sm btn-alt m-r-5" href='javascript:doDel(<?php echo e($v->cid); ?>)'>删除</a>
	                        	<a class="btn btn-sm btn-alt m-r-5" href='column/<?php echo e($v->cid); ?>/edit'>修改</a>
                                <a class="btn btn-sm btn-alt m-r-5" href='addSon/<?php echo e($v->cid); ?>'>添加子类</a>
                                <a class="btn btn-sm btn-alt m-r-5" href='/admin/addgoods/<?php echo e($v->cid); ?>/<?php echo e($v->path); ?>'>添加商品</a>


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
        		form.action = 'column/'+id;
        		form.submit();
        }
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('Admin.base.parent', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>