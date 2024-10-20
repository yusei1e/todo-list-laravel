<div class="flex justify-center bg-gray">
    

    <form wire:submit="createTodo()">
        <div>
            <label for="small-input" class="block mb-2 text-sm font-medium text-gray-900">Title input</label>
            <input required type="text"  wire:model="title" wire:keydown.enter="createTodo" id="small-input" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
        <div class="mb-6">
            <label for="large-input" class="block mb-2 text-sm font-medium text-gray-900">Description input</label>
            <input required type="text" wire:model="description" id="large-input" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>

        <div class="relative max-w-sm">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                </svg>
            </div>
            <input required id="datepicker-format" wire:model="date" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
        </div>
        <button type="submit"> Click me to create Your todo</button>
    </form>

    <div>
        <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $todos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $todo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div>
                <!--[if BLOCK]><![endif]--><?php if(!$todo->completed): ?>
                    <div>
                        <input type="checkbox" value="<?php echo e($todo->completed); ?>" id="todo-<?php echo e($todo->id); ?>" wire:change="completeTodo(<?php echo e($todo->id); ?>)">
                        <label for="todo-<?php echo e($todo->id); ?>"><?php echo e($todo->title); ?></label>

                        <button  wire:click="delete(<?php echo e($todo->id); ?>)" type="button" class="focus:outline-none bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</button>
                    </div>
                <?php else: ?>
                    <div class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path fill="green" d="M9 16.2l-4.2-4.2L3.4 13l5.6 5.6L20.6 7l-1.4-1.4L9 16.2z"/>
                        </svg>
                        <label for="todo-<?php echo e($todo->id); ?>"><?php echo e($todo->title); ?></label>
                        <span style="margin-left:1rem"><?php echo e($todo->description); ?></span>
                        <span style="margin-left:1rem; margin-right:1rem;"><?php echo e($todo->date); ?></span>
                        <button wire:click="delete(<?php echo e($todo->id); ?>)" type="button" style="border: 2px solid black;" class="btn danger focus:outline-none bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</button>
                    </div>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <p>Please Create a Todo first</p>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    </div>

</div>
<?php /**PATH /var/www/resources/views/livewire/todo-list.blade.php ENDPATH**/ ?>