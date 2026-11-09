<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Member extends Model
{
    use HasFactory;

    protected $primaryKey = 'member_id';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'address',
        'membership_date',
        'status',
    ];

    /**
     * Borrowings recorded for this member.
     */
    public function borrowings(): HasMany
    {
        return $this->hasMany(Borrowing::class, 'member_id', 'member_id');
    }

    /**
     * Books borrowed by this member.
     */
    public function books(): BelongsToMany
    {
        return $this->belongsToMany(Book::class, 'borrowings', 'member_id', 'book_id')
                    ->withPivot('borrow_date', 'due_date', 'return_date', 'status', 'fine_amount')
                    ->withTimestamps();
    }
}
