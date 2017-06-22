<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Posts Controller
 *
 * @property \App\Model\Table\PostsTable $Posts
 *
 * @method \App\Model\Entity\Post[] paginate($object = null, array $settings = [])
 */
class PostsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $posts = $this->paginate($this->Posts);
        $auth = [];
        foreach($posts as $post)
        {
           if($this->Auth->user('id') == $post["user_id"])
           {
                $auth[$post["id"]] = true;
           }
           else
           {
                $auth[$post["id"]] = false;
           }
        }
        
        $this->set(compact('posts'));
        $this->set('auth', $auth);
        $this->set('_serialize', ['posts', 'auth']);
    }

    /**
     * View method
     *
     * @param string|null $id Post id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $post = $this->Posts->get($id, [
            'contain' => ['Users', 'Comments']
        ]);

         //sets the username for the comments
        $this->loadModel('Users');
        for($i = 0; $i < sizeof($post->comments); $i++)
        {
            $username = $this->Users->get($post->comments[$i]["user_id"]);
            $post->comments[$i]["username"] =  $username["username"];
            $uid = $this->Auth->user('id');
            if($post->comments[$i]["user_id"] == $uid)
            {
                $post->comments[$i]["auth"] = true;
            }
            else
            {
                $post->comments[$i]["auth"] = false;  
            }
        }
        $this->loadModel('Comments');

        $comment = $this->Comments->newEntity();

        $users = $this->Comments->Users->find('list', ['limit' => 200]);
        $posts = $this->Comments->Posts->find('list', ['limit' => 200]);
        $this->set(compact('comment', 'users', 'posts'));
        $this->set('post', $post);
        $this->set('_serialize', ['post', 'comment']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $post = $this->Posts->newEntity();
        if ($this->request->is('post')) {
            $post = $this->Posts->patchEntity($post, $this->request->getData());
            $post["user_id"] = $this->Auth->user('id'); 
            if ($this->Posts->save($post)) {
                $this->Flash->success(__('The post has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The post could not be saved. Please, try again.'));
        }
        $users = $this->Posts->Users->find('list', ['limit' => 200]);
        $this->set(compact('post', 'users'));
        $this->set('_serialize', ['post']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Post id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $post = $this->Posts->get($id, [
            'contain' => []
        ]);
        if($post["user_id"] != $this->Auth->user('id'))
        {
            $this->Flash->error(__"You don't own this post"));
            exit();
        }

        if ($this->request->is(['patch', 'post', 'put'])) {
            $post = $this->Posts->patchEntity($post, $this->request->getData());
            if ($this->Posts->save($post)) {
                $this->Flash->success(__('The post has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The post could not be saved. Please, try again.'));
        }
        $users = $this->Posts->Users->find('list', ['limit' => 200]);
        $this->set(compact('post', 'users'));
        $this->set('_serialize', ['post']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Post id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
         $post = $this->Posts->get($id, [
            'contain' => []
        ]);
        if($post["user_id"] != $this->Auth->user('id'))
        {
            $this->Flash->error(__"You don't own this post"));
             exit();
        }
        if ($this->Posts->delete($post)) {
            $this->Flash->success(__('The post has been deleted.'));
        } else {
            $this->Flash->error(__('The post could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
