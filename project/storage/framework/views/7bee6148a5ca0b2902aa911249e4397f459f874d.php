<?php $__env->startSection('content'); ?>
	<div class="block-area" id="tableHover">
        <h3 class="block-title">退货订单列表</h3>
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
        	<form action='/admin/refund' method='post' name='myform'>
        		<?php echo e(csrf_field()); ?>

        		<?php echo e(method_field('DELETE')); ?>

        	</form>

        	<form action='/admin/refund' method='get'>
        		<div class='medio-body'>
    				退货订单名称：<input type='text' class='form-control input-sm m-b-10' name='name'>
    			</div>
        		
        		<input type='submit' class='btn' value='搜索'>
        	</form>
            <table class="table table-bordered table-hover tile">
                <thead>
                    <tr>
                        <th>退货编号</th>
                        <th>退货产品</th>
                        <th>退货时间</th>
                        <th>退货图片</th>
                        <th>退货/换货</th>
                        <th>退货原因</th>
                        <th>其他说明</th>
                        <th>退款状态</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    	<tr>
	                        <td><?php echo e($v->lid); ?></td>
	                        <td><?php echo e($v->name); ?></td>
                            <td><?php echo e($v->ltime); ?></td>
                            <td><?php if($v->refund_pic): ?><img src="/Admin/upload/<?php echo e($v->refund_pic); ?>" width="50"><?php endif; ?></td>
                            <td><?php if($v->refund_type == 0): ?>退款<?php elseif($v->refund_type == 1): ?>换货<?php endif; ?></td>
                            <td><?php echo e($v->refund_reason); ?></td>
	                        <td><?php echo e($v->refund_other_reason); ?></td>
                            <td><?php if($v->state==4): ?>退款审核<?php endif; ?> <?php if($v->state==5): ?>已退款<?php endif; ?></td>
	                        <td>
	                        	<a class="btn btn-sm btn-alt m-r-5" href='javascript:doDel(<?php echo e($v->lid); ?>)'>删除</a>
	                        	<a class="btn btn-sm btn-alt m-r-5" href="/admin/refund/<?php echo e($v->lid); ?>/edit">修改</a>
                                <a class="btn btn-sm btn-alt m-r-5" href="/admin/torefund/<?php echo e($v->lid); ?>">确定退货</a>
	                        </td>
	                    </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <?php echo e($data->appends($where)->links()); ?>

        </div>
    </div>
    <script type="text/javascript">
        function doDel(id){
        	if(confirm('确定删除吗？')){
        		var form = document.myform;
        		form.action = '/admin/refund/'+id;
        		form.submit();
        	}
        }

    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin.base.parent', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>