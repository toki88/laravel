<?php $__env->startSection('content'); ?>
	<div class="block-area" id="tableHover">
        <h3 class="block-title">订单信息列表</h3>
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
        	<form action='/admin/book_lists/<?php echo e($state); ?>' method='get'>
                <!-- <input type='hidden' class='form-control input-sm m-b-10' name='state' value="-1"> -->
        		<div class='medio-body'>
    				订单号：<input type='text' class='form-control input-sm m-b-10' name='lid'>
    			</div>
                <div class='medio-body'>
                    商品编号：<input type='text' class='form-control input-sm m-b-10' name='gid'>
                </div>
                <div class='medio-body'>
                    用户ID：<input type='text' class='form-control input-sm m-b-10' name='uid'>
                </div>
                <div class='medio-body'>
                    商品名称：<input type='text' class='form-control input-sm m-b-10' name='name'>
                </div>
        		<input type='submit' class='btn' value='搜索'>
        	</form>
            <table class="table table-bordered table-hover tile">
                <thead>
                    <tr>
                        <th>订单编号</th>
                        <th>商品编号</th>
                        <th>用户ID</th>
                        <th>商品数量</th>
                        <th>商品图片</th>
                        <th>单价</th>
                        <th>商品名称</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    	<tr>
	                        <td><?php echo e($v->lid); ?></td>
	                        <td><?php echo e($v->gid); ?></td>
	                        <td><?php echo e($v->uid); ?></td>
	                        <td><?php echo e($v->num); ?></td>
	                        <td><img src="/Admin/upload/<?php echo e($v->pic); ?>"></td>
	                        <td><?php echo e($v->price); ?></td>
	                        <td><?php echo e($v->name); ?></td>
	                        <td>
                                <a class="btn btn-sm btn-alt m-r-5" href="/admin/book_lists/<?php echo e($v->lid); ?>/edit">修改</a>
	                        </td>
	                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <?php echo e($list->appends($where)->links()); ?>


        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin.base.parent', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>