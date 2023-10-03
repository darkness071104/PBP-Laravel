<?php $__env->startSection('content'); ?>

<div class="card mt-5">
    <div class="card-header">Books Data</div>
    <div class="card-body">
        <a href="<?php echo e(route('books.create')); ?>" class="btn btn-primary mb-4">+ Add Book</a>
        <br>
        <table class="table table-striped">
            <tr>
                <th>ISBN</th>
                <th>Title</th>
                <th>Category</th>
                <th>Author</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
            <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($book->isbn); ?></td>
                <td><?php echo e($book->title); ?></td>
                <td><?php echo e($book->category->name); ?></td>
                <td><?php echo e($book->author); ?></td>
                <td><?php echo e($book->price); ?></td>
                <td>
                    <a class="btn btn-warning btn-sm" href="<?php echo e(route('books.edit', ['isbn' => $book->isbn])); ?>">Edit</a>
                    <form method="POST" action="<?php echo e(url('/books' . '/' . $book->isbn)); ?>" accept-charset="UTF-8" style="display:inline">
                        <?php echo e(method_field('DELETE')); ?>

                        <?php echo e(csrf_field()); ?>

                        <button type="submit" class="btn btn-danger btn-sm" title="Delete Book" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
        <br />
        Total Rows = <?php echo e($books->count()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('books.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ahmad\Downloads\bookorama_laravel\resources\views/books/index.blade.php ENDPATH**/ ?>