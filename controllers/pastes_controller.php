<?php
class PastesController extends AppController {

	var $name = 'Pastes';

   var $paginate = array(
      'limit' => 5,
      'order' => array(
         'Paste.id' => 'desc'
      )
   );

	function index() {
		$this->Paste->recursive = 0;
		$this->set('pastes', $this->paginate());
	}

	function view($id = null) {
      if ($this->data) {
         $id = $id ? $id : $this->data['Paste']['id'];
      }

		if (!$id) {
			$this->Session->setFlash(sprintf(__('Invalid %s', true), 'paste'));
			$this->redirect(array('action' => 'index'));
		}

      $error=0;
		$paste=$this->Paste->read(null, $id);

      if ($paste['Paste']['protect'] && !isset($this->data['Paste'])) {
         $this->Session->setFlash('Protected! What\'s the magic word?');
         $error=401;
      } elseif ($paste['Paste']['protect'] != md5($this->data['Paste']['protect'])) {
         $this->Session->setFlash('Bad Password. Try again?');
         $error=401;
      } 

		$this->set('paste', $paste);
      $this->set('error', $error);

	}

	function add() {
      $this->set('parseArray', $this->Paste->getParseValues());
		if (!empty($this->data)) {
         $this->data['Paste']['protect'] = md5($this->data['Paste']['protect']);
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
         // Disabling data validation with a save($data,false) for now.
         // TODO: Must enable data validation for production. Thanx stefano :)
			if ($this->Paste->save($this->data,false)) {
				$this->Session->setFlash(sprintf(__('The %s has been saved', true), 'paste'));
				$this->redirect(array('action' => 'view', $id));
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
