<?php

namespace App\Livewire\Dashboard\Users\Forms;

use Livewire\Form;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class UpdateForm extends Form
{
    public ?User $user;

    public $name = '';

    public $email = '';

    public $role = '';

    public $password = '';

    public $tandaTangan = '';

    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'email' => [
                'required',
                'string',
                Rule::unique('users', 'email')->ignore($this->user),
            ],
            'role' => ['required', 'string'],
            'password' => ['nullable', 'string', 'min:6'],
            'tandaTangan' => ['nullable'],
        ];
    }

    public function setUser(User $user)
    {
        $this->user = $user;

        $this->name = $user->name;
        $this->email = $user->email;
        $this->role = $user->role;
        $this->tandaTangan = $user->tandaTangan;
    }

    public function save()
    {
        $this->validate();

        $this->password = Hash::make($this->password);

        $this->user->update($this->except(['user']));
    }
}
