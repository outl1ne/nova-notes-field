<?php

namespace OptimistDigital\NovaNotesField\Models;

use Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use OptimistDigital\NovaNotesField\FieldServiceProvider;

class Note extends Model
{
    protected $table = 'nova_notes';
    protected $fillable = ['model_id', 'model_type', 'text', 'created_by', 'system'];
    protected $appends = ['created_by_avatar_url', 'can_delete'];

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
        $userClass = config('auth.providers.users.model');
        return $this->belongsTo($userClass, 'created_by');
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
