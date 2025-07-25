<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',       // Người nộp đơn
        'job_id',        // Công việc được apply
        'resume',        // Đường dẫn file CV
        'cover_letter',  // Thư ứng tuyển
        'status'         // pending, accepted, rejected, etc.
    ];

    // Người ứng tuyển
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Công việc được apply
    public function job()
    {
        return $this->belongsTo(Job::class);
    }
}
