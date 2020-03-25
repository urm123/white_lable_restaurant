<?php
/**
 * Created by PhpStorm.
 * User: janaka
 * Date: 27/02/19
 * Time: 3:00 PM
 */

namespace App\Repository;


use App\User;

/**
 * Class UserRepository
 * @package App\Repository
 */
class UserRepository
{
    /**
     * @param array $request
     * @return User
     */
    public function create(array $request)
    {
        $user = new User($request);

        $user->save();

        return $user;
    }

    /**
     * @param string $email
     * @return mixed
     */
    public function getUserByEmail(string $email)
    {
        return User::where('email', '=', $email)->first();
    }

    /**
     * @return mixed
     */
    public function all()
    {
        return User::whereNull('role')->withTrashed()->get();
    }

    /**
     * @return mixed
     */
    public function paginate()
    {
        return User::whereNull('role')->withTrashed()->paginate(15);
    }

    /**
     * @param int $user_id
     * @return mixed
     */
    public function restore(int $user_id)
    {
        return User::whereId($user_id)->restore();
    }

    /**
     * @return mixed
     */
    public function admins()
    {
        return User::where('role', '=', 'admin')->withTrashed()->get();
    }

    public function allAdmins()
    {
        return User::whereIn('role', ['admin', 'master_admin'])->withTrashed()->get();
    }

    /**
     * @param int $user_id
     * @param array $request
     * @return mixed
     */
    public function update(int $user_id, array $request)
    {
        return User::whereId($user_id)->update($request);
    }

    /**
     * @return mixed
     */
    public function getGuest()
    {
        return User::whereFirstName('Guest')
            ->whereLastName('Guest')
            ->whereEmail(setting('guest_email_id'))
            ->first();
    }

    /**
     * @return User
     */
    public function createGuest()
    {
        $user = new User([
            'first_name' => 'Guest',
            'last_name' => 'User',
            'email' => setting('guest_email_id'),
        ]);

        $user->save();

        return $user;
    }
}
