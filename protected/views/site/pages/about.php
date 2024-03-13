<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - About';
?>
<div class="flex flex-col justify-center items-center">
    <div class="flex justify-center items-center max-w-screen-xl">
        <div class="sm:w-1/2 p-10">
            <div class="image object-center text-center">
                <img src="<?= Yii::app()->request->baseUrl; ?>/images/about.svg">
            </div>
        </div>
        <div class="sm:w-1/2 p-5">
            <div class="text">
                <span class="text-gray-500 border-b-2 border-orange-400 uppercase">Sobre nós</span>
                <h2 class="my-4 font-bold text-3xl sm:text-4xl">Sobre a <span class="text-orange-400">Conexa</span></h2>
                <p class="text-gray-700">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, commodi doloremque, fugiat illum magni minus nisi nulla numquam obcaecati placeat quia, repellat tempore voluptatum.
                </p>
            </div>
        </div>
    </div>
</div>
