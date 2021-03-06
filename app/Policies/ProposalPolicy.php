<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Module;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProposalPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        $module = Module::select(['read', 'create', 'update', 'delete'])->where(['module_name'=>'proposal_module', 'role_id'=>$user->role->id])->first();
        if ($module->create == 'on' || $module->read == 'on' || $module->update == 'on' || $module->delete == 'on') {
            return true;
        }else{
            return false;
        }
    }

   
    public function view(User $user){
        $module = Module::select(['read'])->where(['module_name'=>'proposal_module', 'role_id'=>$user->role->id])->first();
        return $module->read == 'on';
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        $module = Module::select(['create'])->where(['module_name'=>'proposal_module', 'role_id'=>$user->role->id])->first();
        return $module->create == 'on';
    }
    
    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Contact\Contact  $contact
     * @return mixed
     */
    public function update(User $user)
    {
        $module = Module::select(['update'])->where(['module_name'=>'proposal_module', 'role_id'=>$user->role->id])->first();
        return $module->update == 'on';
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Contact\Contact  $contact
     * @return mixed
     */
    public function delete(User $user)
    {
        $module = Module::select(['delete'])->where(['module_name'=>'proposal_module', 'role_id'=>$user->role->id])->first();
        return $module->delete == 'on';
    }

 
}
