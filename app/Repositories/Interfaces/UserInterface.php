<?php
    namespace app\Repositories\Interfaces;
    use App\models\User;

    interface UserInterface{

        public function save(User $user);
        public function all();
        public function getById(int $id);
        public function update(User $user);
        public function delete(int $id);



    }
