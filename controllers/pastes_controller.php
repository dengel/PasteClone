<?php

class PastesController extends AppController {

    var $name = 'Pastes';
    var $paginate = array(
        'limit' => 5,
        'order' => array(
            'Paste.id' => 'desc'
        )
    );

    function beforeRender() {
        $this->layout = "pasteclone";
        //$this->set('app_domain',  $this->Murl->getAppDomain());
        //$this->set('app_slogan',  $this->Murl->getAppSlogan());
        //$this->set('app_version', $this->Murl->getAppVersion());
        $this->set('app_domain',  'dengel.me');
        $this->set('app_slogan',  'Simple Secure Paste Clone');
        $this->set('app_version', '1.0');
    }

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

        $error = 0;
        $gravatar = "";
        $paste = $this->Paste->read(null, $id);

        /* Add hits */
        $this->Paste->updateAll(array('Paste.hits' => 'Paste.hits+1'), array('Paste.id' => $paste['Paste']['id']));
        $this->data['Hit']['paste_id'] = $paste['Paste']['id'];
        $this->data['Hit']['remote'] = $this->RequestHandler->getClientIP();
        $this->data['Hit']['referer'] = $this->RequestHandler->getReferer();
        $this->data['Hit']['agent'] = $_SERVER['HTTP_USER_AGENT'];
        $this->Paste->Hit->save($this->data);



        if ($paste['Paste']['protect'] && !isset($this->data['Paste'])) {
            $this->Session->setFlash('Protected! What\'s the magic word?');
            $error = 401;
        } elseif (($paste['Paste']['protect']) && ($paste['Paste']['protect'] != md5($this->data['Paste']['protect']))) {
            $this->Session->setFlash('Bad Password. Try again?');
            $error = 401;
        } elseif ($paste['Paste']['destruct'] && $paste['Paste']['hits']) {
            $this->Session->setFlash('Expired! This paste has self-destructed');
            $error = 410;
        }

        if (!empty($paste['Paste']['email']) && $paste['Paste']['gravatar']) {
            $gravatar = "<img src=\"" . $this->getGravatar($paste['Paste']['email']) . "\" alt=\"Gravatar\">";
        }
        else{
            $gravatar = "<img src=\"http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm\" alt=\"Gravatar\">";
        }

        # These are the return values for the View.
        $this->set('paste', $paste);
        $this->set('error', $error);
        $this->set('gravatar', $gravatar);
        $this->set('thisurl', $this->getUrl());
    }

    function add() {
        $this->set('parseArray', $this->Paste->getParseValues());
        if (!empty($this->data)) {
            $this->data['Paste']['remote']  = $this->RequestHandler->getClientIP();
            $this->data['Paste']['referer'] = $this->RequestHandler->getReferer();
            $this->data['Paste']['agent']   = $_SERVER['HTTP_USER_AGENT'];
            if (!empty($this->data['Paste']['protect'])) {
                $this->data['Paste']['protect'] = md5($this->data['Paste']['protect']);
            } else {
                $this->data['Paste']['protect'] = null;
            }
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
            if ($this->Paste->save($this->data, false)) {
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
            $this->redirect(array('action' => 'index'));
        }
        if ($this->Paste->delete($id)) {
            $this->Session->setFlash(sprintf(__('%s deleted', true), 'Paste'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(sprintf(__('%s was not deleted', true), 'Paste'));
        $this->redirect(array('action' => 'index'));
    }

    function ezprint($id = null) {
        $this->layout = "ezprint";

        if ($this->data) {
            $id = $id ? $id : $this->data['Paste']['id'];
        }

        if (!$id) {
            $this->Session->setFlash(sprintf(__('Invalid %s', true), 'paste'));
            $this->redirect(array('action' => 'index'));
        }

        $error = 0;
        $gravatar = "";
        $paste = $this->Paste->read(null, $id);

        /* Add hits */
        $this->Paste->updateAll(array('Paste.hits' => 'Paste.hits+1'), array('Paste.id' => $paste['Paste']['id']));
        $this->data['Hit']['paste_id'] = $paste['Paste']['id'];
        $this->data['Hit']['remote'] = $this->RequestHandler->getClientIP();
        $this->data['Hit']['referer'] = $this->RequestHandler->getReferer();
        $this->data['Hit']['agent'] = $_SERVER['HTTP_USER_AGENT'];
        $this->Paste->Hit->save($this->data);



        if ($paste['Paste']['protect'] && !isset($this->data['Paste'])) {
            $this->Session->setFlash('Protected! What\'s the magic word?');
            $error = 401;
        } elseif (($paste['Paste']['protect']) && ($paste['Paste']['protect'] != md5($this->data['Paste']['protect']))) {
            $this->Session->setFlash('Bad Password. Try again?');
            $error = 401;
        } elseif ($paste['Paste']['destruct'] && $paste['Paste']['hits']) {
            $this->Session->setFlash('Expired! This paste has self-destructed');
            $error = 410;
        }

        if (!empty($paste['Paste']['email']) && $paste['Paste']['gravatar']) {
            $gravatar = "<img src=\"" . $this->getGravatar($paste['Paste']['email']) . "\" alt=\"Gravatar\">";
        }
        else{
            $gravatar = "<img src=\"http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm\" alt=\"Gravatar\">";
        }

        # These are the return values for the View.
        $this->set('paste', $paste);
        $this->set('error', $error);
        $this->set('gravatar', $gravatar);
        $this->set('thisurl', $this->getUrl());
    }

    function top() {
        $this->set('title_for_layout', "Top Paste");
        $this->Murl->recursive = 0;
        $this->set('pastes', $this->Paste->find('all', array(
                    'limit' => 20,
                    'order' => array('Paste.hits DESC'),
                )));
    }

    function random() {
        $this->set('title_for_layout', "Random Paste");
        $this->Murl->recursive = 0;
        $this->set('pastes', $this->Paste->find('all', array(
                    'limit' => 1,
                    'order' => array('rand()'),
                )));
    }


}
?>
