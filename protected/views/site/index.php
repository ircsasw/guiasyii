<?php $this->pageTitle=Yii::app()->name; ?>

	<h1>Welcome <i><?php if(!(Yii::app()->user->isGuest)) echo CHtml::encode(Yii::app()->user->name); ?></i></h1>

