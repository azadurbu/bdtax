<?php

class User_rg extends CActiveRecord
{
	const STATUS_NOACTIVE=0;
	const STATUS_ACTIVE=1;
	const STATUS_BANNED=-1;
	
	//TODO: Delete for next version (backward compatibility)
	const STATUS_BANED=-1;
	
	/**
	 * The followings are the available columns in table 'users':
	 * @var integer $id
	 * @var string $username
	 * @var string $password
	 * @var string $email
	 * @var string $activkey
	 * @var integer $createtime
	 * @var integer $lastvisit
	 * @var integer $superuser
	 * @var integer $status
     * @var timestamp $create_at
     * @var timestamp $lastvisit_at
	 */

	/**
	 * Returns the static model of the specified AR class.
	 * @return CActiveRecord the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return Yii::app()->getModule('user')->tableUsers;
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.CConsoleApplication
		return ((get_class(Yii::app())=='CConsoleApplication' || (get_class(Yii::app())!='CConsoleApplication' && Yii::app()->getModule('user')->isAdmin()))?array(
			array('first_name', 'length', 'max'=>20, 'min' => 3,'message' => Yii::t('user',"Incorrect First Name (length between 3 and 20 characters).")),
			array('last_name', 'length', 'max'=>20, 'min' => 3,'message' => Yii::t('user',"Incorrect Last Name (length between 3 and 20 characters).")),
			array('username', 'length', 'max'=>20, 'min' => 3,'message' => Yii::t('user',"Incorrect username (length between 3 and 20 characters).")),
			array('password', 'length', 'max'=>128, 'min' => 4,'message' => Yii::t('user',"Incorrect password (minimal length 4 symbols).")),
			array('email', 'email'),
			array('username', 'unique', 'message' => Yii::t('user',"This user's name already exists.")),
			array('email', 'unique', 'message' => Yii::t('user',"This user's email address already exists.")),
			array('username', 'match', 'pattern' => '/^[A-Za-z0-9_]+$/u','message' => Yii::t('user',"Incorrect symbols (A-z0-9).")),
			array('status', 'in', 'range'=>array(self::STATUS_NOACTIVE,self::STATUS_ACTIVE,self::STATUS_BANNED)),
			array('superuser', 'in', 'range'=>array(0,1)),
            array('create_at', 'default', 'value' => date('Y-m-d H:i:s'), 'setOnEmpty' => true, 'on' => 'insert'),
            array('lastvisit_at', 'default', 'value' => '0000-00-00 00:00:00', 'setOnEmpty' => true, 'on' => 'insert'),
			array('username, email, superuser, status', 'required'),
			array('superuser, status', 'numerical', 'integerOnly'=>true),
			array('id, username, password, email, activkey, create_at, lastvisit_at, superuser, status', 'safe', 'on'=>'search'),
		):((Yii::app()->user->id==$this->id)?array(
			array('username, email', 'required'),
			array('username', 'length', 'max'=>20, 'min' => 3,'message' => Yii::t('user',"Incorrect username (length between 3 and 20 characters).")),
			array('email', 'email'),
			array('username', 'unique', 'message' => Yii::t('user',"This user's name already exists.")),
			array('username', 'match', 'pattern' => '/^[A-Za-z0-9_]+$/u','message' => Yii::t('user',"Incorrect symbols (A-z0-9).")),
			array('email', 'unique', 'message' => Yii::t('user',"This user's email address already exists.")),
		):array()));
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
//        $relations = Yii::app()->getModule('user')->relations;
//        if (!isset($relations['profile']))
//            $relations['profile'] = array(self::HAS_ONE, 'Profile', 'user_id');
//        return $relations;
        return array();
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
public function attributeLabels()
	{
		return array(
			'id' => Yii::t('user',"Id"),
			'first_name'=>Yii::t('user',"First Name"),
			'last_name'=>Yii::t('user',"Last Name"),
			'company'=>Yii::t('user',"Company"),
			'address1'=>Yii::t('user',"Address"),
			'address2'=>Yii::t('user'," "),
			'city'=>Yii::t('user',"City"),
			'state'=>Yii::t('user',"State"),
			'zip_code'=>Yii::t('user',"Zip Code"),
			'phone'=>Yii::t('user',"Phone"),
			'fax'=>Yii::t('user',"Fax"),
			'state_reseller_id'=>Yii::t('user',"State Reseller ID"),
			'federa_tax_id'=>Yii::t('user',"Federal Tax ID"),
			'sales_rep'=>Yii::t('user',"Sales Rep"),
			'username'=>Yii::t('user',"username"),
			'password'=>Yii::t('user',"password"),
			'verifyPassword'=>Yii::t('user',"Retype Password"),
			'email'=>Yii::t('user',"E-mail"),
			'verifyCode'=>Yii::t('user',"Verification Code"),
			'activkey' => Yii::t('user',"activation key"),
			'createtime' => Yii::t('user',"Registration date"),
			'create_at' => Yii::t('user',"Registration date"),
			
			'lastvisit_at' => Yii::t('user',"Last visit"),
			'superuser' => Yii::t('user',"Superuser"),
			'status' => Yii::t('user',"Status"),
		);
	}
	
	public function scopes()
    {
        return array(
            'active'=>array(
                'condition'=>'status='.self::STATUS_ACTIVE,
            ),
            'notactive'=>array(
                'condition'=>'status='.self::STATUS_NOACTIVE,
            ),
            'banned'=>array(
                'condition'=>'status='.self::STATUS_BANNED,
            ),
            'superuser'=>array(
                'condition'=>'superuser=1',
            ),
            'notsafe'=>array(
            	'select' => 'id, username, password, email, activkey, create_at, lastvisit_at, superuser, status',
            ),
        );
    }
	
	public function defaultScope()
    {
        return CMap::mergeArray(Yii::app()->getModule('user')->defaultScope,array(
            'alias'=>'user',
            'select' => 'user.id, user.username, user.email, user.create_at, user.lastvisit_at, user.superuser, user.status',
        ));
    }
	
	public static function itemAlias($type,$code=NULL) {
		$_items = array(
			'UserStatus' => array(
				self::STATUS_NOACTIVE => Yii::t('user','Not active'),
				self::STATUS_ACTIVE => Yii::t('user','Active'),
				self::STATUS_BANNED => Yii::t('user','Banned'),
			),
			'AdminStatus' => array(
				'0' => Yii::t('user','No'),
				'1' => Yii::t('user','Yes'),
			),
		);
		if (isset($code))
			return isset($_items[$type][$code]) ? $_items[$type][$code] : false;
		else
			return isset($_items[$type]) ? $_items[$type] : false;
	}
	
/**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search()
    {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria=new CDbCriteria;
        
        $criteria->compare('id',$this->id);
        $criteria->compare('username',$this->username,true);
        $criteria->compare('password',$this->password);
        $criteria->compare('email',$this->email,true);
        $criteria->compare('activkey',$this->activkey);
        $criteria->compare('create_at',$this->create_at);
        $criteria->compare('lastvisit_at',$this->lastvisit_at);
        $criteria->compare('superuser',$this->superuser);
        $criteria->compare('status',$this->status);

        return new CActiveDataProvider(get_class($this), array(
            'criteria'=>$criteria,
        	'pagination'=>array(
				'pageSize'=>Yii::app()->getModule('user')->user_page_size,
			),
        ));
    }

    public function getCreatetime() {
        return strtotime($this->create_at);
    }

    public function setCreatetime($value) {
        $this->create_at=date('Y-m-d H:i:s',$value);
    }

    public function getLastvisit() {
        return strtotime($this->lastvisit_at);
    }

    public function setLastvisit($value) {
        $this->lastvisit_at=date('Y-m-d H:i:s',$value);
    }
}