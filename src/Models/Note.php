<?php

namespace OptimistDigital\NovaNotesField\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Note extends Model
{
    protected $table = 'nova_notes';
    protected $fillable = ['model_id', 'model_type', 'text', 'created_by', 'system'];
    protected $appends = ['created_by_avatar_url', 'can_delete'];

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
        return 'https://www.gravatar.com/avatar/' . md5(strtolower($createdBy->email)) . '?s=300';
    }

    public function getCanDeleteAttribute()
    {
        $user = Auth::user();
        if (empty($user)) return false;

        $createdBy = $this->createdBy;
        if (empty($createdBy)) return false;

        return $user->id === $createdBy->id;
    }
}
