<?php
class LoginAttempt extends ActiveRecord
{
    const LOGIN_ATTEMPT_LIMIT = 3; //
    const BANNED_IP_EXPIRATION_TIME = '+1 minute'; //
    
  
    /**
     * @see CActiveRecord::beforeSave()
     */
    protected function beforeSave()
    {
        $this->create_time = time();
        $this->expiration_time = strtotime(self::BANNED_IP_EXPIRATION_TIME, $this->create_time);
        
        return true;
    }
    

    public function isBanned($ip)
    {
        $c = $this->getCriteriaByIp($ip);
        if ($this->count($c) >= self::LOGIN_ATTEMPT_LIMIT) {
            return true;
        }
        return false;
    }
    

    public function purgeBannedIp($ip)
    {
        $c = $this->getCriteriaByIp($ip);

        if ($this->count($c) >= self::LOGIN_ATTEMPT_LIMIT) {
            $c->order = 't.create_time DESC';
            $model = $this->find($c);

            if (time() > $model->expiration_time) {
                $this->deleteAll('ip = :ip', array(':ip' => $ip));
            }
        }
    }
    
    /**
     * IPを条件にしたcriteriaを取得する
     * @param string $ip ip address
     * @return object criteria
     */
    private function getCriteriaByIp($ip)
    {
        $c = new CDbCriteria;
        $c->condition = 't.ip = :ip';
        $c->params[':ip'] = $ip;
        
        return $c;
    }
}