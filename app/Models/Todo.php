<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    /** @use HasFactory<\Database\Factories\TodoFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'is_completed',
        'due_date',
        'priority',
    ];

    protected $casts = [
        'due_date' => 'datetime',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    // Scope to filter completed todos
    public function scopeCompleted($query){
        return $query->where('is_completed', true);
    }

    // Scope to filter pending todos
    public function scopePending($query){
        return $query->where('is_completed', false);
    }

    // Accessor for theformated due date
    public function getFormattedDueDateAttribute(){

        // if($this->due_date){
        //     return $this->due_date->format('M d, Y');
        // } else {
        //     return null;
        // }

        // Simpler version of the above code
        return $this->due_date ? $this->due_date->format('M d, Y') : "Not set";
    }

}
