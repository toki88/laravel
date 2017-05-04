<?php $__env->startSection('content'); ?>
    <div class="block-area" id="tableHover">
        <h4 class="block-title">用户信息列表</h4>
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
            <form action='goods' method='get'>
                <div class='medio-body'>
                    商品名：<input type='text' class='form-control input-sm m-b-10' name='gname'>
                </div>
                <input class="btn btn-sm" type='submit' class='btn' value='搜索'>
            </form>
            <table class="table table-bordered table-hover tile" >

                <?php $__currentLoopData = $ob; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <form action='/admin/updgoods/<?php echo e($v->gid); ?>' method='post' enctype='multipart/form-data'>
                        <?php echo e(csrf_field()); ?>

                        
                        <h4>ID</h4>
                        <input disabled="" class="form-control" type="text" value="<?php echo e($v->gid); ?>">
                        <h4>商品名</h4>
                        <input disabled="" class="form-control" type="text" value="<?php echo e($v->gname); ?>">
                        <div class="col-lg-8"><h4>详情图</h4>
                            <?php $__currentLoopData = $pic; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ka => $va): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <!-- <input class='form-control m-b-6' type='text' name='pic[]' value="<?php echo e($va); ?>"> -->
                                <img src="/admin/upload/<?php echo e($va); ?>" height='60'>
                                <input type='file' name='pic[]'>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <!-- <div ><input class='form-control m-b-6' type='text' name='pic[]' ></div> -->
                            <div>
                                <input type='file' name='pic[]'>
                                <input type='file' name='pic[]'>
                                <input type='file' name='pic[]'>
                                <input type='file' name='pic[]'>
                                <input type='file' name='pic[]'>
                                <input type='file' name='pic[]'>
                            </div>
                        </div>
                                    
                        <div class="col-lg-8"><h4>详情参数 </h4>       <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ka => $va): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <input class='form-control m-b-6' type='text' name='data[]' value="<?php echo e($va); ?>">
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <div >
                                <input class='form-control m-b-6' type='text' name='data[]' >
                                <input class='form-control m-b-6' type='text' name='data[]' >
                                <input class='form-control m-b-6' type='text' name='data[]' >
                                <input class='form-control m-b-6' type='text' name='data[]' >
                                <input class='form-control m-b-6' type='text' name='data[]' >
                                <input class='form-control m-b-6' type='text' name='data[]' >
                                <input class='form-control m-b-6' type='text' name='data[]' >
                                <input class='form-control m-b-6' type='text' name='data[]' >
                                <input class='form-control m-b-6' type='text' name='data[]' >
                            </div>

                        </div>
                        <div class="col-lg-8"><h4>详情选项 格式:(名称~~值1``值2``值3``)</h4>        <?php $__currentLoopData = $check; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ka => $va): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <input class='form-control m-b-6' type='text' name='check[]' value="<?php echo e($va); ?>">
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <div >
                                <input class='form-control m-b-6' type='text' name='check[]' >
                                <input class='form-control m-b-6' type='text' name='check[]' >
                                <input class='form-control m-b-6' type='text' name='check[]' >
                                <input class='form-control m-b-6' type='text' name='check[]' >
                                <input class='form-control m-b-6' type='text' name='check[]' >
                                <input class='form-control m-b-6' type='text' name='check[]' >
                                <input class='form-control m-b-6' type='text' name='check[]' >
                                <input class='form-control m-b-6' type='text' name='check[]' >
                            </div>
                        </div>
                        <div class="col-lg-8"><h4>详情细节图 </h4>       <?php $__currentLoopData = $spec; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ka => $va): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <!-- <input class='form-control m-b-6' type='text' name='spec[]' value="<?php echo e($va); ?>"> -->
                                <img src="/admin/upload/<?php echo e($va); ?>" height='60'>
                                <input type='file' name='spec[]'>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <div >
                                <!-- <input class='form-control m-b-6' type='text' name='spec[]' > -->
                                <input type='file' name='spec[]'>
                                <input type='file' name='spec[]'>
                                <input type='file' name='spec[]'>
                                <input type='file' name='spec[]'>
                                <input type='file' name='spec[]'>
                                <input type='file' name='spec[]'>
                                <input type='file' name='spec[]'>
                            </div>
                        </div>
                        <div class="col-lg-8"><h4>搜索关键字</h4>        <?php $__currentLoopData = $keyword; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ka => $va): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <input class='form-control m-b-6' type='text' name='keyword[]' value="<?php echo e($va); ?>">
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <div >
                                <input class='form-control m-b-6' type='text' name='keyword[]' >
                                <input class='form-control m-b-6' type='text' name='keyword[]' >
                                <input class='form-control m-b-6' type='text' name='keyword[]' >
                                <input class='form-control m-b-6' type='text' name='keyword[]' >
                                <input class='form-control m-b-6' type='text' name='keyword[]' >
                                <input class='form-control m-b-6' type='text' name='keyword[]' >
                            </div>
                        </div>
                                
                        <div class="col-lg-8"><h4>操作</h4>
                            <a class="btn btn-sm btn-alt m-r-5" href='javascript:doDel(<?php echo e($v->gid); ?>)'>删除</a>
                            <a class="btn btn-sm btn-alt m-r-5" href='/admin/goods/<?php echo e($v->gid); ?>/edit'>修改基本商品资料</a>
                            <input class="btn btn-sm" type='submit' class='btn' value='提交'>
                        </div>
                    </form>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
            
        </div>
    </div>
    <script type="text/javascript" src='/js/jquery-1.8.3.min.js'></script>
    <script type="text/javascript">
        function doDel(id){
                var form = document.myform;
                form.action = '/admin/goods/'+id;
                form.submit();
        }


        

<?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin.base.parent', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>