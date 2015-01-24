<?php

namespace Anax\Users;
 
/**
 * A controller for users and admin related events.
 *
 */
class UsersController implements \Anax\DI\IInjectionAware
{
    use \Anax\DI\TInjectable;
    
/**
 * Initialize the controller.
 *
 * @return void
 */
public function initialize()
{
    $this->users = new \Anax\Users\User();
    $this->users->setDI($this->di);
}
    
    
/**
 * List all users.
 *
 * @return void
 */
public function listAction()
{
    //$this->users = new \Anax\Users\User();
    //$this->users->setDI($this->di);
    //$this->initialize(); 
    $all = $this->users->findAll();
    $this->users->rankCheckAll();    
    $this->theme->setTitle("Lista alla användare");
    $this->views->add('users/list-all', [
        'users' => $all,
        'title' => "Visa alla användare",
    ]);
}
    
    
/**
 * List user with id.
 *
 * @param int $id of user to display
 *
 * @return void
 */
public function idAction($id = null)
{

    $user = $this->users->find($id);
    $this->users->rankCheck($id);
    $sql = "SELECT * FROM projekt_comment WHERE userId = ?";
    $params = array($id);
    $res = $this->db->executeFetchAll($sql, $params);
    
    $sql = "SELECT * FROM projekt_answers WHERE userId = ?";
    $params = array($id);
    $res2 = $this->db->executeFetchAll($sql, $params);
    
    $comments = array();
    foreach($res as $comment) {
        array_push($comments, $comment);    
    }
    
    $this->theme->setTitle("Visa användare med ID");
    $this->views->add('users/view', [
        'user' => $user,
        'comments' => $res,
        'answers' => $res2,
    ]);
}
    
/**
 * Add new user.
 *
 * @param string $acronym of user to add.
 *
 * @return void
 */
public function addAction()
{
        //$this->initialize(); 
        $form = $this->form;
        $form = $form->create([], [ 
            'acronym' => [ 
                'type'        => 'text', 
                'label'       => 'Användarnamn', 
                'required'    => true, 
                'validation'  => ['not_empty'], 
            ], 
            'password' => [ 
                'type'        => 'password', 
                'label'       => 'Lösenord', 
                'required'    => true, 
                'validation'  => ['not_empty'], 
            ], 
            'name' => [ 
                'type'        => 'text', 
                'label'       => 'Namn', 
                'required'    => true, 
                'validation'  => ['not_empty'], 
            ], 
            'email' => [ 
                'type'        => 'text', 
                'required'    => true, 
                'validation'  => ['not_empty', 'email_adress'], 
            ], 
            'submit' => [ 
                'type'      => 'submit', 
                'value' => 'Lägga till',
                'callback'  => function($form) { 

                    $now = date('Y-m-d H:i:s'); 
              
                    $this->users->save([ 
                        'acronym'     => $form->Value('acronym'), 
                        'email'     => $form->Value('email'), 
                        'name'         => $form->Value('name'), 
                        'password'     => password_hash($form->Value('password'), PASSWORD_DEFAULT), 
                        'created'     => $now, 
                        'active'     => $now, 
                        'type'     => 'user',
                        'rank'     => 'Anonymous',
                    ]); 

                    return true; 
                } 
            ], 

        ]);
        $status = $form->check(); 
        if ($status === true) { 
          
            $url = $this->url->create('users/id/' . $this->users->id); 
            $this->response->redirect($url); 
         
        } 
        
        else if ($status === false) { 
            
            $form->AddOutput("Det gick inte att skapa!"); 
            $url = $this->url->create('users/add'); 
            $this->response->redirect($url); 
        } 
    
        $this->theme->setTitle("Skapa en användare"); 
        $this->views->add('users/update', [ 
            'title' => "<i class='fa fa-pencil-square-o'></i> Lägga till en användare", 
            'form' => $form->getHTML() 
        ]); 
    

}    
    

/**
 * Delete user.
 *
 * @param integer $id of user to delete.
 *
 * @return void
 */
public function deleteAction($id = null)
{
    //$this->initialize(); 
    if (!isset($id)) {
        die("Missing id");
    }
 
    $this->users->delete($id);
 
    $url = $this->url->create('users/list');
    $this->response->redirect($url);
}
    
/**
 * Delete (soft) user.
 *
 * @param integer $id of user to delete.
 *
 * @return void
 */
public function softDeleteAction($id = null)
{
    //$this->initialize(); 
    if (!isset($id)) {
        die("Missing id");
    }
 
    $now = date('Y-m-d H:i:s');
 
    $user = $this->users->find($id);
 
    $user->deleted = $now;
    $user->save();
 
    $url = $this->url->create('users/id/' . $id);
    $this->response->redirect($url);
}
    

public function undoSoftDeleteAction($id = null)
{
    //$this->initialize(); 
    if (!isset($id)) {
        die("Missing id");
    }
 
    $now = null;
 
    $user = $this->users->find($id);
 
    $user->deleted = $now;
    $user->save();
 
    $url = $this->url->create('users/id/' . $id);
    $this->response->redirect($url);
}
    
/**
 * List all active and not deleted users.
 *
 * @return void
 */
public function activeAction()
{
    //$this->initialize(); 
    $all = $this->users->query()
        ->where('active IS NOT NULL')
        ->andWhere('deleted is NULL')
        ->execute();
 
    $this->theme->setTitle("Aktiva Användare");
    $this->views->add('users/list-all', [
        'users' => $all,
        'title' => "Aktiva användare",
    ]);
}
    

public function inactiveAction()
{
    //$this->initialize(); 
    $all = $this->users->query()
        ->where('active IS NULL')
        ->execute();
 
    $this->theme->setTitle("Inaktiva Användare");
    $this->views->add('users/list-all', [
        'users' => $all,
        'title' => "Inaktiva användare",
    ]);
}
    

public function aktiveraAction($id = null)
{
    //$this->initialize();
        if (!isset($id)) {
        die("Missing id");
    }
    $now = date('Y-m-d H:i:s');
     
    $user = $this->users->find($id);
     
    $user->active = $now;
    $user->save();
     
    $url = $this->url->create('users/list');
    $this->response->redirect($url);
}
    

public function inaktiveraAction($id = null)
{
    //$this->initialize();
        if (!isset($id)) {
        die("Missing id");
    }
    $now = date('Y-m-d H:i:s');
     
    $user = $this->users->find($id);
     
    $user->active = null;
    $user->save();
     
    $url = $this->url->create('users/list');
    $this->response->redirect($url);
}
    
public function trashAction()
{
    //$this->initialize();
    $all = $this->users->query()
        ->where('deleted IS NOT NULL')
        ->execute();
 
    $this->theme->setTitle("Papperskorg");
    $this->views->add('users/list-all', [
        'users' => $all,
        'title' => "Papperskorg",
    ]);
}


public function updateAction($id = null)
{
    //$this->initialize();
        if (!isset($id)) {
        die("Missing id");
    }
    $user = $this->users->find($id);
    //$form = new \Mos\HTMLForm\CForm();
    $form = $this->form;
    
    $form = $form->create([], [ 
            'acronym' => [ 
                'type'        => 'text', 
                'label'       => 'Användarnamn', 
                'required'    => true, 
                'validation'  => ['not_empty'], 
                'value' => $user->acronym,            ], 
            'name' => [ 
                'type'        => 'text', 
                'label'       => 'Namn', 
                'required'    => true, 
                'validation'  => ['not_empty'], 
                'value' => $user->name,
            ], 
            'email' => [ 
                'type'        => 'text', 
                'required'    => true, 
                'validation'  => ['not_empty', 'email_adress'], 
                'value' => $user->email,
            ], 
            'submit' => [ 
                'type'      => 'submit', 
                'value' => 'Uppdatera',
                'callback'  => function($form) use ($user) { 

                    $now = date('Y-m-d H:i:s'); 

                    $this->users->save([ 
                        'id'        => $user->id, 
                        'acronym'   => $form->Value('acronym'), 
                        'email'     => $form->Value('email'), 
                        'name'      => $form->Value('name'), 
                        'active'    => $now, 
                        'updated'   => $now, 
                    ]);
                    return true;
                } 
            ], 
        ]);
    
        $status = $form->check(); 
        if ($status === true) { 
            $url = $this->url->create('users/id/' . $user->id); 
            $this->response->redirect($url); 
         
        } 
        
        else if ($status === false) {
            $form->AddOutput("<p><i>Det gick inte att spara!</i></p>");
            $url = $this->url->create('users/update/' . $user->id); 
            $this->response->redirect($url); 
        } 
    
        $this->theme->setTitle("Editera användare"); 
        $this->views->add('users/update', [ 
            'title' => "<i class='fa fa-pencil-square-o'></i> Editera användare", 
            'form' => $form->getHTML() 
        ]); 
}

    
    
public function loggaInAction()
{
        $di = $this;
        $form = $this->form;
        $form = $form->create([], [ 
            'acronym' => [ 
                'type'        => 'text', 
                'label'       => 'Användarnamn', 
                'required'    => true, 
                'validation'  => ['not_empty'], 
            ], 
            'password' => [ 
                'type'        => 'password', 
                'label'       => 'Lösenord', 
                'required'    => true, 
                'validation'  => ['not_empty'], 
            ], 

            'submit' => [ 
                'type'      => 'submit', 
                'value' => 'Logga in',
                'callback'  => function($form) use ($di) { 
            if( $this->login($form->Value('acronym'), $form->Value('password'))) {
              return true;
            }
            $form->AddOutput('Felaktigt användarnamn eller lösenord');
            return false;
                } 
            ], 

        ]);

        if (isset($_SESSION['user'])){
             $form->AddOutput('Välkommen! Du är nu inloggad som <b>'.$this->di->session->get('user')->acronym.'</b>');}
    
        $status = $form->check();
      if ($status === true) {
        header("Location: " . $this->url->create('users/id/' . $this->users->id));
      }
    
      else if( $status === false ){
        header('Location: ' . $this->url->create('users/loggain'));
      }


        $this->theme->setTitle("Logga in"); 
        $this->views->add('users/loggain', [ 
            'title' => "<i class='fa fa-sign-in'></i> Logga in", 
            'form' => $form->getHTML() 
        ]); 
    
}   
    
    
public function login($acronym, $password)
    {
        if($user = $this->getAcr($acronym)){
            $now = date('Y-m-d H:i:s');
            $this->users->save([
                'id' => $user->id,
                'active' => $now,
            ]);            
            $hashedPassword = $user->password;
            if(password_verify($password, $hashedPassword)){
                $this->di->session->set('user', $user);
                return true;
            }
            else
                return false;
        }
        else{
            return false;
        }
    }
    
public function getAcr($acronym)
    {
        $response = $this->users->query()
            ->where('acronym = ?')
            ->execute([$acronym]);
            
        if(isset($response[0])){
            return $response[0];
        }
        else{
            return false;   
        }
    }
    
public function loggaUtAction(){
    $_SESSION['user'] = null;
    $this->theme->setTitle("Logga ut");
    $this->views->add('users/loggain', [ 
        'title' => "<i class='fa fa-check'></i> Du har loggats ut!", 
        'form' => "<p><a href='".$this->url->create('users/loggaIn')."'><i class='fa fa-sign-in'></i> Logga in </a></p>"
    ]); 

}
    
    
    
    
    
    
    


    
}