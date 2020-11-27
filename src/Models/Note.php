<?php

namespace OptimistDigital\NovaNotesField\Models;

use Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use OptimistDigital\NovaNotesField\FieldServiceProvider;

class Note extends Model
{
    protected $table = 'nova_notes';
    protected $casts = ['system' => 'bool'];
    protected $fillable = ['model_id', 'model_type', 'text', 'created_by', 'system'];
    protected $hidden = ['createdBy', 'notable_type', 'notable_id'];
    protected $appends = ['created_by_avatar_url', 'created_by_name', 'can_delete'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->setTable(FieldServiceProvider::getTableName());
    }

    public function notable()
    {
        return $this->morphTo();
    }

    public function createdBy()
    {
        $provider = 'users';
        if (config('nova.guard')) $provider = config('auth.guards.' . config('nova.guard') . '.provider');
        $userClass = config('auth.providers.' . $provider . '.model');
        return $this->belongsTo($userClass, 'created_by');
    }

    public function getCreatedByNameAttribute()
    {
        $user = $this->createdBy;

        // Try different combinations
        if (!empty($user->name)) return $user->name;
        if (!empty($user->first_name)) return $user->first_name . (!empty($user->last_name) ? " {$user->last_name}" : '');
        return __('User');
    }

    public function getCreatedByAvatarUrlAttribute()
    {
        $createdBy = $this->createdBy;
        if (empty($createdBy)) return null;

        $avatarCallable = config('nova-notes-field.get_avatar_url', null);
        if (is_callable($avatarCallable)) return call_user_func($avatarCallable, $createdBy);

        return 'https://www.gravatar.com/avatar/' . md5(strtolower($createdBy->email)) . '?s=300';
    }

    public function getCanDeleteAttribute()
    {
        if (Gate::has('delete-nova-note')) return Gate::check('delete-nova-note', $this);

        $user = Auth::user();
        if (empty($user)) return false;

        $createdBy = $this->createdBy;
        if (empty($createdBy)) return false;

        return $user->id === $createdBy->id;
    }
}
