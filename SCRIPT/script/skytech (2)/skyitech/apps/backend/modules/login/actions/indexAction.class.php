<?php
class indexAction extends sfAction
{
	/**
	 * check the login
	 * @access public
	 */
	public function execute()
	{
		if($this->getRequestParameter('login'))
		{
			$count = AdminPeer::CountRecord($this->getRequestParameter('username'),$this->getRequestParameter('password'));
			if($count == 1){
				$rs = AdminPeer::CountRecord($this->getRequestParameter('username'),$this->getRequestParameter('password'),'doselect');
				$this->getUser()->setAuthenticated(true);
				$this->getUser()->addCredential('admin');
				$this->getUser()->setAttribute('ADMINUSERID',$rs->getId(),'admin');
				$this->getUser()->setAttribute('ADMINUSERNAME',$rs->getUsername(),'admin');
				return $this->redirect('/');
			}
		}
	}

	public function validate()
	{
		if($this->getRequestParameter('login') && trim($this->getRequestParameter('username')) != '' && trim($this->getRequestParameter('password')) != ''){
			$count = AdminPeer::CountRecord($this->getRequestParameter('username'),$this->getRequestParameter('password'));
			//check if correct login & password provided
			if($count == 0){
				$this->getRequest()->setError('password', 'username and password not found');
					return false;
			}
		}
	}

	/**
	 * check the validation
	 * @access public
	 */
	public function handleError()
  	{
  		indexAction::execute();
  		return sfView::SUCCESS;
  	}
}