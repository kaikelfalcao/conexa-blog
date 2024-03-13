<?php if(Yii::app()->user->hasFlash('info')): ?>
    <div x-data="{ showModal: true }" x-init="setTimeout(() => showModal = false, 3000)">
        <!-- Modal -->
        <div class="fixed inset-0 z-30 flex items-center justify-center overflow-auto bg-black bg-opacity-50" x-show="showModal">
            <!-- Modal inner -->
            <div class="max-w-3xl px-6 py-4 mx-auto text-left bg-white rounded shadow-lg">
                <div class="flex justify-between items-center pb-2">
                    <p class="text-2xl font-bold"><?php echo Yii::app()->user->getFlash('info'); ?></p>
                </div>
                <div class="flex justify-end pt-2">
                    <button class="px-4 bg-transparent p-3 rounded-lg text-indigo-500 hover:bg-gray-100 hover:text-indigo-400 mr-2" @click="showModal = false">Fechar</button>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>