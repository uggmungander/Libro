
 
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>How To Create CRUD Operation In Laravel 10 - Techsolutionstuff</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="<?php echo e(route('libros.create')); ?>"> Create New libro</a>
            </div>
        </div>
    </div>
   
    <?php if($message = Session::get('success')): ?>
        <div class="alert alert-success">
            <p><?php echo e($message); ?></p>
        </div>
    <?php endif; ?>
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>ID</th>
            <th>Titulo</th>
            <th>Descripcion</th>
            <th>Coleccion</th>
            <th>Estado</th>
            <th width="280px">Action</th>
        </tr>
        <?php $__currentLoopData = $libro; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $libro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e(++$i); ?></td>
            <td><?php echo e($libro->id); ?></td>
            <td><?php echo e($libro->titulo); ?></td>
            <td><?php echo e($libro->descripcion); ?></td>
            <td><?php echo e($libro->coleccion_id); ?></td>
            <td><?php echo e($libro->estado_id); ?></td>
            <td>
                <form action="<?php echo e(route('libros.destroy',$libro->id)); ?>" method="POST">
   
                    <a class="btn btn-info" href="<?php echo e(route('libros.show',$libro->id)); ?>">Show</a>
    
                    <a class="btn btn-primary" href="<?php echo e(route('libros.edit',$libro->id)); ?>">Edit</a>
   
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
  
    
      
<?php $__env->stopSection(); ?>
<?php echo $__env->make('libro.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\sge\resources\views/libro/index.blade.php ENDPATH**/ ?>