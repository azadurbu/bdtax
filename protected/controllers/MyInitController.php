<?php	
class myInitController extends Controller {

	public function ActionRun()
	{

		$auth=Yii::app()->authManager;

		$auth->createOperation('createUser','create a user');


		$bizRule='return Yii::app()->user->id==$params["post"]->authID;';
		$task=$auth->createTask('updateOwnPost','update a post by author himself',$bizRule);

		$role=$auth->createRole('xango');
		$task->addChild('createUser');

		$auth->assign('superAdmin','xiko');
	}

	public function ActionCheckAccess()
	{

		if(Yii::app()->user->checkAccess('createUser')){
			echo "Access Granted";
		} else{
			echo "Access failed";
		}

	}

// 		echo 'Done';		$auth=Yii::app()->authManager;

// $auth->createOperation('createPost','create a post');
// $auth->createOperation('readPost','read a post');
// $auth->createOperation('updatePost','update a post');
// $auth->createOperation('deletePost','delete a post');

// $bizRule='return Yii::app()->user->id==$params["post"]->authID;';
// $task=$auth->createTask('updateOwnPost','update a post by author himself',$bizRule);
// $task->addChild('updatePost');

// $role=$auth->createRole('reader');
// $role->addChild('readPost');

// $role=$auth->createRole('author');
// $role->addChild('reader');
// $role->addChild('createPost');
// $role->addChild('updateOwnPost');

// $role=$auth->createRole('editor');
// $role->addChild('reader');
// $role->addChild('updatePost');

// $role=$auth->createRole('admin');
// $role->addChild('editor');
// $role->addChild('author');
// $role->addChild('deletePost');

// $auth->assign('reader','readerA');
// $auth->assign('author','authorB');
// $auth->assign('editor','editorC');
// $auth->assign('admin','adminD');
// 		echo 'Done';

	

}