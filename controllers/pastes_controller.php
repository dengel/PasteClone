<?php
class PastesController extends AppController {

	var $name = 'Pastes';

	function index() {
		$this->Paste->recursive = 0;
		$this->set('pastes', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(sprintf(__('Invalid %s', true), 'paste'));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('paste', $this->Paste->read(null, $id));
	}

	function add() {
      $this->set('parseArray', $this->Paste->getParseValues());
		if (!empty($this->data)) {
			$this->Paste->create();
			if ($this->Paste->save($this->data)) {
				$this->Session->setFlash(sprintf(__('The %s has been saved', true), 'paste'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(sprintf(__('The %s could not be saved. Please, try again.', true), 'paste'));
			}
		}
	}

	function edit($id = null) {
      $this->set('parseArray', $this->Paste->getParseValues());
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(sprintf(__('Invalid %s', true), 'paste'));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Paste->save($this->data)) {
				$this->Session->setFlash(sprintf(__('The %s has been saved', true), 'paste'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(sprintf(__('The %s could not be saved. Please, try again.', true), 'paste'));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Paste->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(sprintf(__('Invalid id for %s', true), 'paste'));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Paste->delete($id)) {
			$this->Session->setFlash(sprintf(__('%s deleted', true), 'Paste'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(sprintf(__('%s was not deleted', true), 'Paste'));
		$this->redirect(array('action' => 'index'));
	}
}
?>
